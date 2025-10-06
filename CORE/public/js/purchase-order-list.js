$(function () {
    const pageTitle = document.querySelector(".po-header-title");
    pageTitle.style.color = "red";
    const urlParams = new URLSearchParams(window.location.search);
    const activeViewTiles = urlParams.get("activeView");
    setTableView(activeViewTiles);
});

function setTableView(tableId) {
    const viewTitle = document.querySelectorAll(".viewTitle > h5.fw-bolder");
    const viewTitles = {
        activePO: "Active POs",
        forReviewPo: "For review",
        awaitingAction: "Awaiting customer action",
        confirmedPo: "Open confirmed PO",
    };

    const objKey = viewTitles[tableId];
    $(".stat-card").removeClass("active");
    $(`.stat-card.${tableId}`).addClass("active");

    viewTitle.forEach((_node) => {
        _node.textContent = objKey;
    });
    const objKeyTable = Object.keys(viewTitles);
    console.log("tableId", tableId);
    console.log("objKeyTitle", objKey);

    objKeyTable.forEach((id) => {
        if (tableId === id) {
            $("#" + tableId).css("display", "block");
        } else {
            $("#" + id).css("display", "none");
        }
    });
}
