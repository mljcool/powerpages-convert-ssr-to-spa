@extends('layouts.app')

@section('content')
     <div class="sectionBlockLayout text-start homepage-section-wrapper">
        <div class="container-fluid">
            <div class="home-workspace-wrapper">
                <div class="workspace-hero-banner">
                    <div class="hero-content">
                        <h1>Gemini Industries LLC</h1>
                    </div>
                </div>

                <div class="workspace-section">
                    <h1 class="txt-workspaces">Workspaces</h1>
                </div>

                <div class="w-tiles">
                    <div class="w-card workspace-tiles">
                        <div class="workspace-title">
                            <h3>Vendor Bidding</h3>
                            <p class="description">
                                Description about Vendor Bidding
                            </p>
                        </div>
                        <div class="status-workspace">
                            <div class="status">
                                <a href="/RFQ-list/?activeView=Active">Active</a>
                                <span class="data-count" id="rfq_active">8</span>
                            </div>
                            <div class="status">
                                <a href="/RFQ-list/?activeView=Invitations">New Bid invitations</a>
                                <span class="data-count" id="rfq_new">2</span>
                            </div>
                            <div class="status">
                                <a href="/RFQ-list/?activeView=InProgress">In progress</a>
                                <span class="data-count" id="rfq_inprogress">1</span>
                            </div>
                            <div class="status">
                                <a href="/RFQ-list/?activeView=Submitted">Submitted</a>
                                <span class="data-count" id="rfq_submitted">1</span>
                            </div>
                            <div class="status">
                                <a href="RFQ-list/?activeView=Returned">Returned</a>
                                <span class="data-count" id="rfq_returned">1</span>
                            </div>
                            <div class="status">
                                <a href="/RFQ-list/?activeView=Awarded">Awarded</a>
                                <span class="data-count" id="rfq_awarded">1</span>
                            </div>
                            <div class="status">
                                <a href="/RFQ-list/?activeView=LostBids">Lost Bids</a>
                                <span class="data-count" id="rfq_lost">1</span>
                            </div>
                            <div class="status">
                                <a href="/RFQ-list/?activeView=Declined">Declined Bids</a>
                                <span class="data-count" id="rfq_declined">1</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-card workspace-tiles">
                        <div class="workspace-title">
                            <h3>Purchase order confirmation</h3>
                            <p class="description">Description about PO Conf</p>
                        </div>
                        <div class="status-workspace">
                            <div class="status">
                                <a href="/Purchase-order-workspace/?activeView=activePO">Active POs</a>
                                <span class="data-count" id="po_activepos">6</span>
                            </div>
                            <div class="status">
                                <a href="/Purchase-order-workspace/?activeView=forReviewPo">For review</a>
                                <span class="data-count" id="po_forreview">5</span>
                            </div>
                            <div class="status">
                                <a href="/Purchase-order-workspace/?activeView=awaitingAction">Awaiting customer
                                    action</a>
                                <span class="data-count" id="po_awaitingaction">0</span>
                            </div>
                            <div class="status">
                                <a href="/Purchase-order-workspace/?activeView=confirmedPo">Open confirmed PO</a>
                                <span class="data-count" id="po_confirmed">1</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-card workspace-tiles">
                        <div class="workspace-title">
                            <h3>Invoicing</h3>
                            <p class="description">Description about Invoices</p>
                        </div>
                        <div class="status-workspace">
                            <div class="status">
                                <a href="/invoice-workspace/?activeView=allInv">All open invoices</a>
                                <span class="data-count" id="inv_count">2</span>
                            </div>
                            <div class="status">
                                <a href="/invoice-workspace/?activeView=draftInv">Draft</a>
                                <span class="data-count" id="inv_draft">2</span>
                            </div>
                            <div class="status">
                                <a href="/invoice-workspace/?activeView=submittedInv">Submitted</a>
                                <span class="data-count" id="inv_submitted">0</span>
                            </div>
                            <div class="status">
                                <a href="/invoice-workspace/?activeView=approvedInv">Approved</a>
                                <span class="data-count" id="inv_unpaid">0</span>
                            </div>
                            <div class="status">
                                <a href="/invoice-workspace/?activeView=paidInv">Paid</a>
                                <span class="data-count" id="inv_paid">0</span>
                            </div>
                        </div>
                    </div>

                    <div class="w-card workspace-tiles">
                        <div class="workspace-title">
                            <h3>Consignment inventory</h3>
                            <p class="description">
                                List of data fields for consignment inventory
                            </p>
                        </div>
                        <div class="status-workspace">
                            <div class="status">
                                <a href="/Consignment-Inventory/?activeView=onhand-ci">On hand CI</a>
                                <span class="data-count" id="ci_count">0</span>
                            </div>
                            <div class="status">
                                <a href="/Consignment-Inventory/?activeView=products-received-ci">Products received from
                                    CI</a>
                                <span class="data-count" id="ci_receivedpo">0</span>
                            </div>
                            <div class="status">
                                <a href="/Consignment-Inventory/?activeView=po-consuming-ci">PO Consuming CI</a>
                                <span class="data-count" id="ci_invoicepo">0</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="workspace-section">
                    <h1 class="txt-workspaces">Essentials</h1>
                </div>

                <div class="essentials-section">
                    <!-- Vendor details card -->
                    <div class="vendor-card">
                        <div class="vendor-card-header">
                            <h3 class="vendor-card-title">Vendor details</h3>
                        </div>
                        <div class="vendor-card-body">
                            <div class="vendor-card-image">
                                <img src="/assets/vendor-banner.png" alt="Vendor Icon" />
                            </div>
                            <div class="vendor-card-links">
                                <div class="link-block">
                                    <a href="/vendor-information/" class="vendor-link">Global vendor setup</a>
                                    <p class="link-desc">
                                        View, edit and manage information related to
                                        global vendor
                                    </p>
                                </div>

                                <div class="link-block">
                                    <a href="/Setup" class="vendor-link">Local vendor details</a>
                                    <p class="link-desc">
                                        View, edit and manage information related to
                                        local vendor
                                    </p>
                                </div>

                                <div class="link-block">
                                    <a href="/User-Access-Control/" class="vendor-link">Users</a>
                                    <p class="link-desc">View and manage users</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notification card -->
                    <div class="vendor-card">
                        <div class="vendor-card-header">
                            <h3 class="vendor-card-title">Notifications</h3>
                        </div>
                        <div class="vendor-card-body notification-card">
                            <div class="vendor-card-image">
                                <img class="notification-banner" src="/assets/notification-banner.png" alt="Vendor Icon" />
                            </div>
                            <div class="vendor-card-links notification-item-list">
                                <div data-notif-id="0a80b040-858e-f011-b4cc-000d3a359044"
                                    class="link-block notification-list">
                                    <a class="notification-details vendor-link state-code-0">
                                        Validate Legal and Operating Addresses
                                        <span class="icon-msdyn-icon-check"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8 0C12.4183 0 16 3.58172 16 8C16 12.4183 12.4183 16 8 16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0ZM8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1ZM11.3584 5.64645C11.532 5.82001 11.5513 6.08944 11.4163 6.28431L11.3584 6.35355L7.35355 10.3584C7.17999 10.532 6.91056 10.5513 6.71569 10.4163L6.64645 10.3584L4.64645 8.35842C4.45118 8.16316 4.45118 7.84658 4.64645 7.65131C4.82001 7.47775 5.08944 7.45846 5.28431 7.59346L5.35355 7.65131L7 9.298L10.6513 5.64645C10.8466 5.45118 11.1632 5.45118 11.3584 5.64645Z"
                                                    fill="#424242"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <p class="link-desc">9/10/2025 8:32:22 PM</p>
                                </div>
                                <div data-notif-id="99c8cf2f-858e-f011-b4cc-000d3a359044"
                                    class="link-block notification-list">
                                    <a class="notification-details vendor-link state-code-0">
                                        Review and Confirm Contact Information
                                        <span class="icon-msdyn-icon-check"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8 0C12.4183 0 16 3.58172 16 8C16 12.4183 12.4183 16 8 16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0ZM8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1ZM11.3584 5.64645C11.532 5.82001 11.5513 6.08944 11.4163 6.28431L11.3584 6.35355L7.35355 10.3584C7.17999 10.532 6.91056 10.5513 6.71569 10.4163L6.64645 10.3584L4.64645 8.35842C4.45118 8.16316 4.45118 7.84658 4.64645 7.65131C4.82001 7.47775 5.08944 7.45846 5.28431 7.59346L5.35355 7.65131L7 9.298L10.6513 5.64645C10.8466 5.45118 11.1632 5.45118 11.3584 5.64645Z"
                                                    fill="#424242"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <p class="link-desc">9/10/2025 8:31:54 PM</p>
                                </div>
                                <div data-notif-id="75d3fceb-818d-f011-b4cb-6045bd04a7b5"
                                    class="link-block notification-list">
                                    <a class="notification-details vendor-link state-code-0">
                                        Collaborative Forecasting Initiative
                                        <span class="icon-msdyn-icon-check"><svg width="16" height="16"
                                                viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M8 0C12.4183 0 16 3.58172 16 8C16 12.4183 12.4183 16 8 16C3.58172 16 0 12.4183 0 8C0 3.58172 3.58172 0 8 0ZM8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1ZM11.3584 5.64645C11.532 5.82001 11.5513 6.08944 11.4163 6.28431L11.3584 6.35355L7.35355 10.3584C7.17999 10.532 6.91056 10.5513 6.71569 10.4163L6.64645 10.3584L4.64645 8.35842C4.45118 8.16316 4.45118 7.84658 4.64645 7.65131C4.82001 7.47775 5.08944 7.45846 5.28431 7.59346L5.35355 7.65131L7 9.298L10.6513 5.64645C10.8466 5.45118 11.1632 5.45118 11.3584 5.64645Z"
                                                    fill="#424242"></path>
                                            </svg>
                                        </span>
                                    </a>
                                    <p class="link-desc">9/9/2025 1:36:07 PM</p>
                                </div>
                            </div>
                            <a href="/notifications-overview" class="vendor-link notification-view-all">
                                View all notifications</a>
                        </div>
                    </div>

               

                    <div class="modal fade" id="notif-dialog-details" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="notif-dialog-details" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-dialog-centered" role="document"
                            style="max-width: 560px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="d-flex gap-2">
                                        <span class="icon-bell fs-4">🔔</span>
                                        <h6 class="modal-title" id="notif-title" style="padding-top: 5px"></h6>
                                    </div>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span id="notif-description" class="txt-regular-action"></span>
                                    <span id="notif-created" class="notif-icon-date mi-xs mt-3 d-sm-block"></span>
                                </div>
                                <div class="modal-footer">
                                    <fluent-button class="close-notif-box neutral" type="button" data-bs-dismiss="modal"
                                        current-value="" appearance="neutral"><template shadowrootmode="open"
                                            shadowrootdelegatesfocus=""><button class="control" part="control"
                                                type="button" value="">
                                                <span part="start">
                                                    <slot name="start"></slot>
                                                </span><span class="content" part="content">
                                                    <slot></slot>
                                                </span><span part="end">
                                                    <slot name="end"></slot>
                                                </span></button></template>Close</fluent-button>
                                    <fluent-button appearance="accent" class="btn-dismiss-notification accent"
                                        type="button" current-value=""><template shadowrootmode="open"
                                            shadowrootdelegatesfocus=""><button class="control" part="control"
                                                type="button" value="">
                                                <span part="start">
                                                    <slot name="start"></slot>
                                                </span><span class="content" part="content">
                                                    <slot></slot>
                                                </span><span part="end">
                                                    <slot name="end"></slot>
                                                </span></button></template>
                                        <div class="d-flex gap-1">
                                            <span class="btn-dismiss-text d-flex align-items-center">Dismiss</span>
                                            <i class="fa fa-circle-notch loading notification-dismiss-notch"></i>
                                        </div>
                                    </fluent-button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Help card -->
                    <div class="vendor-card">
                        <div class="vendor-card-header">
                            <h3 class="vendor-card-title">Help</h3>
                        </div>
                        <div class="vendor-card-body">
                            <div class="vendor-card-image">
                                <img src="/assets/help-banner.png" alt="Vendor Icon" />
                            </div>
                            <div class="vendor-card-links">
                                <div class="link-block">
                                    <a href="#" class="vendor-link">Terms &amp; Condition</a>
                                    <p class="link-desc">
                                        Understand the legal terms for using the
                                        Supplier Portal.
                                    </p>
                                </div>
                                <div class="link-block">
                                    <a href="#" class="vendor-link">How to Respond to a Purchase Order</a>
                                    <p class="link-desc">
                                        step-by-step guide to acknowledge, confirm, or
                                        suggest changes to a PO.
                                    </p>
                                </div>
                                <div class="link-block">
                                    <a href="#" class="vendor-link">How to Add or Remove a User</a>
                                    <p class="link-desc">
                                        Manage user access to your supplier account
                                        securely.
                                    </p>
                                </div>
                                <div class="link-block">
                                    <a href="#" class="vendor-link">Contact Support</a>
                                    <p class="link-desc">
                                        Reach out to our support team for technical or
                                        functional help.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection