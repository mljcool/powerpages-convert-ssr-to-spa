let currentURL = "";
const storeTestPages = [];
const removeDupeSrcLinks = [
    "home.css",
    "theme.css",
    "MDBmin.css",
    "Navigation.css",
    "font-awesome.BootstrapV5.bundle.css",
    "office-ui-fabric-core/11.0.0/css/fabric.min.css",
    "fonts.cdnfonts.com/css/selawik",
    "aos@2.3.1/dist/aos.css",
    "font-awesome.BootstrapV5.bundle.css",
    "preform.BootstrapV5.bundle.css",
    "bootstrap.min.css",
    "MsdynIcons.js",
    "Utility.js",
    "@fluentui/web-components",
    "NavigationControl.js",
    "aos@2.3.1/dist/aos.js",
    "app.BootstrapV5.bundle.js",
    "bootstrap.BootstrapV5.bundle.js",
    "purchase-order-list.js",
    "rfq-list.js",
    "router.js",
    "rfq-list.css",
    "purchase-order.css",
    "onboarding-redirect-modal.css",
];
const PORTAL_PAGES = [
    {
        pageId: "rfq",
        pathURL: "/RFQ-list/",
        srcLink: "js/rfq-list.js",
        cssLink: "css/rfq-list.css",
        preserveActiveCss: false,
        htmlPage: null,
    },
    {
        pageId: "po",
        pathURL: "/Purchase-order-workspace/",
        srcLink: "js/purchase-order-list.js",
        cssLink: "css/purchase-order.css",
        preserveActiveCss: false,
        htmlPage: null,
    },
    {
        pageId: "vi",
        pathURL: "/Vendor-information",
        srcLink: "js/purchase-order-list.js",
        cssLink: "css/vendor-information.css",
        preserveActiveCss: false,
        htmlPage: null,
    },
    {
        pageId: "mp",
        pathURL: "/My-profile",
        srcLink: "js/purchase-order-list.js",
        cssLink: "css/rfq-list.js",
        preserveActiveCss: false,
        htmlPage: null,
    },
];

class MsdynPageHydrationFactory {
    constructor(PAGES = []) {
        this.fullPath = "";
        this.currentURL = "";
        this.activePages = PAGES;
        this.db = new MsdynIndexDB({
            DB_NAME: "MsdynPortalDB",
            TABLE_NAME: "pages",
            VERSION: 1,
        });
    }
    removeSrcLinks(doc, names = []) {
        if (!Array.isArray(names) || !names.length) return;

        const $doc = (type) => doc.querySelectorAll(type);
        const attrType = (type) => (attr) => type.getAttribute(attr) || "";
        const existingNames = (type) =>
            names.some((name) => type.includes(name));

        $doc('link[rel="stylesheet"]').forEach((link) => {
            if (existingNames(attrType(link)("href"))) link.remove();
        });

        $doc("script").forEach((script) => {
            if (existingNames(attrType(script)("src"))) script.remove();
        });
    }

    removeHtmlComments(doc) {
        const walker = document.createTreeWalker(
            doc,
            NodeFilter.SHOW_COMMENT,
            null,
            false
        );
        const toRemove = [];
        while (walker.nextNode()) {
            toRemove.push(walker.currentNode);
        }
        toRemove.forEach((comment) => comment.remove());
    }

    unwrapTags(doc, selector) {
        doc.querySelectorAll(selector).forEach((el) => {
            el.replaceWith(...el.childNodes);
        });
    }
    removeActiveExistingJSscript(scriptLink = "") {
        const existingScript = [...document.scripts].find(
            (s) => s.src && s.src.endsWith(scriptLink)
        );
        if (existingScript) {
            existingScript.remove();
        }
    }

    insertHTMLWithDSD(container, html) {
        if ("setHTMLUnsafe" in Element.prototype) {
            container.setHTMLUnsafe(html);
            return;
        }
        const doc = document.implementation.createHTMLDocument("");
        doc.body.innerHTML = html;

        // Find all <template shadowrootmode> and attach their shadow roots
        doc.querySelectorAll("template[shadowrootmode]").forEach((tpl) => {
            const host = tpl.parentNode;
            if (!host || !host.attachShadow) return;

            const mode =
                tpl.getAttribute("shadowrootmode") === "closed"
                    ? "closed"
                    : "open";
            const delegatesFocus = tpl.hasAttribute("shadowrootdelegatesfocus");

            const shadow = host.attachShadow({ mode, delegatesFocus });
            shadow.append(tpl.content); // moves nodes into the shadow root
            tpl.remove(); // remove the <template> marker
        });

        container.replaceChildren(...doc.body.childNodes);
    }

    pageRenderer(pageToRender) {
        const container = document.querySelector(".sectionBlockLayout");
        if (!!container) {
            container.remove();
        }
        const containerNav = document.querySelector(".sub-nav-container");
        containerNav.insertAdjacentHTML("afterend", pageToRender);
    }

    dismissNavigation() {
        document.dispatchEvent(
            new CustomEvent("transmitHideMenu", {
                detail: "hide menu bar",
            })
        );
    }

    async fetchPage(url) {
        try {
            const response = await fetch(url, {
                method: "GET",
                headers: { "Content-Type": "text/html" },
            });

            if (!response.ok)
                throw new Error(`HTTP error! Status: ${response.status}`);

            const htmlText = await response.text();
            const parser = new DOMParser();
            const doc = parser.parseFromString(htmlText, "text/html");
            const elementRemover = (element) =>
                doc.querySelectorAll(element).forEach((el) => el.remove());
            this.removeHtmlComments(doc);
            elementRemover("meta");
            elementRemover("nav");
            elementRemover("div.sub-nav-container");

            this.removeSrcLinks(doc, removeDupeSrcLinks);

            doc.querySelectorAll("script").forEach((script) => {
                const content = script.textContent.trim();
                // Check for signature of unwanted script
                const contentScript =
                    content.includes("AOS.init") &&
                    content.includes("iconList.forEach");
                if (contentScript) {
                    script.remove();
                }
            });
            const firstScript = doc.querySelector("script");
            if (firstScript) firstScript.remove();

            const currentTitle = doc.querySelector("title")?.textContent;

            document.title = currentTitle;
            doc.querySelector("title").remove();
            const cleanedHtml = doc.documentElement.outerHTML;
            return cleanedHtml;
        } catch (err) {
            console.error("Failed to fetch page:", err);
            return null;
        }
    }

    async fetchMultiplePage(pageLinks) {
        const pageToCall = pageLinks.map((link) => this.fetchPage(link));
        return await Promise.all(pageToCall);
    }

    async selectedPages() {
        const urlOnly = this.activePages.map((item) => item.pathURL);
        const pages = await this.fetchMultiplePage(urlOnly);

        await this.db.initDB();
        await this.db.seed(this.activePages);
        pages.length &&
            pages.forEach(async (page, index) => {
                const pageProp = this.activePages[index];
                await this.db.setHtmlPage(pageProp.pageId, page);
            });
    }

    activeURL() {
        return this.currentURL;
    }

    async renderPage(route) {
        console.log("route", route);
        const { origin, pathname } = new URL(route);
        const basePath = origin + "/";
        const fullPath = pathname + route;
        this.dismissNavigation();
        if (fullPath === this.currentURL) {
            return;
        }
        const { htmlPage, preserveActiveCss, srcLink, cssLink, pageId } = await this.db.getByPathURL(pathname);
        this.pageRenderer(htmlPage);
        this.removeActiveExistingJSscript(srcLink);
        if (!preserveActiveCss) {
            console.log("NOT HERE");
            await this.loadCSSByPage(pageId, cssLink, basePath);
            await this.db.togglePreserveCss(pageId, true);
        }
        await this.loadScriptByPage(pageId, srcLink, basePath);
        window.history.pushState({}, "", route);
        this.currentURL = fullPath;
    }

    async loadScriptByPage(pageId, scriptLink, basePath = "") {
        await new Promise((resolve, reject) => {
            const script = document.createElement("script");
            script.src = basePath + scriptLink;
            script.type = "text/javascript";
            script.defer = true; // maintain execution order
            script.onload = () => {
                console.log(`Loaded: ${scriptLink}`);
                resolve();
            };
            script.onerror = () =>
                reject(new Error(`Failed to load ${scriptLink}`));
            console.log(`script`, script);
            document.body.appendChild(script);
        });
        console.log(`✅ Style complete for ${pageId}: ${scriptLink}`);
    }

    async loadCSSByPage(pageId, styleLink, basePath = "") {
        await new Promise((resolve, reject) => {
            const link = document.createElement("link");
            link.rel = "stylesheet";
            link.href = basePath + styleLink;
            link.onload = () => {
                console.log(`✅ CSS loaded: ${styleLink}`);
                resolve();
            };
            link.onerror = () =>
                reject(new Error(`❌ Failed to load CSS: ${styleLink}`));
            document.head.appendChild(link);
        });
        console.log(`✅ Style complete for ${pageId}: ${styleLink}`);
    }
}

// --- tiny helpers ---
const promisify = (req) =>
    new Promise((resolve, reject) => {
        req.onsuccess = () => resolve(req.result);
        req.onerror = () => reject(req.error);
    });
const storeOf = (db, name, mode = "readonly") =>
    db.transaction(name, mode).objectStore(name);

// --- DB for your Pages schema ---
class MsdynIndexDB {
    constructor({
        DB_NAME = "MsdynPortalDB",
        TABLE_NAME = "pages",
        VERSION = 1,
    } = {}) {
        this.idxDatabaseName = DB_NAME;
        this.idxTableName = TABLE_NAME;
        this.idxVersion = VERSION;
        this.db = null;
    }

    async initDB() {
        if (this.db) return this.db;

        const openReq = indexedDB.open(this.idxDatabaseName, this.idxVersion);

        openReq.onupgradeneeded = () => {
            const db = openReq.result;
            // Key by pageId (string) to keep your IDs stable (no autoIncrement)
            if (!db.objectStoreNames.contains(this.idxTableName)) {
                const store = db.createObjectStore(this.idxTableName, {
                    keyPath: "pageId",
                });
                // Helpful indexes
                store.createIndex("pathURL", "pathURL", { unique: true });
                store.createIndex("srcLink", "srcLink", { unique: false });
                store.createIndex("cssLink", "cssLink", { unique: false });
                store.createIndex("preserveActiveCss", "preserveActiveCss", {
                    unique: false,
                });
            }
        };

        openReq.onblocked = () =>
            console.warn("Open blocked. Close other tabs using this DB.");

        this.db = await promisify(openReq);

        this.db.onversionchange = () => {
            console.warn("Version change detected; closing DB handle.");
            this.db.close();
            this.db = null;
        };

        return this.db;
    }

    // -------------- CRUD & Utilities for Pages ----------------

    /** Insert or update a single page by pageId */
    async upsert(page) {
        const db = await this.initDB();
        const store = storeOf(db, this.idxTableName, "readwrite");
        return promisify(store.put(page));
    }

    /** Bulk seed (insert/update) pages */
    async seed(pagesArray) {
        const db = await this.initDB();
        const tx = db.transaction(this.idxTableName, "readwrite");
        const store = tx.objectStore(this.idxTableName);
        await Promise.all(pagesArray.map((p) => promisify(store.put(p))));
        return new Promise((resolve, reject) => {
            tx.oncomplete = () => resolve(true);
            tx.onerror = () => reject(tx.error);
        });
    }

    async getAll() {
        const db = await this.initDB();
        return promisify(storeOf(db, this.idxTableName).getAll());
    }

    async getByPageId(pageId) {
        const db = await this.initDB();
        return promisify(storeOf(db, this.idxTableName).get(pageId));
    }

    async getByPathURL(pathURL) {
        const db = await this.initDB();
        const idx = storeOf(db, this.idxTableName).index("pathURL");
        return promisify(idx.get(pathURL));
    }

    async existsById(pageId) {
        const db = await this.initDB();
        const store = storeOf(db, this.idxTableName);
        const record = await promisify(store.get(pageId));
        return !!record;
    }

    async existsByPathURL(pathURL) {
        const db = await this.initDB();
        const idx = storeOf(db, this.idxTableName).index("pathURL");
        const record = await promisify(idx.get(pathURL));
        return !!record;
    }

    async delete(pageId) {
        const db = await this.initDB();
        return promisify(
            storeOf(db, this.idxTableName, "readwrite").delete(pageId)
        );
    }

    async clear() {
        const db = await this.initDB();
        return promisify(storeOf(db, this.idxTableName, "readwrite").clear());
    }

    async togglePreserveCss(pageId, value) {
        const db = await this.initDB();
        const store = storeOf(db, this.idxTableName, "readwrite");
        const record = await promisify(store.get(pageId));
        if (!record) throw new Error(`Page "${pageId}" not found`);
        record.preserveActiveCss = !!value;
        return promisify(store.put(record));
    }

    async setHtmlPage(pageId, htmlStringOrBlob) {
        const db = await this.initDB();
        const store = storeOf(db, this.idxTableName, "readwrite");
        const record = await promisify(store.get(pageId));
        if (!record) throw new Error(`Page "${pageId}" not found`);
        record.htmlPage = htmlStringOrBlob; // string, Blob, or ArrayBuffer all OK in IDB
        return promisify(store.put(record));
    }

    close() {
        if (this.db) {
            this.db.close();
            this.db = null;
        }
    }

    async deleteDatabase() {
        this.close();
        return promisify(indexedDB.deleteDatabase(this.idxDatabaseName));
    }
}

document.addEventListener("DOMContentLoaded", async function () {
    const hydratedPage = new MsdynPageHydrationFactory(PORTAL_PAGES);
    await hydratedPage.selectedPages();
    document.querySelectorAll(".sub-menu-items").forEach((_submenus) => {
        _submenus.addEventListener("click", async function (e) {
            const anchor = e.target.closest("a");
            if (!anchor || !this.contains(anchor)) return;
            e.preventDefault();
            const routed = anchor.href;
            await hydratedPage.renderPage(routed);
        });
    });

    const myProfileLink = document.querySelector('a[href="/My-profile"]');
    myProfileLink.addEventListener("click", function (e) {
        e.preventDefault();
        const link = "/My-profile";
        hydratedPage.renderPage(link);
    });
});

// document.addEventListener("DOMContentLoaded", async () => {
//     await db.initDB();

//     // Seed once (idempotent because we use put)
//     await db.seed(pagesData);

//     // Read examples
//     const all = await db.getAll();
//     console.log("All pages:", all);

//     const rfq = await db.getByPageId("rfq");
//     console.log("RFQ page:", rfq);

//     const byUrl = await db.getByPathURL("/Vendor-information");
//     console.log("By pathURL:", byUrl);

//     // Update examples
//     await db.togglePreserveCss("po", true);
//     await db.setHtmlPage("rfq", "<div>RFQ HTML cached…</div>");

//     // Upsert / change links
//     await db.upsert({
//         pageId: "mp",
//         pathURL: "/My-profile",
//         srcLink: "js/purchase-order-list.js",
//         cssLink: "css/profile.css",
//         preserveActiveCss: true,
//         htmlPage: "<div>Profile cached</div>",
//     });
// });
