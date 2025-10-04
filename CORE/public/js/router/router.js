function removeSrcLinks(doc, names = []) {
    if (!Array.isArray(names) || names.length === 0) return;

    // Remove matching <link rel="stylesheet">
    doc.querySelectorAll('link[rel="stylesheet"]').forEach((link) => {
        const href = link.getAttribute("href") || "";
        if (names.some((name) => href.includes(name))) {
            link.remove();
        }
    });

    // Remove matching <script>
    doc.querySelectorAll("script").forEach((script) => {
        const src = script.getAttribute("src") || "";
        if (names.some((name) => src.includes(name))) {
            script.remove();
        }
    });
}

function unwrapTags(doc, selector) {
    doc.querySelectorAll(selector).forEach((el) => {
        el.replaceWith(...el.childNodes); // keeps children, removes the tag
    });
}

function insertHTMLWithDSD(container, html) {
    if ("setHTMLUnsafe" in Element.prototype) {
        container.setHTMLUnsafe(html);
        return;
    }

    // Fallback: parse normally, then materialize DSD by hand
    const doc = document.implementation.createHTMLDocument("");
    doc.body.innerHTML = html;

    // Find all <template shadowrootmode> and attach their shadow roots
    doc.querySelectorAll("template[shadowrootmode]").forEach((tpl) => {
        const host = tpl.parentNode;
        if (!host || !host.attachShadow) return;

        const mode =
            tpl.getAttribute("shadowrootmode") === "closed" ? "closed" : "open";
        const delegatesFocus = tpl.hasAttribute("shadowrootdelegatesfocus");

        const shadow = host.attachShadow({ mode, delegatesFocus });
        shadow.append(tpl.content); // moves nodes into the shadow root
        tpl.remove(); // remove the <template> marker
    });

    container.replaceChildren(...doc.body.childNodes);
}

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
    "router.js",
];

async function fetchHtmlPage(url) {
    try {
        const response = await fetch(url, {
            method: "GET",
            headers: { "Content-Type": "text/html" },
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const htmlText = await response.text();
        const parser = new DOMParser();
        const doc = parser.parseFromString(htmlText, "text/html");
        doc.querySelectorAll("meta").forEach((el) => el.remove());
        doc.querySelectorAll("nav").forEach((el) => el.remove());
        doc.querySelectorAll("div.sub-nav-container").forEach((el) =>
            el.remove()
        );
        removeSrcLinks(doc, removeDupeSrcLinks);

        doc.querySelectorAll("script").forEach((script) => {
            const content = script.textContent.trim();
            // Check for signature of unwanted script
            if (
                content.includes("AOS.init") &&
                content.includes("iconList.forEach")
            ) {
                script.remove(); // remove the script
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

async function TestMulitpleCallAsync(url) {
    try {
        const response = await fetch(url, {
            method: "GET",
            headers: { "Content-Type": "text/html" },
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const htmlText = await response.text();
        const parser = new DOMParser();
        const doc = parser.parseFromString(htmlText, "text/html");
        const cleanedHtml = doc.documentElement.outerHTML;
        return cleanedHtml;
    } catch (err) {
        console.error("Failed to fetch page:", err);
        return null;
    }
}

async function fetchMultiple(pageLinks) {
    // Create array of promises
    const pageToCall = pageLinks.map((link) => fetchHtmlPage(link));
    // Wait for all promises to settle
    const results = await Promise.all(pageToCall);

    return results;
}

function pageRenderer(pageToRender) {
    const container = document.querySelector(".sectionBlockLayout");
    if (!!container) {
        container.remove();
    }
    const containerNav = document.querySelector(".sub-nav-container");
    containerNav.insertAdjacentHTML("afterend", pageToRender);
    // insertHTMLWithDSD(containerNav, pageToRender);
    // console.log('html', pageToRender);
    // document.getElementById('main-page').innerHTML = html;
}

const route = (event) => {
    event = event || window.event;
    event.preventDefault();
    window.history.pushState({}, "", event.target.href);
    // handleLocation();
};

const routes = {
    "/": "/Home/Home.html",
};

const handleLocation = async () => {
    const path = window.location.pathname;
    const route = routes["/"];
    const pageToRender = await fetchHtmlPage(route);
    pageRenderer(pageToRender);
};

// window.onpopstate = handleLocation;
// window.route = route;
var storeTestPages = [];
function testPages() {
    const testPages = [
        {
            pathURL: "/RFQ-list/?activeView=Active",
        },
        {
            pathURL: "/Purchase-order-workspace/?activeView=activePO",
        },
        {
            pathURL: "/Vendor-information",
        },
        {
            pathURL: "/My-profile",
        },
    ];
    const urlOnly = testPages.map((item) => item.pathURL);
    fetchMultiple(urlOnly).then((_pages) => {
        _pages.forEach((page, index) => {
            storeTestPages.push({
                route: testPages[index].pathURL,
                htmlPage: page,
            });
        });
    });
    // testPages.forEach(async (links) => {
    // 	const pageToRender = await fetchHtmlPage(route);
    // 	storePages.push({
    // 		route: links.pathURL,
    // 		htmlPage: pageToRender,
    // 	});
    // });
}

document.addEventListener("DOMContentLoaded", function () {
    console.log("router test");
    testPages();

    const shapeLinkCollection = [];
    const storePages = [];
    const linkCollection = document.querySelectorAll("ul.sub-menu-items li");
    const sanitizeLinks = Array.from(linkCollection);

    sanitizeLinks.forEach((li) => {
        const href = li.querySelector("a").href;
        const parsed = new URL(href);
        const pathURL = parsed.pathname + parsed.search;
        const predictedRoutes = {
            pathURL,
            href,
            text: li.querySelector("a").textContent.trim(),
            desc: li.querySelector("span").textContent.trim(),
        };
        shapeLinkCollection.push(predictedRoutes);
    });

    // if (sanitizeLinks.length) {
    // console.log('sanitizeLinks', sanitizeLinks);
    // sanitizeLinks.forEach(async (links) => {
    // 	const pageToRender = await fetchHtmlPage(route);
    // 	storePages.push({
    // 		route: links.pathURL,
    // 		htmlPage: pageToRender,
    // 	});
    // });
    // }

    const event = new CustomEvent("loadScript", {
        detail: { allow: true },
    });

    let currentURL = "";
    const allsubmenus = document.querySelectorAll(".sub-menu-items");
    allsubmenus.forEach((_submenus) => {
        console.log(_submenus);
        _submenus.addEventListener("click", function (e) {
            const anchor = e.target.closest("a");
            if (!anchor || !this.contains(anchor)) return;
            e.preventDefault();

            console.log("Clicked link:", anchor.href);
            const anchorTag = new URL(anchor.href);
            const fullPath = anchorTag.pathname + anchor.search;
            console.log("anchorTag", anchorTag);
            if (storeTestPages.length && fullPath !== currentURL) {
                const searchPage = storeTestPages.find(
                    (_link) => _link.route === fullPath
                );
                window.history.pushState({}, "", anchor.href);
                console.log("searchPage", searchPage);
                pageRenderer(searchPage.htmlPage);
                currentURL = fullPath;
            }
        });
    });

    const myProfileLink = document.querySelector('a[href="/My-profile"]');
    myProfileLink.addEventListener("click", function (e) {
        e.preventDefault();
        const link = "/My-profile";
        if (storeTestPages.length && link !== currentURL) {
            const searchPage = storeTestPages.find(
                (_link) => _link.route === link
            );
            pageRenderer(searchPage.htmlPage);
            fullPath = "/My-profile";
        }
    });
});
