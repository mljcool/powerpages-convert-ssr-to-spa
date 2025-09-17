$(document).ready(async function() {
    // 1. Banner Setup
    const banner = $('.banner-section').html();
    $('.entity-form').prepend(banner);

    $('.close-banner').click(() => $('.banner-information').hide());

    const instructionsMessage = $('.instructions').text();
    if (instructionsMessage) {
        $('.banner-message').html(instructionsMessage);
        $('.banner-information').css('display', 'flex');
    }

    // 2. Onboarding Modal
    const hasContinueOnboard = localStorage.getItem('hasContinueOnboard2');
    if (!hasContinueOnboard) {
        $('#onboardingModal').modal('show');
    }

    $('.continue-onboard').click(() => {
        localStorage.setItem('hasContinueOnboard2', true);
        $('#onboardingModal').modal('hide');
    });

    $('.onboard-success').click(() => {
        window.location.href = '/';
    });

    // 3. URL Param Check for Success Message
    const msgValue = new URLSearchParams(window.location.search).get('msg');
    if (msgValue) {
        $('#onboardingModalSuccess').modal('show');
    }

    // 4. Table Style Enhancement
    const viewGridTable = $(".view-grid").find(".table");
    if (viewGridTable.length) {
        viewGridTable.toggleClass("table-striped");
    }

    // 5. Inject Plus Icon
    const plusIcon = iconList.find(_icon => _icon.id === 'plus-icon');
    if (plusIcon?.svg) {
        $(".create-action").each(function() {
            const currentButtonText = $(this).text();
            $(this).html(`<span class="icon-msdyn-plus-icon">${plusIcon.svg}</span><span class="txt-regular-action">${currentButtonText}</span>`);
        });
    }

    // 6. Replace Info Icon
    const infoIcon = iconList.find(_icon => _icon.id === 'banner-info');
    const infoTarget = $('.validation-header').find('.fa');
    if (infoIcon?.svg && infoTarget.length) {
        infoTarget.toggleClass('fa-info-circle').html(infoIcon.svg);
    }

    // 7. Progress Bar Setup
    $('.progress').prepend(`
        <div class="progress-line">
            <div class="progress-fill"></div>
        </div>
    `);
    const progressStages = ['0%', '30%', '50%', '75.5%', '99%', '100%'];
    const progressFill = document.querySelector('.progress-fill');
    if (progressFill) {
        const progressLength = $('.list-group-item-success').length;
        progressFill.style.height = progressStages[progressLength];
    }

    // 8. Modal & Action Button Events
    $('.continue-remain').click(() => $('#contactDeactivateModal').modal('hide'));
    $("table").on("click", ".activate-link, .deactivate-link", ObserveNotificationAlert);
    $("table").on("click", ".edit-link, .create-action", IframeInjector);

    // 9. Reusable Subgrid Delete Logic
    function handleSubgridDelete(subgridSelector, entityConstant) {
        const $grid = $(subgridSelector);
        $grid.on("loaded", function() {
            const $rows = $grid.find("tbody tr");
            const HEADERS = {
                VE_RECORD_GUID: "VE Record Guid",
                VIRTUAL_ENTITY_GUID: "Virtual Entity Guid"
            };
            let veGuidHeaderIndex = -1;

            $rows.each(function() {
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
                $grid.find("thead tr th").eq(veGuidHeaderIndex).hide();
                $rows.each(function() {
                    $(this).find("td").eq(veGuidHeaderIndex).hide();
                });
            }

            const modal = $grid.children(".modal-delete");
            const modalBtn = modal.find("button.primary");

            $grid.find(".delete-link").each(function() {
                const deleteBtn = $(this);
                deleteBtn.on("click", function() {
                    modalBtn.one("click", async function(evt) {
                        evt.preventDefault();
                        evt.stopPropagation();

                        const veGuidId = deleteBtn.closest("tr").find('td[data-attribute="msdyn_vrmverecordguid"]').text().trim();
                        if (veGuidId) {
                            try {
                                const mappingManager = new MappingManager(window.SYNC_CONFIG_NAME, window.CRUD_ACTION.DELETE);
                                await mappingManager.handleDelete(veGuidId, entityConstant);
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

    // 10. Attach to Specific Subgrids
    handleSubgridDelete(".entity-grid.subgrid.address-subgrid", window.SYNC_ENTITIES.ADDRESS);
    handleSubgridDelete(".entity-grid.subgrid.contact-methods-subgrid", window.SYNC_ENTITIES.CONTACT_METHOD);
    handleSubgridDelete(".entity-grid.subgrid.contact-subgrid", window.SYNC_ENTITIES.CONTACT);
});


document.addEventListener('DOMContentLoaded', function() {
    document
        .querySelectorAll('fieldset table colgroup')
        .forEach((colgroup) => colgroup.remove());

    // Set div if added js on webforms
    const $row = $('.row').first();
    const $left = $('.order-0').first();
    const $right = $('.order-1').first();

    if ($row.length && $left.length && $right.length) {
        $row.append($left);
        $row.append($right);
    }
});