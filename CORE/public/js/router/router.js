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
const activePages = [
    {
        pageId: "rfq",
        pathURL: "/RFQ-list/",
        srcLink: "js/rfq-list.js",
        cssLink: "css/rfq-list.css",
        preserveActiveCss: false,
    },
    {
        pageId: "po",
        pathURL: "/Purchase-order-workspace/",
        srcLink: "js/purchase-order-list.js",
        cssLink: "css/purchase-order.css",
        preserveActiveCss: false,
    },
    {
        pageId: "vi",
        pathURL: "/Vendor-information",
        srcLink: "js/purchase-order-list.js",
        cssLink: "css/vendor-information.css",
        preserveActiveCss: false,
    },
    {
        pageId: "mp",
        pathURL: "/My-profile",
        srcLink: "js/purchase-order-list.js",
        cssLink: "css/rfq-list.js",
        preserveActiveCss: false,
    },
];


class MsdynPageHydrationFactory {
    removeSrcLinks(doc, names = []) {
        if (!Array.isArray(names) || !names.length) return;

        const $doc = type => doc.querySelectorAll(type);
        const attrType = type => attr => type.getAttribute(attr) || "";
        const existingNames = type => names.some((name) => type.includes(name));

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

            const mode = tpl.getAttribute("shadowrootmode") === "closed" ? "closed" : "open";
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

            if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

            const htmlText = await response.text();
            const parser = new DOMParser();
            const doc = parser.parseFromString(htmlText, "text/html");
            const elementRemover = element => doc.querySelectorAll(element).forEach((el) => el.remove())
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
        const urlOnly = activePages.map((item) => item.pathURL);
        const pages = await this.fetchMultiplePage(urlOnly);
        pages.length && pages.forEach((page, index) => {
                const pageProp = activePages[index];
                storeTestPages.push({
                    htmlPage: page,
                    ...pageProp,
                });
            });
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

document.addEventListener("DOMContentLoaded", async function () {
    let currentURL = "";
    const hydratedPage = new MsdynPageHydrationFactory();
    await hydratedPage.selectedPages();

    const allsubmenus = document.querySelectorAll(".sub-menu-items");
    allsubmenus.forEach((_submenus) => {
        _submenus.addEventListener("click", async function (e) {
            const anchor = e.target.closest("a");
            if (!anchor || !this.contains(anchor)) return;
            e.preventDefault();

            const { pathname, origin } = new URL(anchor.href);
            const fullPath = pathname + anchor.search;

            if (storeTestPages.length && fullPath !== currentURL) {
                const basePath = origin + "/";
                const { htmlPage, srcLink, cssLink, pageId } =
                    storeTestPages.find((_link) => _link.pathURL === pathname);
                const currentTargetPage = activePages.find(
                    (p) => p.pageId === pageId
                );
                hydratedPage.removeActiveExistingJSscript(srcLink);
                hydratedPage.pageRenderer(htmlPage);
                if (!currentTargetPage.preserveActiveCss) {
                    await hydratedPage.loadCSSByPage(pageId, cssLink, basePath);
                    currentTargetPage.preserveActiveCss = true;
                }
                await hydratedPage.loadScriptByPage(pageId, srcLink, basePath);
                hydratedPage.dismissNavigation();
                window.history.pushState({}, "", anchor.href);
                currentURL = fullPath;
                console.log("activePages", activePages);
            }
        });
    });

    const myProfileLink = document.querySelector('a[href="/My-profile"]');
    myProfileLink.addEventListener("click", function (e) {
        e.preventDefault();
        const link = "/My-profile";
        if (storeTestPages.length && link !== currentURL) {
            const searchPage = storeTestPages.find(
                (_link) => _link.pathURL === link
            );
            hydratedPage.pageRenderer(searchPage.htmlPage);
            fullPath = "/My-profile";
        }
    });
});
