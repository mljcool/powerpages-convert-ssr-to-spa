/*
 This script overrides certain generic Bootstrap UI elements and Iframes to mimic Fluent UI styles. 
 For forms and inputs, vanilla JavaScript is used as much as possible
  
*/

window.addEventListener("load", function () {
    console.log('CONTENT_LOADED');

    // Override Loading Form
    const fluentProgress = `<fluent-progress-ring></fluent-progress-ring>`;

    // Update elements with the 'form-loading' class
    document.querySelectorAll('.form-loading').forEach(element => {
        element.innerHTML = `${fluentProgress}
    <span class="saving-loading-label">Loading form..</span>`;
    });

    // Update elements with the 'view-loading' class
    document.querySelectorAll('.view-loading').forEach(element => {
        element.innerHTML = `
    <div class="loading-wrapper">
        ${fluentProgress}
        <span class="saving-loading-label">Loading..</span>
    </div>`;
    });

    const infoIcon = iconList.find(_icon => _icon.id === 'banner-info');
    document.querySelectorAll('.validation-header .fa').forEach(icon => {
        icon.classList.toggle('fa-info-circle');
        icon.innerHTML = infoIcon.svg;
    });

    document.querySelectorAll('.input-group-text').forEach(element => {
        if (element.textContent.includes('$')) {
            element.style.display = 'none';
        }
    });

    const observer = new MutationObserver(() => {
        const element = document.querySelector('.msdyn-custom-dialog-form');
        if (element) {
            console.log('The .msdyn-custom-dialog-form element is now present in the DOM.');
            observer.disconnect(); // Stop observing after detection
        }
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
});

function ObserveOnloadingForm(callback) {
    const targetElement = document.querySelector(".form-loading");

    if (targetElement) {
        // Create a new MutationObserver instance
        const observer = new MutationObserver(mutations => {
            mutations.forEach(mutation => {
                if (mutation.type === "attributes" && mutation.attributeName === "style") {
                    callback(true)
                }
            });
        });

        // Start observing for attribute changes (including style)
        observer.observe(targetElement, {
            attributes: true,
            attributeFilter: ["style"]
        });
    }
}

function IframeInjector(className = "msdyn-custom-dialog-form") {
    const setClasses = ["certificates", className, "form-overlay"];

    // Function to handle iframe load event
    function handleIframeLoad(event) {
        try {
            const iframe = event.target;
            const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;

            if (!iframeDoc) {
                console.warn("Iframe content document not accessible.");
                return;
            }

            console.info("Iframe loaded!");
            const targetDiv = iframeDoc.getElementById("EntityFormControl");
            if (iframeDoc?.body) {
                iframeDoc.body.style.background = "#fff"; 
            }

            if (targetDiv) {
                targetDiv.classList.add(...setClasses);
                setTimeout(() => {
                    const modal = document.querySelector('.modal-dialog');
                    const modalBody = modal.querySelector('.modal-body');
                    modalBody.classList.add('hide-overlay');
                }, 800)
            } else {
                console.warn("Target div #EntityFormControl not found.");
            }
        } catch (error) {
            console.warn(`Can't access iframes due to cross-origin restrictions.`);
        }
    }

    // Function to check for the iframe and attach event listener
    function checkIframe() {
        const modal = document.querySelector("section.modal.show");
        const iframe = modal.querySelector("iframe");

        const url = new URL(iframe.src);
        const contactId = url.searchParams.get("id");
        const entityFormId = url.searchParams.get("entityformid");

        if (entityFormId === "a82a5478-a225-f011-8c4e-000d3a36a8b3") {
            iframe.src = "/edit-portal-user?id=" + contactId;
        }

        if (iframe && !iframe.dataset.injected) {
            iframe.dataset.injected = "true";
            iframe.addEventListener("load", handleIframeLoad);
        }
    }

    // Use MutationObserver to detect modal & iframe changes
    const observer = new MutationObserver(() => {
        checkIframe();
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    let retryCount = 10;
    const interval = setInterval(() => {
        checkIframe();
        if (--retryCount === 0) {
            clearInterval(interval);
            observer.disconnect();
            console.log("Stopped iframe checking after multiple attempts.");
        }
    }, 500);
}

function ObserveNotificationAlert(closestTableName = '') {
    const observer = new MutationObserver(() => {
        const element = document.querySelector(".notifications");
        if (element && element.offsetParent !== null) {

            const successHtml = $('.notifications').html();

            $(".subgrid-cell").each(function () {
                if ($(this).find(".notification").length > 0) {
                    $(this).find(".notification").remove();
                }
            });

            if (closestTableName) {
                $(`table[data-name='${closestTableName}']`).each(function () {
                    $(this).find(".subgrid-cell").prepend(successHtml);
                });
                setTimeout(() => {
                    $('.notification .alert-success').css('display', 'block');
                }, 900);
            } else {
                $('.subgrid-cell').prepend(successHtml);
                $('.alert-success > #MessageLabel').each(function () {
                    const message = $(this).text();
                    if (message) {
                        $('.notification .alert-success').css('display', 'block');
                    }
                });
            }
            observer.disconnect(); // Stop observing once detected
        }
    });

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
}

async function fetchAPIUpdateUI(apiUrl, prefix) {
    try {
        const response = await fetch(apiUrl);
        const data = await response.json();

        Object.keys(data).forEach(key => {
            if (key.startsWith(prefix)) {
                const el = document.getElementById(key);
                if (el) {
                    el.textContent = data[key];
                    el.classList.remove("loading");
                }
            }
        });
    } catch (err) {
        console.error(`Failed to load data from ${apiUrl}`, err);

        // Fallback: Set all matching fields to "X"
        const elements = document.querySelectorAll(`[id^="${prefix}"]`);
        elements.forEach(el => {
            el.textContent = "X";
            el.classList.remove("loading");
        });
    }
}

function PCFHelper() {
    return {
        observeComponentFound(
            selector,
            { timeout = 15000, root = document, predicate } = {}
        ) {
            return new Promise((resolve, reject) => {
                let done = false;
                const finish = (el) => {
                    if (done) return;
                    done = true;
                    obs.disconnect();
                    resolve(el);
                };

                const check = () => {
                    const el = root.querySelector(selector);
                    if (el && (!predicate || predicate(el))) finish(el);
                };

                check();

                // observe until found
                const target = root === document ? document.documentElement : root;
                const obs = new MutationObserver(check);
                if (!done) obs.observe(target, { childList: true, subtree: true });

                // timeout
                if (timeout)
                    setTimeout(() => {
                        if (!done) {
                            obs.disconnect();
                            console.warn(`Timed out waiting for ${selector}`)
                            reject();
                        }
                    }, timeout);
            });
        },
        debounce(fn, ms = 80) {
            let t;
            return (...args) => {
                clearTimeout(t);
                t = setTimeout(() => fn(...args), ms);
            };
        }
    }
}
