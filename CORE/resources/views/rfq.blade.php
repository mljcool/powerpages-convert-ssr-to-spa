@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/rfq-list.css') }}" />
<script type="text/javascript" src="{{ asset('js/rfq-list.js') }}"></script>
		<div class="sectionBlockLayout">
			<div class="container-fluid">
				<div class="rfq-workspace-wrapper">
					<!-- Header -->
					<div class="header-workspace">
						<h1 class="txt-workspace">Vendor Bidding</h1>
					</div>

					<!-- Body -->
					<div class="body-workspace">
						<!-- Filter Dropdown -->
						<div class="general-filter hidden-links">
							<label class="txt-workspace-label"
								>Show vendor bidding for all</label
							>
							<div class="msdyn-dropdown-container">
								<button class="msdyn-dropdown-btn">
									<span class="txt-workspace-search-label"
										>All Legal Entities</span
									>
									<span class="icon-msdyn-arrow-caret-down">
										<svg
											width="12"
											height="7"
											viewBox="0 0 12 7"
											fill="none"
										>
											<path
												d="M11.8527 0.645818C12.0484 0.840732 12.0489 1.15731 11.854 1.35292L6.38902 6.83741C6.17408 7.05312 5.82477 7.05312 5.60982 6.83741L0.14484 1.35292C-0.0500734 1.15731 -0.0495088 0.840731 0.1461 0.645817C0.34171 0.450903 0.658292 0.451467 0.853206 0.647077L5.99942 5.81166L11.1456 0.647077C11.3406 0.451468 11.6571 0.450904 11.8527 0.645818Z"
												fill="#115EA3"
											></path>
										</svg>
									</span>
								</button>
								<div class="msdyn-dropdown-menu">
									<ul>
										<li>Fabrikam supplier</li>
										<li>Fabrikam USA</li>
										<li>Fabrikam Canada</li>
										<li>Fabrikam Germany</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- Status Tabs / Cards -->
						<div class="workspace-status-types">
							<a class="stat-card active" data-id="Active">
								<span class="stat-title">Active Bids</span>
								<span class="stat-count" id="rfq_active">8</span>
							</a>
							<a class="stat-card" data-id="Invitations">
								<span class="stat-title">New Bid invitations</span>
								<span class="stat-count" id="rfq_new">2</span>
							</a>
							<a class="stat-card" data-id="InProgress">
								<span class="stat-title">Bids in progress</span>
								<span class="stat-count" id="rfq_inprogress">1</span>
							</a>
							<a class="stat-card" data-id="Submitted">
								<span class="stat-title">Submitted Bids</span>
								<span class="stat-count" id="rfq_submitted">1</span>
							</a>
							<a class="stat-card" data-id="Returned">
								<span class="stat-title">Returned bids</span>
								<span class="stat-count" id="rfq_returned">1</span>
							</a>
							<a class="stat-card" data-id="Awarded">
								<span class="stat-title">Awareded Bids</span>
								<span class="stat-count" id="rfq_awarded">1</span>
							</a>
							<a class="stat-card" data-id="LostBids">
								<span class="stat-title">Lost Bids</span>
								<span class="stat-count" id="rfq_lost">1</span>
							</a>
							<a class="stat-card" data-id="Declined">
								<span class="stat-title">Declined Bids</span>
								<span class="stat-count" id="rfq_declined">1</span>
							</a>
						</div>

						<!-- Entity Lists (Tables) -->
						<div class="workspace-grid-template-pcf">
							<div id="rfqActive" class="table-list">
								<span class="rfq-table-title">Active Bids</span>

								<div class="entitylist">
									<div
										class="entity-grid entitylist"
										data-id="1758169644880.16"
										data-column-width-style="Percent"
										data-defer-loading="false"
										data-enable-actions="true"
										data-get-url="/_services/entity-grid-data.json/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-get-ai-insights-url="/_services/entity-grid-ai-summary.json/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-update-url="/_services/entity-grid-update-entity/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-grid-class="table-none-striped"
										data-select-mode="None"
										data-selected-view="dd6c5141-1916-f011-9989-000d3a5d1334"
										data-view-layouts=""
									>
										<div class="view-toolbar grid-actions clearfix">
											<div class="float-end toolbar-actions">
												<div
													class="input-group float-start view-search entitylist-search"
													role="none"
													style="display: table"
												>
													<input
														placeholder="Search"
														title="To search on partial text, use the asterisk (*) wildcard character. "
														aria-label="To search on partial text, use the asterisk (*) wildcard character. "
														class="query form-control"
														style="
															display: table-cell;
															width: 100%;
															font-size: 14px;
														"
													/>
													<div
														class="input-group-btn align-top"
														role="presentation"
														style="display: table-cell"
													>
														<button
															type="button"
															aria-label="Search Results"
															title="Search Results"
															class="btn btn-default"
															style="border-radius: 0px"
														>
															<span class="visually-hidden"
																>Search Results</span
															><span class="fa fa-search"></span>
														</button>
													</div>
												</div>
											</div>
										</div>

										<div class="view-grid table-responsive">
											<table
												aria-relevant="additions"
												class="table table-none-striped"
											>
												<thead>
													<tr>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 19.53125%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Request for quotation"
																tabindex="0"
																>Request for quotation<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 1.953125%"
															class="sort-disabled"
															aria-label="Actions"
															data-th="&lt;span class='sr-only'&gt;Actions&lt;/span&gt;"
														>
															<span class="sr-only">Actions</span
															><a href="#" role="button"
																>Actions</a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 12.109375%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Document title"
																tabindex="0"
																>Document title<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 9.765625%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Company"
																tabindex="0"
																>Company<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 16.6015625%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Requesting department"
																tabindex="0"
																>Requesting department<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 17.48046875%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Expiration date and time"
																tabindex="0"
																>Expiration date and time<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 10.3515625%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="No. of lines"
																tabindex="0"
																>No. of lines<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 12.20703125%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Reply progress"
																tabindex="0"
																>Reply progress<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
													</tr>
												</thead>
												<tbody style="">
													<tr
														data-id="00007c5f-0000-0000-7800-000010000000"
														data-entity="mserp_vrmrequestforquotationreplyheaderentity"
														data-name="000013"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqnumber"
															data-value="000013"
															aria-readonly="true"
															data-th="Request for quotation"
															aria-label="000013"
														>
															<a
																href="/RFQ-details/?id=00007c5f-0000-0000-7800-000010000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>000013</a
															>
														</td>
														<td
															data-th="Actions"
															aria-label="action menu"
														>
															<div class="dropdown action">
																<button
																	class="btn btn-default btn-md aria-exp"
																	data-bs-toggle="dropdown"
																	aria-expanded="false"
																	aria-label="action menu"
																></button>
																<ul
																	class="dropdown-menu"
																	role="menu"
																	style="position: fixed"
																>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="/RFQ-details/?id=00007c5f-0000-0000-7800-000010000000"
																			title="View details"
																			aria-setsize="1"
																			aria-posinset="1"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqcasetitle"
															data-value="RFQ for Office Supplies"
															aria-readonly="true"
															data-th="Document title"
															aria-label="RFQ for Office Supplies"
														>
															RFQ for Office Supplies
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"840b0b8f-ace5-4ae2-81fe-9f5176a7baaa","LogicalName":"cdm_company","Name":"USMF","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="USMF"
														>
															USMF
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_requestingdepartmentname"
															data-value="Marketing Department"
															aria-readonly="true"
															data-th="Requesting department"
															aria-label="Marketing Department"
														>
															Marketing Department
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_rfqexpirationdatetime"
															data-value="/Date(1759993200000)/"
															aria-readonly="true"
															data-th="Expiration date and time"
															aria-label="10/9/2025 7:00 AM"
														>
															10/10/2025 8:40 PM
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_totalnumberoflines"
															data-value="4"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="4"
														>
															4
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_replyprogressstatus"
															data-value='{"Value":200000001,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Reply progress"
															aria-label="Vendor is updating"
														>
															<span
																class="badges vendorisupdating"
																>Vendor is updating</span
															>
														</td>
													</tr>
													<tr
														data-id="00007c5f-0000-0000-7b00-000010000000"
														data-entity="mserp_vrmrequestforquotationreplyheaderentity"
														data-name="000016"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqnumber"
															data-value="000016"
															aria-readonly="true"
															data-th="Request for quotation"
															aria-label="000016"
														>
															<a
																href="/RFQ-details/?id=00007c5f-0000-0000-7b00-000010000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>000016</a
															>
														</td>
														<td
															data-th="Actions"
															aria-label="action menu"
														>
															<div class="dropdown action">
																<button
																	class="btn btn-default btn-md aria-exp"
																	data-bs-toggle="dropdown"
																	aria-expanded="false"
																	aria-label="action menu"
																></button>
																<ul
																	class="dropdown-menu"
																	role="menu"
																	style="position: fixed"
																>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="/RFQ-details/?id=00007c5f-0000-0000-7b00-000010000000"
																			title="View details"
																			aria-setsize="1"
																			aria-posinset="1"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqcasetitle"
															data-value="RFQ 1529 Faye"
															aria-readonly="true"
															data-th="Document title"
															aria-label="RFQ 1529 Faye"
														>
															RFQ 1529 Faye
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"840b0b8f-ace5-4ae2-81fe-9f5176a7baaa","LogicalName":"cdm_company","Name":"USMF","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="USMF"
														>
															USMF
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_requestingdepartmentname"
															data-value="Engineering"
															aria-readonly="true"
															data-th="Requesting department"
															aria-label="Engineering"
														>
															Engineering
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_rfqexpirationdatetime"
															data-value="/Date(1759993200000)/"
															aria-readonly="true"
															data-th="Expiration date and time"
															aria-label="10/9/2025 7:00 AM"
														>
															10/10/2025 8:40 PM
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_totalnumberoflines"
															data-value="5"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="5"
														>
															5
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_replyprogressstatus"
															data-value='{"Value":200000003,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Reply progress"
															aria-label="Submitted by vendor"
														>
															<span
																class="badges submittedbyvendor"
																>Submitted by vendor</span
															>
														</td>
													</tr>
													<tr
														data-id="00007c5f-0000-0000-7c00-000010000000"
														data-entity="mserp_vrmrequestforquotationreplyheaderentity"
														data-name="000017"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqnumber"
															data-value="000017"
															aria-readonly="true"
															data-th="Request for quotation"
															aria-label="000017"
														>
															<a
																href="/RFQ-details/?id=00007c5f-0000-0000-7c00-000010000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>000017</a
															>
														</td>
														<td
															data-th="Actions"
															aria-label="action menu"
														>
															<div class="dropdown action">
																<button
																	class="btn btn-default btn-md aria-exp"
																	data-bs-toggle="dropdown"
																	aria-expanded="false"
																	aria-label="action menu"
																>
																	<span
																		class="icon-msdyn-ellipsis-icon"
																	>
																		<svg
																			width="14"
																			height="4"
																			viewBox="0 0 14 4"
																			fill="none"
																			xmlns="http://www.w3.org/2000/svg"
																		>
																			<path
																				d="M3.40674 2C3.40674 2.69036 2.84709 3.25 2.15674 3.25C1.46638 3.25 0.906738 2.69036 0.906738 2C0.906738 1.30964 1.46638 0.75 2.15674 0.75C2.84709 0.75 3.40674 1.30964 3.40674 2ZM8.40674 2C8.40674 2.69036 7.84709 3.25 7.15674 3.25C6.46638 3.25 5.90674 2.69036 5.90674 2C5.90674 1.30964 6.46638 0.75 7.15674 0.75C7.84709 0.75 8.40674 1.30964 8.40674 2ZM12.1567 3.25C12.8471 3.25 13.4067 2.69036 13.4067 2C13.4067 1.30964 12.8471 0.75 12.1567 0.75C11.4664 0.75 10.9067 1.30964 10.9067 2C10.9067 2.69036 11.4664 3.25 12.1567 3.25Z"
																				fill="#424242"
																			></path>
																		</svg>
																	</span>
																</button>
																<ul
																	class="dropdown-menu"
																	role="menu"
																	style="position: fixed"
																>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="/RFQ-details/?id=00007c5f-0000-0000-7c00-000010000000"
																			title="View details"
																			aria-setsize="1"
																			aria-posinset="1"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqcasetitle"
															data-value="RFQ To be Declined"
															aria-readonly="true"
															data-th="Document title"
															aria-label="RFQ To be Declined"
														>
															RFQ To be Declined
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"840b0b8f-ace5-4ae2-81fe-9f5176a7baaa","LogicalName":"cdm_company","Name":"USMF","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="USMF"
														>
															USMF
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_requestingdepartmentname"
															data-value="QA Department"
															aria-readonly="true"
															data-th="Requesting department"
															aria-label="QA Department"
														>
															QA Department
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_rfqexpirationdatetime"
															data-value="/Date(1759993200000)/"
															aria-readonly="true"
															data-th="Expiration date and time"
															aria-label="10/9/2025 7:00 AM"
														>
															10/10/2025 8:40 PM
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_totalnumberoflines"
															data-value="3"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="3"
														>
															3
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_replyprogressstatus"
															data-value='{"Value":200000005,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Reply progress"
															aria-label="Declined by vendor"
														>
															<span
																class="badges declinedbyvendor"
																>Declined by vendor</span
															>
														</td>
													</tr>
													<tr
														data-id="00007c5f-0000-0000-7d00-000010000000"
														data-entity="mserp_vrmrequestforquotationreplyheaderentity"
														data-name="000018"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqnumber"
															data-value="000018"
															aria-readonly="true"
															data-th="Request for quotation"
															aria-label="000018"
														>
															<a
																href="/RFQ-details/?id=00007c5f-0000-0000-7d00-000010000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>000018</a
															>
														</td>
														<td
															data-th="Actions"
															aria-label="action menu"
														>
															<div class="dropdown action">
																<button
																	class="btn btn-default btn-md aria-exp"
																	data-bs-toggle="dropdown"
																	aria-expanded="false"
																	aria-label="action menu"
																>
																	<span
																		class="icon-msdyn-ellipsis-icon"
																	>
																		<svg
																			width="14"
																			height="4"
																			viewBox="0 0 14 4"
																			fill="none"
																			xmlns="http://www.w3.org/2000/svg"
																		>
																			<path
																				d="M3.40674 2C3.40674 2.69036 2.84709 3.25 2.15674 3.25C1.46638 3.25 0.906738 2.69036 0.906738 2C0.906738 1.30964 1.46638 0.75 2.15674 0.75C2.84709 0.75 3.40674 1.30964 3.40674 2ZM8.40674 2C8.40674 2.69036 7.84709 3.25 7.15674 3.25C6.46638 3.25 5.90674 2.69036 5.90674 2C5.90674 1.30964 6.46638 0.75 7.15674 0.75C7.84709 0.75 8.40674 1.30964 8.40674 2ZM12.1567 3.25C12.8471 3.25 13.4067 2.69036 13.4067 2C13.4067 1.30964 12.8471 0.75 12.1567 0.75C11.4664 0.75 10.9067 1.30964 10.9067 2C10.9067 2.69036 11.4664 3.25 12.1567 3.25Z"
																				fill="#424242"
																			></path>
																		</svg>
																	</span>
																</button>
																<ul
																	class="dropdown-menu"
																	role="menu"
																	style="position: fixed"
																>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="/RFQ-details/?id=00007c5f-0000-0000-7d00-000010000000"
																			title="View details"
																			aria-setsize="1"
																			aria-posinset="1"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqcasetitle"
															data-value="Bid for Amendment"
															aria-readonly="true"
															data-th="Document title"
															aria-label="Bid for Amendment"
														>
															Bid for Amendment
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"840b0b8f-ace5-4ae2-81fe-9f5176a7baaa","LogicalName":"cdm_company","Name":"USMF","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="USMF"
														>
															USMF
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_requestingdepartmentname"
															data-value="Engineering Department"
															aria-readonly="true"
															data-th="Requesting department"
															aria-label="Engineering Department"
														>
															Engineering Department
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_rfqexpirationdatetime"
															data-value="/Date(1759993200000)/"
															aria-readonly="true"
															data-th="Expiration date and time"
															aria-label="10/9/2025 7:00 AM"
														>
															10/10/2025 8:40 PM
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_totalnumberoflines"
															data-value="2"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="2"
														>
															2
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_replyprogressstatus"
															data-value='{"Value":200000000,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Reply progress"
															aria-label="Not started"
														>
															<span class="badges notstarted"
																>Not started</span
															>
														</td>
													</tr>
													<tr
														data-id="00007c5f-0000-0000-7e00-000010000000"
														data-entity="mserp_vrmrequestforquotationreplyheaderentity"
														data-name="000019"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqnumber"
															data-value="000019"
															aria-readonly="true"
															data-th="Request for quotation"
															aria-label="000019"
														>
															<a
																href="/RFQ-details/?id=00007c5f-0000-0000-7e00-000010000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>000019</a
															>
														</td>
														<td
															data-th="Actions"
															aria-label="action menu"
														>
															<div class="dropdown action">
																<button
																	class="btn btn-default btn-md aria-exp"
																	data-bs-toggle="dropdown"
																	aria-expanded="false"
																	aria-label="action menu"
																>
																	<span
																		class="icon-msdyn-ellipsis-icon"
																	>
																		<svg
																			width="14"
																			height="4"
																			viewBox="0 0 14 4"
																			fill="none"
																			xmlns="http://www.w3.org/2000/svg"
																		>
																			<path
																				d="M3.40674 2C3.40674 2.69036 2.84709 3.25 2.15674 3.25C1.46638 3.25 0.906738 2.69036 0.906738 2C0.906738 1.30964 1.46638 0.75 2.15674 0.75C2.84709 0.75 3.40674 1.30964 3.40674 2ZM8.40674 2C8.40674 2.69036 7.84709 3.25 7.15674 3.25C6.46638 3.25 5.90674 2.69036 5.90674 2C5.90674 1.30964 6.46638 0.75 7.15674 0.75C7.84709 0.75 8.40674 1.30964 8.40674 2ZM12.1567 3.25C12.8471 3.25 13.4067 2.69036 13.4067 2C13.4067 1.30964 12.8471 0.75 12.1567 0.75C11.4664 0.75 10.9067 1.30964 10.9067 2C10.9067 2.69036 11.4664 3.25 12.1567 3.25Z"
																				fill="#424242"
																			></path>
																		</svg>
																	</span>
																</button>
																<ul
																	class="dropdown-menu"
																	role="menu"
																	style="position: fixed"
																>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="/RFQ-details/?id=00007c5f-0000-0000-7e00-000010000000"
																			title="View details"
																			aria-setsize="1"
																			aria-posinset="1"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqcasetitle"
															data-value="RFQ for Returned Bid"
															aria-readonly="true"
															data-th="Document title"
															aria-label="RFQ for Returned Bid"
														>
															RFQ for Returned Bid
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"840b0b8f-ace5-4ae2-81fe-9f5176a7baaa","LogicalName":"cdm_company","Name":"USMF","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="USMF"
														>
															USMF
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_requestingdepartmentname"
															data-value="Engineering Department"
															aria-readonly="true"
															data-th="Requesting department"
															aria-label="Engineering Department"
														>
															Engineering Department
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_rfqexpirationdatetime"
															data-value="/Date(1759993200000)/"
															aria-readonly="true"
															data-th="Expiration date and time"
															aria-label="10/9/2025 7:00 AM"
														>
															10/10/2025 8:40 PM
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_totalnumberoflines"
															data-value="1"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="1"
														>
															1
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_replyprogressstatus"
															data-value='{"Value":200000003,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Reply progress"
															aria-label="Submitted by vendor"
														>
															<span
																class="badges submittedbyvendor"
																>Submitted by vendor</span
															>
														</td>
													</tr>
													<tr
														data-id="00007c5f-0000-0000-7f00-000010000000"
														data-entity="mserp_vrmrequestforquotationreplyheaderentity"
														data-name="000020"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqnumber"
															data-value="000020"
															aria-readonly="true"
															data-th="Request for quotation"
															aria-label="000020"
														>
															<a
																href="/RFQ-details/?id=00007c5f-0000-0000-7f00-000010000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>000020</a
															>
														</td>
														<td
															data-th="Actions"
															aria-label="action menu"
														>
															<div class="dropdown action">
																<button
																	class="btn btn-default btn-md aria-exp"
																	data-bs-toggle="dropdown"
																	aria-expanded="false"
																	aria-label="action menu"
																>
																	<span
																		class="icon-msdyn-ellipsis-icon"
																	>
																		<svg
																			width="14"
																			height="4"
																			viewBox="0 0 14 4"
																			fill="none"
																			xmlns="http://www.w3.org/2000/svg"
																		>
																			<path
																				d="M3.40674 2C3.40674 2.69036 2.84709 3.25 2.15674 3.25C1.46638 3.25 0.906738 2.69036 0.906738 2C0.906738 1.30964 1.46638 0.75 2.15674 0.75C2.84709 0.75 3.40674 1.30964 3.40674 2ZM8.40674 2C8.40674 2.69036 7.84709 3.25 7.15674 3.25C6.46638 3.25 5.90674 2.69036 5.90674 2C5.90674 1.30964 6.46638 0.75 7.15674 0.75C7.84709 0.75 8.40674 1.30964 8.40674 2ZM12.1567 3.25C12.8471 3.25 13.4067 2.69036 13.4067 2C13.4067 1.30964 12.8471 0.75 12.1567 0.75C11.4664 0.75 10.9067 1.30964 10.9067 2C10.9067 2.69036 11.4664 3.25 12.1567 3.25Z"
																				fill="#424242"
																			></path>
																		</svg>
																	</span>
																</button>
																<ul
																	class="dropdown-menu"
																	role="menu"
																	style="position: fixed"
																>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="/RFQ-details/?id=00007c5f-0000-0000-7f00-000010000000"
																			title="View details"
																			aria-setsize="1"
																			aria-posinset="1"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqcasetitle"
															data-value="RFQ Accepted Bid"
															aria-readonly="true"
															data-th="Document title"
															aria-label="RFQ Accepted Bid"
														>
															RFQ Accepted Bid
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"840b0b8f-ace5-4ae2-81fe-9f5176a7baaa","LogicalName":"cdm_company","Name":"USMF","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="USMF"
														>
															USMF
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_requestingdepartmentname"
															data-value="Engineering"
															aria-readonly="true"
															data-th="Requesting department"
															aria-label="Engineering"
														>
															Engineering
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_rfqexpirationdatetime"
															data-value="/Date(1759993200000)/"
															aria-readonly="true"
															data-th="Expiration date and time"
															aria-label="10/9/2025 7:00 AM"
														>
															10/10/2025 8:40 PM
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_totalnumberoflines"
															data-value="1"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="1"
														>
															1
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_replyprogressstatus"
															data-value='{"Value":200000003,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Reply progress"
															aria-label="Submitted by vendor"
														>
															<span
																class="badges submittedbyvendor"
																>Submitted by vendor</span
															>
														</td>
													</tr>
													<tr
														data-id="00007c5f-0000-0000-8000-000010000000"
														data-entity="mserp_vrmrequestforquotationreplyheaderentity"
														data-name="000021"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqnumber"
															data-value="000021"
															aria-readonly="true"
															data-th="Request for quotation"
															aria-label="000021"
														>
															<a
																href="/RFQ-details/?id=00007c5f-0000-0000-8000-000010000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>000021</a
															>
														</td>
														<td
															data-th="Actions"
															aria-label="action menu"
														>
															<div class="dropdown action">
																<button
																	class="btn btn-default btn-md aria-exp"
																	data-bs-toggle="dropdown"
																	aria-expanded="false"
																	aria-label="action menu"
																>
																	<span
																		class="icon-msdyn-ellipsis-icon"
																	>
																		<svg
																			width="14"
																			height="4"
																			viewBox="0 0 14 4"
																			fill="none"
																			xmlns="http://www.w3.org/2000/svg"
																		>
																			<path
																				d="M3.40674 2C3.40674 2.69036 2.84709 3.25 2.15674 3.25C1.46638 3.25 0.906738 2.69036 0.906738 2C0.906738 1.30964 1.46638 0.75 2.15674 0.75C2.84709 0.75 3.40674 1.30964 3.40674 2ZM8.40674 2C8.40674 2.69036 7.84709 3.25 7.15674 3.25C6.46638 3.25 5.90674 2.69036 5.90674 2C5.90674 1.30964 6.46638 0.75 7.15674 0.75C7.84709 0.75 8.40674 1.30964 8.40674 2ZM12.1567 3.25C12.8471 3.25 13.4067 2.69036 13.4067 2C13.4067 1.30964 12.8471 0.75 12.1567 0.75C11.4664 0.75 10.9067 1.30964 10.9067 2C10.9067 2.69036 11.4664 3.25 12.1567 3.25Z"
																				fill="#424242"
																			></path>
																		</svg>
																	</span>
																</button>
																<ul
																	class="dropdown-menu"
																	role="menu"
																	style="position: fixed"
																>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="/RFQ-details/?id=00007c5f-0000-0000-8000-000010000000"
																			title="View details"
																			aria-setsize="1"
																			aria-posinset="1"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqcasetitle"
															data-value="RFQ Lost Bid + Q&amp;A"
															aria-readonly="true"
															data-th="Document title"
															aria-label="RFQ Lost Bid + Q&amp;A"
														>
															RFQ Lost Bid + Q&amp;A
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"840b0b8f-ace5-4ae2-81fe-9f5176a7baaa","LogicalName":"cdm_company","Name":"USMF","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="USMF"
														>
															USMF
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_requestingdepartmentname"
															data-value="Quality Assurance Department"
															aria-readonly="true"
															data-th="Requesting department"
															aria-label="Quality Assurance Department"
														>
															Quality Assurance Department
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_rfqexpirationdatetime"
															data-value="/Date(1760079600000)/"
															aria-readonly="true"
															data-th="Expiration date and time"
															aria-label="10/10/2025 7:00 AM"
														>
															10/10/2025
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_totalnumberoflines"
															data-value="5"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="5"
														>
															5
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_replyprogressstatus"
															data-value='{"Value":200000001,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Reply progress"
															aria-label="Vendor is updating"
														>
															<span
																class="badges vendorisupdating"
																>Vendor is updating</span
															>
														</td>
													</tr>
													<tr
														data-id="00007c5f-0000-0000-6903-000010000000"
														data-entity="mserp_vrmrequestforquotationreplyheaderentity"
														data-name="000041"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqnumber"
															data-value="000041"
															aria-readonly="true"
															data-th="Request for quotation"
															aria-label="000041"
														>
															<a
																href="/RFQ-details/?id=00007c5f-0000-0000-6903-000010000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>000041</a
															>
														</td>
														<td
															data-th="Actions"
															aria-label="action menu"
														>
															<div class="dropdown action">
																<button
																	class="btn btn-default btn-md aria-exp"
																	data-bs-toggle="dropdown"
																	aria-expanded="false"
																	aria-label="action menu"
																>
																	<span
																		class="icon-msdyn-ellipsis-icon"
																	>
																		<svg
																			width="14"
																			height="4"
																			viewBox="0 0 14 4"
																			fill="none"
																			xmlns="http://www.w3.org/2000/svg"
																		>
																			<path
																				d="M3.40674 2C3.40674 2.69036 2.84709 3.25 2.15674 3.25C1.46638 3.25 0.906738 2.69036 0.906738 2C0.906738 1.30964 1.46638 0.75 2.15674 0.75C2.84709 0.75 3.40674 1.30964 3.40674 2ZM8.40674 2C8.40674 2.69036 7.84709 3.25 7.15674 3.25C6.46638 3.25 5.90674 2.69036 5.90674 2C5.90674 1.30964 6.46638 0.75 7.15674 0.75C7.84709 0.75 8.40674 1.30964 8.40674 2ZM12.1567 3.25C12.8471 3.25 13.4067 2.69036 13.4067 2C13.4067 1.30964 12.8471 0.75 12.1567 0.75C11.4664 0.75 10.9067 1.30964 10.9067 2C10.9067 2.69036 11.4664 3.25 12.1567 3.25Z"
																				fill="#424242"
																			></path>
																		</svg>
																	</span>
																</button>
																<ul
																	class="dropdown-menu"
																	role="menu"
																	style="position: fixed"
																>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="/RFQ-details/?id=00007c5f-0000-0000-6903-000010000000"
																			title="View details"
																			aria-setsize="1"
																			aria-posinset="1"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_rfqcasetitle"
															data-value="RFQ + Q&amp;A Test1"
															aria-readonly="true"
															data-th="Document title"
															aria-label="RFQ + Q&amp;A Test1"
														>
															RFQ + Q&amp;A Test1
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"840b0b8f-ace5-4ae2-81fe-9f5176a7baaa","LogicalName":"cdm_company","Name":"USMF","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="USMF"
														>
															USMF
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_requestingdepartmentname"
															data-value=""
															aria-readonly="true"
															data-th="Requesting department"
															aria-label=""
														></td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_rfqexpirationdatetime"
															data-value="/Date(1760166000000)/"
															aria-readonly="true"
															data-th="Expiration date and time"
															aria-label="10/11/2025 7:00 AM"
														>
															10/11/2025 08:00
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_totalnumberoflines"
															data-value="1"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="1"
														>
															1
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_replyprogressstatus"
															data-value='{"Value":200000000,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Reply progress"
															aria-label="Not started"
														>
															<span class="badges notstarted"
																>Not started</span
															>
														</td>
													</tr>
												</tbody>
											</table>
										</div>

										<div
											class="view-loading message text-center"
											style="display: none"
										>
											<div class="loading-wrapper">
												<fluent-progress-ring role="progressbar"
													><template shadowrootmode="open"
														><!---->
														<slot
															name="indeterminate"
															slot="indeterminate"
														>
															<svg
																class="progress"
																part="progress"
																viewBox="0 0 16 16"
															>
																<circle
																	class="background"
																	part="background"
																	cx="8px"
																	cy="8px"
																	r="7px"
																></circle>
																<circle
																	class="indeterminate-indicator-1"
																	part="indeterminate-indicator-1"
																	cx="8px"
																	cy="8px"
																	r="7px"
																></circle>
															</svg>
														</slot> </template
												></fluent-progress-ring>
												<span class="saving-loading-label"
													>Loading..</span
												>
											</div>
										</div>
										<div
											class="view-pagination"
											data-current-page="1"
											data-pages="1"
											data-pagesize=""
											style="display: none"
										></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection