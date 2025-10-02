function bindHideOnShownOnce($modal, $parent) {
    $modal
        .off('shown.bs.modal')
        .one('shown.bs.modal', function () {
            if ($parent.hasClass('address-subgrid')) {
                $(this).modal('hide');
            }
        });
}
function closeModal($taxModal) {
    $('.modal-cancel.neutral').click(() => {
        $taxModal.modal('hide')
    })
}
$('.entity-grid.address-subgrid').on('loaded', function () {
    const $parent = $(this);
    const $taxModal = $('#taxLineModal');
    const superSpecificSelector = '#general_information_tab_address_section_subgrid_addresses > div > div.view-toolbar.grid-actions.clearfix > div > div > a'
    $(superSpecificSelector).on("click", function (e) {
        e.preventDefault();
        $taxModal.modal('show');
        closeModal($taxModal);
        bindHideOnShownOnce($('.modal-form.modal-form-insert'), $parent);
    });
    $(".edit-link")
        .removeClass("launch-modal")
        .on("click", function (e) {
            e.preventDefault();
            $taxModal.modal('show');
            closeModal($taxModal);
            bindHideOnShownOnce($('.modal-form.modal-form-edit'), $parent);

        });
});