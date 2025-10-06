$(function () {
    console.log("PO-list");

    const pageTitle = document.querySelector(".po-header-title");
    pageTitle.style.color = "red";
});

function setTableView(tableId) {
    const viewTitles = {
        activePO: "Active POs",
        forReviewPo: "For review",
        awaitingAction: "Awaiting customer action",
        confirmedPo: "Open confirmed PO",
    };

    const objKey = viewTitles[tableId];
    const objKeyTable = Object.keys(viewTitles);
    objKeyTable.forEach((id) => {
        if (tableId === id) {
            $("#" + tableId).css("display", "block");
        } else {
            $("#" + id).css("display", "none");
        }
    });
}
