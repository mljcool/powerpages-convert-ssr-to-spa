$(document).ready(async function() {
    const defaultDialog = document.getElementById('defaultDialog');
    const updateButton = document.getElementById('UpdateButton');
    const warningDialog = document.getElementById('warning-unsave');

    // Save button click
    $('.save').click(() => {
        if (updateButton?.click) {
            updateButton.click();
            defaultDialog.removeAttribute('hidden');
        }
    });

    // Add icons to create-action buttons
    const plusIcon = iconList.find(icon => icon.id === 'plus-icon');
    $('.create-action').each(function() {
        const text = $(this).text();
        $(this).html(`<span class="icon-msdyn-plus-icon">${plusIcon.svg}</span><span class="txt-regular-action">${text}</span>`);
    });

    // Replace search icon
    const searchIcon = iconList.find(icon => icon.id === 'search-icon');
    $('.fa-search').html(searchIcon.svg);

    // Remove table-striped class from tables
    $('.table.table-striped').removeClass('table-striped');

    // Activation and deactivation link click handlers
    $('table').on('click', '.activate-link, .deactivate-link', function() {
        const tableName = $(this).closest('table[data-name]').data('name');
        ObserveNotificationAlert(tableName);
    });

    // Create-action button click handler
    $('.create-action').on('click', function() {
        const btnText = $(this).text();
        const modalClassname = btnText.replace(/\s+/g, '-').toLowerCase();
        IframeInjector(modalClassname);
    });

    // FORM revalidation and unsaved changes warning
    let isDirty = false;

    $('form :input').on('input change', () => {
        isDirty = true;
    });

    $('form').on('submit', () => {
        isDirty = false;
    });

    $('.btn-single-form').click(e => {
        e.preventDefault();
        if (isDirty) {
            warningDialog.removeAttribute('hidden');
        } else {
            window.location.href = '/';
        }
    });

    $('.continue-save, .close-unsave-warning').click(e => {
        e.preventDefault();
        warningDialog.setAttribute('hidden', '');
        if ($(e.target).hasClass('continue-save')) {
            window.location.href = '/';
        }
    });

    $('.continue-remain').click(e => {
        e.preventDefault();
        warningDialog.setAttribute('hidden', '');
    });



    function initSubgridDeleteHandler(subgridClass, entityType) {
        const $subgrid = $(`.entity-grid.subgrid.${subgridClass}`);

        $subgrid.on("loaded", function() {
            // Hide the Virtual Entity Guid column
            let veGuidHeaderIndex = -1;
            const HEADERS = {
                VE_RECORD_GUID: "VE Record Guid",
                VIRTUAL_ENTITY_GUID: "Virtual Entity Guid"
            };

            $subgrid.find("tbody tr").each(function() {
                $(this).find("td").each(function(index) {
                    const thValue = $(this).attr("data-th");
                    if (thValue === HEADERS.VE_RECORD_GUID || thValue === HEADERS.VIRTUAL_ENTITY_GUID) {
                        veGuidHeaderIndex = index;
                        return false;
                    }
                });
                if (veGuidHeaderIndex !== -1) return false;
            });

            if (veGuidHeaderIndex !== -1) {
                $subgrid.find("thead tr th").eq(veGuidHeaderIndex).hide();
                $subgrid.find("tbody tr").each(function() {
                    $(this).find("td").eq(veGuidHeaderIndex).hide();
                });
            }

            const modal = $subgrid.children(".modal-delete");
            const modalBtn = modal.find("button.primary");

            $subgrid.find(".delete-link").each(function() {
                const deleteBtn = $(this);

                deleteBtn.on("click", function(event) {
                    modalBtn.one("click", async function(evt) {
                        evt.preventDefault();
                        evt.stopPropagation();
                        const parentRow = deleteBtn.closest("tr");
                        const veGuidId = parentRow.find('td[data-attribute="msdyn_vrmverecordguid"]').text().trim();

                        if (veGuidId) {
                            try {
                                const mappingManager = new MappingManager(window.SYNC_CONFIG_NAME, window.CRUD_ACTION.DELETE);
                                await mappingManager.handleDelete(veGuidId, entityType);
                            } catch (error) {
                                alert(error);
                            } finally {
                                modalBtn[0].dispatchEvent(new Event("click", {
                                    bubbles: true,
                                    cancelable: true
                                }));
                            }
                        }
                    });
                });
            });
        });
    }

    // Initialize for both subgrids
    initSubgridDeleteHandler("address-subgrid", window.SYNC_ENTITIES.ADDRESS);
    initSubgridDeleteHandler("contact-methods-subgrid", window.SYNC_ENTITIES.CONTACT_METHOD);
    initSubgridDeleteHandler("contact-subgrid", window.SYNC_ENTITIES.CONTACT);
});