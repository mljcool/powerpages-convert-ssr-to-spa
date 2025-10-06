@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/purchase-order.css') }}" />
<script type="text/javascript" src="{{ asset('js/purchase-order-list.js') }}"></script>

		<div class="row sectionBlockLayout text-start" style="min-height: auto; padding: 15px 1rem">
			<div class="container-fluid" style="display: flex; flex-wrap: wrap">
				<div class="rfq-workspace-wrapper">
					<div class="header-workspace">
						<h1 class="txt-workspace po-header-title">Purchase orders</h1>
					</div>
					<div class="body-workspace">
						<!-- Filter Dropdown -->
						<div class="general-filter hidden-links">
							<label class="txt-workspace-search-label"
								>Show Vendor Bidding All</label
							>
							<div class="msdyn-dropdown">
								<button
									class="msdyn-dropdown-button"
									onclick="toggleDropdown()"
								>
									All Legal Entities
								</button>
								<div
									class="msdyn-dropdown-menu"
									id="msdyn-dropdown-menu"
									style="display: none"
								>
									<a href="#">Fabrikam supplier</a>
									<a href="#">Fabrikam USA</a>
									<a href="#">Fabrikam Canada</a>
									<a href="#">Fabrikam Germany</a>
								</div>
							</div>
						</div>

						<!-- Status Tabs -->
						<div class="workspace-status-types">
							<a
								class="stat-card activePO active"
								onclick="setTableView('activePO')"
							>
								<span class="stat-title">Active POs</span>
								<span class="stat-count" id="po_activepos">6</span>
							</a>
							<a
								class="stat-card forReviewPo"
								onclick="setTableView('forReviewPo')"
							>
								<span class="stat-title">For review</span>
								<span class="stat-count" id="po_forreview">2</span>
							</a>
							<a
								class="stat-card awaitingAction"
								onclick="setTableView('awaitingAction')"
							>
								<span class="stat-title">Awaiting customer action</span>
								<span class="stat-count" id="po_awaitingaction">3</span>
							</a>
							<a
								class="stat-card confirmedPo"
								onclick="setTableView('confirmedPo')"
							>
								<span class="stat-title">Open confirmed PO</span>
								<span class="stat-count" id="po_confirmed">1</span>
							</a>
						</div>

						<!-- Dynamic Tables via Entity Lists -->
						<div class="workspace-grid-template-pcf">
							<div
								id="awaitingAction"
								class="table-list"
								style="display: none"
							>
								<div class="entitylist">
									<div
										class="entity-grid entitylist po-response-grid"
										data-id="1758816838271.3"
										data-column-width-style="Percent"
										data-defer-loading="false"
										data-enable-actions="true"
										data-get-url="/_services/entity-grid-data.json/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-get-ai-insights-url="/_services/entity-grid-ai-summary.json/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-update-url="/_services/entity-grid-update-entity/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-grid-class="table-none-striped"
										data-select-mode="None"
										data-selected-view="6afdf2f7-c5fe-ef11-bae2-000d3a37ee74"
										data-user-isauthenticated="true"
										data-user-parent-account-name=""
										data-mobile-view-enabled="false"
										data-ai-insights-enabled="false"
										data-enable-streaming="false"
										data-ai-insights-expanded="true"
										data-is-nl-search-enabled="false"
										data-ai-insights-position="top"
										data-nl-search-filter=""
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
											<div
												class="float-start toolbar-actions viewTitle"
												id="activepos"
											>
												<h5 class="fw-bolder">Active POs</h5>
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
															style="width: 10.139002452984466%"
															class="sort-enabled sort sort-asc"
															aria-sort="ascending"
														>
															<a
																href="#"
																role="button"
																aria-label="Purchase order"
																tabindex="0"
																>Purchase order
																<span
																	class="fa fa-arrow-up"
																	aria-hidden="true"
																></span
																><span
																	class="visually-hidden sort-hint"
																	>. sort ascending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 1.6353229762878168%"
															class="sort-disabled"
															aria-label="Actions"
															data-th="&lt;span class='sr-only'&gt;Actions&lt;/span&gt;"
														>
															<span class="sr-only">Actions</span
															><a>Actions</a>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 12.428454619787408%"
															class="sort-enabled sort sort-asc"
															aria-sort="ascending"
														>
															<a
																href="#"
																role="button"
																aria-label="Date time answered"
																tabindex="0"
																>Date time answered
																<span
																	class="fa fa-arrow-up"
																	aria-hidden="true"
																></span
																><span
																	class="visually-hidden sort-hint"
																	>. sort ascending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 13.900245298446443%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Confirmed receipt date"
																tabindex="0"
																>Confirmed receipt date<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 8.176614881439084%"
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
															style="width: 17.089125102207685%"
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
															style="width: 17.825020441537205%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Total Amount"
																tabindex="0"
																>Total Amount<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 8.176614881439084%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Currency"
																tabindex="0"
																>Currency<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 10.629599345870808%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Response status"
																tabindex="0"
																>Response status<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
													</tr>
												</thead>
												<tbody style="">
													<tr
														data-id="00007c70-0000-0000-1000-005001000000"
														data-entity="mserp_vrmpurchaseorderresponseheaderentity"
														data-name="00000126"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="00000126"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="00000126"
														>
															<a
																href="/purchase-order-details-page/?id=00007c70-0000-0000-1000-005001000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>00000126</a
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
																			href="/purchase-order-details-page/?id=00007c70-0000-0000-1000-005001000000"
																			title="View details"
																			aria-setsize="2"
																			aria-posinset="1"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Archived Order"
																			aria-setsize="2"
																			aria-posinset="2"
																			>View Received Order</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_responsedatetime"
															data-value="/Date(1758703652000)/"
															aria-readonly="true"
															data-th="Date time answered"
															aria-label="9/24/2025 8:47 AM"
														>
															24-09-2025 02:47
														</td>
														<td
															aria-readonly="true"
															data-th="Confirmed receipt date"
															aria-label=""
														></td>
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
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="2"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="2"
														>
															2
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_orderbalance"
															data-value="360"
															aria-readonly="true"
															data-th="Total Amount"
															aria-label="360.000000"
														>
															360,00
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currencycode"
															data-value="USD"
															aria-readonly="true"
															data-th="Currency"
															aria-label="USD"
														>
															USD
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestate"
															data-value='{"Value":200000004,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="Accepted with changes"
														>
															Accepted with changes
														</td>
													</tr>
													<tr
														data-id="00007c70-0000-0000-eb05-005001000000"
														data-entity="mserp_vrmpurchaseorderresponseheaderentity"
														data-name="000071"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="000071"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="000071"
														>
															<a
																href="/purchase-order-details-page/?id=00007c70-0000-0000-eb05-005001000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>000071</a
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
																			href="/purchase-order-details-page/?id=00007c70-0000-0000-eb05-005001000000"
																			title="View details"
																			aria-setsize="2"
																			aria-posinset="1"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Archived Order"
																			aria-setsize="2"
																			aria-posinset="2"
																			>View Received Order</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_responsedatetime"
															data-value="/Date(1758525968000)/"
															aria-readonly="true"
															data-th="Date time answered"
															aria-label="9/22/2025 7:26 AM"
														>
															22-09-2025 01:26
														</td>
														<td
															aria-readonly="true"
															data-th="Confirmed receipt date"
															aria-label=""
														></td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"eebe64ef-fd27-47a8-a436-15479213fefb","LogicalName":"cdm_company","Name":"USP2","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="USP2"
														>
															USP2
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="1"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="1"
														>
															1
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_orderbalance"
															data-value="1.32"
															aria-readonly="true"
															data-th="Total Amount"
															aria-label="1.320000"
														>
															1,32
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currencycode"
															data-value="USD"
															aria-readonly="true"
															data-th="Currency"
															aria-label="USD"
														>
															USD
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestate"
															data-value='{"Value":200000004,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="Accepted with changes"
														>
															Accepted with changes
														</td>
													</tr>
													<tr
														data-id="00007c70-0000-0000-ec05-005001000000"
														data-entity="mserp_vrmpurchaseorderresponseheaderentity"
														data-name="ITCO-000003"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="ITCO-000003"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="ITCO-000003"
														>
															<a
																href="/purchase-order-details-page/?id=00007c70-0000-0000-ec05-005001000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>ITCO-000003</a
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
																			href="/purchase-order-details-page/?id=00007c70-0000-0000-ec05-005001000000"
																			title="View details"
																			aria-setsize="2"
																			aria-posinset="1"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Archived Order"
																			aria-setsize="2"
																			aria-posinset="2"
																			>View Received Order</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_responsedatetime"
															data-value="/Date(1758191073000)/"
															aria-readonly="true"
															data-th="Date time answered"
															aria-label="9/18/2025 10:24 AM"
														>
															18-09-2025 04:24
														</td>
														<td
															aria-readonly="true"
															data-th="Confirmed receipt date"
															aria-label=""
														></td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"82ef7e2e-7ce7-4ca4-8b18-7d54dcba3c6b","LogicalName":"cdm_company","Name":"ITCO","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="ITCO"
														>
															ITCO
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="1"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="1"
														>
															1
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_orderbalance"
															data-value="0"
															aria-readonly="true"
															data-th="Total Amount"
															aria-label="0.000000"
														>
															0,00
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currencycode"
															data-value="USD"
															aria-readonly="true"
															data-th="Currency"
															aria-label="USD"
														>
															USD
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestate"
															data-value='{"Value":200000004,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="Accepted with changes"
														>
															Accepted with changes
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div
											class="view-pagination"
											data-current-page="1"
											data-pages="1"
											data-pagesize=""
											style="display: none"
										></div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-insert"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-edit"
																aria-hidden="true"
															></span>
															Create
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-edit"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-edit"
																aria-hidden="true"
															></span>
															Edit
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-details"
											role="dialog"
											tabindex="-1"
											aria-labelledby="modalTitleID_14ca1fa0-f7fa-47d8-9638-8b7c8aed68a9"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4
															id="modalTitleID_14ca1fa0-f7fa-47d8-9638-8b7c8aed68a9"
															class="modal-title"
														>
															<span
																class="fa fa-info-circle"
																aria-hidden="true"
															></span>
															View details
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															aria-hidden="true"
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-delete"
											role="dialog"
											tabindex="-1"
											aria-label="Delete"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-trash-can"
																aria-hidden="true"
															></span>
															Delete
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Delete</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-error"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-exclamation-triangle"
																aria-hidden="true"
															></span>
															Error
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<p>
															We're sorry, an error has occurred.
														</p>
													</div>
													<div class="modal-footer">
														<button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Close
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-createrecord"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-plus-circle"
																aria-hidden="true"
															></span>
															Create related record
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-run-workflow"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Run workflow
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														&lt;p&gt;Are you sure you want to run
														this workflow?&lt;/p&gt;
													</div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Run workflow</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-deactivate"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Deactivate
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Deactivate</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-activate"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Activate</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Activate</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											aria-label="Resolve case"
											class="modal fade modal-resolvecase"
											data-backdrop="static"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Resolve case
														</h4>
														<button
															class="form-close"
															data-bs-dismiss="modal"
															tabindex="0"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="row mb-3">
															<label
																class="required col-form-label col-md-3"
															>
															</label>
															<div class="col-md-9">
																<input
																	aria-required="true"
																	class="resolution-input required form-control"
																	type="text"
																	aria-label=""
																/>
															</div>
														</div>
														<div class="row mb-3">
															<label
																class="required col-form-label col-md-3"
															>
															</label>
															<div class="col-md-9">
																<textarea
																	aria-required="true"
																	class="resolution-description-input required form-control"
																	cols="20"
																	rows="6"
																	aria-label=""
																></textarea>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button
															tabindex="0"
															class="primary btn btn-success"
															type="button"
														>
															Resolve
														</button>
														<button
															tabindex="0"
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div
								id="forReviewPo"
								class="table-list"
								style="display: none"
							>
								<div class="entitylist">
									<div
										class="entity-grid entitylist po-response-grid"
										data-id="1758816838333.8"
										data-column-width-style="Percent"
										data-defer-loading="false"
										data-enable-actions="true"
										data-get-url="/_services/entity-grid-data.json/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-get-ai-insights-url="/_services/entity-grid-ai-summary.json/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-update-url="/_services/entity-grid-update-entity/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-grid-class="table-none-striped"
										data-select-mode="None"
										data-selected-view="ef1979a8-c5fe-ef11-bae2-000d3a37ee74"
										data-user-isauthenticated="true"
										data-user-parent-account-name=""
										data-mobile-view-enabled="false"
										data-ai-insights-enabled="false"
										data-enable-streaming="false"
										data-ai-insights-expanded="true"
										data-is-nl-search-enabled="false"
										data-ai-insights-position="top"
										data-nl-search-filter=""
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
											<div
												class="float-start toolbar-actions viewTitle"
												id="activepos"
											>
												<h5 class="fw-bolder">Active POs</h5>
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
															style="width: 10.934744268077601%"
															class="sort-enabled sort sort-asc"
															aria-sort="ascending"
														>
															<a
																href="#"
																role="button"
																aria-label="Purchase order"
																tabindex="0"
																>Purchase order
																<span
																	class="fa fa-arrow-up"
																	aria-hidden="true"
																></span
																><span
																	class="visually-hidden sort-hint"
																	>. sort ascending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 1.763668430335097%"
															class="sort-disabled"
															aria-label="Actions"
															data-th="&lt;span class='sr-only'&gt;Actions&lt;/span&gt;"
														>
															<span class="sr-only">Actions</span
															><a>Actions</a>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 12.16931216931217%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Date time received"
																tabindex="0"
																>Date time received<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 18.78306878306878%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Earliest requested receipt date"
																tabindex="0"
																>Earliest requested receipt
																date<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 8.818342151675484%"
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
															style="width: 18.430335097001763%"
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
															style="width: 8.818342151675484%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Total Amount"
																tabindex="0"
																>Total Amount<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 8.818342151675484%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Currency"
																tabindex="0"
																>Currency<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 11.46384479717813%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Response status"
																tabindex="0"
																>Response status<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
													</tr>
												</thead>
												<tbody style="">
													<tr
														data-id="00007c70-0000-0000-ed05-005001000000"
														data-entity="mserp_vrmpurchaseorderresponseheaderentity"
														data-name="000065"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="000065"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="000065"
														>
															<a
																href="/purchase-order-details-page/?id=00007c70-0000-0000-ed05-005001000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>000065</a
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
																			href="/purchase-order-details-page/?id=00007c70-0000-0000-ed05-005001000000"
																			title="View details"
																			aria-setsize="5"
																			aria-posinset="1"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="javascript:void(0)"
																			title="View Received Archived Order"
																			aria-setsize="5"
																			aria-posinset="2"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="javascript:void(0)"
																			title="Prepare to Submit"
																			aria-setsize="5"
																			aria-posinset="3"
																			>Prepare to Submit</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="javascript:void(0)"
																			title="Save as Draft"
																			aria-setsize="5"
																			aria-posinset="4"
																			>Save as Draft</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="javascript:void(0)"
																			title="Discard all Changes"
																			aria-setsize="5"
																			aria-posinset="5"
																			>Discard all Changes</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_versiondatetime"
															data-value="/Date(1758110163000)/"
															aria-readonly="true"
															data-th="Date time received"
															aria-label="9/17/2025 11:56 AM"
														>
															17-09-2025 05:56
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_requesteddeliverydate"
															data-value="/Date(1758067200000)/"
															aria-readonly="true"
															data-th="Earliest requested receipt date"
															aria-label="9/17/2025"
														>
															16-09-2025
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"4bc7dee1-a847-4286-9757-ecbcc01b1e0a","LogicalName":"cdm_company","Name":"FRRT","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="FRRT"
														>
															FRRT
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="1"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="1"
														>
															1
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_orderbalance"
															data-value="17.84"
															aria-readonly="true"
															data-th="Total Amount"
															aria-label="17.840000"
														>
															17,84
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currencycode"
															data-value="EUR"
															aria-readonly="true"
															data-th="Currency"
															aria-label="EUR"
														>
															EUR
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestate"
															data-value='{"Value":200000003,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="Edited"
														>
															Edited
														</td>
													</tr>
													<tr
														data-id="00007c70-0000-0000-fd02-005001000000"
														data-entity="mserp_vrmpurchaseorderresponseheaderentity"
														data-name="BRMF-000041"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="BRMF-000041"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="BRMF-000041"
														>
															<a
																href="/purchase-order-details-page/?id=00007c70-0000-0000-fd02-005001000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>BRMF-000041</a
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
																			href="/purchase-order-details-page/?id=00007c70-0000-0000-fd02-005001000000"
																			title="View details"
																			aria-setsize="5"
																			aria-posinset="1"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="javascript:void(0)"
																			title="View Received Archived Order"
																			aria-setsize="5"
																			aria-posinset="2"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="javascript:void(0)"
																			title="Prepare to Submit"
																			aria-setsize="5"
																			aria-posinset="3"
																			>Prepare to Submit</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="javascript:void(0)"
																			title="Save as Draft"
																			aria-setsize="5"
																			aria-posinset="4"
																			>Save as Draft</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="edit-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="javascript:void(0)"
																			title="Discard all Changes"
																			aria-setsize="5"
																			aria-posinset="5"
																			>Discard all Changes</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_versiondatetime"
															data-value="/Date(1757855435000)/"
															aria-readonly="true"
															data-th="Date time received"
															aria-label="9/14/2025 1:10 PM"
														>
															14-09-2025 07:10
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_requesteddeliverydate"
															data-value="/Date(1757808000000)/"
															aria-readonly="true"
															data-th="Earliest requested receipt date"
															aria-label="9/14/2025"
														>
															13-09-2025
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_dataareaid_id"
															data-value='{"Id":"ea56a4bc-c7ac-4960-9603-aa8dd5088e57","LogicalName":"cdm_company","Name":"BRMF","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Company"
															aria-label="BRMF"
														>
															BRMF
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="2"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="2"
														>
															2
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_orderbalance"
															data-value="105.91"
															aria-readonly="true"
															data-th="Total Amount"
															aria-label="105.910000"
														>
															105,91
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currencycode"
															data-value="USD"
															aria-readonly="true"
															data-th="Currency"
															aria-label="USD"
														>
															USD
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestate"
															data-value='{"Value":200000003,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="Edited"
														>
															Edited
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div
											class="view-empty message"
											style="display: none"
										>
											There are no records to display.
										</div>
										<div
											class="view-empty-maker message"
											style="display: none"
										>
											To see records displayed here, choose preview.
										</div>
										<div
											class="view-access-denied message"
											style="display: none"
										>
											<div class="alert alert-block alert-danger">
												You don't have permissions to view these
												records.
											</div>
										</div>
										<div
											class="view-error message"
											style="display: none"
										>
											<div class="alert alert-block alert-danger">
												Error completing request.
												<span class="details"></span>
											</div>
										</div>
										<div
											class="view-loading message text-center"
											style="display: none"
										>
											<div class="loading-wrapper">
												<fluent-progress-ring role="progressbar"
													><template shadowrootmode="open"
														><slot
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
															</svg> </slot></template
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
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-insert"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-edit"
																aria-hidden="true"
															></span>
															Create
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-edit"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-edit"
																aria-hidden="true"
															></span>
															Edit
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-details"
											role="dialog"
											tabindex="-1"
											aria-labelledby="modalTitleID_f1f8d5be-254a-4469-84a9-8fe7fe7f1a7f"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4
															id="modalTitleID_f1f8d5be-254a-4469-84a9-8fe7fe7f1a7f"
															class="modal-title"
														>
															<span
																class="fa fa-info-circle"
																aria-hidden="true"
															></span>
															View details
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															aria-hidden="true"
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-delete"
											role="dialog"
											tabindex="-1"
											aria-label="Delete"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-trash-can"
																aria-hidden="true"
															></span>
															Delete
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Delete</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-error"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-exclamation-triangle"
																aria-hidden="true"
															></span>
															Error
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<p>
															We're sorry, an error has occurred.
														</p>
													</div>
													<div class="modal-footer">
														<button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Close
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-createrecord"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-plus-circle"
																aria-hidden="true"
															></span>
															Create related record
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-run-workflow"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Run workflow
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														&lt;p&gt;Are you sure you want to run
														this workflow?&lt;/p&gt;
													</div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Run workflow</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-deactivate"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Deactivate
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Deactivate</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-activate"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Activate</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Activate</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											aria-label="Resolve case"
											class="modal fade modal-resolvecase"
											data-backdrop="static"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Resolve case
														</h4>
														<button
															class="form-close"
															data-bs-dismiss="modal"
															tabindex="0"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="row mb-3">
															<label
																class="required col-form-label col-md-3"
															>
															</label>
															<div class="col-md-9">
																<input
																	aria-required="true"
																	class="resolution-input required form-control"
																	type="text"
																	aria-label=""
																/>
															</div>
														</div>
														<div class="row mb-3">
															<label
																class="required col-form-label col-md-3"
															>
															</label>
															<div class="col-md-9">
																<textarea
																	aria-required="true"
																	class="resolution-description-input required form-control"
																	cols="20"
																	rows="6"
																	aria-label=""
																></textarea>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button
															tabindex="0"
															class="primary btn btn-success"
															type="button"
														>
															Resolve
														</button>
														<button
															tabindex="0"
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div
								id="activePO"
								class="table-list"
								style="display: block"
							>
								<div class="entitylist">
									<div
										class="entity-grid entitylist all-active-po"
										data-id="1758816838396.3"
										data-column-width-style="Percent"
										data-defer-loading="false"
										data-enable-actions="true"
										data-get-url="/_services/entity-grid-data.json/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-get-ai-insights-url="/_services/entity-grid-ai-summary.json/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-update-url="/_services/entity-grid-update-entity/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-grid-class="table-none-striped"
										data-select-mode="None"
										data-selected-view="830f293c-f06e-f011-bec3-00224809c149"
										data-view-layouts="W3siQ29uZmlndXJhdGlvbiI6eyJQYXJ0aWFsVmlld0NvbmZpZyI6ZmFsc2UsIkVudGl0eU5hbWUiOiJtc2VycF92cm1wdXJjaGFzZW9yZGVyYWN0aXZlZW50aXR5IiwiUHJpbWFyeUtleU5hbWUiOiJtc2VycF92cm1wdXJjaGFzZW9yZGVyYWN0aXZlZW50aXR5aWQiLCJWaWV3TmFtZSI6bnVsbCwiVmlld0lkIjoiODMwZjI5M2MtZjA2ZS1mMDExLWJlYzMtMDAyMjQ4MDljMTQ5IiwiSWQiOiI4MzBmMjkzYy1mMDZlLWYwMTEtYmVjMy0wMDIyNDgwOWMxNDkiLCJQYWdlU2l6ZSI6MTAsIkRhdGFQYWdlckVuYWJsZWQiOm51bGwsIkxheW91dFhtbCI6bnVsbCwiRmV0Y2hYbWwiOm51bGwsIlZpZXdEaXNwbGF5TmFtZSI6IiIsIkNzc0NsYXNzIjoiYWxsLWFjdGl2ZS1wbyIsIkdyaWRDc3NDbGFzcyI6InRhYmxlLW5vbmUtc3RyaXBlZCIsIkdyaWRDb2x1bW5XaWR0aFN0eWxlIjoxLCJMb2FkaW5nTWVzc2FnZSI6IiIsIkVycm9yTWVzc2FnZSI6IiIsIkFjY2Vzc0RlbmllZE1lc3NhZ2UiOiIiLCJFbXB0eUxpc3RUZXh0IjpudWxsLCJDb2x1bW5PdmVycmlkZXMiOltdLCJFbmFibGVFbnRpdHlQZXJtaXNzaW9ucyI6dHJ1ZSwiU2VhcmNoIjp7IkVuYWJsZWQiOmZhbHNlLCJTZWFyY2hRdWVyeVN0cmluZ1BhcmFtZXRlck5hbWUiOiJxdWVyeSIsIlBsYWNlaG9sZGVyVGV4dCI6IlNlYXJjaCIsIk5scGxhY2Vob2xkZXJUZXh0IjoiU2VhcmNoIGxpc3QgaW4geW91ciBvd24gd29yZHMiLCJUb29sdGlwVGV4dCI6IlRvIHNlYXJjaCBvbiBwYXJ0aWFsIHRleHQsIHVzZSB0aGUgYXN0ZXJpc2sgKCopIHdpbGRjYXJkIGNoYXJhY3Rlci4gIiwiQnV0dG9uTGFiZWwiOiI8c3BhbiBjbGFzcz0nc3Itb25seSc+U2VhcmNoPC9zcGFuPjxzcGFuIGNsYXNzPSdmYSBmYS1zZWFyY2gnIGFyaWEtaGlkZGVuPSd0cnVlJz48L3NwYW4+In0sIkZpbHRlclF1ZXJ5U3RyaW5nUGFyYW1ldGVyTmFtZSI6ImZpbHRlciIsIlNvcnRRdWVyeVN0cmluZ1BhcmFtZXRlck5hbWUiOiJzb3J0IiwiUGFnZVF1ZXJ5U3RyaW5nUGFyYW1ldGVyTmFtZSI6InBhZ2UiLCJGaWx0ZXJCeVVzZXJPcHRpb25MYWJlbCI6Ik15IiwiRmlsdGVyUG9ydGFsVXNlckF0dHJpYnV0ZU5hbWUiOm51bGwsIkZpbHRlckFjY291bnRBdHRyaWJ1dGVOYW1lIjpudWxsLCJGaWx0ZXJXZWJzaXRlQXR0cmlidXRlTmFtZSI6bnVsbCwiRGV0YWlsc0FjdGlvbkxpbmsiOnsiTW9kYWwiOnsiTG9hZGluZ01lc3NhZ2UiOiIiLCJTaXplIjoxLCJDc3NDbGFzcyI6IiIsIlRpdGxlIjoiIiwiVGl0bGVDc3NDbGFzcyI6IiIsIlByaW1hcnlCdXR0b25UZXh0IjoiIiwiRGlzbWlzc0J1dHRvblNyVGV4dCI6IiIsIkNsb3NlQnV0dG9uVGV4dCI6IiIsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6IiIsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOiIifSwiRW50aXR5Rm9ybSI6bnVsbCwiVGFyZ2V0IjowLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjEsIkxhYmVsIjoiVmlldyIsIlRvb2x0aXAiOiJWaWV3IiwiUXVlcnlTdHJpbmdJZFBhcmFtZXRlck5hbWUiOiJpZCIsIkVuYWJsZWQiOnRydWUsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6IiIsIkFjdGlvbkluZGV4IjoxMCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOiIiLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjoiIiwiRmlsdGVyQ3JpdGVyaWFJZCI6IjA0YTIwZDkzLWMzNWUtNDJkNy1hYjhiLTY0MTRjOTg3OGM1NSIsIkJ1c3lUZXh0IjpudWxsfSwiSW5zZXJ0QWN0aW9uTGluayI6eyJNb2RhbCI6eyJMb2FkaW5nTWVzc2FnZSI6bnVsbCwiU2l6ZSI6bnVsbCwiQ3NzQ2xhc3MiOm51bGwsIlRpdGxlIjpudWxsLCJUaXRsZUNzc0NsYXNzIjpudWxsLCJQcmltYXJ5QnV0dG9uVGV4dCI6bnVsbCwiRGlzbWlzc0J1dHRvblNyVGV4dCI6bnVsbCwiQ2xvc2VCdXR0b25UZXh0IjpudWxsLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOm51bGwsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOm51bGx9LCJFbnRpdHlGb3JtIjpudWxsLCJUYXJnZXQiOm51bGwsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MCwiTGFiZWwiOm51bGwsIlRvb2x0aXAiOm51bGwsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjpudWxsLCJFbmFibGVkIjpmYWxzZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjpudWxsLCJBY3Rpb25JbmRleCI6bnVsbCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOm51bGwsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOm51bGwsIkZpbHRlckNyaXRlcmlhSWQiOiI3NmFhNGMxZS1mOWJjLTQ4NGMtODZhZS1mZmYyYTdjZGEwNmIiLCJCdXN5VGV4dCI6bnVsbH0sIkFzc29jaWF0ZUFjdGlvbkxpbmsiOnsiUmVsYXRpb25zaGlwIjpudWxsLCJWaWV3Q29uZmlndXJhdGlvbnMiOm51bGwsIk9uQ29tcGxldGUiOm51bGwsIlJlZGlyZWN0VXJsIjpudWxsLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjAsIkxhYmVsIjpudWxsLCJUb29sdGlwIjpudWxsLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6bnVsbCwiRW5hYmxlZCI6ZmFsc2UsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6bnVsbCwiQWN0aW9uSW5kZXgiOm51bGwsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjpudWxsLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjpudWxsLCJGaWx0ZXJDcml0ZXJpYUlkIjoiNjg0NmI3N2MtOTU3Ni00ODIyLTg1NjktNTYzYWI0YTJiOTJkIiwiQnVzeVRleHQiOm51bGx9LCJFZGl0QWN0aW9uTGluayI6eyJNb2RhbCI6eyJMb2FkaW5nTWVzc2FnZSI6bnVsbCwiU2l6ZSI6bnVsbCwiQ3NzQ2xhc3MiOm51bGwsIlRpdGxlIjpudWxsLCJUaXRsZUNzc0NsYXNzIjpudWxsLCJQcmltYXJ5QnV0dG9uVGV4dCI6bnVsbCwiRGlzbWlzc0J1dHRvblNyVGV4dCI6bnVsbCwiQ2xvc2VCdXR0b25UZXh0IjpudWxsLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOm51bGwsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOm51bGx9LCJFbnRpdHlGb3JtIjpudWxsLCJUYXJnZXQiOm51bGwsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MCwiTGFiZWwiOm51bGwsIlRvb2x0aXAiOm51bGwsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjpudWxsLCJFbmFibGVkIjpmYWxzZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjpudWxsLCJBY3Rpb25JbmRleCI6bnVsbCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOm51bGwsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOm51bGwsIkZpbHRlckNyaXRlcmlhSWQiOiJlNjcxZmI0OS1hMjY0LTRhMDYtYWM0Zi0wMDE2MmM3MGUzMWUiLCJCdXN5VGV4dCI6bnVsbH0sIkRlbGV0ZUFjdGlvbkxpbmsiOnsiTW9kYWwiOnsiQm9keSI6bnVsbCwiU2l6ZSI6bnVsbCwiQ3NzQ2xhc3MiOm51bGwsIlRpdGxlIjpudWxsLCJUaXRsZUNzc0NsYXNzIjpudWxsLCJQcmltYXJ5QnV0dG9uVGV4dCI6bnVsbCwiRGlzbWlzc0J1dHRvblNyVGV4dCI6bnVsbCwiQ2xvc2VCdXR0b25UZXh0IjpudWxsLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOm51bGwsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOm51bGx9LCJPbkNvbXBsZXRlIjpudWxsLCJSZWRpcmVjdFVybCI6bnVsbCwiV2ViUGFnZSI6bnVsbCwiVVJMIjpudWxsLCJUeXBlIjowLCJMYWJlbCI6bnVsbCwiVG9vbHRpcCI6bnVsbCwiUXVlcnlTdHJpbmdJZFBhcmFtZXRlck5hbWUiOm51bGwsIkVuYWJsZWQiOmZhbHNlLCJCdXR0b25Dc3NDbGFzcyI6bnVsbCwiU3VjY2Vzc01lc3NhZ2UiOm51bGwsIkFjdGlvbkluZGV4IjpudWxsLCJBY3Rpb25CdXR0b25BbGlnbm1lbnQiOm51bGwsIkFjdGlvbkJ1dHRvblN0eWxlIjpudWxsLCJBY3Rpb25CdXR0b25QbGFjZW1lbnQiOm51bGwsIkNvbmZpcm1hdGlvbiI6bnVsbCwiU2hvd01vZGFsIjowLCJGaWx0ZXJDcml0ZXJpYSI6bnVsbCwiRmlsdGVyQ3JpdGVyaWFJZCI6ImVlNTQwNzMwLWMxN2YtNGFiNC04N2ZkLWU0MGFhZjRhZDQ3MiIsIkJ1c3lUZXh0IjpudWxsfSwiQ2xvc2VJbmNpZGVudEFjdGlvbkxpbmsiOnsiRGVmYXVsdFJlc29sdXRpb24iOm51bGwsIkRlZmF1bHRSZXNvbHV0aW9uRGVzY3JpcHRpb24iOm51bGwsIk1vZGFsIjp7IlNpemUiOm51bGwsIkNzc0NsYXNzIjpudWxsLCJUaXRsZSI6bnVsbCwiVGl0bGVDc3NDbGFzcyI6bnVsbCwiUHJpbWFyeUJ1dHRvblRleHQiOm51bGwsIkRpc21pc3NCdXR0b25TclRleHQiOm51bGwsIkNsb3NlQnV0dG9uVGV4dCI6bnVsbCwiUHJpbWFyeUJ1dHRvbkNzc0NsYXNzIjpudWxsLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjpudWxsfSwiT25Db21wbGV0ZSI6bnVsbCwiUmVkaXJlY3RVcmwiOm51bGwsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MCwiTGFiZWwiOm51bGwsIlRvb2x0aXAiOm51bGwsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjpudWxsLCJFbmFibGVkIjpmYWxzZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjpudWxsLCJBY3Rpb25JbmRleCI6bnVsbCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOm51bGwsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOm51bGwsIkZpbHRlckNyaXRlcmlhSWQiOiI1OWNlMDBmZC02MmRlLTQ1ZjQtYTA4MC0xZjAwNWM0ODQxMTgiLCJCdXN5VGV4dCI6bnVsbH0sIlJlc29sdmVDYXNlQWN0aW9uTGluayI6eyJEZXNjcmlwdGlvbkxhYmVsIjpudWxsLCJNb2RhbCI6eyJTaXplIjpudWxsLCJDc3NDbGFzcyI6bnVsbCwiVGl0bGUiOm51bGwsIlRpdGxlQ3NzQ2xhc3MiOm51bGwsIlByaW1hcnlCdXR0b25UZXh0IjpudWxsLCJEaXNtaXNzQnV0dG9uU3JUZXh0IjpudWxsLCJDbG9zZUJ1dHRvblRleHQiOm51bGwsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6bnVsbCwiQ2xvc2VCdXR0b25Dc3NDbGFzcyI6bnVsbH0sIlN1YmplY3RMYWJlbCI6bnVsbCwiT25Db21wbGV0ZSI6bnVsbCwiUmVkaXJlY3RVcmwiOm51bGwsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MCwiTGFiZWwiOm51bGwsIlRvb2x0aXAiOm51bGwsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjpudWxsLCJFbmFibGVkIjpmYWxzZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjpudWxsLCJBY3Rpb25JbmRleCI6bnVsbCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOm51bGwsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOm51bGwsIkZpbHRlckNyaXRlcmlhSWQiOiJlMWNlNDEzMS0zNjJhLTQ3ZjQtYjI4YS1iYmMxMTRkZDQ0ZTciLCJCdXN5VGV4dCI6bnVsbH0sIlJlb3BlbkNhc2VBY3Rpb25MaW5rIjp7Ik1vZGFsIjp7IlNpemUiOm51bGwsIkNzc0NsYXNzIjpudWxsLCJUaXRsZSI6bnVsbCwiVGl0bGVDc3NDbGFzcyI6bnVsbCwiUHJpbWFyeUJ1dHRvblRleHQiOm51bGwsIkRpc21pc3NCdXR0b25TclRleHQiOm51bGwsIkNsb3NlQnV0dG9uVGV4dCI6bnVsbCwiUHJpbWFyeUJ1dHRvbkNzc0NsYXNzIjpudWxsLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjpudWxsfSwiT25Db21wbGV0ZSI6bnVsbCwiUmVkaXJlY3RVcmwiOm51bGwsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MCwiTGFiZWwiOm51bGwsIlRvb2x0aXAiOm51bGwsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjpudWxsLCJFbmFibGVkIjpmYWxzZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjpudWxsLCJBY3Rpb25JbmRleCI6bnVsbCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOm51bGwsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOm51bGwsIkZpbHRlckNyaXRlcmlhSWQiOiJmZmI1MjQ5My1lOTNlLTQ2MDgtODE3Yi05NDdmOWFiNmUyZDUiLCJCdXN5VGV4dCI6bnVsbH0sIkNhbmNlbENhc2VBY3Rpb25MaW5rIjp7Ik1vZGFsIjp7IlNpemUiOm51bGwsIkNzc0NsYXNzIjpudWxsLCJUaXRsZSI6bnVsbCwiVGl0bGVDc3NDbGFzcyI6bnVsbCwiUHJpbWFyeUJ1dHRvblRleHQiOm51bGwsIkRpc21pc3NCdXR0b25TclRleHQiOm51bGwsIkNsb3NlQnV0dG9uVGV4dCI6bnVsbCwiUHJpbWFyeUJ1dHRvbkNzc0NsYXNzIjpudWxsLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjpudWxsfSwiT25Db21wbGV0ZSI6bnVsbCwiUmVkaXJlY3RVcmwiOm51bGwsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MCwiTGFiZWwiOm51bGwsIlRvb2x0aXAiOm51bGwsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjpudWxsLCJFbmFibGVkIjpmYWxzZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjpudWxsLCJBY3Rpb25JbmRleCI6bnVsbCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOm51bGwsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOm51bGwsIkZpbHRlckNyaXRlcmlhSWQiOiI2NTIwMGU2MC02NDUxLTRhNWMtOGUyZi1lMDlhN2IxODM0ZGMiLCJCdXN5VGV4dCI6bnVsbH0sIlF1YWxpZnlMZWFkQWN0aW9uTGluayI6eyJNb2RhbCI6eyJTaXplIjpudWxsLCJDc3NDbGFzcyI6bnVsbCwiVGl0bGUiOm51bGwsIlRpdGxlQ3NzQ2xhc3MiOm51bGwsIlByaW1hcnlCdXR0b25UZXh0IjpudWxsLCJEaXNtaXNzQnV0dG9uU3JUZXh0IjpudWxsLCJDbG9zZUJ1dHRvblRleHQiOm51bGwsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6bnVsbCwiQ2xvc2VCdXR0b25Dc3NDbGFzcyI6bnVsbH0sIk9uQ29tcGxldGUiOm51bGwsIlJlZGlyZWN0VXJsIjpudWxsLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjAsIkxhYmVsIjpudWxsLCJUb29sdGlwIjpudWxsLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6bnVsbCwiRW5hYmxlZCI6ZmFsc2UsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6bnVsbCwiQWN0aW9uSW5kZXgiOm51bGwsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjpudWxsLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjpudWxsLCJGaWx0ZXJDcml0ZXJpYUlkIjoiMjgyMThmYjgtZDgxMS00OGI3LWExN2UtOWZiZTQyM2IxYWU3IiwiQnVzeVRleHQiOm51bGx9LCJDb252ZXJ0T3JkZXJUb0ludm9pY2VBY3Rpb25MaW5rIjp7Ik1vZGFsIjp7IlNpemUiOm51bGwsIkNzc0NsYXNzIjpudWxsLCJUaXRsZSI6bnVsbCwiVGl0bGVDc3NDbGFzcyI6bnVsbCwiUHJpbWFyeUJ1dHRvblRleHQiOm51bGwsIkRpc21pc3NCdXR0b25TclRleHQiOm51bGwsIkNsb3NlQnV0dG9uVGV4dCI6bnVsbCwiUHJpbWFyeUJ1dHRvbkNzc0NsYXNzIjpudWxsLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjpudWxsfSwiT25Db21wbGV0ZSI6bnVsbCwiUmVkaXJlY3RVcmwiOm51bGwsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MCwiTGFiZWwiOm51bGwsIlRvb2x0aXAiOm51bGwsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjpudWxsLCJFbmFibGVkIjpmYWxzZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjpudWxsLCJBY3Rpb25JbmRleCI6bnVsbCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOm51bGwsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOm51bGwsIkZpbHRlckNyaXRlcmlhSWQiOiJiZTM1NTk5Ni05ZjFkLTRlMmQtOWE4NS04YWM1NmFiZTYwMDkiLCJCdXN5VGV4dCI6bnVsbH0sIkNvbnZlcnRRdW90ZVRvT3JkZXJBY3Rpb25MaW5rIjp7Ik1vZGFsIjp7IlNpemUiOm51bGwsIkNzc0NsYXNzIjpudWxsLCJUaXRsZSI6bnVsbCwiVGl0bGVDc3NDbGFzcyI6bnVsbCwiUHJpbWFyeUJ1dHRvblRleHQiOm51bGwsIkRpc21pc3NCdXR0b25TclRleHQiOm51bGwsIkNsb3NlQnV0dG9uVGV4dCI6bnVsbCwiUHJpbWFyeUJ1dHRvbkNzc0NsYXNzIjpudWxsLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjpudWxsfSwiT25Db21wbGV0ZSI6bnVsbCwiUmVkaXJlY3RVcmwiOm51bGwsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MCwiTGFiZWwiOm51bGwsIlRvb2x0aXAiOm51bGwsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjpudWxsLCJFbmFibGVkIjpmYWxzZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjpudWxsLCJBY3Rpb25JbmRleCI6bnVsbCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOm51bGwsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOm51bGwsIkZpbHRlckNyaXRlcmlhSWQiOiJjYmQyMTI5Ny0xYjMxLTRkYTctYjBlOS1mZTlkYTNlMDdlNmQiLCJCdXN5VGV4dCI6bnVsbH0sIkNhbGN1bGF0ZU9wcG9ydHVuaXR5QWN0aW9uTGluayI6eyJNb2RhbCI6eyJTaXplIjpudWxsLCJDc3NDbGFzcyI6bnVsbCwiVGl0bGUiOm51bGwsIlRpdGxlQ3NzQ2xhc3MiOm51bGwsIlByaW1hcnlCdXR0b25UZXh0IjpudWxsLCJEaXNtaXNzQnV0dG9uU3JUZXh0IjpudWxsLCJDbG9zZUJ1dHRvblRleHQiOm51bGwsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6bnVsbCwiQ2xvc2VCdXR0b25Dc3NDbGFzcyI6bnVsbH0sIk9uQ29tcGxldGUiOm51bGwsIlJlZGlyZWN0VXJsIjpudWxsLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjAsIkxhYmVsIjpudWxsLCJUb29sdGlwIjpudWxsLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6bnVsbCwiRW5hYmxlZCI6ZmFsc2UsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6bnVsbCwiQWN0aW9uSW5kZXgiOm51bGwsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjpudWxsLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjpudWxsLCJGaWx0ZXJDcml0ZXJpYUlkIjoiYTZmM2Q0MjAtMjgyYS00MDE2LWJiZjYtNjdlOTZhZjZmYTAwIiwiQnVzeVRleHQiOm51bGx9LCJEZWFjdGl2YXRlQWN0aW9uTGluayI6eyJNb2RhbCI6eyJTaXplIjpudWxsLCJDc3NDbGFzcyI6bnVsbCwiVGl0bGUiOm51bGwsIlRpdGxlQ3NzQ2xhc3MiOm51bGwsIlByaW1hcnlCdXR0b25UZXh0IjpudWxsLCJEaXNtaXNzQnV0dG9uU3JUZXh0IjpudWxsLCJDbG9zZUJ1dHRvblRleHQiOm51bGwsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6bnVsbCwiQ2xvc2VCdXR0b25Dc3NDbGFzcyI6bnVsbH0sIk9uQ29tcGxldGUiOm51bGwsIlJlZGlyZWN0VXJsIjpudWxsLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjAsIkxhYmVsIjpudWxsLCJUb29sdGlwIjpudWxsLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6bnVsbCwiRW5hYmxlZCI6ZmFsc2UsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6bnVsbCwiQWN0aW9uSW5kZXgiOm51bGwsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjpudWxsLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjpudWxsLCJGaWx0ZXJDcml0ZXJpYUlkIjoiMjE3NjFjODgtZGUyNS00MmJjLTg0ZjYtMGY3NGIzOWRhMzllIiwiQnVzeVRleHQiOm51bGx9LCJBY3RpdmF0ZUFjdGlvbkxpbmsiOnsiTW9kYWwiOnsiU2l6ZSI6bnVsbCwiQ3NzQ2xhc3MiOm51bGwsIlRpdGxlIjpudWxsLCJUaXRsZUNzc0NsYXNzIjpudWxsLCJQcmltYXJ5QnV0dG9uVGV4dCI6bnVsbCwiRGlzbWlzc0J1dHRvblNyVGV4dCI6bnVsbCwiQ2xvc2VCdXR0b25UZXh0IjpudWxsLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOm51bGwsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOm51bGx9LCJPbkNvbXBsZXRlIjpudWxsLCJSZWRpcmVjdFVybCI6bnVsbCwiV2ViUGFnZSI6bnVsbCwiVVJMIjpudWxsLCJUeXBlIjowLCJMYWJlbCI6bnVsbCwiVG9vbHRpcCI6bnVsbCwiUXVlcnlTdHJpbmdJZFBhcmFtZXRlck5hbWUiOm51bGwsIkVuYWJsZWQiOmZhbHNlLCJCdXR0b25Dc3NDbGFzcyI6bnVsbCwiU3VjY2Vzc01lc3NhZ2UiOm51bGwsIkFjdGlvbkluZGV4IjpudWxsLCJBY3Rpb25CdXR0b25BbGlnbm1lbnQiOm51bGwsIkFjdGlvbkJ1dHRvblN0eWxlIjpudWxsLCJBY3Rpb25CdXR0b25QbGFjZW1lbnQiOm51bGwsIkNvbmZpcm1hdGlvbiI6bnVsbCwiU2hvd01vZGFsIjowLCJGaWx0ZXJDcml0ZXJpYSI6bnVsbCwiRmlsdGVyQ3JpdGVyaWFJZCI6IjYxNjY4MGE2LTczYzQtNDZlMC1hOWQyLTRmMjc1Mjg2MjgxNSIsIkJ1c3lUZXh0IjpudWxsfSwiQWN0aXZhdGVRdW90ZUFjdGlvbkxpbmsiOnsiTW9kYWwiOnsiU2l6ZSI6bnVsbCwiQ3NzQ2xhc3MiOm51bGwsIlRpdGxlIjpudWxsLCJUaXRsZUNzc0NsYXNzIjpudWxsLCJQcmltYXJ5QnV0dG9uVGV4dCI6bnVsbCwiRGlzbWlzc0J1dHRvblNyVGV4dCI6bnVsbCwiQ2xvc2VCdXR0b25UZXh0IjpudWxsLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOm51bGwsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOm51bGx9LCJPbkNvbXBsZXRlIjpudWxsLCJSZWRpcmVjdFVybCI6bnVsbCwiV2ViUGFnZSI6bnVsbCwiVVJMIjpudWxsLCJUeXBlIjowLCJMYWJlbCI6bnVsbCwiVG9vbHRpcCI6bnVsbCwiUXVlcnlTdHJpbmdJZFBhcmFtZXRlck5hbWUiOm51bGwsIkVuYWJsZWQiOmZhbHNlLCJCdXR0b25Dc3NDbGFzcyI6bnVsbCwiU3VjY2Vzc01lc3NhZ2UiOm51bGwsIkFjdGlvbkluZGV4IjpudWxsLCJBY3Rpb25CdXR0b25BbGlnbm1lbnQiOm51bGwsIkFjdGlvbkJ1dHRvblN0eWxlIjpudWxsLCJBY3Rpb25CdXR0b25QbGFjZW1lbnQiOm51bGwsIkNvbmZpcm1hdGlvbiI6bnVsbCwiU2hvd01vZGFsIjowLCJGaWx0ZXJDcml0ZXJpYSI6bnVsbCwiRmlsdGVyQ3JpdGVyaWFJZCI6IjFjZTk0ZjcyLTBjNjAtNGYwOC1hODUwLWVlMDEzMmYxNjljOCIsIkJ1c3lUZXh0IjpudWxsfSwiU2V0T3Bwb3J0dW5pdHlPbkhvbGRBY3Rpb25MaW5rIjp7Ik1vZGFsIjp7IlNpemUiOm51bGwsIkNzc0NsYXNzIjpudWxsLCJUaXRsZSI6bnVsbCwiVGl0bGVDc3NDbGFzcyI6bnVsbCwiUHJpbWFyeUJ1dHRvblRleHQiOm51bGwsIkRpc21pc3NCdXR0b25TclRleHQiOm51bGwsIkNsb3NlQnV0dG9uVGV4dCI6bnVsbCwiUHJpbWFyeUJ1dHRvbkNzc0NsYXNzIjpudWxsLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjpudWxsfSwiT25Db21wbGV0ZSI6bnVsbCwiUmVkaXJlY3RVcmwiOm51bGwsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MCwiTGFiZWwiOm51bGwsIlRvb2x0aXAiOm51bGwsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjpudWxsLCJFbmFibGVkIjpmYWxzZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjpudWxsLCJBY3Rpb25JbmRleCI6bnVsbCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOm51bGwsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOm51bGwsIkZpbHRlckNyaXRlcmlhSWQiOiI4NzQ3MzI3YS1lMDcxLTQ0YTUtYjZlYi04OTA4MmE5Yzg2MjMiLCJCdXN5VGV4dCI6bnVsbH0sIlJlb3Blbk9wcG9ydHVuaXR5QWN0aW9uTGluayI6eyJNb2RhbCI6eyJTaXplIjpudWxsLCJDc3NDbGFzcyI6bnVsbCwiVGl0bGUiOm51bGwsIlRpdGxlQ3NzQ2xhc3MiOm51bGwsIlByaW1hcnlCdXR0b25UZXh0IjpudWxsLCJEaXNtaXNzQnV0dG9uU3JUZXh0IjpudWxsLCJDbG9zZUJ1dHRvblRleHQiOm51bGwsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6bnVsbCwiQ2xvc2VCdXR0b25Dc3NDbGFzcyI6bnVsbH0sIk9uQ29tcGxldGUiOm51bGwsIlJlZGlyZWN0VXJsIjpudWxsLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjAsIkxhYmVsIjpudWxsLCJUb29sdGlwIjpudWxsLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6bnVsbCwiRW5hYmxlZCI6ZmFsc2UsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6bnVsbCwiQWN0aW9uSW5kZXgiOm51bGwsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjpudWxsLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjpudWxsLCJGaWx0ZXJDcml0ZXJpYUlkIjoiMTc5NzhlZTktZGFmNS00MGQyLTk4ZDQtZGM5ZjJkMDk2ZWJlIiwiQnVzeVRleHQiOm51bGx9LCJXaW5PcHBvcnR1bml0eUFjdGlvbkxpbmsiOnsiTW9kYWwiOnsiU2l6ZSI6bnVsbCwiQ3NzQ2xhc3MiOm51bGwsIlRpdGxlIjpudWxsLCJUaXRsZUNzc0NsYXNzIjpudWxsLCJQcmltYXJ5QnV0dG9uVGV4dCI6bnVsbCwiRGlzbWlzc0J1dHRvblNyVGV4dCI6bnVsbCwiQ2xvc2VCdXR0b25UZXh0IjpudWxsLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOm51bGwsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOm51bGx9LCJPbkNvbXBsZXRlIjpudWxsLCJSZWRpcmVjdFVybCI6bnVsbCwiV2ViUGFnZSI6bnVsbCwiVVJMIjpudWxsLCJUeXBlIjowLCJMYWJlbCI6bnVsbCwiVG9vbHRpcCI6bnVsbCwiUXVlcnlTdHJpbmdJZFBhcmFtZXRlck5hbWUiOm51bGwsIkVuYWJsZWQiOmZhbHNlLCJCdXR0b25Dc3NDbGFzcyI6bnVsbCwiU3VjY2Vzc01lc3NhZ2UiOm51bGwsIkFjdGlvbkluZGV4IjpudWxsLCJBY3Rpb25CdXR0b25BbGlnbm1lbnQiOm51bGwsIkFjdGlvbkJ1dHRvblN0eWxlIjpudWxsLCJBY3Rpb25CdXR0b25QbGFjZW1lbnQiOm51bGwsIkNvbmZpcm1hdGlvbiI6bnVsbCwiU2hvd01vZGFsIjowLCJGaWx0ZXJDcml0ZXJpYSI6bnVsbCwiRmlsdGVyQ3JpdGVyaWFJZCI6IjhkNTM3NTc3LTI0ZTEtNGEyYS04NmI3LThhZjdiOTkxOGEzZiIsIkJ1c3lUZXh0IjpudWxsfSwiTG9zZU9wcG9ydHVuaXR5QWN0aW9uTGluayI6eyJNb2RhbCI6eyJTaXplIjpudWxsLCJDc3NDbGFzcyI6bnVsbCwiVGl0bGUiOm51bGwsIlRpdGxlQ3NzQ2xhc3MiOm51bGwsIlByaW1hcnlCdXR0b25UZXh0IjpudWxsLCJEaXNtaXNzQnV0dG9uU3JUZXh0IjpudWxsLCJDbG9zZUJ1dHRvblRleHQiOm51bGwsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6bnVsbCwiQ2xvc2VCdXR0b25Dc3NDbGFzcyI6bnVsbH0sIk9uQ29tcGxldGUiOm51bGwsIlJlZGlyZWN0VXJsIjpudWxsLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjAsIkxhYmVsIjpudWxsLCJUb29sdGlwIjpudWxsLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6bnVsbCwiRW5hYmxlZCI6ZmFsc2UsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6bnVsbCwiQWN0aW9uSW5kZXgiOm51bGwsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjpudWxsLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjpudWxsLCJGaWx0ZXJDcml0ZXJpYUlkIjoiM2IxYTYwNjItOWVjOC00YzZmLTljMWUtYWY5OTE0MGZkNTliIiwiQnVzeVRleHQiOm51bGx9LCJHZW5lcmF0ZVF1b3RlRnJvbU9wcG9ydHVuaXR5QWN0aW9uTGluayI6eyJNb2RhbCI6eyJTaXplIjpudWxsLCJDc3NDbGFzcyI6bnVsbCwiVGl0bGUiOm51bGwsIlRpdGxlQ3NzQ2xhc3MiOm51bGwsIlByaW1hcnlCdXR0b25UZXh0IjpudWxsLCJEaXNtaXNzQnV0dG9uU3JUZXh0IjpudWxsLCJDbG9zZUJ1dHRvblRleHQiOm51bGwsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6bnVsbCwiQ2xvc2VCdXR0b25Dc3NDbGFzcyI6bnVsbH0sIk9uQ29tcGxldGUiOm51bGwsIlJlZGlyZWN0VXJsIjpudWxsLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjAsIkxhYmVsIjpudWxsLCJUb29sdGlwIjpudWxsLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6bnVsbCwiRW5hYmxlZCI6ZmFsc2UsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6bnVsbCwiQWN0aW9uSW5kZXgiOm51bGwsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjpudWxsLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjpudWxsLCJGaWx0ZXJDcml0ZXJpYUlkIjoiYzAwYzMzYTQtMDhhYi00NTdjLTg3NmItNDBjNzc4NmY2YTdlIiwiQnVzeVRleHQiOm51bGx9LCJVcGRhdGVQaXBlbGluZVBoYXNlQWN0aW9uTGluayI6eyJQaXBlbGluZVBoYXNlTGFiZWwiOm51bGwsIkRlc2NyaXB0aW9uTGFiZWwiOm51bGwsIk1vZGFsIjp7IlNpemUiOm51bGwsIkNzc0NsYXNzIjpudWxsLCJUaXRsZSI6bnVsbCwiVGl0bGVDc3NDbGFzcyI6bnVsbCwiUHJpbWFyeUJ1dHRvblRleHQiOm51bGwsIkRpc21pc3NCdXR0b25TclRleHQiOm51bGwsIkNsb3NlQnV0dG9uVGV4dCI6bnVsbCwiUHJpbWFyeUJ1dHRvbkNzc0NsYXNzIjpudWxsLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjpudWxsfSwiT25Db21wbGV0ZSI6bnVsbCwiUmVkaXJlY3RVcmwiOm51bGwsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MCwiTGFiZWwiOm51bGwsIlRvb2x0aXAiOm51bGwsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjpudWxsLCJFbmFibGVkIjpmYWxzZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjpudWxsLCJBY3Rpb25JbmRleCI6bnVsbCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOm51bGwsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOm51bGwsIkZpbHRlckNyaXRlcmlhSWQiOiI4ZWM2OGVjNC1mZWE1LTQ3N2UtYmViYy01ZDg5MDU0ZjFlZDAiLCJCdXN5VGV4dCI6bnVsbH0sIkRpc2Fzc29jaWF0ZUFjdGlvbkxpbmsiOnsiTW9kYWwiOnsiU2l6ZSI6bnVsbCwiQ3NzQ2xhc3MiOm51bGwsIlRpdGxlIjpudWxsLCJUaXRsZUNzc0NsYXNzIjpudWxsLCJQcmltYXJ5QnV0dG9uVGV4dCI6bnVsbCwiRGlzbWlzc0J1dHRvblNyVGV4dCI6bnVsbCwiQ2xvc2VCdXR0b25UZXh0IjpudWxsLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOm51bGwsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOm51bGx9LCJSZWxhdGlvbnNoaXAiOm51bGwsIk9uQ29tcGxldGUiOm51bGwsIlJlZGlyZWN0VXJsIjpudWxsLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjAsIkxhYmVsIjpudWxsLCJUb29sdGlwIjpudWxsLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6bnVsbCwiRW5hYmxlZCI6ZmFsc2UsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6bnVsbCwiQWN0aW9uSW5kZXgiOm51bGwsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjpudWxsLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjpudWxsLCJGaWx0ZXJDcml0ZXJpYUlkIjoiZTcxY2ZlOWYtZTJlOS00MmZjLTgzMzgtNzk5YjE3OTdhNmE3IiwiQnVzeVRleHQiOm51bGx9LCJDcmVhdGVSZWxhdGVkUmVjb3JkQWN0aW9uTGlua3MiOltdLCJWaWV3QWN0aW9uTGlua3MiOltdLCJJdGVtQWN0aW9uTGlua3MiOlt7Ik1vZGFsIjp7IkxvYWRpbmdNZXNzYWdlIjoiIiwiU2l6ZSI6MSwiQ3NzQ2xhc3MiOiIiLCJUaXRsZSI6IiIsIlRpdGxlQ3NzQ2xhc3MiOiIiLCJQcmltYXJ5QnV0dG9uVGV4dCI6IiIsIkRpc21pc3NCdXR0b25TclRleHQiOiIiLCJDbG9zZUJ1dHRvblRleHQiOiIiLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOiIiLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjoiIn0sIkVudGl0eUZvcm0iOm51bGwsIlRhcmdldCI6MCwiV2ViUGFnZSI6bnVsbCwiVVJMIjpudWxsLCJUeXBlIjoxLCJMYWJlbCI6IlZpZXcgUmVzcG9uc2UiLCJUb29sdGlwIjoiVmlldyBSZXNwb25zZSIsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjoiaWQiLCJFbmFibGVkIjp0cnVlLCJCdXR0b25Dc3NDbGFzcyI6bnVsbCwiU3VjY2Vzc01lc3NhZ2UiOiIiLCJBY3Rpb25JbmRleCI6MCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOiIiLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjoiIiwiRmlsdGVyQ3JpdGVyaWFJZCI6IjFiMDdlZmJiLWMwZTQtNDliOS05ZTI3LTEzZmE5ZmQ4Mzk2YSIsIkJ1c3lUZXh0IjpudWxsfSx7Ik1vZGFsIjp7IkxvYWRpbmdNZXNzYWdlIjoiIiwiU2l6ZSI6MSwiQ3NzQ2xhc3MiOiIiLCJUaXRsZSI6IiIsIlRpdGxlQ3NzQ2xhc3MiOiIiLCJQcmltYXJ5QnV0dG9uVGV4dCI6IiIsIkRpc21pc3NCdXR0b25TclRleHQiOiIiLCJDbG9zZUJ1dHRvblRleHQiOiIiLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOiIiLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjoiIn0sIkVudGl0eUZvcm0iOm51bGwsIlRhcmdldCI6MCwiV2ViUGFnZSI6bnVsbCwiVVJMIjpudWxsLCJUeXBlIjoxLCJMYWJlbCI6IlZpZXcgUmVjZWl2ZWQgT3JkZXIiLCJUb29sdGlwIjoiVmlldyBSZWNlaXZlZCBPcmRlciBSZXNwb25zZSIsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjoiaWQiLCJFbmFibGVkIjp0cnVlLCJCdXR0b25Dc3NDbGFzcyI6bnVsbCwiU3VjY2Vzc01lc3NhZ2UiOiIiLCJBY3Rpb25JbmRleCI6MSwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOiIiLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjoiIiwiRmlsdGVyQ3JpdGVyaWFJZCI6IjY1YTczMWNjLTE2ZjEtNDA0ZS1iODE3LTdjNjAyOGZiZjM2NCIsIkJ1c3lUZXh0IjpudWxsfSx7Ik1vZGFsIjp7IkxvYWRpbmdNZXNzYWdlIjoiIiwiU2l6ZSI6MSwiQ3NzQ2xhc3MiOiIiLCJUaXRsZSI6IiIsIlRpdGxlQ3NzQ2xhc3MiOiIiLCJQcmltYXJ5QnV0dG9uVGV4dCI6IiIsIkRpc21pc3NCdXR0b25TclRleHQiOiIiLCJDbG9zZUJ1dHRvblRleHQiOiIiLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOiIiLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjoiIn0sIkVudGl0eUZvcm0iOm51bGwsIlRhcmdldCI6MCwiV2ViUGFnZSI6bnVsbCwiVVJMIjpudWxsLCJUeXBlIjoxLCJMYWJlbCI6IlZpZXcgUmVjZWl2ZWQgT3JkZXIiLCJUb29sdGlwIjoiVmlldyBSZWNlaXZlZCBPcmRlciBEZXRhaWxzIiwiUXVlcnlTdHJpbmdJZFBhcmFtZXRlck5hbWUiOiJpZCIsIkVuYWJsZWQiOnRydWUsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6IiIsIkFjdGlvbkluZGV4IjoyLCJBY3Rpb25CdXR0b25BbGlnbm1lbnQiOm51bGwsIkFjdGlvbkJ1dHRvblN0eWxlIjpudWxsLCJBY3Rpb25CdXR0b25QbGFjZW1lbnQiOm51bGwsIkNvbmZpcm1hdGlvbiI6IiIsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOiIiLCJGaWx0ZXJDcml0ZXJpYUlkIjoiOWJhZmIyNzYtZjUxMS00NzE5LWI5N2EtYTc4MjIxMjhlMTk5IiwiQnVzeVRleHQiOm51bGx9LHsiTW9kYWwiOnsiTG9hZGluZ01lc3NhZ2UiOiIiLCJTaXplIjoxLCJDc3NDbGFzcyI6IiIsIlRpdGxlIjoiIiwiVGl0bGVDc3NDbGFzcyI6IiIsIlByaW1hcnlCdXR0b25UZXh0IjoiIiwiRGlzbWlzc0J1dHRvblNyVGV4dCI6IiIsIkNsb3NlQnV0dG9uVGV4dCI6IiIsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6IiIsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOiIifSwiRW50aXR5Rm9ybSI6bnVsbCwiVGFyZ2V0IjowLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjEsIkxhYmVsIjoiVmlldyBSZWNlaXZlZCBPcmRlciIsIlRvb2x0aXAiOiJWaWV3IFJlY2VpdmVkIEFyY2hpdmVkIE9yZGVyIiwiUXVlcnlTdHJpbmdJZFBhcmFtZXRlck5hbWUiOiJpZCIsIkVuYWJsZWQiOnRydWUsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6IiIsIkFjdGlvbkluZGV4IjozLCJBY3Rpb25CdXR0b25BbGlnbm1lbnQiOm51bGwsIkFjdGlvbkJ1dHRvblN0eWxlIjpudWxsLCJBY3Rpb25CdXR0b25QbGFjZW1lbnQiOm51bGwsIkNvbmZpcm1hdGlvbiI6IiIsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOiIiLCJGaWx0ZXJDcml0ZXJpYUlkIjoiM2FjZDE1ZTctOWUwNS00ODBjLTlkZmItMDA0OTA5NDMwZTY3IiwiQnVzeVRleHQiOm51bGx9LHsiTW9kYWwiOnsiTG9hZGluZ01lc3NhZ2UiOiIiLCJTaXplIjoxLCJDc3NDbGFzcyI6IiIsIlRpdGxlIjoiIiwiVGl0bGVDc3NDbGFzcyI6IiIsIlByaW1hcnlCdXR0b25UZXh0IjoiIiwiRGlzbWlzc0J1dHRvblNyVGV4dCI6IiIsIkNsb3NlQnV0dG9uVGV4dCI6IiIsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6IiIsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOiIifSwiRW50aXR5Rm9ybSI6bnVsbCwiVGFyZ2V0IjowLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjEsIkxhYmVsIjoiUHJlcGFyZSB0byBTdWJtaXQiLCJUb29sdGlwIjoiUHJlcGFyZSB0byBTdWJtaXQiLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6ImlkIiwiRW5hYmxlZCI6dHJ1ZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjoiIiwiQWN0aW9uSW5kZXgiOjQsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjoiIiwiU2hvd01vZGFsIjowLCJGaWx0ZXJDcml0ZXJpYSI6IiIsIkZpbHRlckNyaXRlcmlhSWQiOiI0MzIyMTdhNy1lNmIyLTRiNGMtYmM0NC1jYTY5MTM3YzE4ZDIiLCJCdXN5VGV4dCI6bnVsbH0seyJNb2RhbCI6eyJMb2FkaW5nTWVzc2FnZSI6IiIsIlNpemUiOjEsIkNzc0NsYXNzIjoiIiwiVGl0bGUiOiIiLCJUaXRsZUNzc0NsYXNzIjoiIiwiUHJpbWFyeUJ1dHRvblRleHQiOiIiLCJEaXNtaXNzQnV0dG9uU3JUZXh0IjoiIiwiQ2xvc2VCdXR0b25UZXh0IjoiIiwiUHJpbWFyeUJ1dHRvbkNzc0NsYXNzIjoiIiwiQ2xvc2VCdXR0b25Dc3NDbGFzcyI6IiJ9LCJFbnRpdHlGb3JtIjpudWxsLCJUYXJnZXQiOjAsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MSwiTGFiZWwiOiJTYXZlIGFzIERyYWZ0IiwiVG9vbHRpcCI6IlNhdmUgYXMgRHJhZnQiLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6ImlkIiwiRW5hYmxlZCI6dHJ1ZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjoiIiwiQWN0aW9uSW5kZXgiOjUsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjoiIiwiU2hvd01vZGFsIjowLCJGaWx0ZXJDcml0ZXJpYSI6IiIsIkZpbHRlckNyaXRlcmlhSWQiOiI4NDFkM2RkZC1mNzQ1LTQ4MjctYmMyZC1mNzc4YTA0ZDk4ZWMiLCJCdXN5VGV4dCI6bnVsbH0seyJNb2RhbCI6eyJMb2FkaW5nTWVzc2FnZSI6IiIsIlNpemUiOjEsIkNzc0NsYXNzIjoiIiwiVGl0bGUiOiIiLCJUaXRsZUNzc0NsYXNzIjoiIiwiUHJpbWFyeUJ1dHRvblRleHQiOiIiLCJEaXNtaXNzQnV0dG9uU3JUZXh0IjoiIiwiQ2xvc2VCdXR0b25UZXh0IjoiIiwiUHJpbWFyeUJ1dHRvbkNzc0NsYXNzIjoiIiwiQ2xvc2VCdXR0b25Dc3NDbGFzcyI6IiJ9LCJFbnRpdHlGb3JtIjpudWxsLCJUYXJnZXQiOjAsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MSwiTGFiZWwiOiJEaXNjYXJkIGFsbCBDaGFuZ2VzIiwiVG9vbHRpcCI6IkRpc2NhcmQgYWxsIENoYW5nZXMiLCJRdWVyeVN0cmluZ0lkUGFyYW1ldGVyTmFtZSI6ImlkIiwiRW5hYmxlZCI6dHJ1ZSwiQnV0dG9uQ3NzQ2xhc3MiOm51bGwsIlN1Y2Nlc3NNZXNzYWdlIjoiIiwiQWN0aW9uSW5kZXgiOjYsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjoiIiwiU2hvd01vZGFsIjowLCJGaWx0ZXJDcml0ZXJpYSI6IiIsIkZpbHRlckNyaXRlcmlhSWQiOiJhMTUwMjJhNS01ODJlLTQ3YzctOGFjYy02ZTRhM2Q4YWZiYzkiLCJCdXN5VGV4dCI6bnVsbH0seyJNb2RhbCI6eyJMb2FkaW5nTWVzc2FnZSI6IiIsIlNpemUiOjEsIkNzc0NsYXNzIjoiIiwiVGl0bGUiOiIiLCJUaXRsZUNzc0NsYXNzIjoiIiwiUHJpbWFyeUJ1dHRvblRleHQiOiIiLCJEaXNtaXNzQnV0dG9uU3JUZXh0IjoiIiwiQ2xvc2VCdXR0b25UZXh0IjoiIiwiUHJpbWFyeUJ1dHRvbkNzc0NsYXNzIjoiIiwiQ2xvc2VCdXR0b25Dc3NDbGFzcyI6IiJ9LCJFbnRpdHlGb3JtIjpudWxsLCJUYXJnZXQiOjAsIldlYlBhZ2UiOm51bGwsIlVSTCI6bnVsbCwiVHlwZSI6MSwiTGFiZWwiOiJBY2NlcHQgUE8iLCJUb29sdGlwIjoiQWNjZXB0IFBPIiwiUXVlcnlTdHJpbmdJZFBhcmFtZXRlck5hbWUiOiJpZCIsIkVuYWJsZWQiOnRydWUsIkJ1dHRvbkNzc0NsYXNzIjpudWxsLCJTdWNjZXNzTWVzc2FnZSI6IiIsIkFjdGlvbkluZGV4Ijo3LCJBY3Rpb25CdXR0b25BbGlnbm1lbnQiOm51bGwsIkFjdGlvbkJ1dHRvblN0eWxlIjpudWxsLCJBY3Rpb25CdXR0b25QbGFjZW1lbnQiOm51bGwsIkNvbmZpcm1hdGlvbiI6IiIsIlNob3dNb2RhbCI6MCwiRmlsdGVyQ3JpdGVyaWEiOiIiLCJGaWx0ZXJDcml0ZXJpYUlkIjoiM2JkMTU4ZDEtNGZhMC00ZTc4LTgzNjgtZGRmN2Y1MGU4OGYzIiwiQnVzeVRleHQiOm51bGx9LHsiTW9kYWwiOnsiTG9hZGluZ01lc3NhZ2UiOiIiLCJTaXplIjoxLCJDc3NDbGFzcyI6IiIsIlRpdGxlIjoiIiwiVGl0bGVDc3NDbGFzcyI6IiIsIlByaW1hcnlCdXR0b25UZXh0IjoiIiwiRGlzbWlzc0J1dHRvblNyVGV4dCI6IiIsIkNsb3NlQnV0dG9uVGV4dCI6IiIsIlByaW1hcnlCdXR0b25Dc3NDbGFzcyI6IiIsIkNsb3NlQnV0dG9uQ3NzQ2xhc3MiOiIifSwiRW50aXR5Rm9ybSI6bnVsbCwiVGFyZ2V0IjowLCJXZWJQYWdlIjpudWxsLCJVUkwiOm51bGwsIlR5cGUiOjEsIkxhYmVsIjoiU3VnZ2VzdCBDaGFuZ2VzIiwiVG9vbHRpcCI6IlN1Z2dlc3QgQ2hhbmdlcyIsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjoiaWQiLCJFbmFibGVkIjp0cnVlLCJCdXR0b25Dc3NDbGFzcyI6bnVsbCwiU3VjY2Vzc01lc3NhZ2UiOiIiLCJBY3Rpb25JbmRleCI6OCwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOiIiLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjoiIiwiRmlsdGVyQ3JpdGVyaWFJZCI6IjkwNWJhOTk1LTE2MTYtNGU4Ni1iMjAwLWNiMmJjZTgzN2E0OSIsIkJ1c3lUZXh0IjpudWxsfSx7Ik1vZGFsIjp7IkxvYWRpbmdNZXNzYWdlIjoiIiwiU2l6ZSI6MSwiQ3NzQ2xhc3MiOiIiLCJUaXRsZSI6IiIsIlRpdGxlQ3NzQ2xhc3MiOiIiLCJQcmltYXJ5QnV0dG9uVGV4dCI6IiIsIkRpc21pc3NCdXR0b25TclRleHQiOiIiLCJDbG9zZUJ1dHRvblRleHQiOiIiLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOiIiLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjoiIn0sIkVudGl0eUZvcm0iOm51bGwsIlRhcmdldCI6MCwiV2ViUGFnZSI6bnVsbCwiVVJMIjpudWxsLCJUeXBlIjoxLCJMYWJlbCI6IkRlY2xpbmUiLCJUb29sdGlwIjoiRGVjbGluZSIsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjoiaWQiLCJFbmFibGVkIjp0cnVlLCJCdXR0b25Dc3NDbGFzcyI6bnVsbCwiU3VjY2Vzc01lc3NhZ2UiOiIiLCJBY3Rpb25JbmRleCI6OSwiQWN0aW9uQnV0dG9uQWxpZ25tZW50IjpudWxsLCJBY3Rpb25CdXR0b25TdHlsZSI6bnVsbCwiQWN0aW9uQnV0dG9uUGxhY2VtZW50IjpudWxsLCJDb25maXJtYXRpb24iOiIiLCJTaG93TW9kYWwiOjAsIkZpbHRlckNyaXRlcmlhIjoiIiwiRmlsdGVyQ3JpdGVyaWFJZCI6IjIyZmMxODMxLTJiNjktNGU5MC1iM2Y0LTUxMmE4NzZhMDUwOCIsIkJ1c3lUZXh0IjpudWxsfSx7Ik1vZGFsIjp7IkxvYWRpbmdNZXNzYWdlIjoiIiwiU2l6ZSI6MSwiQ3NzQ2xhc3MiOiIiLCJUaXRsZSI6IiIsIlRpdGxlQ3NzQ2xhc3MiOiIiLCJQcmltYXJ5QnV0dG9uVGV4dCI6IiIsIkRpc21pc3NCdXR0b25TclRleHQiOiIiLCJDbG9zZUJ1dHRvblRleHQiOiIiLCJQcmltYXJ5QnV0dG9uQ3NzQ2xhc3MiOiIiLCJDbG9zZUJ1dHRvbkNzc0NsYXNzIjoiIn0sIkVudGl0eUZvcm0iOm51bGwsIlRhcmdldCI6MCwiV2ViUGFnZSI6bnVsbCwiVVJMIjpudWxsLCJUeXBlIjoxLCJMYWJlbCI6IlZpZXciLCJUb29sdGlwIjoiVmlldyIsIlF1ZXJ5U3RyaW5nSWRQYXJhbWV0ZXJOYW1lIjoiaWQiLCJFbmFibGVkIjp0cnVlLCJCdXR0b25Dc3NDbGFzcyI6bnVsbCwiU3VjY2Vzc01lc3NhZ2UiOiIiLCJBY3Rpb25JbmRleCI6MTAsIkFjdGlvbkJ1dHRvbkFsaWdubWVudCI6bnVsbCwiQWN0aW9uQnV0dG9uU3R5bGUiOm51bGwsIkFjdGlvbkJ1dHRvblBsYWNlbWVudCI6bnVsbCwiQ29uZmlybWF0aW9uIjoiIiwiU2hvd01vZGFsIjowLCJGaWx0ZXJDcml0ZXJpYSI6IiIsIkZpbHRlckNyaXRlcmlhSWQiOiIwNGEyMGQ5My1jMzVlLTQyZDctYWI4Yi02NDE0Yzk4NzhjNTUiLCJCdXN5VGV4dCI6bnVsbH1dLCJBY3Rpb25Db2x1bW5IZWFkZXJUZXh0IjpudWxsLCJBY3Rpb25MaW5rc0NvbHVtbldpZHRoIjoyMCwiUG9ydGFsTmFtZSI6bnVsbCwiTGFuZ3VhZ2VDb2RlIjoxMDMzLCJNYXBTZXR0aW5ncyI6eyJFbmFibGVkIjpmYWxzZSwiQ3JlZGVudGlhbHMiOm51bGwsIlJlc3RVcmwiOiJodHRwczovL2Rldi52aXJ0dWFsZWFydGgubmV0L1JFU1QvdjEvTG9jYXRpb25zIiwiRGVmYXVsdENlbnRlckxhdGl0dWRlIjowLjAsIkRlZmF1bHRDZW50ZXJMb25naXR1ZGUiOjAuMCwiRGVmYXVsdFpvb20iOjEyLCJJbmZvYm94T2Zmc2V0WCI6MjUsIkluZm9ib3hPZmZzZXRZIjo0NiwiUGluSW1hZ2VIZWlnaHQiOjM5LCJQaW5JbWFnZVdpZHRoIjozMiwiUGluSW1hZ2VVcmwiOm51bGwsIkRpc3RhbmNlVW5pdCI6NzU2MTUwMDAxLCJEaXN0YW5jZVZhbHVlcyI6bnVsbCwiTGF0aXR1ZGVGaWVsZE5hbWUiOm51bGwsIkxvbmdpdHVkZUZpZWxkTmFtZSI6bnVsbCwiSW5mb2JveFRpdGxlRmllbGROYW1lIjpudWxsLCJJbmZvYm94RGVzY3JpcHRpb25GaWVsZE5hbWUiOm51bGwsIlNlYXJjaFVybCI6bnVsbH0sIkNhbGVuZGFyU2V0dGluZ3MiOnsiRW5hYmxlZCI6ZmFsc2UsIlN0YXJ0RGF0ZUZpZWxkTmFtZSI6bnVsbCwiRW5kRGF0ZUZpZWxkTmFtZSI6bnVsbCwiU3VtbWFyeUZpZWxkTmFtZSI6bnVsbCwiRGVzY3JpcHRpb25GaWVsZE5hbWUiOm51bGwsIk9yZ2FuaXplckZpZWxkTmFtZSI6bnVsbCwiTG9jYXRpb25GaWVsZE5hbWUiOm51bGwsIklzQWxsRGF5RmllbGROYW1lIjpudWxsLCJJbml0aWFsVmlldyI6NzU2MTUwMDAxLCJJbml0aWFsRGF0ZVN0cmluZyI6Im5vdyIsIlN0eWxlIjo3NTYxNTAwMDAsIlRpbWVab25lRGlzcGxheSI6NzU2MTUwMDAwLCJUaW1lWm9uZVN0YW5kYXJkTmFtZSI6bnVsbH0sIkZpbHRlclNldHRpbmdzIjp7IkVuYWJsZWQiOmZhbHNlLCJGaWx0ZXJRdWVyeVN0cmluZ1BhcmFtZXRlck5hbWUiOiJtZiIsIlRvb2x0aXBUZXh0IjoiVG8gc2VhcmNoIG9uIHBhcnRpYWwgdGV4dCwgdXNlIHRoZSBhc3RlcmlzayAoKikgd2lsZGNhcmQgY2hhcmFjdGVyLiAiLCJPcmllbnRhdGlvbiI6bnVsbCwiRGVmaW5pdGlvbiI6bnVsbCwiQXBwbHlCdXR0b25MYWJlbCI6bnVsbH0sIlZpZXdSZWxhdGlvbnNoaXBOYW1lIjpudWxsLCJWaWV3VGFyZ2V0RW50aXR5VHlwZSI6bnVsbCwiTW9kYWxMb29rdXBBdHRyaWJ1dGVMb2dpY2FsTmFtZSI6bnVsbCwiTW9kYWxMb29rdXBFbnRpdHlMb2dpY2FsTmFtZSI6bnVsbCwiTW9kYWxMb29rdXBGb3JtUmVmZXJlbmNlRW50aXR5SWQiOm51bGwsIk1vZGFsTG9va3VwRm9ybVJlZmVyZW5jZUVudGl0eUxvZ2ljYWxOYW1lIjpudWxsLCJNb2RhbExvb2t1cEZvcm1SZWZlcmVuY2VSZWxhdGlvbnNoaXBOYW1lIjpudWxsLCJNb2RhbExvb2t1cEZvcm1SZWZlcmVuY2VSZWxhdGlvbnNoaXBSb2xlIjpudWxsLCJNb2RhbExvb2t1cEdyaWRQYWdlU2l6ZSI6MCwiU3ViZ3JpZEZvcm1FbnRpdHlJZCI6IjAwMDAwMDAwLTAwMDAtMDAwMC0wMDAwLTAwMDAwMDAwMDAwMCIsIlN1YmdyaWRGb3JtRW50aXR5TG9naWNhbE5hbWUiOm51bGx9LCJCYXNlNjRTZWN1cmVDb25maWd1cmF0aW9uIjoibEVXeitJQTRMUzFQVDR1QVBLZDBlMUNkakdyeld3TmlBWEpiRUcya1pyMDdJZTN6eW9vekkzS0lGV0NDbXBseEVIcXpPaVBGYU9yTklSNGd4MldMa1RLU2lzR1pWclllc0RUeWQyK2c0cHg2cEc4d2l0eUVjdnF3WUI2dm1SUG84aWZORlU4WFJGWkRNT2VaYTBhcnVSeElxbEtjc0xycXV1N2tKNW9vL2hnUTlCRGZXUElhajRVMU51cE55Qm9CMUdaOVV0Um5Ya1ZNNEZVL2l2YXI5ZUoxMnpiOTRvMWFlVzMwZlpnUGszc2hJaXFITmNMaW9vc3g4WStYS2Y2N1dhWmJCSWN3SXgvRStPMFVzM0RyU0ZOTGVzTTBCQ00xQm9nMVVyNzdxeDZpSzUwL1F5bzBOUGd5OFJDMitWWkZwMFhWYk50ZGVVWDlwVTZFdXVRT09rWlJlQW5TTEhZRnNpRlVSV0lWL0YzUjkrTjRHWVhOdkhMMjM0ekUvb2J3b1R6RDBwWlJrUUZkanVtZzU3ZTVmdVRNdnduZWxtSUhXQWFWdUcxdVNjM1NvYVptWk0yUlM3RGNUZHd5K0FQaXFTRXN1SXJtM1V3cEw5WnlhYndHZGVuby9XSjlxYnA1dHl4QVk1SVpsanFZZjM3ZGtRcHNOMFNmaGpMR0xrRDlDVGV2aU03d1dyWTJhdGpIUUU4a0xtV3hHdFp3QnltWHFPZjJweU1yS3pKSzAxRFVEVnpCcksrYmduWDUzWHp1L25VemJRbW5ZcGg5THhuMlo3VEhxVUxJSjRDQWJKNHRQYW84RExMR1NSMERneDVlSUhJOHVGVDA3Q1kweVJDbGx4M2R0dFoyUWNZaUo4TUorSmNWVDFZRE4rOVdXUTFwcHBoMUkxQ29XSUdESlFRR25VYjJQWVhjVFk3UWJjV3VjclNpcHB1VjYvVy8yT1lqZWN1Q0x0a043WWtXbEkzZlRQZUo2cHl6UHpFN0I3L1d0Nmp5anZrWTNPYzRScDlIeXhmeFNEQ2NDTUpwR0xMTFhMalJTaXZuS1J0bjFLeVJSanJDZkNFUWl0bGhxZCtPMWsyaFRjbGd0Z0Zjb2VwOE9zbUtPTEJ4RHZjNjJZbEVJWWxvREFMWmNoQXpBWnQ3Q3orOFZRelF0alM0MVp2czZhdVRNRXBQSG1DYTVOMjRxRStCRWcrZG1RcmVBeCtOekVhNEdmWDBwd2hSMFdCb2NQZ2F5M2Y3TUpHV1l0N29YLzJscnlzQnJtZzNKbm5oeFlxYmM3TkRLZFBBVGtOTjEweEcrTVNPRE5EbnFxNTNiZC9FbmpNK2tjNzljb2UwYms4RUtyZi9UalBkVXJjWXdIcWpnN3V3T2lUbzVhdlpzMGc4U0dqYlcvY25aTnk3RUxVdm11T1ZsNGJmOFFQMEpYL0UxQ29IY0dzVlBjV1pEc2QvbEIxOWtvdGhiQldxZmJSVTBSNnhWMjdaZWF3aWJNd05QOFg4U2hranBMRDVQcGZ2a0ljMktyUzFTRjdqSzhIMFdaWnRsMGVLTW44aG9vc1ZtSU9sY0VEY21NZ1o4aVp3SGhQakgvekFTSmJwOWZ4ZFJReHVWaDR4MWoyOUFPczhnMWVObkNMRHZTeWhLaE0zQ3RqSnZEZ1hsVDNLVmhlT25SMXJYeXRqRHBCM1RoMjJOVW00RWFmRDl0R1Vvek10L3ovMGQwTjA4LzRlcDdId1lZVUN1YmpkVE5zakgwMFhscXJVYjFDUE8xMHNvMlJ5dnIyK3JmYUxOVjFIU042eFNzNTZkNGtYT2o4enBhOGlsVmR5cUhvQVRoVy84eGl0K3lINkxnY2gwc0hWcDVCY3hOWGh4bjlxK0JRcTFlSFhWd0Z6N3FobTdHdms1RjYvc2xIN0N4M29aS3RrWEt4cm1nTTIwMjRGOEpTVk1XK0dleGVuV1JRNVduNlVXemx5cmlsUWlHMU11alNiSEFjVzBKaHhucTVSMkVxZXhFY0ZIZ1l6UXdIZUdiYmVmNVhxcWo2QWk0cDVXN0VqenlmN0JoNEIrM2JzdlFOeWFCY2gzSnRya3Z2MUdNcEp2Zmdsc2tYVXpudnFFOE01ZzdsMXNZejJKdHVQdll6bHd6emQzelp1Vnp3QkdQNTRqM21rWDlpWlplaDd3M0NQdmY1NFBKTzcxSVNsbFdyc3FaaE5JUnFIN1dORnF0RnhwM2VBSjZPUlAweHdWZ3hXMFN0SldDNndZZGtkdUNVY0tPVTFSNVI0ZkRIZmtaSHFoYlJDY0ROWnM1dDJTaCtNZWJPRk55TEI5Yk5jTnlWbzcvb3JhVnRhRUV6WUdiaSs0Y0syRWwxcnppeS9jd0k1YWljcDllYWN3THM4ZTYwbTZxT0pjamM5Q0Zka3hRREFMcHFBVHBXdUtvYkRZNS9wbC9WVjhIdGV0azV3ODNwRDY1bTI0cUdTSmdKbGo5ZVY4TjhzNHBrV0llVG9ZTEdCSWd6Y1I3SGJNSmJsdVkzOUZTcTZJSEhPY1NrVWhteml6MzhIcDU0NzVZUWp4UkNYSDg5eU10RktjaXhCRmJxZFIxY0ZpUjlBMkQwQ0NYbjdPS1VJTlNlRUNoOVBoUTJkYUhtRktGeW9aRE9TYXorem5BdlRtQy9wN3pvUTlINzBzUjVMRWdtOE1WaE4zMVViWjYwcmdqWEorQVdvTmtjTmhzWGdnaXp1Y3RLL3BHb3FOUlh5aXlNRk9sa1JlVDNpVFp5MTdlWlNyc01HUFpPYkwyZXJMYXpmcVBMcEdUek9qa1BVam40MmMxWTNZNGdyOEoxNUdqaWVObUNuS244eWt2eFoxUW1pb3B6RlQxMEtUTFlob1h6aFBZbmlnaXFEemhzU3paYjJCbTBNQjlpUmhvU3c5UHN5QzhPQzBrMVJJZncxcVg2dGpjRndiWE9TOW1TNE1UQmVjb25GTkFWU1k2bE1YemxrcXo4TFc4bitnY3Q5SGx5SnlrQTJZeG1QR2diZldjUlZZYjl5eGtyK01rZWJUa3lJMHdRMnhnRGFBOTFpMGQ0ZUJUZmxvUmZFUFJhY3BPU1dtazk1Yk13SWM2NWRJenlFeW5TNFFyL1FCWDFuTVRzWFhTWmhFTFdCR3poOXc4bWNaZTFueXRWVTI4VlB5RXhzbTR1MU0rUUhvbi90aHdQRmhCMHBsT0RaMld1dVppVG9VTitqc0xaWEk2QW95OTJrUk9HcElaQ2F3b1V1dTVSMDQrbGtiSmFyRjlzMEdKQXRibVBBMmJyZ2pYL2ZxclhUVC9obTBLWHZGeVh0RFkvN2M0QnpFVnc3THVmWjEvUmVaTDlKOE04UVNwMlRqM2NwcHcyMit6d3VtN2tyTGlqckIxZ1RkZEpnNzFhS213R2lzY1o5TmJjd09EUzY4OTBVYUMxQ1BvNlZINnMvWUdCSmd3aUFHTEdsSnpJamZWeUsybTJwbnhqWDg1dzluNHd5WU9xTHpwWmNQNUZtSDY4Q0ZCQVJYd2xqbHNpU24zb1B4dDBjcTc3b2U2bHMyU2RNUFZkVzR6Rk9GTFU2SGptOWROUjloMGpFTnhzV29PN2dTQit4cmxLZ0o5bnRVbGJrVFc3UTdVSGNWSDUvUUhaTXVNUHI2TEVOa2s3OWRWNXoyMFBwd2lVRmJ1ZzkvcXVGZjV4aE1zRHRGUUVJUk9XR0hqbTRhZ0g0aWJYNWl5aDRYZmhWb2tOb1ZkOWxteGdWTDUyaEpkQ3hkUlNGOVk2Mmc2cC8wVzc3dDRGMHpXNXo0RWJEbUxWS0NOMDYrYllTTnFMM0Z5U3FTUUx1UDRlZmFJQTl4elFSelZkUlUwTldnSUdUeXNINHdFYXY5QURROXh4VmZDWW82d256SVBWTVJySkd4a1Z0dlhma1hGV2pvaEpRdjQzZ2VudXJIeHdGbWpxeVhGTmh3Y2xOd0F5a2ZoRHZ5Nm9xODg4Ky82SURJV3I1clhTTTJaNmxuTTdCazdKdGZDblZyNENPTm0xQWMrbGY4bkVocXVmM05ULzlXcU1qdHRJMjI1bGE5d0Fac3dya2lTemJvMFpVR0xlb3pqQmgxM0h0YlIxUWJMelROMDUxYUp0VWxNQUJyMmhmcCtPWmtINnVIbHR0enFVSS9FREFVREdIei9WUnZXL2x5NndtWTZ2ck96bU1xRHFGYktPYWNkcCtnWityWW1sa3ZWZTFNV0JkcHJjdU0rdDlJSDdZYjZEMmZPSjJiWkJqbm1aZGt3MUNjc3dMcGxtb1VmZWRNdTNSUkNlMk55WmlWK29mNkJxVTZQNjRTRTJXYnQvTHdtSktZdHhRYjZTQlFPUHhxMzRsM29XcjZJVmprUzAxYTFtTlZHVVF3d2ROY1BuTzUwc0RRaG42SjlPNENFWGNEVjBoQkxna1d0cDE4OVVob2RSVDdVREtLTGFqTDJodGh3ZmViNUljaHp2YnJkakJXTWNSaEo3WDZEMjl5QnVIVVFDdkE1Z3BGdjAxaTM5YkJ2Y1JmZEJZVHRjN1VoSHFSTm1nUmIvZnR3WEQvcTNaNHBsdXBDTlhyOUdrR3lkZDNxM1U4MnRMa3lPblJucUZ1YzR0TCs1THBHVWwzVlJ1bXJMeEx4RVVUTW1qUmw3RnNQcERaOHoyeWNkc0kxTFc1dnJabDIway9oRUtRVUoydUNhd1VHMFBhNXgxQ3JjMkNyOWR6Zys3QUNnSGVlOUNYaVUzdk9wdDEwQTJLbDFqVDNQdGR2SmFVZE9LMUM4NjdsajJvczlGYWFWeWtma2x4LzVqOWRHTkhpdjZ1aW9SQzhTajhMMXYrWU16aVZ3VFJsK3AzMitnWDJXalBSTFN6bEl2MVZ6MGxiVE5IMk1DWVJxMTgrVkJWTndqU2Y5TVcwTDhudnBpUm9HUTkvWE5QNHpKMzZJRSttVGdOaVNwWlhsRmFHL0FUa3FSYkR6MDRkb0RPZkJjazlPV1NNRXgrWEx3ZTRuSkxGUm1kSFhLWUNNcVhwSHJhampMcmtyTmluU2V1NEI4VEVXc2FiWEhTVFhXVTB0WkJGQUVuSEdLRTNUd2c5blpqcDlPY1lKR3k0NU5YWkxwWUx4amNINUlnY1h4RWFoT1JPWHE4eHVUNHdKZGlzY1VUcEdIR05Wa2tON2MvallTWHVjR1JNeElDSDU3TUxKejVWTXNFM2ZkUDkvYjdHT2F3S01wd3BmT2gxU1k2YlFOYS9YblVGMnZmdUV0QUhCdEQxS05mY1Q5WVBQeFk1V0pQSjhNczhmMmFBeVdUSkZkb2lmYW96Wmw2MDlqMFVFUmtsOU5PZGZZcWhDZm8rYTErMGQ5dVFjeFlSbUJRWmRDdU55enExTHVjZGJseDhQb1lHL3hWbmljOEdOM016L3hkSUVSaEZrK3grdjROOC93cWsrNzd6d3JVaVNLQkozNnVqRHVSQ1ZVRk9MeFk3VUR0bjl1U1NXTWFZeU1rSG9RU05qa010SWIwKzB5NkdiZ1VHUUtvNHVlWHRwMVlkUzRqSHFWalAyUUNMRDZhZ3MwM00vZVdPNEZrVXZOcDVJUzZjMkpSeTNzSE1SamlFTUVTcUM3MTU3SHBlSko5TEF1SFM5Ni9TTmVWVzU2UVhFWkloMjZKWVhsQXlFc2p6RVBHcFY4ZTY2QTlxbC9uUk90anl2NGNWbHFDYTUzeXoyWjlqTUFPN0ZaNEluUmpGMFBHMlRndTRqUUNRY2svRy9NanBZcUJOaU84V2xlSXFBMzYzSHRtS25xbHlGdUpDTlR3cTZMc0lSc1NUWENjMStSS1pzU2wyZ1AwTjdub2lpVnQzMURFenNpL0crZmxxWFB5VlhLdjRZeVpQejUwZDRvalJHKzBMRFJWdmNVWk10czhreUNaZkxGdUZ6TFVIVnJ4OUloTDZMOTNRRE5wMnFJakxjZ3pnR1dPQlVldWJJM2hSTXk4ZGNQOHRxeFhXVGsyS1Y1Sm9XWnJlbUNGOElEQU1na0g5K1ZaQ1I4V3NROWdtb1ZSQW9sWEVBNzBacTBTT1duZ041ckRPbEpuTjBJdWkyZXJ5NTlmZHQraWhLeVZaWjQzU2dwNkM4eHkyQmluV1JCUmF4NXhnMUROcllNS1BPYTlQV0FCMks5bUIySGp5MEQ3eVA0NGNxek9idnlqL01uYm9PK3ZEQ2x5eWdwOHJHSE5nNFNTVVkyRVM1amo4akNjLzBlenRFZ2RGcUs5RHhRcy9oaysxbkZUZlBqRXZudWJUOW95YjNQTHlxeGZyeTIzNGU3eGhjbWNmb0VpZ0JDWGZwZ1FsS0ptNkUzNmJRRjNCQnNmTnFKR3Brc0NFWDdzODRQZGlPUmJnTkNJWGRVZW81Yy9OR0xHbU16UUtxSUhFZi9yUDduSGVSbTFWV2JIL21adEcyTkVIWWJKSUV0dncxV09JQS92ajV3OXdmL3gwOG5SL2pWcmQxQWJGMWo4d2o4blg2Z1VmQ20yQ1hwMG4yNUhQNEcxZjIyYUw2bG5UYzNwNmNGU0Z0a1A4Y3JhbHpETDZSWWduQU1xMWh0RVhLUWZ4RGtYQnFNeDhOTG5KeUkvcEJpVDRuODBuZGdVS081V1cyK3R1b0dRSG9wZUZhVlJtWGxpVlExUGZiKytFZlN2QWdvR2xkZytnTUF0MStaa0tFN0QxQlNJcENZMXBRNU02UUd3T1hLNitHSkdENzBNR2psbHA1QVk5WUFxUXZMSFRqQUdwVFc1dzhIdmZyOUV2TUlWaWxDY0V6TXRrT3YrbmdVYUVaNnZQZ0hCaGMwT1VjZEsvR0hXLzJaMU1jTzU4c2VVN2hNNHo4SzRWQWdrblk3alZFMXVkZTFza2JiNkJYeUQ0TXNuSzl3WWpSY2p2bHErOFVyaHNxazVqTnl3RnpwL1ZUZ2lEck5VMWIxK2dMNEFJSjNSaDV5M1RCSUFoTXdwMmdPUUJCc2d0Y0lSNUN1R3lyOXhleUMxQTcxZ0loYitNaGwyb2VXYkhmSlljak13N3dXSUpWTWw2SnFqcUZ2cHJQMFdIZmdUMy9YVVpDUGozWHhTWHErK2UvU2NKZDh0YVhxZ3MwYUE5YlBLZmdUa3VTQmRiemg0TzcrQlhDTkdEK1AzMHNrRFAxdDhrRGVwSW1rcXY1Z2lycDJzMnlJdy9TSDRNUkdkOU5NWGppcWo0Zi9zV0UwTWFLa1lGNkgrTnpNOVFxT1dNZ1N6VWM1dXh2MXorMVNqaVRqMDRWYXBBdnM0aXVlaHVtSE9EczZmWXlWayszVmVtc1BZT3FvVUE2eHp0cndvVkRrTXRBOWd6N3J1SGllQk9aSWg1WVZuR3U5RUgyN0Z6WkVZd0t1di9OdGs5SWpVRGlFbXkydklZTVJ2VW82N2UxOG5nZVE3SzhGWlhGL2xkR0pMaDZIeEIyQnJCV1I3V0Q3RW1tbGhEYWY3eThSZUN6RjlGckF1ZXVWYXpSc1RoTkdSakN6dDNCTzF0M3k2dEpReFNCeUVack5KRnNRTm1KajNQSFpic1BnaTl0Z255QmdRM3o2bDdWOGVaU0kydE1YSDIrUUcyK0xkYnlPTlR1WXlxQ0IySkRMM3A5elZ2dlZNdzhRd0J2OTBSZHQwOHIwc3BqMFJDbDNwWnJ3YnQ2eC9qUXRtUUp4THQ1MjBoRmd6dkE2ZzJzcGxFWm4vTk5lKytvdmswMVAzaTVCTHllNkNZYzNicWprdExrWHBsbGpjUUI0SnRKQnhnSWpwbngzaW81eWlZd3RVbG1wdFZ3SEhrWDJnM0V4ZkxQSEkwcTlvTGF3dlB4V21sUkdkZzhkSGdwZ1lWazZYY1lzblNKOGRVV2J5V1Z4ZFN2eTgzZWZKT0lqcjBaWG5UY3hEUFN5QUp4YmlVUTNtaWY0ekxUVFJrSDhjc2VRRExSQjVLZFVtZENKSnZZV21aRm93eFpxclFqYkpVbkw0SUtYbUZUdjRrL3lCTm1zbjlhUGw2bWRVTFZOY0xGQ2RKMlp4cmpGTVYxblBmNVY1azlFcWZoYURFdU9TSUZER3FJSy9vZk8zamMxK09iK3dMUzJ0a3JnWFgrWmFuRUJzVkxVS3RUbUYvdlAzNWYvUHdjWHE2akNtUUtocVlOeEtCSEdxTVFoclpUNE0wL3ZMelg3Q0FBV3ZGSFhLS3AyWit5aEQrZ1FvTDkzUktuV2h0NU5YNnI4bFBKTnhMNXBUaGgyV3pUdGdUWGxENVdtRDVBeWV6NmRYbU15eWIxUVFpcW44RTFtREkrU29SK1dlK0lUR3NpU0NSNnkrc0IwOFRocE5BaXd1UDhsNU1rNzJQQ3hQWUdTMmc5TlVtSTFxNVRoQ1Z6WUpSMzF2Y3RyS2FiNzFiTjFEeFZCYjdMU0JadDQydVJqZW0vb0V2V0FiKzVlQ2dhMWtka2VQNVlMc1NSUmhmTTNtaFl6SFVKZUFNV0pROW9VeWZKaGdqK2RMd25oYkROSjJMdHh4RFYyZnBSdjI5YXV0VDFUQzNmZ0RYTVNZNGkySlRrcVFtc1FCM0xmOVVxSzkvNTdJYjBGMVl5eGdFa2NiUlVicXBuUWh4N3ZUYUpzTDF3ZVRSdlBGTmhSYUQvaG9sM01HY3hkN3Y0Y0hSczAwYnJyNENhRkVycTkram9BWVNCUTBwZGJCcmM3NDRjK1ZZVkdtWGFjY1JNMUl1bE5XR05BMXNvc2ZmaERLeGdLWlNGZ3cxcGVFd0FPZnZ1QlFlN0l6RXNXSHlQalUrOWNBdEhLbkdnYzJOeDczMGhRUy83YmVndGFQV3pIYjJRbTRyWThBZUpVamxXM0t5S2EvWlZ5MTFwWkFkRWpQV1cxQ1RYRzRxWEV1SGRKYzdKYkI4N0RXemN0cVQzVHpuTnNMV1BxUTVnZ2VQdUtueGxiMUZHaFFXbTloK0FiTFJOb3JraUt5MmRQMXRKK290bUROamZUZ2ptTU4ybkVOM0M2by9LbWs2ZjNncVdHcWxHU3BsSTlNeDY4MmN0SDg0QVlpamo4Y2crVUFwWFVyVkZENHQrZTU0Wm5jZ1JzMUpyRHRNMzlxNGVXOUVmRkpweHU5OTFMTDJwQzFUcG13aWZwWkc0ZUQydytUOTl3QWMzcm8rS2RWQ3pHdEF0bVJOUS80R1lyMDd0eStiajQ1ZzYzN2RqOE9yLzFIQ2NvUlRiTGE0K2NhUzBQY056REdvaFJhb2x3WEdZTWtuR0VVakNMV09CQUdNcTJJb1hJOS9MYlV3RjZTQ3FydjFwbmh1RHFhVVJuQ3UwdzhpTjRQK1ZnazI4YUU5TTgzWWEyUHJ2WDZwVjFuYmljdVltWFQvb1JxaW16aVhWdDFYYWFZWHoySUV6aWtaemQ5dVdZMHdUTmNud0lRTU1XS28wc1kyc3ZobkFBWFlJQXJJbkRMY3BRMjV4ZDVXN1YrMVBreGJEcCt0dE1mblFvbDVoaHJleDJZMXlnY0RMaWdSZTM1TDR6cC9aUnVzK2VXQkE4M0NTTnI5d3pvSVJzNTI2cGZoNDRQc1FQN21oL00weGp2N3l0MXRvR0hhUlN0ZDZDTWIwU2FBN3JNSEVTOFc5eUNHMnBpaU9UQ29IeWZFbHdSdGx5Qm9XQWVWSmVDTmZORm9SQkdQYlZ5WTAxOCtQZEl6bGNlUm5PWDlkUXZubFF5NExRdEtINmdmdjBRNXA3aWgxa2NKVlJlTGZldjN1QzlwWmI3em9sQkZpRmV5VEFZWEl4bnJlTzBab1NQQWlUK0R5d3lpU1QyZnFadGNFbnNDVWVNOHpEMmJzRzU2T1FMNlZEQVFlVzVnUFN1SjVqeEMySy8yZXUrdnZNZnNEN1hjMFRITnZDVWMvVWZaWVdwcjRFV21lM1lrUDBkd2hZYjgyRURNandqbFBObWpCTGlvaS9jYzJlZ0pPQUZwdFcweXF4ZGFFZlR3WW5WR3ZNSGRPeUlKRmx2cmllT2FWTXhuYkFMc1BkbkNjMUtaV2RsalRtdFRQdllPUmNyZ3lvNkhXaUQzaVRRU0NXVmpTZklSdGVzWTZzYitsdzl3QXJmNUY2OXg4T0c2R2NFVTNGd2QyQ2R3UHIwdDhaRHNDcUxIcjREZEg5dENOYnZEVlNqMVhiOWF5bzN0Y1FWdzJWNFQ5KzNCVnlEb1JSalIweWpyVlhwSnFzN3BKcU51cXdmY1JiWDF3VmFPQW1vNk9QcjB4dHgwNWMvRkVoOTY1bUtnRnJ4TGhOeTlWeFR4N3RITjZvckdTVjFJTDh2L1FaZU9BcEZrOXNXWmNEbzBZV2FPRU53ZE9GeUVwSFo5b3NVbnlHNmh4cHdLVXo1RDZPaUYvaC9RaUtoSjdzUlB6RWRIV0ZPUnRKMzRLZFBTSFBLT0hIbTYrMXQveGg3d3dGZTdYa1NjNW5COStocDFXMDd5UHFMcHo2ekR5emw4bWxMeVlyQWdZbENWY0F0RmJTRWlyRm5TUXloNWM1bVpJS0JVS2hDZlpiR2VmdkdUcmlLTzJmM25XZGMvYzZ3aDVXQnVRYUdVN2dwaExZQkNYK1JIRXhSZ0JkZHJGMjByMVIwWlp0dTFTR1BmWXFJNXBKbXMyR1hhb2RoZk01QmVpNlZkS3FiNEduYncrYVhabmZ4VkRMWjdiZXlvd1N5RWtkVjREVmNyVFNiUHFzcWFxaWJISk4xNnFXSlBmWHZRQnBqSUZ0ZmhEbEc1WlkzT1ZIZU8rQnRwbWZ4eTlRMzY2L0lPVndkQ1pCd3RZR2k5aWZEU0JHT1NLS1laWkdHc3hwQ2lLTjBjRUhKQVl6aEJjQm9ab1lZUkxyb1J0cGZNUnlNNXErRE9CaW82dTJJNmhyMms2alc3cldKaThBNFBoaHBHZDVwTVZ5L2N0QzJRWjZjc21nWEJLdUh2ZjlQb3lXSE9rWUtpeVVMTGRnUWxvbjBtenZZT0NXQ25mOGN3bWROSEZRYUl3N1lIT0dRL0g1SGZCbTFsemZMdk5Bc2J6SzFUMXJEdDNXK2dMdWV3a0w5a2szUVNwK3FmVk1PTDRQWUYxbnUvT3NTdnBHTWZOcVRVZWJLa0Qwczc2VlRDZmovRW5ScStMM3Q3azhab1ZYR0VWeUFiMXZ5b3VkeEFGM3lKM0RnVlhwcHRvWnpzRkVVa3p0YkRGd2IxbkN0MmUyR1dXS0dsYWRITnB2TEc4Uk5rdFFlZTB0N0s0eWFuMEEvenJkRGNlL1lzYzFnN3NMYk1HT1d6ZDd6aG9xN3B2aHlzd3A0dTBzR3J3VTY2UmN5SFVQTFZPWVY1T2E2blVGN3ZDdmFFUVc0UTZ6YzRIR2NRaXJRdzczcEVGNkhuSVdVaGNXNHBZWFF2U1lEcS9XOTJab01TMWthcEY1TTg4SklaRTNCTFYrZGdpOS9UQS9VMkJpMlZ6M2tReFozazducW42QU50VVJjUkRCUFFxU2xZbjY2cTR3aTZxcXhBY0dJWDc3SGRBSjhSUG9rNjdLZnU3ODRwQWd0eEkwUFgrYUlKYUpXN3hjRG1QZklmWnYxTEdaeVl3bHF1Mlo3Y0p3dVRUWHkrQWhwQVpEcmhTY0E0SU9kMkJCOEJZbXJJaXUxNFo4S05uYURCRlRESzhmQ0htUHlPb3BmOE54VFdtL0JvMUtRR0VuTjk1Y3hMZ0NPNXYyYzFucUxacG1ST0tTRXlqMGFvaTNGNmt1aFZtUEVRNHJ3OGtQQUhwUU9TcWhqV2Q3eEJVWU0xemZKS1ZuaklYeDR1amJqbi9GUC9Md1FsTjZaeDVVNFA1WUJvL2NsTW9wSUcybktnTnN1UjJPZWd1MHZyQnltam0rNHVzTWpNRCtUZkRpRUN0Y1NvZkptNVRZbWJtaG1FOEFvSE42eFJSbjRqSERqNXVzK1ZPckg0eHB1V2l1c1ozY1EzbG53OUJZYjUzNnZrcVBobXJ5QWc4SWpzMVZGSHF4QVl4NnMvMlpXbzJSc21Sb1liT1M4SzRPNnhZU1JQakpYMTFIRjMzWkU1SUQvSFowZlIvRHZldW1MbDRvK282VC9hUnhvdG1oV2JCYmx2eGpGVnlkUkMreXBGMjkrc3puYzIrL3BKemZPUUxQbXRXNFpEZWFvYTQrcmpwUWFlRXM3YmRVNDB4WXloSDhCd28rcVJNTUMzNXFGVVpiTXJzTjNNdXNMMUFiVnZGelMxMUhMeUxKMHA5N0UxLzlUd2tRMVNYaWJmSXNKdUJXOXI0MFFDaHhSTTRNc3g4czJsaExzMEhHZ2FYMkhBcVUzaU0vVlhEeFlqS1pQdngvSm9uQmM0WW1iaXBTUmRhZVVsU296am5haXRDTlJRcDBkRDlHcnFic2ZqMi9BZ2xGdjBmaGdGRE5mTUJvSlpVbERnNEc5WHNlSWVWQ0c1b3dtK2hIeUxuWnlpeXVNOWd4dVhmb3BneTIzdjhGMnVqa2RNd25XMjFvQS9mQXNNMzRIeEptVjczcGlvbVdVaHh5QjJvWkRVRXRtYnRkWTJMbUd6UmJRVEUvSFJ2NE5YRXVsZXR5MVYzbkcyUDZXWE05am80UkRtQU5heHk2YnhpWDVCaitDajBULytYVTh6dG1VbTU2MW9JWWtrSlJEZUpyVUVzMUlEc3g1bXJCaldoOUYrazJUek5xNmxYeHZmeko2dlg5QlhocXNjeTdURWZvV1psUko3WTZHczlJRmlzLzhPdFdINlFTdDNHdzZ0OXRiTUtRSkl4dkFjbUFCQVhXc2tWQ2xCVnUxaFc2NmhVOVBpYnIwR01GbWxzRThkN3c0TFpLVFlZUnNudmpmQU5vVWY0cmFvOTcrTEJ4S1ZsT2IvMHE4NWJyVlZBaUUxNXVXdmlycE0rYzlNMUZtYURYL1hleGd0NkJ3aGFWY2dHSk4wdThUZjFweFRHTUFFUjdwRlRHNGhabGVFUmFZYU45dVBMOEJFRUJaVVROWVlPREdjUG16NW5YQUlFbGp4ZXIwNWVOV1RPQ2xITVRmWWpDWTF2NUxaSWVlVjdjTWJZOG9rVXE4cmlyZTNRMDVQRnZqZkoxMnFQYWFTUnhKTjZlQzQrNFA2emNXWkdqNHVneS85WFAvTW03N09mY2F1UklpTXdkN0ZMM3cwMUlXNG5qUFUzYU1zWU5vMmJGZzRXUzlucXk5UGdoSUpTWUVUVS82SWhXQ0hid20wd0VwcnZpUE1kQllGdWRRT3piR2hkTVhPNTk5cVNXQWRiZGNjWHRYS2JsamxTUFk5TjVJYkZzQ2JMaU1IZCtZNGxpeGhZb1F3Nkt5L3pvVlZGRi9Vd1NROEN3UzZBK09WNENHaWY3ZWxsYWEyOWZSM0JzeXptcHBKL21pbXJJMHV1MVlDbGFNaWZvRXdCOGN4NkxqbXB4TGVIY0kxVXc2YVY4cTA2MTJjS2ZTTVhLNmJpMnRJamZiOXdiRGwzVzR5RW5CNi8wQ0ZRSHJBRWdjTnFlVzVZL3h0eUVVSDg0SVcxU0I4amdJY3Y3Ym0rRXRZZUJrT3FOOTlIQVB2K21WTGowRGRmR3V2TE9vOENKUDFSb2lYU1B3Wm5HUUVOKzF1UGFPc21mN0hXVlIxR1MyWE9uLzcwWFNDVWZLc0xZeFhlVlQvZVdiOWp5bmpWNlNHemNtYlQzQ2FFTURQc2dhVElRRnF2K1l1Sk5VYmpHMENUUXNVTU5XUHl3MG52WkRHeTNTUEh3NjFIbUlSeEhZblg4Q1QxZU5SMUNyUHRCaHFobVBRYWlHTlBpNU1LalNHamVqR1ZYKzVaMkZGbGxwUUZDK1hVUTd1dnhyWmdGRUNXQVVMNE9SeGNaOVE3Um9EazZ1VkVqZ1dQT28weUdTbzljL2pSVHVheFNJNjlGNmJUMENkMmorTGRaM2V4alNXVCtyNHlzZENCRmRKUmdkUzNnVGdIYnJRdHNhNzJaQ0lhWEpiOFltakF2WTRYNy9QMU1mbzZBSXdacGw4VXpRMzZTWm54WWQ5TEpaY0VrcmRRS3RYNHZyVXpEcEpoTW1RMUdVdjlkMGUxNlh1VFlJUzEvNWZvRENaaWRjWlNSV3BFREhodUJkRTA5SlFqWjIyMnIyZ0FibnpyTjhEK0loOEsxbWRlODViakt0MTMyTHc5QVFnM0tMa2lEanhFcjJYNHBmNklIL2pjbDVBZkpKVVovMmZJYVJLQkg0UGYyZENMWFRsbVQzc3U0MThWN1E3V3FXdjZNUDJVNFRlUzNsS1pyR04rRGZTcEJabWJ5UGRlUTZBbXV6a09IbmRZU0txaDBhRUlIWko0MVRscUFGTXdUTGtIZWhoUnZJN1lyQm83YU9LWm1wR242T21GVkgwZmpXVGVzKytoMHh5Q0JDM3M3aDlvUExIUi8zaDFPQSt5c3d6SlpaY0NBM25MeDlVSTh1NDhZSDJOZE1nelZQdFBJUkZ6cHFoNTV3bTVnMWcyMFhGRkZ0aUVqQ0JYMFkzS0dsaTN0Y1g3azlPbFh3QjczTE5LZWx3MStQRzQ2WGJCWFJXY1l1WnRGaTVVYUsyWHp4MHlrT01OMU9kZzJQOXFvNSsxOWZ1bDl1VDVmdENaWHgxYUtoYkRDMEMzZ01BczJ0eWp2YjlZMTdGVFA1cTBIMGpIZmY3dEVtelhzL1ROK1lvaVhqcEhnUVZtYTdueFhRZHp6Uy9hSkxTK2VBbU1lU2Z4QmkwMEdIWHJJYTVjMmFjVUVnaUZwbjU0VjdrbXFMNXhWVlAreGhNbG1Qb1AvOFRRcXBvazhwa2JTTWc5d1ljR1VOZFlWaXRpYWRNZFptS3ZhYUZJQUtiOUhkSFZqNzRBbmpLNjVhTlFvS2RIQkF6cmJCNTVUdXhDNXpPekEyQUpIRXdxdW81VXVkaEQwNVdVN01Ic1NBa3ZzSFBqcWlPc1laMzJ5QzdIL3BWQXJsUnZHdFFLSUFiSjFJM2lFN2h0M0NOWXllNUY5V1lnRkNCQWV4bWh4TzdISXpWbXVvVDB2STlMcEtDWGhhczdmcThBdGZsWHlXc2hZRy9vWkgzNkNKL2RjSkdpY051NVcyRXBPTFFCME1UWmZLQncrc05aMmJLeWZkWnk2SDN6dGRiT3oxUGxDamdLRnJEMzFqSXRNbEpwV2N0dlhpcmxKZGlCTHh4NnJ2dzRPK2w5UU1wanFPQThCWHZoUzNZRS9NQTB6aDdRalVrWGpkdlFucU15Z1VUczVESlVYVEdnSWdkTEZkRVJCL0kzSjNLcG9ReU9xV0orSkRtNm1mcTdKZWZyUWhwWkU0czNMMjY0QnpWTzNGaWErVjhXT0J5K1JIWTlBRzg0K3JnUVdJdjZhUXJjMXhVMVp6QjdyN2hmQ05kTzhPUm1KL2VkVTlyNXlqajZnRE5JNFNFdytZTTRSRURLTE9tQXQzNEtzTnpNblhaY1k5VkZzdVdGV0xTOVlYZFpla3dGZDlRZ29GMlBnVlF6dURzMC9YUDEySWVSU053ZWZTRForY3RXbm1QV1BMODl3K28vczJGNUx6ZFpCdGFKOWRJb29tanJ4Q3BrQ3VXdTU3WGRXdDFwcTM0TytzcFQzeFUvSU9hNkZQUTNqSGZsUm9remd1VFV4aFZOM1pMMkh1c1RJV056dndkWUtiZmo3c0EyQ1M4dy81RisvMUxML3gvNW5QT0lSSnp6MGpIOFdzQUllOGcvYnUrbnBFbTRxUHVMcEU2L0srV2haOE5HMSttVzNISVFWYmxnOFQzWHJnK1dUNEVRYXpVcmo2enJvL2g4VUpBZU5TNjJ4bGsrVzNxSmVLZ3RZUTdsMjJFTjAybHpMYWd1cUpVSkJyU1BRMVB2RVhIbm12WFhzNkxxRzYxWlphd3ZnV2V6bEJIU3pmdkRxYXBHUFowNGdYWWZ5d1JVM1duTUtMWmw2bVBWNGh3MWNqaVBua2lPSmo4cGIyWmhRTVp3a1NIRDVVV1AxanBGY1hoWGF5aG84TW1DZEtSUXFmME5talBVazBPdHNyQUo2OGRHR2JtN091clZmemdzMFQwRjg2ZHpCbE91ODJrWitOWklsSlNUeXc3d1ZKN1RIYlFNR2JON0hXVG9YSThsVE0vVFJ6ZG93YjE3SUNXbDRmaTlsblVNQ0VSR1lMbkg4dzZvRkJ2YkZHalFTWU9DSUVIWFpPVWdoaVVRY25sSjBPU0UzZm9LWjY1RC9mODdjVEozTWFHNHVxRzcya3NqTDVwREd3QlMrZzlROHUrcTVPL1NtTi9id2ZWRnRhYVF3UStrK3JNL041aVl1ZThpbTFKSU56NW5BTXRyblFEVHljdFc0Q2hPSjBmMjc2ZWYrM1p5M1pKVnBNQld2OE5PQnppNGlNbkFHaUpJODR2SGExNXFCdE9HNU1hdHZBY1htY29vZXRJRDlKVXNqNkhrM1NRcldqem40ckhQVGNuTFhhMW1PR0NYeHJIZ1N4eG1PVkZBeWU3enc2a1ZKYTRIdVM4ZkFBR1NXZmZXajh0TjNZR0htUXd4cDNkZ0Vqd0MrcnpwMkRzYnlQWlJXTTNMT1pOa0hxNk1HUC9lRHo3dFc1WVBFVXNmSEt5UzNKSE12Qi9Lc0JiU0hlcG9SdFBEbkxGYnJ1WGN6bWppenpNSm9FZzlZVjRsOUErdmVUZDl2cFczNWpTVDY4MjNqakJ4UGZ4RVMvQ2t1YVBCMUpjdk1DVE9GazJmL2tidXdxMThDeXpmVnpNUWV0MVl1c21pekE5cUpMN2h1M1lUS1BKbmx1bDZ2eTNIOTMzb3hMUDRSSEhXd1dHcHorZVgwanQwZnh4K0hYcE5UeHJOcURQekM2YmY3Z0pLU0ZEdGg2bkUwQUZOLzZEK3RlcmR1dW1vOWFSL2ZvQ3REYUpPdHdPVDVTaW5DMEFmOStOdW5pbWUzN0doUm90OHNndlNGbVVua0swYlZOU1E0bnhlOHNDRWNWR1dCaEtxeWVodXlhT1FHSlc0N21Vb1BoQWJxT1BPRFZKWVpJYjNMc0kvcGpNYzRRbVgwb3R1STB3M1d4dnRyTGZGd0ZGOFJmby9TMStaOXVPbzNzNHh1MmZsRE5ab1hZSGxoMmM0VkZ2SzQydmhZUUozNnlobzJCOWRFQzh1QS9iU2FoZ0w5SHdZckg5L1FnaVVsY21LVkFwWndaMHlLR3lEZ21XdkxBUWFHN2JjaTFxS0RUdVYwU1FDb3czNXFycTNIbkgrcGpRb3J1d1UwbFIwVzFobHZHeU5KRGtpZFg5K0ExL2ljc3oyNjRXM2M1VTJxaGIrVjh1Wld6cXRRR0RudE5iQmJKWGE5YTl5WjNzVm01aERFYmNkWDFSRFpwRFE3YW5NMS8xK1M4QW9zRXloZnEveGNkdFBiZ2JlV3FHV2l0OHRDM2VEYm53N2hMWUVpeWhieklXR04rZ3VCY0xjdmg0em5OUWI5eE8xMTBZdjdSWjVKTFdwMG5mQ216ZzBhaitOUTlMZHQ2c1pIc1JDZmV6RnFpQ2ozWXFPRTA1ZGg5ZHNvM1RzbXlROTh4SFpCcFJTVDVhN3RBbmRYWjY2ZzR1Ym9VYWdEeFI4K1lhaW1nMzFvQkYvWWZRSkEwYkIzWC8vK1NMQUt4T0JNcG1mU21KUXpTNWxmN2lkamZXcXJEUEU4aDFrbTRXS1BidENTSEIwbXpQUGlKNENQUmEzYmVabGQwMTh0cWsrU3ZMZWxvTXAvNHFBZTRQZkJHRk1KRVB2bmp5MFFCZm5jb1FVQk1BVExsZjdFaVRFZUVvSkd4a1BpTm41TWNxd1ZoelUySTF0MEdXRVlueG4xYTcvSEV0S0MwbnpHNEc0cjNNVmhSNU12dWtSRitmYW1GSW1vTXVaalc4dWZIUjRwV2NMSk0rcTZ1and4TlVVMCs0VlpxK1BoSm1CZXdsZmQ3RC9IVTJNbVpySG5IK3lwRnRGVzc3SEpqOXNhcWhGTGljOUpza2ZYa25sS0F4WHNnb0ZhQmo4eDdBaE5RRDN5SGhSb0dtK1k3c0k0NGlwVzljaUdjSmRVZ0NwNlcxUWlya21OSm1JZG5YZGtZUFordFhiekpxc0FicTZUTmFjeVhZNjFRS2MrU3NDSFpjMU5RaXpHMUNoeExUdlo2MVVRKzdPQnlHeWcvQUNhZ2pRSXo2RWNkVTZlbTlHZTI3VmFnS0toa2x1RDArWWx3VThWTDFvaVl2YmF6RU95U3FncnBHYVNONmN4L1poWVFTOGV0L25QeFBDUFd2S21vK1Rsb0l2eWNUWWYwSG5vakprVlBsUlRNbW91UTdYaUE1T0l1bzhzcnMrT0hkcGhodmREY0t6T2szT0dMdlRxTTdzVFkydUtnbUMwaXdBVkNPRXNzVFA5R01hd2dBNUR6VmlFTGZtcFV3YWdpeXpMY3ptcWFUMy9EMFppenZDaVUrQnJlUUxuM0FueDlYNDVGekhZb1JNaHo4bHZkUjk1Q3JXMzF4YUJ6VSsvaUxMdWdubXRQbWpITlpBMTlXWVVjclJJUE1PVTAyeWs1VjBQcXpIM1Jia28rd1JjVmk3OGFxYlRseTNFM3FTUmptNVpEVG9zKzU0MURoTTRSSkRLWityTzE5V2FtTW51Snh1TElJd0ZTK2drMnNieVUvZ2s5VHliSjVQUFd3V3JMOXN4L2pNeW9RPT0iLCJWaWV3TmFtZSI6IkFjdGl2ZSBQdXJjaGFzZSBPcmRlcnMiLCJDb2x1bW5zIjpbeyJXaWR0aEFzUGVyY2VudCI6MTQuOTI1MzczMTM0MzI4MzU3LCJUeXBlIjowLCJMb2dpY2FsTmFtZSI6Im1zZXJwX3B1cmNoYXNlb3JkZXJudW1iZXIiLCJOYW1lIjoiUHVyY2hhc2Ugb3JkZXIiLCJNZXRhZGF0YSI6eyJGb3JtYXQiOjEsIkltZU1vZGUiOjAsIk1heExlbmd0aCI6MjAsIllvbWlPZiI6bnVsbCwiQXR0cmlidXRlT2YiOm51bGwsIkF0dHJpYnV0ZVR5cGUiOjE0LCJDb2x1bW5OdW1iZXIiOjIsIkRlc2NyaXB0aW9uIjp7IkxvY2FsaXplZExhYmVscyI6W10sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6bnVsbH0sIkRpc3BsYXlOYW1lIjp7IkxvY2FsaXplZExhYmVscyI6W3siTGFiZWwiOiJQdXJjaGFzZSBvcmRlciIsIkxhbmd1YWdlQ29kZSI6MTAzMywiSXNNYW5hZ2VkIjp0cnVlLCJNZXRhZGF0YUlkIjoiM2Q1YmVlYmUtMDA4Yy00MTVlLWFmNTQtNTY3YzU0NzlmZjBiIiwiSGFzQ2hhbmdlZCI6bnVsbH0seyJMYWJlbCI6Ik9yZGluZSBkaSBhY3F1aXN0byIsIkxhbmd1YWdlQ29kZSI6MTA0MCwiSXNNYW5hZ2VkIjpmYWxzZSwiTWV0YWRhdGFJZCI6IjRiMGY0MzFkLTVmOTgtZjAxMS1iYmQ0LTAwMGQzYTMyM2E3YiIsIkhhc0NoYW5nZWQiOm51bGx9XSwiVXNlckxvY2FsaXplZExhYmVsIjp7IkxhYmVsIjoiUHVyY2hhc2Ugb3JkZXIiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6IjNkNWJlZWJlLTAwOGMtNDE1ZS1hZjU0LTU2N2M1NDc5ZmYwYiIsIkhhc0NoYW5nZWQiOm51bGx9fSwiRGVwcmVjYXRlZFZlcnNpb24iOm51bGwsIkVudGl0eUxvZ2ljYWxOYW1lIjoibXNlcnBfdnJtcHVyY2hhc2VvcmRlcmFjdGl2ZWVudGl0eSIsIklzQXVkaXRFbmFibGVkIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5YXVkaXRzZXR0aW5ncyJ9LCJJc0N1c3RvbUF0dHJpYnV0ZSI6dHJ1ZSwiSXNQcmltYXJ5SWQiOmZhbHNlLCJJc1ZhbGlkT0RhdGFBdHRyaWJ1dGUiOnRydWUsIklzUHJpbWFyeU5hbWUiOnRydWUsIklzVmFsaWRGb3JDcmVhdGUiOnRydWUsIklzVmFsaWRGb3JSZWFkIjp0cnVlLCJJc1ZhbGlkRm9yVXBkYXRlIjp0cnVlLCJDYW5CZVNlY3VyZWRGb3JSZWFkIjpmYWxzZSwiQ2FuQmVTZWN1cmVkRm9yQ3JlYXRlIjpmYWxzZSwiQ2FuQmVTZWN1cmVkRm9yVXBkYXRlIjpmYWxzZSwiSXNTZWN1cmVkIjpmYWxzZSwiSXNSZXRyaWV2YWJsZSI6dHJ1ZSwiSXNGaWx0ZXJhYmxlIjpmYWxzZSwiSXNTZWFyY2hhYmxlIjp0cnVlLCJJc01hbmFnZWQiOnRydWUsIklzR2xvYmFsRmlsdGVyRW5hYmxlZCI6eyJWYWx1ZSI6ZmFsc2UsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlnbG9iYWxmaWx0ZXJzZXR0aW5ncyJ9LCJJc1NvcnRhYmxlRW5hYmxlZCI6eyJWYWx1ZSI6ZmFsc2UsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlpc3NvcnRhYmxlc2V0dGluZ3MifSwiTGlua2VkQXR0cmlidXRlSWQiOm51bGwsIkxvZ2ljYWxOYW1lIjoibXNlcnBfcHVyY2hhc2VvcmRlcm51bWJlciIsIklzQ3VzdG9taXphYmxlIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImlzY3VzdG9taXphYmxlIn0sIklzUmVuYW1lYWJsZSI6eyJWYWx1ZSI6dHJ1ZSwiQ2FuQmVDaGFuZ2VkIjpmYWxzZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJpc3JlbmFtZWFibGUifSwiSXNWYWxpZEZvckFkdmFuY2VkRmluZCI6eyJWYWx1ZSI6dHJ1ZSwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeXNlYXJjaHNldHRpbmdzIn0sIklzVmFsaWRGb3JGb3JtIjp0cnVlLCJJc1JlcXVpcmVkRm9yRm9ybSI6dHJ1ZSwiSXNWYWxpZEZvckdyaWQiOnRydWUsIlJlcXVpcmVkTGV2ZWwiOnsiVmFsdWUiOjAsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlyZXF1aXJlbWVudGxldmVsc2V0dGluZ3MifSwiQ2FuTW9kaWZ5QWRkaXRpb25hbFNldHRpbmdzIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWFkZGl0aW9uYWxzZXR0aW5ncyJ9LCJTY2hlbWFOYW1lIjoibXNlcnBfcHVyY2hhc2VvcmRlcm51bWJlciIsIkV4dGVybmFsTmFtZSI6IlB1cmNoYXNlT3JkZXJOdW1iZXIiLCJJc0RhdGFTb3VyY2VTZWNyZXQiOmZhbHNlLCJJbmhlcml0c0Zyb20iOm51bGwsIkNyZWF0ZWRPbiI6IjIwMjUtMDktMDNUMTc6NTI6NTIuMzgwMDA2NCIsIk1vZGlmaWVkT24iOiIyMDI1LTA5LTAzVDE3OjUyOjUyLjM4MDAwNjQiLCJTZXR0aW5ncyI6bnVsbCwiTWV0YWRhdGFJZCI6ImNhN2EzMWNjLWVlODgtZjAxMS1iNGNiLTAwMGQzYTViYTM3ZiIsIkZvcm1hdE5hbWUiOnsiVmFsdWUiOiJUZXh0In0sIkF0dHJpYnV0ZVR5cGVOYW1lIjp7IlZhbHVlIjoiU3RyaW5nVHlwZSJ9LCJJbnRyb2R1Y2VkVmVyc2lvbiI6IjEuMC4wLjAiLCJIYXNDaGFuZ2VkIjpudWxsLCJJc0xvY2FsaXphYmxlIjpmYWxzZSwiRm9ybXVsYURlZmluaXRpb24iOiIiLCJTb3VyY2VUeXBlTWFzayI6MCwiSXNMb2dpY2FsIjpmYWxzZSwiU291cmNlVHlwZSI6MCwiRGF0YWJhc2VMZW5ndGgiOjQwLCJBdXRvTnVtYmVyRm9ybWF0IjpudWxsfSwiV2lkdGgiOjIwMCwiU29ydERpc2FibGVkIjpmYWxzZX0seyJXaWR0aEFzUGVyY2VudCI6MTAuODk1NTIyMzg4MDU5NzAxLCJUeXBlIjowLCJMb2dpY2FsTmFtZSI6Im1zZXJwX2RhdGV0aW1lcmVjZWl2ZWQiLCJOYW1lIjoiRGF0ZSB0aW1lIHJlY2VpdmVkIiwiTWV0YWRhdGEiOnsiRm9ybWF0IjoxLCJJbWVNb2RlIjoxLCJBdHRyaWJ1dGVPZiI6bnVsbCwiQXR0cmlidXRlVHlwZSI6MiwiQ29sdW1uTnVtYmVyIjozLCJEZXNjcmlwdGlvbiI6eyJMb2NhbGl6ZWRMYWJlbHMiOltdLCJVc2VyTG9jYWxpemVkTGFiZWwiOm51bGx9LCJEaXNwbGF5TmFtZSI6eyJMb2NhbGl6ZWRMYWJlbHMiOlt7IkxhYmVsIjoiRGF0ZSB0aW1lIHJlY2VpdmVkIiwiTGFuZ3VhZ2VDb2RlIjoxMDMzLCJJc01hbmFnZWQiOnRydWUsIk1ldGFkYXRhSWQiOiIzZjZhMDA1Yy04MDE2LTQ5MzUtYTFjMy01MWUxOWEwZjNmYTQiLCJIYXNDaGFuZ2VkIjpudWxsfSx7IkxhYmVsIjoiRGF0YSBvcmEgZGkgcmljZXppb25lIiwiTGFuZ3VhZ2VDb2RlIjoxMDQwLCJJc01hbmFnZWQiOmZhbHNlLCJNZXRhZGF0YUlkIjoiNTcwZjQzMWQtNWY5OC1mMDExLWJiZDQtMDAwZDNhMzIzYTdiIiwiSGFzQ2hhbmdlZCI6bnVsbH1dLCJVc2VyTG9jYWxpemVkTGFiZWwiOnsiTGFiZWwiOiJEYXRlIHRpbWUgcmVjZWl2ZWQiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6IjNmNmEwMDVjLTgwMTYtNDkzNS1hMWMzLTUxZTE5YTBmM2ZhNCIsIkhhc0NoYW5nZWQiOm51bGx9fSwiRGVwcmVjYXRlZFZlcnNpb24iOm51bGwsIkVudGl0eUxvZ2ljYWxOYW1lIjoibXNlcnBfdnJtcHVyY2hhc2VvcmRlcmFjdGl2ZWVudGl0eSIsIklzQXVkaXRFbmFibGVkIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5YXVkaXRzZXR0aW5ncyJ9LCJJc0N1c3RvbUF0dHJpYnV0ZSI6dHJ1ZSwiSXNQcmltYXJ5SWQiOmZhbHNlLCJJc1ZhbGlkT0RhdGFBdHRyaWJ1dGUiOnRydWUsIklzUHJpbWFyeU5hbWUiOmZhbHNlLCJJc1ZhbGlkRm9yQ3JlYXRlIjpmYWxzZSwiSXNWYWxpZEZvclJlYWQiOnRydWUsIklzVmFsaWRGb3JVcGRhdGUiOmZhbHNlLCJDYW5CZVNlY3VyZWRGb3JSZWFkIjpmYWxzZSwiQ2FuQmVTZWN1cmVkRm9yQ3JlYXRlIjpmYWxzZSwiQ2FuQmVTZWN1cmVkRm9yVXBkYXRlIjpmYWxzZSwiSXNTZWN1cmVkIjpmYWxzZSwiSXNSZXRyaWV2YWJsZSI6ZmFsc2UsIklzRmlsdGVyYWJsZSI6ZmFsc2UsIklzU2VhcmNoYWJsZSI6ZmFsc2UsIklzTWFuYWdlZCI6dHJ1ZSwiSXNHbG9iYWxGaWx0ZXJFbmFibGVkIjp7IlZhbHVlIjpmYWxzZSwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWdsb2JhbGZpbHRlcnNldHRpbmdzIn0sIklzU29ydGFibGVFbmFibGVkIjp7IlZhbHVlIjpmYWxzZSwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWlzc29ydGFibGVzZXR0aW5ncyJ9LCJMaW5rZWRBdHRyaWJ1dGVJZCI6bnVsbCwiTG9naWNhbE5hbWUiOiJtc2VycF9kYXRldGltZXJlY2VpdmVkIiwiSXNDdXN0b21pemFibGUiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6ZmFsc2UsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiaXNjdXN0b21pemFibGUifSwiSXNSZW5hbWVhYmxlIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImlzcmVuYW1lYWJsZSJ9LCJJc1ZhbGlkRm9yQWR2YW5jZWRGaW5kIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5c2VhcmNoc2V0dGluZ3MifSwiSXNWYWxpZEZvckZvcm0iOnRydWUsIklzUmVxdWlyZWRGb3JGb3JtIjpmYWxzZSwiSXNWYWxpZEZvckdyaWQiOnRydWUsIlJlcXVpcmVkTGV2ZWwiOnsiVmFsdWUiOjAsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlyZXF1aXJlbWVudGxldmVsc2V0dGluZ3MifSwiQ2FuTW9kaWZ5QWRkaXRpb25hbFNldHRpbmdzIjp7IlZhbHVlIjpmYWxzZSwiQ2FuQmVDaGFuZ2VkIjpmYWxzZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlhZGRpdGlvbmFsc2V0dGluZ3MifSwiU2NoZW1hTmFtZSI6Im1zZXJwX2RhdGV0aW1lcmVjZWl2ZWQiLCJFeHRlcm5hbE5hbWUiOiJEYXRlVGltZVJlY2VpdmVkIiwiSXNEYXRhU291cmNlU2VjcmV0IjpmYWxzZSwiSW5oZXJpdHNGcm9tIjpudWxsLCJDcmVhdGVkT24iOiIyMDI1LTA5LTAzVDE3OjUyOjUyLjQxMzAwNDgiLCJNb2RpZmllZE9uIjoiMjAyNS0wOS0wM1QxNzo1Mjo1Mi40MTMwMDQ4IiwiU2V0dGluZ3MiOm51bGwsIk1ldGFkYXRhSWQiOiJjYjdhMzFjYy1lZTg4LWYwMTEtYjRjYi0wMDBkM2E1YmEzN2YiLCJBdHRyaWJ1dGVUeXBlTmFtZSI6eyJWYWx1ZSI6IkRhdGVUaW1lVHlwZSJ9LCJJbnRyb2R1Y2VkVmVyc2lvbiI6IjEuMC4wLjAiLCJIYXNDaGFuZ2VkIjpudWxsLCJTb3VyY2VUeXBlTWFzayI6MCwiRm9ybXVsYURlZmluaXRpb24iOiIiLCJJc0xvZ2ljYWwiOmZhbHNlLCJTb3VyY2VUeXBlIjowLCJEYXRlVGltZUJlaGF2aW9yIjp7IlZhbHVlIjoiVGltZVpvbmVJbmRlcGVuZGVudCJ9LCJDYW5DaGFuZ2VEYXRlVGltZUJlaGF2aW9yIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5YmVoYXZpb3IifSwiQXV0b051bWJlckZvcm1hdCI6bnVsbH0sIldpZHRoIjoxNDYsIlNvcnREaXNhYmxlZCI6ZmFsc2V9LHsiV2lkdGhBc1BlcmNlbnQiOjcuNDYyNjg2NTY3MTY0MTc4NCwiVHlwZSI6MCwiTG9naWNhbE5hbWUiOiJtc2VycF9jb21wYW55IiwiTmFtZSI6IkNvbXBhbnkiLCJNZXRhZGF0YSI6eyJGb3JtYXQiOjEsIkltZU1vZGUiOjAsIk1heExlbmd0aCI6NCwiWW9taU9mIjpudWxsLCJBdHRyaWJ1dGVPZiI6bnVsbCwiQXR0cmlidXRlVHlwZSI6MTQsIkNvbHVtbk51bWJlciI6NCwiRGVzY3JpcHRpb24iOnsiTG9jYWxpemVkTGFiZWxzIjpbXSwiVXNlckxvY2FsaXplZExhYmVsIjpudWxsfSwiRGlzcGxheU5hbWUiOnsiTG9jYWxpemVkTGFiZWxzIjpbeyJMYWJlbCI6IkNvbXBhbnkiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6IjMxNWYyMGE5LWE0YTQtNGEyZi1iZWFlLTFjZDYxYzc3ZDhjMCIsIkhhc0NoYW5nZWQiOm51bGx9LHsiTGFiZWwiOiJTb2NpZXTDoCIsIkxhbmd1YWdlQ29kZSI6MTA0MCwiSXNNYW5hZ2VkIjpmYWxzZSwiTWV0YWRhdGFJZCI6IjUxMGY0MzFkLTVmOTgtZjAxMS1iYmQ0LTAwMGQzYTMyM2E3YiIsIkhhc0NoYW5nZWQiOm51bGx9XSwiVXNlckxvY2FsaXplZExhYmVsIjp7IkxhYmVsIjoiQ29tcGFueSIsIkxhbmd1YWdlQ29kZSI6MTAzMywiSXNNYW5hZ2VkIjp0cnVlLCJNZXRhZGF0YUlkIjoiMzE1ZjIwYTktYTRhNC00YTJmLWJlYWUtMWNkNjFjNzdkOGMwIiwiSGFzQ2hhbmdlZCI6bnVsbH19LCJEZXByZWNhdGVkVmVyc2lvbiI6bnVsbCwiRW50aXR5TG9naWNhbE5hbWUiOiJtc2VycF92cm1wdXJjaGFzZW9yZGVyYWN0aXZlZW50aXR5IiwiSXNBdWRpdEVuYWJsZWQiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlhdWRpdHNldHRpbmdzIn0sIklzQ3VzdG9tQXR0cmlidXRlIjp0cnVlLCJJc1ByaW1hcnlJZCI6ZmFsc2UsIklzVmFsaWRPRGF0YUF0dHJpYnV0ZSI6dHJ1ZSwiSXNQcmltYXJ5TmFtZSI6ZmFsc2UsIklzVmFsaWRGb3JDcmVhdGUiOmZhbHNlLCJJc1ZhbGlkRm9yUmVhZCI6dHJ1ZSwiSXNWYWxpZEZvclVwZGF0ZSI6ZmFsc2UsIkNhbkJlU2VjdXJlZEZvclJlYWQiOmZhbHNlLCJDYW5CZVNlY3VyZWRGb3JDcmVhdGUiOmZhbHNlLCJDYW5CZVNlY3VyZWRGb3JVcGRhdGUiOmZhbHNlLCJJc1NlY3VyZWQiOmZhbHNlLCJJc1JldHJpZXZhYmxlIjpmYWxzZSwiSXNGaWx0ZXJhYmxlIjpmYWxzZSwiSXNTZWFyY2hhYmxlIjpmYWxzZSwiSXNNYW5hZ2VkIjp0cnVlLCJJc0dsb2JhbEZpbHRlckVuYWJsZWQiOnsiVmFsdWUiOmZhbHNlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5Z2xvYmFsZmlsdGVyc2V0dGluZ3MifSwiSXNTb3J0YWJsZUVuYWJsZWQiOnsiVmFsdWUiOmZhbHNlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5aXNzb3J0YWJsZXNldHRpbmdzIn0sIkxpbmtlZEF0dHJpYnV0ZUlkIjpudWxsLCJMb2dpY2FsTmFtZSI6Im1zZXJwX2NvbXBhbnkiLCJJc0N1c3RvbWl6YWJsZSI6eyJWYWx1ZSI6dHJ1ZSwiQ2FuQmVDaGFuZ2VkIjpmYWxzZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJpc2N1c3RvbWl6YWJsZSJ9LCJJc1JlbmFtZWFibGUiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6ZmFsc2UsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiaXNyZW5hbWVhYmxlIn0sIklzVmFsaWRGb3JBZHZhbmNlZEZpbmQiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlzZWFyY2hzZXR0aW5ncyJ9LCJJc1ZhbGlkRm9yRm9ybSI6dHJ1ZSwiSXNSZXF1aXJlZEZvckZvcm0iOmZhbHNlLCJJc1ZhbGlkRm9yR3JpZCI6dHJ1ZSwiUmVxdWlyZWRMZXZlbCI6eyJWYWx1ZSI6MCwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeXJlcXVpcmVtZW50bGV2ZWxzZXR0aW5ncyJ9LCJDYW5Nb2RpZnlBZGRpdGlvbmFsU2V0dGluZ3MiOnsiVmFsdWUiOmZhbHNlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWFkZGl0aW9uYWxzZXR0aW5ncyJ9LCJTY2hlbWFOYW1lIjoibXNlcnBfY29tcGFueSIsIkV4dGVybmFsTmFtZSI6IkNvbXBhbnkiLCJJc0RhdGFTb3VyY2VTZWNyZXQiOmZhbHNlLCJJbmhlcml0c0Zyb20iOm51bGwsIkNyZWF0ZWRPbiI6IjIwMjUtMDktMDNUMTc6NTI6NTIuNDQyOTk1MiIsIk1vZGlmaWVkT24iOiIyMDI1LTA5LTAzVDE3OjUyOjUyLjQ0Mjk5NTIiLCJTZXR0aW5ncyI6bnVsbCwiTWV0YWRhdGFJZCI6ImNjN2EzMWNjLWVlODgtZjAxMS1iNGNiLTAwMGQzYTViYTM3ZiIsIkZvcm1hdE5hbWUiOnsiVmFsdWUiOiJUZXh0In0sIkF0dHJpYnV0ZVR5cGVOYW1lIjp7IlZhbHVlIjoiU3RyaW5nVHlwZSJ9LCJJbnRyb2R1Y2VkVmVyc2lvbiI6IjEuMC4wLjAiLCJIYXNDaGFuZ2VkIjpudWxsLCJJc0xvY2FsaXphYmxlIjpmYWxzZSwiRm9ybXVsYURlZmluaXRpb24iOiIiLCJTb3VyY2VUeXBlTWFzayI6MCwiSXNMb2dpY2FsIjpmYWxzZSwiU291cmNlVHlwZSI6MCwiRGF0YWJhc2VMZW5ndGgiOjgsIkF1dG9OdW1iZXJGb3JtYXQiOm51bGx9LCJXaWR0aCI6MTAwLCJTb3J0RGlzYWJsZWQiOmZhbHNlfSx7IldpZHRoQXNQZXJjZW50Ijo3LjkxMDQ0Nzc2MTE5NDAzLCJUeXBlIjowLCJMb2dpY2FsTmFtZSI6Im1zZXJwX251bWJlcm9mbGluZXMiLCJOYW1lIjoiTm8uIG9mIGxpbmVzIiwiTWV0YWRhdGEiOnsiTWF4VmFsdWUiOjEwMDAwMDAwMDAwMC4wLCJNaW5WYWx1ZSI6LTEwMDAwMDAwMDAwMC4wLCJQcmVjaXNpb24iOjAsIkltZU1vZGUiOjMsIkF0dHJpYnV0ZU9mIjpudWxsLCJBdHRyaWJ1dGVUeXBlIjozLCJDb2x1bW5OdW1iZXIiOjYsIkRlc2NyaXB0aW9uIjp7IkxvY2FsaXplZExhYmVscyI6W10sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6bnVsbH0sIkRpc3BsYXlOYW1lIjp7IkxvY2FsaXplZExhYmVscyI6W3siTGFiZWwiOiJOby4gb2YgbGluZXMiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6IjEyNDNiMDViLWM3ZWYtNDVjNi1hYzgyLWM1Zjc5MWQyZTE3MCIsIkhhc0NoYW5nZWQiOm51bGx9LHsiTGFiZWwiOiJOby4gZGkgbGluZWUiLCJMYW5ndWFnZUNvZGUiOjEwNDAsIklzTWFuYWdlZCI6ZmFsc2UsIk1ldGFkYXRhSWQiOiI2NzBmNDMxZC01Zjk4LWYwMTEtYmJkNC0wMDBkM2EzMjNhN2IiLCJIYXNDaGFuZ2VkIjpudWxsfV0sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6eyJMYWJlbCI6Ik5vLiBvZiBsaW5lcyIsIkxhbmd1YWdlQ29kZSI6MTAzMywiSXNNYW5hZ2VkIjp0cnVlLCJNZXRhZGF0YUlkIjoiMTI0M2IwNWItYzdlZi00NWM2LWFjODItYzVmNzkxZDJlMTcwIiwiSGFzQ2hhbmdlZCI6bnVsbH19LCJEZXByZWNhdGVkVmVyc2lvbiI6bnVsbCwiRW50aXR5TG9naWNhbE5hbWUiOiJtc2VycF92cm1wdXJjaGFzZW9yZGVyYWN0aXZlZW50aXR5IiwiSXNBdWRpdEVuYWJsZWQiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlhdWRpdHNldHRpbmdzIn0sIklzQ3VzdG9tQXR0cmlidXRlIjp0cnVlLCJJc1ByaW1hcnlJZCI6ZmFsc2UsIklzVmFsaWRPRGF0YUF0dHJpYnV0ZSI6dHJ1ZSwiSXNQcmltYXJ5TmFtZSI6ZmFsc2UsIklzVmFsaWRGb3JDcmVhdGUiOmZhbHNlLCJJc1ZhbGlkRm9yUmVhZCI6dHJ1ZSwiSXNWYWxpZEZvclVwZGF0ZSI6ZmFsc2UsIkNhbkJlU2VjdXJlZEZvclJlYWQiOmZhbHNlLCJDYW5CZVNlY3VyZWRGb3JDcmVhdGUiOmZhbHNlLCJDYW5CZVNlY3VyZWRGb3JVcGRhdGUiOmZhbHNlLCJJc1NlY3VyZWQiOmZhbHNlLCJJc1JldHJpZXZhYmxlIjpmYWxzZSwiSXNGaWx0ZXJhYmxlIjpmYWxzZSwiSXNTZWFyY2hhYmxlIjpmYWxzZSwiSXNNYW5hZ2VkIjp0cnVlLCJJc0dsb2JhbEZpbHRlckVuYWJsZWQiOnsiVmFsdWUiOmZhbHNlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5Z2xvYmFsZmlsdGVyc2V0dGluZ3MifSwiSXNTb3J0YWJsZUVuYWJsZWQiOnsiVmFsdWUiOmZhbHNlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5aXNzb3J0YWJsZXNldHRpbmdzIn0sIkxpbmtlZEF0dHJpYnV0ZUlkIjpudWxsLCJMb2dpY2FsTmFtZSI6Im1zZXJwX251bWJlcm9mbGluZXMiLCJJc0N1c3RvbWl6YWJsZSI6eyJWYWx1ZSI6dHJ1ZSwiQ2FuQmVDaGFuZ2VkIjpmYWxzZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJpc2N1c3RvbWl6YWJsZSJ9LCJJc1JlbmFtZWFibGUiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6ZmFsc2UsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiaXNyZW5hbWVhYmxlIn0sIklzVmFsaWRGb3JBZHZhbmNlZEZpbmQiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlzZWFyY2hzZXR0aW5ncyJ9LCJJc1ZhbGlkRm9yRm9ybSI6dHJ1ZSwiSXNSZXF1aXJlZEZvckZvcm0iOmZhbHNlLCJJc1ZhbGlkRm9yR3JpZCI6dHJ1ZSwiUmVxdWlyZWRMZXZlbCI6eyJWYWx1ZSI6MCwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeXJlcXVpcmVtZW50bGV2ZWxzZXR0aW5ncyJ9LCJDYW5Nb2RpZnlBZGRpdGlvbmFsU2V0dGluZ3MiOnsiVmFsdWUiOmZhbHNlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWFkZGl0aW9uYWxzZXR0aW5ncyJ9LCJTY2hlbWFOYW1lIjoibXNlcnBfbnVtYmVyb2ZsaW5lcyIsIkV4dGVybmFsTmFtZSI6Ik51bWJlck9mTGluZXMiLCJJc0RhdGFTb3VyY2VTZWNyZXQiOmZhbHNlLCJJbmhlcml0c0Zyb20iOm51bGwsIkNyZWF0ZWRPbiI6IjIwMjUtMDktMDNUMTc6NTI6NTIuNTIyOTk1MiIsIk1vZGlmaWVkT24iOiIyMDI1LTA5LTAzVDE3OjUyOjUyLjUyMjk5NTIiLCJTZXR0aW5ncyI6bnVsbCwiTWV0YWRhdGFJZCI6ImNlN2EzMWNjLWVlODgtZjAxMS1iNGNiLTAwMGQzYTViYTM3ZiIsIkF0dHJpYnV0ZVR5cGVOYW1lIjp7IlZhbHVlIjoiRGVjaW1hbFR5cGUifSwiSW50cm9kdWNlZFZlcnNpb24iOiIxLjAuMC4wIiwiSGFzQ2hhbmdlZCI6bnVsbCwiRm9ybXVsYURlZmluaXRpb24iOiIiLCJTb3VyY2VUeXBlTWFzayI6MCwiSXNMb2dpY2FsIjpmYWxzZSwiU291cmNlVHlwZSI6MCwiQXV0b051bWJlckZvcm1hdCI6bnVsbH0sIldpZHRoIjoxMDYsIlNvcnREaXNhYmxlZCI6ZmFsc2V9LHsiV2lkdGhBc1BlcmNlbnQiOjE2LjI2ODY1NjcxNjQxNzkwOCwiVHlwZSI6MCwiTG9naWNhbE5hbWUiOiJtc2VycF9hbW91bnQiLCJOYW1lIjoiQW1vdW50IGluIHRyYW5zYWN0aW9uIGN1cnJlbmN5IiwiTWV0YWRhdGEiOnsiTWF4VmFsdWUiOjEwMDAwMDAwMDAwMC4wLCJNaW5WYWx1ZSI6LTEwMDAwMDAwMDAwMC4wLCJQcmVjaXNpb24iOjYsIkltZU1vZGUiOjMsIkF0dHJpYnV0ZU9mIjpudWxsLCJBdHRyaWJ1dGVUeXBlIjozLCJDb2x1bW5OdW1iZXIiOjgsIkRlc2NyaXB0aW9uIjp7IkxvY2FsaXplZExhYmVscyI6W10sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6bnVsbH0sIkRpc3BsYXlOYW1lIjp7IkxvY2FsaXplZExhYmVscyI6W3siTGFiZWwiOiJBbW91bnQgaW4gdHJhbnNhY3Rpb24gY3VycmVuY3kiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6IjY5ZjE1YzI2LWFjMDItNDNkMC05OWM5LTQ2MjdjMWRmZjZjNCIsIkhhc0NoYW5nZWQiOm51bGx9LHsiTGFiZWwiOiJJbXBvcnRvIG5lbGxhIHZhbHV0YSBkZWxsYSB0cmFuc2F6aW9uZSIsIkxhbmd1YWdlQ29kZSI6MTA0MCwiSXNNYW5hZ2VkIjpmYWxzZSwiTWV0YWRhdGFJZCI6IjRlMGY0MzFkLTVmOTgtZjAxMS1iYmQ0LTAwMGQzYTMyM2E3YiIsIkhhc0NoYW5nZWQiOm51bGx9XSwiVXNlckxvY2FsaXplZExhYmVsIjp7IkxhYmVsIjoiQW1vdW50IGluIHRyYW5zYWN0aW9uIGN1cnJlbmN5IiwiTGFuZ3VhZ2VDb2RlIjoxMDMzLCJJc01hbmFnZWQiOnRydWUsIk1ldGFkYXRhSWQiOiI2OWYxNWMyNi1hYzAyLTQzZDAtOTljOS00NjI3YzFkZmY2YzQiLCJIYXNDaGFuZ2VkIjpudWxsfX0sIkRlcHJlY2F0ZWRWZXJzaW9uIjpudWxsLCJFbnRpdHlMb2dpY2FsTmFtZSI6Im1zZXJwX3ZybXB1cmNoYXNlb3JkZXJhY3RpdmVlbnRpdHkiLCJJc0F1ZGl0RW5hYmxlZCI6eyJWYWx1ZSI6dHJ1ZSwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWF1ZGl0c2V0dGluZ3MifSwiSXNDdXN0b21BdHRyaWJ1dGUiOnRydWUsIklzUHJpbWFyeUlkIjpmYWxzZSwiSXNWYWxpZE9EYXRhQXR0cmlidXRlIjp0cnVlLCJJc1ByaW1hcnlOYW1lIjpmYWxzZSwiSXNWYWxpZEZvckNyZWF0ZSI6ZmFsc2UsIklzVmFsaWRGb3JSZWFkIjp0cnVlLCJJc1ZhbGlkRm9yVXBkYXRlIjpmYWxzZSwiQ2FuQmVTZWN1cmVkRm9yUmVhZCI6ZmFsc2UsIkNhbkJlU2VjdXJlZEZvckNyZWF0ZSI6ZmFsc2UsIkNhbkJlU2VjdXJlZEZvclVwZGF0ZSI6ZmFsc2UsIklzU2VjdXJlZCI6ZmFsc2UsIklzUmV0cmlldmFibGUiOmZhbHNlLCJJc0ZpbHRlcmFibGUiOmZhbHNlLCJJc1NlYXJjaGFibGUiOmZhbHNlLCJJc01hbmFnZWQiOnRydWUsIklzR2xvYmFsRmlsdGVyRW5hYmxlZCI6eyJWYWx1ZSI6ZmFsc2UsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlnbG9iYWxmaWx0ZXJzZXR0aW5ncyJ9LCJJc1NvcnRhYmxlRW5hYmxlZCI6eyJWYWx1ZSI6ZmFsc2UsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlpc3NvcnRhYmxlc2V0dGluZ3MifSwiTGlua2VkQXR0cmlidXRlSWQiOm51bGwsIkxvZ2ljYWxOYW1lIjoibXNlcnBfYW1vdW50IiwiSXNDdXN0b21pemFibGUiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6ZmFsc2UsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiaXNjdXN0b21pemFibGUifSwiSXNSZW5hbWVhYmxlIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImlzcmVuYW1lYWJsZSJ9LCJJc1ZhbGlkRm9yQWR2YW5jZWRGaW5kIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5c2VhcmNoc2V0dGluZ3MifSwiSXNWYWxpZEZvckZvcm0iOnRydWUsIklzUmVxdWlyZWRGb3JGb3JtIjpmYWxzZSwiSXNWYWxpZEZvckdyaWQiOnRydWUsIlJlcXVpcmVkTGV2ZWwiOnsiVmFsdWUiOjAsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlyZXF1aXJlbWVudGxldmVsc2V0dGluZ3MifSwiQ2FuTW9kaWZ5QWRkaXRpb25hbFNldHRpbmdzIjp7IlZhbHVlIjpmYWxzZSwiQ2FuQmVDaGFuZ2VkIjpmYWxzZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlhZGRpdGlvbmFsc2V0dGluZ3MifSwiU2NoZW1hTmFtZSI6Im1zZXJwX2Ftb3VudCIsIkV4dGVybmFsTmFtZSI6IkFtb3VudCIsIklzRGF0YVNvdXJjZVNlY3JldCI6ZmFsc2UsIkluaGVyaXRzRnJvbSI6bnVsbCwiQ3JlYXRlZE9uIjoiMjAyNS0wOS0wM1QxNzo1Mjo1Mi42IiwiTW9kaWZpZWRPbiI6IjIwMjUtMDktMDNUMTc6NTI6NTIuNiIsIlNldHRpbmdzIjpudWxsLCJNZXRhZGF0YUlkIjoiZDA3YTMxY2MtZWU4OC1mMDExLWI0Y2ItMDAwZDNhNWJhMzdmIiwiQXR0cmlidXRlVHlwZU5hbWUiOnsiVmFsdWUiOiJEZWNpbWFsVHlwZSJ9LCJJbnRyb2R1Y2VkVmVyc2lvbiI6IjEuMC4wLjAiLCJIYXNDaGFuZ2VkIjpudWxsLCJGb3JtdWxhRGVmaW5pdGlvbiI6IiIsIlNvdXJjZVR5cGVNYXNrIjowLCJJc0xvZ2ljYWwiOmZhbHNlLCJTb3VyY2VUeXBlIjowLCJBdXRvTnVtYmVyRm9ybWF0IjpudWxsfSwiV2lkdGgiOjIxOCwiU29ydERpc2FibGVkIjpmYWxzZX0seyJXaWR0aEFzUGVyY2VudCI6Ny40NjI2ODY1NjcxNjQxNzg0LCJUeXBlIjowLCJMb2dpY2FsTmFtZSI6Im1zZXJwX2N1cnJlbmN5IiwiTmFtZSI6IkN1cnJlbmN5IiwiTWV0YWRhdGEiOnsiRm9ybWF0IjoxLCJJbWVNb2RlIjowLCJNYXhMZW5ndGgiOjMsIllvbWlPZiI6bnVsbCwiQXR0cmlidXRlT2YiOm51bGwsIkF0dHJpYnV0ZVR5cGUiOjE0LCJDb2x1bW5OdW1iZXIiOjksIkRlc2NyaXB0aW9uIjp7IkxvY2FsaXplZExhYmVscyI6W10sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6bnVsbH0sIkRpc3BsYXlOYW1lIjp7IkxvY2FsaXplZExhYmVscyI6W3siTGFiZWwiOiJDdXJyZW5jeSIsIkxhbmd1YWdlQ29kZSI6MTAzMywiSXNNYW5hZ2VkIjp0cnVlLCJNZXRhZGF0YUlkIjoiZGQxYjQ5ODQtODZkYy00Y2JjLTg1MGYtODViYmVjZmFjZWQxIiwiSGFzQ2hhbmdlZCI6bnVsbH0seyJMYWJlbCI6IlZhbHV0YSIsIkxhbmd1YWdlQ29kZSI6MTA0MCwiSXNNYW5hZ2VkIjpmYWxzZSwiTWV0YWRhdGFJZCI6IjY1MGY0MzFkLTVmOTgtZjAxMS1iYmQ0LTAwMGQzYTMyM2E3YiIsIkhhc0NoYW5nZWQiOm51bGx9XSwiVXNlckxvY2FsaXplZExhYmVsIjp7IkxhYmVsIjoiQ3VycmVuY3kiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6ImRkMWI0OTg0LTg2ZGMtNGNiYy04NTBmLTg1YmJlY2ZhY2VkMSIsIkhhc0NoYW5nZWQiOm51bGx9fSwiRGVwcmVjYXRlZFZlcnNpb24iOm51bGwsIkVudGl0eUxvZ2ljYWxOYW1lIjoibXNlcnBfdnJtcHVyY2hhc2VvcmRlcmFjdGl2ZWVudGl0eSIsIklzQXVkaXRFbmFibGVkIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5YXVkaXRzZXR0aW5ncyJ9LCJJc0N1c3RvbUF0dHJpYnV0ZSI6dHJ1ZSwiSXNQcmltYXJ5SWQiOmZhbHNlLCJJc1ZhbGlkT0RhdGFBdHRyaWJ1dGUiOnRydWUsIklzUHJpbWFyeU5hbWUiOmZhbHNlLCJJc1ZhbGlkRm9yQ3JlYXRlIjpmYWxzZSwiSXNWYWxpZEZvclJlYWQiOnRydWUsIklzVmFsaWRGb3JVcGRhdGUiOmZhbHNlLCJDYW5CZVNlY3VyZWRGb3JSZWFkIjpmYWxzZSwiQ2FuQmVTZWN1cmVkRm9yQ3JlYXRlIjpmYWxzZSwiQ2FuQmVTZWN1cmVkRm9yVXBkYXRlIjpmYWxzZSwiSXNTZWN1cmVkIjpmYWxzZSwiSXNSZXRyaWV2YWJsZSI6ZmFsc2UsIklzRmlsdGVyYWJsZSI6ZmFsc2UsIklzU2VhcmNoYWJsZSI6ZmFsc2UsIklzTWFuYWdlZCI6dHJ1ZSwiSXNHbG9iYWxGaWx0ZXJFbmFibGVkIjp7IlZhbHVlIjpmYWxzZSwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWdsb2JhbGZpbHRlcnNldHRpbmdzIn0sIklzU29ydGFibGVFbmFibGVkIjp7IlZhbHVlIjpmYWxzZSwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWlzc29ydGFibGVzZXR0aW5ncyJ9LCJMaW5rZWRBdHRyaWJ1dGVJZCI6bnVsbCwiTG9naWNhbE5hbWUiOiJtc2VycF9jdXJyZW5jeSIsIklzQ3VzdG9taXphYmxlIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImlzY3VzdG9taXphYmxlIn0sIklzUmVuYW1lYWJsZSI6eyJWYWx1ZSI6dHJ1ZSwiQ2FuQmVDaGFuZ2VkIjpmYWxzZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJpc3JlbmFtZWFibGUifSwiSXNWYWxpZEZvckFkdmFuY2VkRmluZCI6eyJWYWx1ZSI6dHJ1ZSwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeXNlYXJjaHNldHRpbmdzIn0sIklzVmFsaWRGb3JGb3JtIjp0cnVlLCJJc1JlcXVpcmVkRm9yRm9ybSI6ZmFsc2UsIklzVmFsaWRGb3JHcmlkIjp0cnVlLCJSZXF1aXJlZExldmVsIjp7IlZhbHVlIjowLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5cmVxdWlyZW1lbnRsZXZlbHNldHRpbmdzIn0sIkNhbk1vZGlmeUFkZGl0aW9uYWxTZXR0aW5ncyI6eyJWYWx1ZSI6ZmFsc2UsIkNhbkJlQ2hhbmdlZCI6ZmFsc2UsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5YWRkaXRpb25hbHNldHRpbmdzIn0sIlNjaGVtYU5hbWUiOiJtc2VycF9jdXJyZW5jeSIsIkV4dGVybmFsTmFtZSI6IkN1cnJlbmN5IiwiSXNEYXRhU291cmNlU2VjcmV0IjpmYWxzZSwiSW5oZXJpdHNGcm9tIjpudWxsLCJDcmVhdGVkT24iOiIyMDI1LTA5LTAzVDE3OjUyOjUyLjYzMDAwMzIiLCJNb2RpZmllZE9uIjoiMjAyNS0wOS0wM1QxNzo1Mjo1Mi42MzAwMDMyIiwiU2V0dGluZ3MiOm51bGwsIk1ldGFkYXRhSWQiOiJkMTdhMzFjYy1lZTg4LWYwMTEtYjRjYi0wMDBkM2E1YmEzN2YiLCJGb3JtYXROYW1lIjp7IlZhbHVlIjoiVGV4dCJ9LCJBdHRyaWJ1dGVUeXBlTmFtZSI6eyJWYWx1ZSI6IlN0cmluZ1R5cGUifSwiSW50cm9kdWNlZFZlcnNpb24iOiIxLjAuMC4wIiwiSGFzQ2hhbmdlZCI6bnVsbCwiSXNMb2NhbGl6YWJsZSI6ZmFsc2UsIkZvcm11bGFEZWZpbml0aW9uIjoiIiwiU291cmNlVHlwZU1hc2siOjAsIklzTG9naWNhbCI6ZmFsc2UsIlNvdXJjZVR5cGUiOjAsIkRhdGFiYXNlTGVuZ3RoIjo2LCJBdXRvTnVtYmVyRm9ybWF0IjpudWxsfSwiV2lkdGgiOjEwMCwiU29ydERpc2FibGVkIjpmYWxzZX0seyJXaWR0aEFzUGVyY2VudCI6OS43MDE0OTI1MzczMTM0MzI5LCJUeXBlIjowLCJMb2dpY2FsTmFtZSI6Im1zZXJwX3Jlc3BvbnNlc3RhdHVzIiwiTmFtZSI6IlJlc3BvbnNlIHN0YXR1cyIsIk1ldGFkYXRhIjp7IkRlZmF1bHRGb3JtVmFsdWUiOm51bGwsIk9wdGlvblNldCI6eyJPcHRpb25zIjpbeyJWYWx1ZSI6MjAwMDAwMDAwLCJMYWJlbCI6eyJMb2NhbGl6ZWRMYWJlbHMiOlt7IkxhYmVsIjoiVW5hbnN3ZXJlZCIsIkxhbmd1YWdlQ29kZSI6MTAzMywiSXNNYW5hZ2VkIjp0cnVlLCJNZXRhZGF0YUlkIjoiOWNhZDcxZjktZjM3NS00MWM1LWIzZWUtNzEzNzQwMzgxZWFmIiwiSGFzQ2hhbmdlZCI6bnVsbH1dLCJVc2VyTG9jYWxpemVkTGFiZWwiOnsiTGFiZWwiOiJVbmFuc3dlcmVkIiwiTGFuZ3VhZ2VDb2RlIjoxMDMzLCJJc01hbmFnZWQiOnRydWUsIk1ldGFkYXRhSWQiOiI5Y2FkNzFmOS1mMzc1LTQxYzUtYjNlZS03MTM3NDAzODFlYWYiLCJIYXNDaGFuZ2VkIjpudWxsfX0sIkRlc2NyaXB0aW9uIjp7IkxvY2FsaXplZExhYmVscyI6W10sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6bnVsbH0sIkNvbG9yIjpudWxsLCJJc01hbmFnZWQiOnRydWUsIkV4dGVybmFsVmFsdWUiOiJQZW5kaW5nIiwiVGFnIjpudWxsLCJNZXRhZGF0YUlkIjpudWxsLCJIYXNDaGFuZ2VkIjpudWxsLCJQYXJlbnRWYWx1ZXMiOm51bGx9LHsiVmFsdWUiOjIwMDAwMDAwMSwiTGFiZWwiOnsiTG9jYWxpemVkTGFiZWxzIjpbeyJMYWJlbCI6IkFjY2VwdGVkIiwiTGFuZ3VhZ2VDb2RlIjoxMDMzLCJJc01hbmFnZWQiOnRydWUsIk1ldGFkYXRhSWQiOiJlN2U0MjllNC1mMWZjLTRlM2MtOTMwNC0zZmQwN2MzOGE1OGMiLCJIYXNDaGFuZ2VkIjpudWxsfV0sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6eyJMYWJlbCI6IkFjY2VwdGVkIiwiTGFuZ3VhZ2VDb2RlIjoxMDMzLCJJc01hbmFnZWQiOnRydWUsIk1ldGFkYXRhSWQiOiJlN2U0MjllNC1mMWZjLTRlM2MtOTMwNC0zZmQwN2MzOGE1OGMiLCJIYXNDaGFuZ2VkIjpudWxsfX0sIkRlc2NyaXB0aW9uIjp7IkxvY2FsaXplZExhYmVscyI6W10sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6bnVsbH0sIkNvbG9yIjpudWxsLCJJc01hbmFnZWQiOnRydWUsIkV4dGVybmFsVmFsdWUiOiJDb25maXJtZWQiLCJUYWciOm51bGwsIk1ldGFkYXRhSWQiOm51bGwsIkhhc0NoYW5nZWQiOm51bGwsIlBhcmVudFZhbHVlcyI6bnVsbH0seyJWYWx1ZSI6MjAwMDAwMDAyLCJMYWJlbCI6eyJMb2NhbGl6ZWRMYWJlbHMiOlt7IkxhYmVsIjoiUmVqZWN0ZWQiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6ImRmYjBiOTk1LTY0YTYtNDAwMS05YTEyLWU5YzVkMmJhNTlmNiIsIkhhc0NoYW5nZWQiOm51bGx9XSwiVXNlckxvY2FsaXplZExhYmVsIjp7IkxhYmVsIjoiUmVqZWN0ZWQiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6ImRmYjBiOTk1LTY0YTYtNDAwMS05YTEyLWU5YzVkMmJhNTlmNiIsIkhhc0NoYW5nZWQiOm51bGx9fSwiRGVzY3JpcHRpb24iOnsiTG9jYWxpemVkTGFiZWxzIjpbXSwiVXNlckxvY2FsaXplZExhYmVsIjpudWxsfSwiQ29sb3IiOm51bGwsIklzTWFuYWdlZCI6dHJ1ZSwiRXh0ZXJuYWxWYWx1ZSI6IlJlamVjdGVkIiwiVGFnIjpudWxsLCJNZXRhZGF0YUlkIjpudWxsLCJIYXNDaGFuZ2VkIjpudWxsLCJQYXJlbnRWYWx1ZXMiOm51bGx9LHsiVmFsdWUiOjIwMDAwMDAwMywiTGFiZWwiOnsiTG9jYWxpemVkTGFiZWxzIjpbeyJMYWJlbCI6IkVkaXRlZCIsIkxhbmd1YWdlQ29kZSI6MTAzMywiSXNNYW5hZ2VkIjp0cnVlLCJNZXRhZGF0YUlkIjoiNzQyNzU3ZjUtNDE5ZC00NWExLWEwYjQtY2E4NGFkZGNkYmMzIiwiSGFzQ2hhbmdlZCI6bnVsbH1dLCJVc2VyTG9jYWxpemVkTGFiZWwiOnsiTGFiZWwiOiJFZGl0ZWQiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6Ijc0Mjc1N2Y1LTQxOWQtNDVhMS1hMGI0LWNhODRhZGRjZGJjMyIsIkhhc0NoYW5nZWQiOm51bGx9fSwiRGVzY3JpcHRpb24iOnsiTG9jYWxpemVkTGFiZWxzIjpbXSwiVXNlckxvY2FsaXplZExhYmVsIjpudWxsfSwiQ29sb3IiOm51bGwsIklzTWFuYWdlZCI6dHJ1ZSwiRXh0ZXJuYWxWYWx1ZSI6IkVkaXRpbmciLCJUYWciOm51bGwsIk1ldGFkYXRhSWQiOm51bGwsIkhhc0NoYW5nZWQiOm51bGwsIlBhcmVudFZhbHVlcyI6bnVsbH0seyJWYWx1ZSI6MjAwMDAwMDA0LCJMYWJlbCI6eyJMb2NhbGl6ZWRMYWJlbHMiOlt7IkxhYmVsIjoiQWNjZXB0ZWQgd2l0aCBjaGFuZ2VzIiwiTGFuZ3VhZ2VDb2RlIjoxMDMzLCJJc01hbmFnZWQiOnRydWUsIk1ldGFkYXRhSWQiOiI2MmYzOWQ2Yy1lODcxLTQxMjItOWFmMC1kMjJlMjg0MDlkNGUiLCJIYXNDaGFuZ2VkIjpudWxsfV0sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6eyJMYWJlbCI6IkFjY2VwdGVkIHdpdGggY2hhbmdlcyIsIkxhbmd1YWdlQ29kZSI6MTAzMywiSXNNYW5hZ2VkIjp0cnVlLCJNZXRhZGF0YUlkIjoiNjJmMzlkNmMtZTg3MS00MTIyLTlhZjAtZDIyZTI4NDA5ZDRlIiwiSGFzQ2hhbmdlZCI6bnVsbH19LCJEZXNjcmlwdGlvbiI6eyJMb2NhbGl6ZWRMYWJlbHMiOltdLCJVc2VyTG9jYWxpemVkTGFiZWwiOm51bGx9LCJDb2xvciI6bnVsbCwiSXNNYW5hZ2VkIjp0cnVlLCJFeHRlcm5hbFZhbHVlIjoiQWNrbm93bGVkZ2VkV2l0aENoYW5nZSIsIlRhZyI6bnVsbCwiTWV0YWRhdGFJZCI6bnVsbCwiSGFzQ2hhbmdlZCI6bnVsbCwiUGFyZW50VmFsdWVzIjpudWxsfSx7IlZhbHVlIjoyMDAwMDAwMDUsIkxhYmVsIjp7IkxvY2FsaXplZExhYmVscyI6W3siTGFiZWwiOiJOb1Jlc3BvbnNlIiwiTGFuZ3VhZ2VDb2RlIjoxMDMzLCJJc01hbmFnZWQiOnRydWUsIk1ldGFkYXRhSWQiOiIzNDc0YmM1ZC0zMmYzLTQwMmEtODEyYi04Y2QyNGM4ZTU2ZDIiLCJIYXNDaGFuZ2VkIjpudWxsfV0sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6eyJMYWJlbCI6Ik5vUmVzcG9uc2UiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6IjM0NzRiYzVkLTMyZjMtNDAyYS04MTJiLThjZDI0YzhlNTZkMiIsIkhhc0NoYW5nZWQiOm51bGx9fSwiRGVzY3JpcHRpb24iOnsiTG9jYWxpemVkTGFiZWxzIjpbXSwiVXNlckxvY2FsaXplZExhYmVsIjpudWxsfSwiQ29sb3IiOm51bGwsIklzTWFuYWdlZCI6dHJ1ZSwiRXh0ZXJuYWxWYWx1ZSI6Ik5vUmVzcG9uc2UiLCJUYWciOm51bGwsIk1ldGFkYXRhSWQiOm51bGwsIkhhc0NoYW5nZWQiOm51bGwsIlBhcmVudFZhbHVlcyI6bnVsbH1dLCJEZXNjcmlwdGlvbiI6eyJMb2NhbGl6ZWRMYWJlbHMiOltdLCJVc2VyTG9jYWxpemVkTGFiZWwiOm51bGx9LCJEaXNwbGF5TmFtZSI6eyJMb2NhbGl6ZWRMYWJlbHMiOlt7IkxhYmVsIjoiUmVzcG9uc2Ugc3RhdHVzIChtc2VycCkiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6ImM4NTUyZGRlLWU3ODgtZjAxMS1iNGNiLTAwMGQzYTViYTM3ZiIsIkhhc0NoYW5nZWQiOm51bGx9XSwiVXNlckxvY2FsaXplZExhYmVsIjp7IkxhYmVsIjoiUmVzcG9uc2Ugc3RhdHVzIChtc2VycCkiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6ImM4NTUyZGRlLWU3ODgtZjAxMS1iNGNiLTAwMGQzYTViYTM3ZiIsIkhhc0NoYW5nZWQiOm51bGx9fSwiSXNDdXN0b21PcHRpb25TZXQiOnRydWUsIklzR2xvYmFsIjp0cnVlLCJJc01hbmFnZWQiOnRydWUsIklzQ3VzdG9taXphYmxlIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImlzY3VzdG9taXphYmxlIn0sIk5hbWUiOiJtc2VycF9wdXJjaGFzZW9yZGVycmVzcG9uc2VzdGF0ZSIsIkV4dGVybmFsVHlwZU5hbWUiOiJQdXJjaGFzZU9yZGVyUmVzcG9uc2VTdGF0ZSIsIk9wdGlvblNldFR5cGUiOjAsIk1ldGFkYXRhSWQiOiJjNzU1MmRkZS1lNzg4LWYwMTEtYjRjYi0wMDBkM2E1YmEzN2YiLCJJbnRyb2R1Y2VkVmVyc2lvbiI6IjEuMC4wLjAiLCJIYXNDaGFuZ2VkIjpudWxsLCJQYXJlbnRPcHRpb25TZXROYW1lIjpudWxsfSwiQXR0cmlidXRlT2YiOm51bGwsIkF0dHJpYnV0ZVR5cGUiOjExLCJDb2x1bW5OdW1iZXIiOjEyLCJEZXNjcmlwdGlvbiI6eyJMb2NhbGl6ZWRMYWJlbHMiOltdLCJVc2VyTG9jYWxpemVkTGFiZWwiOm51bGx9LCJEaXNwbGF5TmFtZSI6eyJMb2NhbGl6ZWRMYWJlbHMiOlt7IkxhYmVsIjoiUmVzcG9uc2Ugc3RhdHVzIiwiTGFuZ3VhZ2VDb2RlIjoxMDMzLCJJc01hbmFnZWQiOnRydWUsIk1ldGFkYXRhSWQiOiJhMjIzNTcyMy0wYTAzLTQzOGEtYjU0My1kOTliNDZmOGFiNzYiLCJIYXNDaGFuZ2VkIjpudWxsfSx7IkxhYmVsIjoiU3RhdG8gZGVsbGEgcmlzcG9zdGEiLCJMYW5ndWFnZUNvZGUiOjEwNDAsIklzTWFuYWdlZCI6ZmFsc2UsIk1ldGFkYXRhSWQiOiI0OTBmNDMxZC01Zjk4LWYwMTEtYmJkNC0wMDBkM2EzMjNhN2IiLCJIYXNDaGFuZ2VkIjpudWxsfV0sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6eyJMYWJlbCI6IlJlc3BvbnNlIHN0YXR1cyIsIkxhbmd1YWdlQ29kZSI6MTAzMywiSXNNYW5hZ2VkIjp0cnVlLCJNZXRhZGF0YUlkIjoiYTIyMzU3MjMtMGEwMy00MzhhLWI1NDMtZDk5YjQ2ZjhhYjc2IiwiSGFzQ2hhbmdlZCI6bnVsbH19LCJEZXByZWNhdGVkVmVyc2lvbiI6bnVsbCwiRW50aXR5TG9naWNhbE5hbWUiOiJtc2VycF92cm1wdXJjaGFzZW9yZGVyYWN0aXZlZW50aXR5IiwiSXNBdWRpdEVuYWJsZWQiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlhdWRpdHNldHRpbmdzIn0sIklzQ3VzdG9tQXR0cmlidXRlIjp0cnVlLCJJc1ByaW1hcnlJZCI6ZmFsc2UsIklzVmFsaWRPRGF0YUF0dHJpYnV0ZSI6dHJ1ZSwiSXNQcmltYXJ5TmFtZSI6ZmFsc2UsIklzVmFsaWRGb3JDcmVhdGUiOmZhbHNlLCJJc1ZhbGlkRm9yUmVhZCI6dHJ1ZSwiSXNWYWxpZEZvclVwZGF0ZSI6ZmFsc2UsIkNhbkJlU2VjdXJlZEZvclJlYWQiOmZhbHNlLCJDYW5CZVNlY3VyZWRGb3JDcmVhdGUiOmZhbHNlLCJDYW5CZVNlY3VyZWRGb3JVcGRhdGUiOmZhbHNlLCJJc1NlY3VyZWQiOmZhbHNlLCJJc1JldHJpZXZhYmxlIjpmYWxzZSwiSXNGaWx0ZXJhYmxlIjpmYWxzZSwiSXNTZWFyY2hhYmxlIjpmYWxzZSwiSXNNYW5hZ2VkIjp0cnVlLCJJc0dsb2JhbEZpbHRlckVuYWJsZWQiOnsiVmFsdWUiOmZhbHNlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5Z2xvYmFsZmlsdGVyc2V0dGluZ3MifSwiSXNTb3J0YWJsZUVuYWJsZWQiOnsiVmFsdWUiOmZhbHNlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5aXNzb3J0YWJsZXNldHRpbmdzIn0sIkxpbmtlZEF0dHJpYnV0ZUlkIjpudWxsLCJMb2dpY2FsTmFtZSI6Im1zZXJwX3Jlc3BvbnNlc3RhdHVzIiwiSXNDdXN0b21pemFibGUiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6ZmFsc2UsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiaXNjdXN0b21pemFibGUifSwiSXNSZW5hbWVhYmxlIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImlzcmVuYW1lYWJsZSJ9LCJJc1ZhbGlkRm9yQWR2YW5jZWRGaW5kIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5c2VhcmNoc2V0dGluZ3MifSwiSXNWYWxpZEZvckZvcm0iOnRydWUsIklzUmVxdWlyZWRGb3JGb3JtIjpmYWxzZSwiSXNWYWxpZEZvckdyaWQiOnRydWUsIlJlcXVpcmVkTGV2ZWwiOnsiVmFsdWUiOjAsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlyZXF1aXJlbWVudGxldmVsc2V0dGluZ3MifSwiQ2FuTW9kaWZ5QWRkaXRpb25hbFNldHRpbmdzIjp7IlZhbHVlIjpmYWxzZSwiQ2FuQmVDaGFuZ2VkIjpmYWxzZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlhZGRpdGlvbmFsc2V0dGluZ3MifSwiU2NoZW1hTmFtZSI6Im1zZXJwX3Jlc3BvbnNlc3RhdHVzIiwiRXh0ZXJuYWxOYW1lIjoiUmVzcG9uc2VTdGF0dXMiLCJJc0RhdGFTb3VyY2VTZWNyZXQiOmZhbHNlLCJJbmhlcml0c0Zyb20iOm51bGwsIkNyZWF0ZWRPbiI6IjIwMjUtMDktMDNUMTc6NTI6NTkuNDEzMDA0OCIsIk1vZGlmaWVkT24iOiIyMDI1LTA5LTAzVDE3OjUyOjU5LjQxMzAwNDgiLCJTZXR0aW5ncyI6bnVsbCwiTWV0YWRhdGFJZCI6IjMxZGZkN2QyLWVlODgtZjAxMS1iNGNiLTAwMGQzYTViYTM3ZiIsIkF0dHJpYnV0ZVR5cGVOYW1lIjp7IlZhbHVlIjoiUGlja2xpc3RUeXBlIn0sIkludHJvZHVjZWRWZXJzaW9uIjoiMS4wLjAuMCIsIkhhc0NoYW5nZWQiOm51bGwsIkZvcm11bGFEZWZpbml0aW9uIjoiIiwiU291cmNlVHlwZU1hc2siOjAsIklzTG9naWNhbCI6ZmFsc2UsIlNvdXJjZVR5cGUiOjAsIkF1dG9OdW1iZXJGb3JtYXQiOm51bGwsIlBhcmVudFBpY2tsaXN0TG9naWNhbE5hbWUiOm51bGwsIkNoaWxkUGlja2xpc3RMb2dpY2FsTmFtZXMiOm51bGwsIlBhcmVudEVudW1BdHRyaWJ1dGVMb2dpY2FsTmFtZSI6bnVsbH0sIldpZHRoIjoxMzAsIlNvcnREaXNhYmxlZCI6ZmFsc2V9LHsiV2lkdGhBc1BlcmNlbnQiOjExLjA0NDc3NjExOTQwMjk4NiwiVHlwZSI6MCwiTG9naWNhbE5hbWUiOiJtc2VycF9ma19yZXNwb25zZWhlYWRlcl9pZCIsIk5hbWUiOiJQdXJjaGFzZSBvcmRlciByZXNwb25zZSBoZWFkZXIgZm9yIFN1cHBsaWVyIFBvcnRhbCIsIk1ldGFkYXRhIjp7IlRhcmdldHMiOlsibXNlcnBfdnJtcHVyY2hhc2VvcmRlcnJlc3BvbnNlaGVhZGVyZW50aXR5Il0sIkZvcm1hdCI6MCwiQXR0cmlidXRlT2YiOm51bGwsIkF0dHJpYnV0ZVR5cGUiOjYsIkNvbHVtbk51bWJlciI6MTksIkRlc2NyaXB0aW9uIjp7IkxvY2FsaXplZExhYmVscyI6W10sIlVzZXJMb2NhbGl6ZWRMYWJlbCI6bnVsbH0sIkRpc3BsYXlOYW1lIjp7IkxvY2FsaXplZExhYmVscyI6W3siTGFiZWwiOiJQdXJjaGFzZSBvcmRlciByZXNwb25zZSBoZWFkZXIgZm9yIFN1cHBsaWVyIFBvcnRhbCIsIkxhbmd1YWdlQ29kZSI6MTAzMywiSXNNYW5hZ2VkIjp0cnVlLCJNZXRhZGF0YUlkIjoiM2I1ZGEyNzYtNzFlZS00MWY4LWIzMTItZDAyZGI3YWQyNjE3IiwiSGFzQ2hhbmdlZCI6bnVsbH0seyJMYWJlbCI6IkludGVzdGF6aW9uZSBkZWxsYSByaXNwb3N0YSBhbGwnb3JkaW5lIGRpIGFjcXVpc3RvIHBlciBpbCBQb3J0YWxlIGZvcm5pdG9yaSIsIkxhbmd1YWdlQ29kZSI6MTA0MCwiSXNNYW5hZ2VkIjpmYWxzZSwiTWV0YWRhdGFJZCI6IjYzMGY0MzFkLTVmOTgtZjAxMS1iYmQ0LTAwMGQzYTMyM2E3YiIsIkhhc0NoYW5nZWQiOm51bGx9XSwiVXNlckxvY2FsaXplZExhYmVsIjp7IkxhYmVsIjoiUHVyY2hhc2Ugb3JkZXIgcmVzcG9uc2UgaGVhZGVyIGZvciBTdXBwbGllciBQb3J0YWwiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6IjNiNWRhMjc2LTcxZWUtNDFmOC1iMzEyLWQwMmRiN2FkMjYxNyIsIkhhc0NoYW5nZWQiOm51bGx9fSwiRGVwcmVjYXRlZFZlcnNpb24iOm51bGwsIkVudGl0eUxvZ2ljYWxOYW1lIjoibXNlcnBfdnJtcHVyY2hhc2VvcmRlcmFjdGl2ZWVudGl0eSIsIklzQXVkaXRFbmFibGVkIjp7IlZhbHVlIjpmYWxzZSwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWF1ZGl0c2V0dGluZ3MifSwiSXNDdXN0b21BdHRyaWJ1dGUiOnRydWUsIklzUHJpbWFyeUlkIjpmYWxzZSwiSXNWYWxpZE9EYXRhQXR0cmlidXRlIjp0cnVlLCJJc1ByaW1hcnlOYW1lIjpmYWxzZSwiSXNWYWxpZEZvckNyZWF0ZSI6dHJ1ZSwiSXNWYWxpZEZvclJlYWQiOnRydWUsIklzVmFsaWRGb3JVcGRhdGUiOnRydWUsIkNhbkJlU2VjdXJlZEZvclJlYWQiOnRydWUsIkNhbkJlU2VjdXJlZEZvckNyZWF0ZSI6dHJ1ZSwiQ2FuQmVTZWN1cmVkRm9yVXBkYXRlIjp0cnVlLCJJc1NlY3VyZWQiOmZhbHNlLCJJc1JldHJpZXZhYmxlIjpmYWxzZSwiSXNGaWx0ZXJhYmxlIjpmYWxzZSwiSXNTZWFyY2hhYmxlIjpmYWxzZSwiSXNNYW5hZ2VkIjp0cnVlLCJJc0dsb2JhbEZpbHRlckVuYWJsZWQiOnsiVmFsdWUiOmZhbHNlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5Z2xvYmFsZmlsdGVyc2V0dGluZ3MifSwiSXNTb3J0YWJsZUVuYWJsZWQiOnsiVmFsdWUiOmZhbHNlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5aXNzb3J0YWJsZXNldHRpbmdzIn0sIkxpbmtlZEF0dHJpYnV0ZUlkIjpudWxsLCJMb2dpY2FsTmFtZSI6Im1zZXJwX2ZrX3Jlc3BvbnNlaGVhZGVyX2lkIiwiSXNDdXN0b21pemFibGUiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6ZmFsc2UsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiaXNjdXN0b21pemFibGUifSwiSXNSZW5hbWVhYmxlIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImlzcmVuYW1lYWJsZSJ9LCJJc1ZhbGlkRm9yQWR2YW5jZWRGaW5kIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOnRydWUsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5c2VhcmNoc2V0dGluZ3MifSwiSXNWYWxpZEZvckZvcm0iOnRydWUsIklzUmVxdWlyZWRGb3JGb3JtIjpmYWxzZSwiSXNWYWxpZEZvckdyaWQiOnRydWUsIlJlcXVpcmVkTGV2ZWwiOnsiVmFsdWUiOjAsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlyZXF1aXJlbWVudGxldmVsc2V0dGluZ3MifSwiQ2FuTW9kaWZ5QWRkaXRpb25hbFNldHRpbmdzIjp7IlZhbHVlIjp0cnVlLCJDYW5CZUNoYW5nZWQiOmZhbHNlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWFkZGl0aW9uYWxzZXR0aW5ncyJ9LCJTY2hlbWFOYW1lIjoibXNlcnBfRktfUmVzcG9uc2VIZWFkZXJfaWQiLCJFeHRlcm5hbE5hbWUiOiJGS19SZXNwb25zZUhlYWRlciIsIklzRGF0YVNvdXJjZVNlY3JldCI6ZmFsc2UsIkluaGVyaXRzRnJvbSI6bnVsbCwiQ3JlYXRlZE9uIjoiMjAyNS0wOS0wM1QxNzo1NDoyMC41Mjk5OTY4IiwiTW9kaWZpZWRPbiI6IjIwMjUtMDktMDNUMTc6NTQ6MjAuNTI5OTk2OCIsIlNldHRpbmdzIjpudWxsLCJNZXRhZGF0YUlkIjoiNjgyZjU1ZmEtY2NhNC00ODI2LThhNjUtZjA3NzYxYzhjOTNkIiwiQXR0cmlidXRlVHlwZU5hbWUiOnsiVmFsdWUiOiJMb29rdXBUeXBlIn0sIkludHJvZHVjZWRWZXJzaW9uIjoiMS4wLjAuMCIsIkhhc0NoYW5nZWQiOm51bGwsIklzTG9naWNhbCI6ZmFsc2UsIlNvdXJjZVR5cGUiOm51bGwsIkF1dG9OdW1iZXJGb3JtYXQiOm51bGx9LCJXaWR0aCI6MTQ4LCJTb3J0RGlzYWJsZWQiOmZhbHNlfSx7IldpZHRoQXNQZXJjZW50IjoxMi44MzU4MjA4OTU1MjIzODcsIlR5cGUiOjAsIkxvZ2ljYWxOYW1lIjoibXNlcnBfZmtfY29uZmlybWF0aW9uaGVhZGVyX2lkIiwiTmFtZSI6IlB1cmNoYXNlIG9yZGVyIGNvbmZpcm1hdGlvbiBoZWFkZXJzIGZvciBTdXBwbGllciBQb3J0YWwiLCJNZXRhZGF0YSI6eyJUYXJnZXRzIjpbIm1zZXJwX3ZybXB1cmNoYXNlb3JkZXJjb25maXJtYXRpb25oZWFkZXJlbnRpdHkiXSwiRm9ybWF0IjowLCJBdHRyaWJ1dGVPZiI6bnVsbCwiQXR0cmlidXRlVHlwZSI6NiwiQ29sdW1uTnVtYmVyIjoxNywiRGVzY3JpcHRpb24iOnsiTG9jYWxpemVkTGFiZWxzIjpbXSwiVXNlckxvY2FsaXplZExhYmVsIjpudWxsfSwiRGlzcGxheU5hbWUiOnsiTG9jYWxpemVkTGFiZWxzIjpbeyJMYWJlbCI6IlB1cmNoYXNlIG9yZGVyIGNvbmZpcm1hdGlvbiBoZWFkZXJzIGZvciBTdXBwbGllciBQb3J0YWwiLCJMYW5ndWFnZUNvZGUiOjEwMzMsIklzTWFuYWdlZCI6dHJ1ZSwiTWV0YWRhdGFJZCI6ImNkNWMyMjQ2LWE3M2MtNDM2Ni1iMGYwLWNkMDA2ZTk5ODZmMSIsIkhhc0NoYW5nZWQiOm51bGx9LHsiTGFiZWwiOiJJbnRlc3RhemlvbmkgZGkgY29uZmVybWEgZGVsbCdvcmRpbmUgZGkgYWNxdWlzdG8gcGVyIGlsIFBvcnRhbGUgZm9ybml0b3JpIiwiTGFuZ3VhZ2VDb2RlIjoxMDQwLCJJc01hbmFnZWQiOmZhbHNlLCJNZXRhZGF0YUlkIjoiNjAwZjQzMWQtNWY5OC1mMDExLWJiZDQtMDAwZDNhMzIzYTdiIiwiSGFzQ2hhbmdlZCI6bnVsbH1dLCJVc2VyTG9jYWxpemVkTGFiZWwiOnsiTGFiZWwiOiJQdXJjaGFzZSBvcmRlciBjb25maXJtYXRpb24gaGVhZGVycyBmb3IgU3VwcGxpZXIgUG9ydGFsIiwiTGFuZ3VhZ2VDb2RlIjoxMDMzLCJJc01hbmFnZWQiOnRydWUsIk1ldGFkYXRhSWQiOiJjZDVjMjI0Ni1hNzNjLTQzNjYtYjBmMC1jZDAwNmU5OTg2ZjEiLCJIYXNDaGFuZ2VkIjpudWxsfX0sIkRlcHJlY2F0ZWRWZXJzaW9uIjpudWxsLCJFbnRpdHlMb2dpY2FsTmFtZSI6Im1zZXJwX3ZybXB1cmNoYXNlb3JkZXJhY3RpdmVlbnRpdHkiLCJJc0F1ZGl0RW5hYmxlZCI6eyJWYWx1ZSI6ZmFsc2UsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlhdWRpdHNldHRpbmdzIn0sIklzQ3VzdG9tQXR0cmlidXRlIjp0cnVlLCJJc1ByaW1hcnlJZCI6ZmFsc2UsIklzVmFsaWRPRGF0YUF0dHJpYnV0ZSI6dHJ1ZSwiSXNQcmltYXJ5TmFtZSI6ZmFsc2UsIklzVmFsaWRGb3JDcmVhdGUiOnRydWUsIklzVmFsaWRGb3JSZWFkIjp0cnVlLCJJc1ZhbGlkRm9yVXBkYXRlIjp0cnVlLCJDYW5CZVNlY3VyZWRGb3JSZWFkIjp0cnVlLCJDYW5CZVNlY3VyZWRGb3JDcmVhdGUiOnRydWUsIkNhbkJlU2VjdXJlZEZvclVwZGF0ZSI6dHJ1ZSwiSXNTZWN1cmVkIjpmYWxzZSwiSXNSZXRyaWV2YWJsZSI6ZmFsc2UsIklzRmlsdGVyYWJsZSI6ZmFsc2UsIklzU2VhcmNoYWJsZSI6ZmFsc2UsIklzTWFuYWdlZCI6dHJ1ZSwiSXNHbG9iYWxGaWx0ZXJFbmFibGVkIjp7IlZhbHVlIjpmYWxzZSwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWdsb2JhbGZpbHRlcnNldHRpbmdzIn0sIklzU29ydGFibGVFbmFibGVkIjp7IlZhbHVlIjpmYWxzZSwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeWlzc29ydGFibGVzZXR0aW5ncyJ9LCJMaW5rZWRBdHRyaWJ1dGVJZCI6bnVsbCwiTG9naWNhbE5hbWUiOiJtc2VycF9ma19jb25maXJtYXRpb25oZWFkZXJfaWQiLCJJc0N1c3RvbWl6YWJsZSI6eyJWYWx1ZSI6dHJ1ZSwiQ2FuQmVDaGFuZ2VkIjpmYWxzZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJpc2N1c3RvbWl6YWJsZSJ9LCJJc1JlbmFtZWFibGUiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6ZmFsc2UsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiaXNyZW5hbWVhYmxlIn0sIklzVmFsaWRGb3JBZHZhbmNlZEZpbmQiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6dHJ1ZSwiTWFuYWdlZFByb3BlcnR5TG9naWNhbE5hbWUiOiJjYW5tb2RpZnlzZWFyY2hzZXR0aW5ncyJ9LCJJc1ZhbGlkRm9yRm9ybSI6dHJ1ZSwiSXNSZXF1aXJlZEZvckZvcm0iOmZhbHNlLCJJc1ZhbGlkRm9yR3JpZCI6dHJ1ZSwiUmVxdWlyZWRMZXZlbCI6eyJWYWx1ZSI6MCwiQ2FuQmVDaGFuZ2VkIjp0cnVlLCJNYW5hZ2VkUHJvcGVydHlMb2dpY2FsTmFtZSI6ImNhbm1vZGlmeXJlcXVpcmVtZW50bGV2ZWxzZXR0aW5ncyJ9LCJDYW5Nb2RpZnlBZGRpdGlvbmFsU2V0dGluZ3MiOnsiVmFsdWUiOnRydWUsIkNhbkJlQ2hhbmdlZCI6ZmFsc2UsIk1hbmFnZWRQcm9wZXJ0eUxvZ2ljYWxOYW1lIjoiY2FubW9kaWZ5YWRkaXRpb25hbHNldHRpbmdzIn0sIlNjaGVtYU5hbWUiOiJtc2VycF9GS19Db25maXJtYXRpb25IZWFkZXJfaWQiLCJFeHRlcm5hbE5hbWUiOiJGS19Db25maXJtYXRpb25IZWFkZXIiLCJJc0RhdGFTb3VyY2VTZWNyZXQiOmZhbHNlLCJJbmhlcml0c0Zyb20iOm51bGwsIkNyZWF0ZWRPbiI6IjIwMjUtMDktMDNUMTc6NTM6NDAuODk5OTkzNiIsIk1vZGlmaWVkT24iOiIyMDI1LTA5LTAzVDE3OjUzOjQwLjg5OTk5MzYiLCJTZXR0aW5ncyI6bnVsbCwiTWV0YWRhdGFJZCI6IjQyMDExNGNhLWQyNDUtNDU0Yy1hMjA4LTllMWYyM2ViMTJjNyIsIkF0dHJpYnV0ZVR5cGVOYW1lIjp7IlZhbHVlIjoiTG9va3VwVHlwZSJ9LCJJbnRyb2R1Y2VkVmVyc2lvbiI6IjEuMC4wLjAiLCJIYXNDaGFuZ2VkIjpudWxsLCJJc0xvZ2ljYWwiOmZhbHNlLCJTb3VyY2VUeXBlIjpudWxsLCJBdXRvTnVtYmVyRm9ybWF0IjpudWxsfSwiV2lkdGgiOjE3MiwiU29ydERpc2FibGVkIjpmYWxzZX0seyJXaWR0aEFzUGVyY2VudCI6MS40OTI1MzczMTM0MzI4MzU3LCJUeXBlIjoyLCJMb2dpY2FsTmFtZSI6ImNvbC1hY3Rpb24iLCJOYW1lIjoiPHNwYW4gY2xhc3M9J3NyLW9ubHknPkFjdGlvbnM8L3NwYW4+IiwiTWV0YWRhdGEiOm51bGwsIldpZHRoIjoyMCwiU29ydERpc2FibGVkIjp0cnVlfV0sIkNvbHVtbnNUb3RhbFdpZHRoIjoxMzQwLCJTb3J0RXhwcmVzc2lvbiI6IiIsIklkIjoiODMwZjI5M2MtZjA2ZS1mMDExLWJlYzMtMDAyMjQ4MDljMTQ5In1d"
										data-user-isauthenticated="true"
										data-user-parent-account-name=""
										data-mobile-view-enabled="false"
										data-ai-insights-enabled="false"
										data-enable-streaming="false"
										data-ai-insights-expanded="true"
										data-is-nl-search-enabled="false"
										data-ai-insights-position="top"
										data-nl-search-filter=""
									>
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
															style="width: 14.925373134328357%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Purchase order"
																tabindex="0"
																>Purchase order<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 1.4925373134328357%"
															class="sort-disabled"
															aria-label="Actions"
															data-th="&lt;span class='sr-only'&gt;Actions&lt;/span&gt;"
														>
															<span class="sr-only">Actions</span
															><a>Actions</a>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 10.895522388059701%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Date time received"
																tabindex="0"
																>Date time received<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 7.462686567164178%"
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
															style="width: 7.91044776119403%"
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
															style="width: 16.268656716417908%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Amount in transaction currency"
																tabindex="0"
																>Amount in transaction
																currency<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 7.462686567164178%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Currency"
																tabindex="0"
																>Currency<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 9.701492537313433%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Response status"
																tabindex="0"
																>Response status<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="
																width: 11.0448%;
																display: none;
															"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Purchase order response header for Supplier Portal"
																tabindex="0"
																>Purchase order response header
																for Supplier Portal<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="
																width: 12.8358%;
																display: none;
															"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Purchase order confirmation headers for Supplier Portal"
																tabindex="0"
																>Purchase order confirmation
																headers for Supplier Portal<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
													</tr>
												</thead>
												<tbody style="">
													<tr
														data-id="00007d26-0000-0000-1000-005001000000"
														data-entity="mserp_vrmpurchaseorderactiveentity"
														data-name="00000126"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="00000126"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="00000126"
														>
															<a
																href="#"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View"
																>00000126</a
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
																			href="#"
																			title="View Response"
																			aria-setsize="11"
																			aria-posinset="1"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Response"
																			aria-setsize="11"
																			aria-posinset="2"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Details"
																			aria-setsize="11"
																			aria-posinset="3"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Archived Order"
																			aria-setsize="11"
																			aria-posinset="4"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Prepare to Submit"
																			aria-setsize="11"
																			aria-posinset="5"
																			style="display: none"
																			>Prepare to Submit</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Save as Draft"
																			aria-setsize="11"
																			aria-posinset="6"
																			style="display: none"
																			>Save as Draft</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Discard all Changes"
																			aria-setsize="11"
																			aria-posinset="7"
																			style="display: none"
																			>Discard all Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Accept PO"
																			aria-setsize="11"
																			aria-posinset="8"
																			style="display: none"
																			>Accept PO</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Suggest Changes"
																			aria-setsize="11"
																			aria-posinset="9"
																			style="display: none"
																			>Suggest Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Decline"
																			aria-setsize="11"
																			aria-posinset="10"
																			style="display: none"
																			>Decline</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View"
																			aria-setsize="11"
																			aria-posinset="11"
																			style="display: none"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_datetimereceived"
															data-value="/Date(1757851593000)/"
															aria-readonly="true"
															data-th="Date time received"
															aria-label="9/14/2025 12:06 PM"
														>
															<time
																datetime="2025-09-14T12:06:33"
																>9/14/2025 12:06 PM</time
															>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_company"
															data-value="usmf"
															aria-readonly="true"
															data-th="Company"
															aria-label="usmf"
														>
															usmf
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="4"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="4"
														>
															4
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_amount"
															data-value="360"
															aria-readonly="true"
															data-th="Amount in transaction currency"
															aria-label="360.000000"
														>
															360,00
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currency"
															data-value="USD"
															aria-readonly="true"
															data-th="Currency"
															aria-label="USD"
														>
															USD
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestatus"
															data-value='{"Value":200000004,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="Accepted with changes"
														>
															Accepted with changes
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_fk_responseheader_id"
															data-value='{"Id":"00007c70-0000-0000-1000-005001000000","LogicalName":"mserp_vrmpurchaseorderresponseheaderentity","Name":"00000126-R1","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Purchase order response header for Supplier Portal"
															aria-label="00000126-R1"
															style="display: none"
														>
															00000126-R1
														</td>
														<td
															aria-readonly="true"
															data-th="Purchase order confirmation headers for Supplier Portal"
															aria-label=""
															style="display: none"
														></td>
													</tr>
													<tr
														data-id="00007d26-0000-0000-fd02-005001000000"
														data-entity="mserp_vrmpurchaseorderactiveentity"
														data-name="BRMF-000041"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="BRMF-000041"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="BRMF-000041"
														>
															<a
																href="#"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View"
																>BRMF-000041</a
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
																			href="#"
																			title="View Response"
																			aria-setsize="11"
																			aria-posinset="1"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Response"
																			aria-setsize="11"
																			aria-posinset="2"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Details"
																			aria-setsize="11"
																			aria-posinset="3"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Archived Order"
																			aria-setsize="11"
																			aria-posinset="4"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Prepare to Submit"
																			aria-setsize="11"
																			aria-posinset="5"
																			>Prepare to Submit</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Save as Draft"
																			aria-setsize="11"
																			aria-posinset="6"
																			>Save as Draft</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Discard all Changes"
																			aria-setsize="11"
																			aria-posinset="7"
																			>Discard all Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Accept PO"
																			aria-setsize="11"
																			aria-posinset="8"
																			style="display: none"
																			>Accept PO</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Suggest Changes"
																			aria-setsize="11"
																			aria-posinset="9"
																			style="display: none"
																			>Suggest Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Decline"
																			aria-setsize="11"
																			aria-posinset="10"
																			style="display: none"
																			>Decline</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View"
																			aria-setsize="11"
																			aria-posinset="11"
																			style="display: none"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_datetimereceived"
															data-value="/Date(1757855435000)/"
															aria-readonly="true"
															data-th="Date time received"
															aria-label="9/14/2025 1:10 PM"
														>
															<time
																datetime="2025-09-14T13:10:35"
																>9/14/2025 1:10 PM</time
															>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_company"
															data-value="brmf"
															aria-readonly="true"
															data-th="Company"
															aria-label="brmf"
														>
															brmf
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="4"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="4"
														>
															4
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_amount"
															data-value="206.01"
															aria-readonly="true"
															data-th="Amount in transaction currency"
															aria-label="206.010000"
														>
															206,01
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currency"
															data-value="USD"
															aria-readonly="true"
															data-th="Currency"
															aria-label="USD"
														>
															USD
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestatus"
															data-value='{"Value":200000003,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="Edited"
														>
															Edited
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_fk_responseheader_id"
															data-value='{"Id":"00007c70-0000-0000-fd02-005001000000","LogicalName":"mserp_vrmpurchaseorderresponseheaderentity","Name":"BRMF-000041-R1","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Purchase order response header for Supplier Portal"
															aria-label="BRMF-000041-R1"
															style="display: none"
														>
															BRMF-000041-R1
														</td>
														<td
															aria-readonly="true"
															data-th="Purchase order confirmation headers for Supplier Portal"
															aria-label=""
															style="display: none"
														></td>
													</tr>
													<tr
														data-id="00007d26-0000-0000-eb05-005001000000"
														data-entity="mserp_vrmpurchaseorderactiveentity"
														data-name="000071"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="000071"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="000071"
														>
															<a
																href="#"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View"
																>000071</a
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
																			href="#"
																			title="View Response"
																			aria-setsize="11"
																			aria-posinset="1"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Response"
																			aria-setsize="11"
																			aria-posinset="2"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Details"
																			aria-setsize="11"
																			aria-posinset="3"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Archived Order"
																			aria-setsize="11"
																			aria-posinset="4"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Prepare to Submit"
																			aria-setsize="11"
																			aria-posinset="5"
																			style="display: none"
																			>Prepare to Submit</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Save as Draft"
																			aria-setsize="11"
																			aria-posinset="6"
																			style="display: none"
																			>Save as Draft</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Discard all Changes"
																			aria-setsize="11"
																			aria-posinset="7"
																			style="display: none"
																			>Discard all Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Accept PO"
																			aria-setsize="11"
																			aria-posinset="8"
																			style="display: none"
																			>Accept PO</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Suggest Changes"
																			aria-setsize="11"
																			aria-posinset="9"
																			style="display: none"
																			>Suggest Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Decline"
																			aria-setsize="11"
																			aria-posinset="10"
																			style="display: none"
																			>Decline</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View"
																			aria-setsize="11"
																			aria-posinset="11"
																			style="display: none"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_datetimereceived"
															data-value="/Date(1758110107000)/"
															aria-readonly="true"
															data-th="Date time received"
															aria-label="9/17/2025 11:55 AM"
														>
															<time
																datetime="2025-09-17T11:55:07"
																>9/17/2025 11:55 AM</time
															>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_company"
															data-value="usp2"
															aria-readonly="true"
															data-th="Company"
															aria-label="usp2"
														>
															usp2
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="2"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="2"
														>
															2
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_amount"
															data-value="1.32"
															aria-readonly="true"
															data-th="Amount in transaction currency"
															aria-label="1.320000"
														>
															1,32
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currency"
															data-value="USD"
															aria-readonly="true"
															data-th="Currency"
															aria-label="USD"
														>
															USD
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestatus"
															data-value='{"Value":200000004,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="Accepted with changes"
														>
															Accepted with changes
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_fk_responseheader_id"
															data-value='{"Id":"00007c70-0000-0000-eb05-005001000000","LogicalName":"mserp_vrmpurchaseorderresponseheaderentity","Name":"000071-R1","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Purchase order response header for Supplier Portal"
															aria-label="000071-R1"
															style="display: none"
														>
															000071-R1
														</td>
														<td
															aria-readonly="true"
															data-th="Purchase order confirmation headers for Supplier Portal"
															aria-label=""
															style="display: none"
														></td>
													</tr>
													<tr
														data-id="00007d26-0000-0000-ec05-005001000000"
														data-entity="mserp_vrmpurchaseorderactiveentity"
														data-name="ITCO-000003"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="ITCO-000003"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="ITCO-000003"
														>
															<a
																href="#"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View"
																>ITCO-000003</a
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
																			href="#"
																			title="View Response"
																			aria-setsize="11"
																			aria-posinset="1"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Response"
																			aria-setsize="11"
																			aria-posinset="2"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Details"
																			aria-setsize="11"
																			aria-posinset="3"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Archived Order"
																			aria-setsize="11"
																			aria-posinset="4"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Prepare to Submit"
																			aria-setsize="11"
																			aria-posinset="5"
																			style="display: none"
																			>Prepare to Submit</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Save as Draft"
																			aria-setsize="11"
																			aria-posinset="6"
																			style="display: none"
																			>Save as Draft</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Discard all Changes"
																			aria-setsize="11"
																			aria-posinset="7"
																			style="display: none"
																			>Discard all Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Accept PO"
																			aria-setsize="11"
																			aria-posinset="8"
																			style="display: none"
																			>Accept PO</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Suggest Changes"
																			aria-setsize="11"
																			aria-posinset="9"
																			style="display: none"
																			>Suggest Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Decline"
																			aria-setsize="11"
																			aria-posinset="10"
																			style="display: none"
																			>Decline</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View"
																			aria-setsize="11"
																			aria-posinset="11"
																			style="display: none"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_datetimereceived"
															data-value="/Date(1758109929000)/"
															aria-readonly="true"
															data-th="Date time received"
															aria-label="9/17/2025 11:52 AM"
														>
															<time
																datetime="2025-09-17T11:52:09"
																>9/17/2025 11:52 AM</time
															>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_company"
															data-value="itco"
															aria-readonly="true"
															data-th="Company"
															aria-label="itco"
														>
															itco
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="2"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="2"
														>
															2
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_amount"
															data-value="0"
															aria-readonly="true"
															data-th="Amount in transaction currency"
															aria-label="0.000000"
														>
															0,00
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currency"
															data-value="USD"
															aria-readonly="true"
															data-th="Currency"
															aria-label="USD"
														>
															USD
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestatus"
															data-value='{"Value":200000004,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="Accepted with changes"
														>
															Accepted with changes
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_fk_responseheader_id"
															data-value='{"Id":"00007c70-0000-0000-ec05-005001000000","LogicalName":"mserp_vrmpurchaseorderresponseheaderentity","Name":"ITCO-000003-R1","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Purchase order response header for Supplier Portal"
															aria-label="ITCO-000003-R1"
															style="display: none"
														>
															ITCO-000003-R1
														</td>
														<td
															aria-readonly="true"
															data-th="Purchase order confirmation headers for Supplier Portal"
															aria-label=""
															style="display: none"
														></td>
													</tr>
													<tr
														data-id="00007d26-0000-0000-ed05-005001000000"
														data-entity="mserp_vrmpurchaseorderactiveentity"
														data-name="000065"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="000065"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="000065"
														>
															<a
																href="#"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View"
																>000065</a
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
																			href="#"
																			title="View Response"
																			aria-setsize="11"
																			aria-posinset="1"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Response"
																			aria-setsize="11"
																			aria-posinset="2"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Details"
																			aria-setsize="11"
																			aria-posinset="3"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Archived Order"
																			aria-setsize="11"
																			aria-posinset="4"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Prepare to Submit"
																			aria-setsize="11"
																			aria-posinset="5"
																			>Prepare to Submit</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Save as Draft"
																			aria-setsize="11"
																			aria-posinset="6"
																			>Save as Draft</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Discard all Changes"
																			aria-setsize="11"
																			aria-posinset="7"
																			>Discard all Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Accept PO"
																			aria-setsize="11"
																			aria-posinset="8"
																			style="display: none"
																			>Accept PO</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Suggest Changes"
																			aria-setsize="11"
																			aria-posinset="9"
																			style="display: none"
																			>Suggest Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Decline"
																			aria-setsize="11"
																			aria-posinset="10"
																			style="display: none"
																			>Decline</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View"
																			aria-setsize="11"
																			aria-posinset="11"
																			style="display: none"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_datetimereceived"
															data-value="/Date(1758110163000)/"
															aria-readonly="true"
															data-th="Date time received"
															aria-label="9/17/2025 11:56 AM"
														>
															<time
																datetime="2025-09-17T11:56:03"
																>9/17/2025 11:56 AM</time
															>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_company"
															data-value="frrt"
															aria-readonly="true"
															data-th="Company"
															aria-label="frrt"
														>
															frrt
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="2"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="2"
														>
															2
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_amount"
															data-value="17.84"
															aria-readonly="true"
															data-th="Amount in transaction currency"
															aria-label="17.840000"
														>
															17,84
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currency"
															data-value="EUR"
															aria-readonly="true"
															data-th="Currency"
															aria-label="EUR"
														>
															EUR
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestatus"
															data-value='{"Value":200000003,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="Edited"
														>
															Edited
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_fk_responseheader_id"
															data-value='{"Id":"00007c70-0000-0000-ed05-005001000000","LogicalName":"mserp_vrmpurchaseorderresponseheaderentity","Name":"000065-R1","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Purchase order response header for Supplier Portal"
															aria-label="000065-R1"
															style="display: none"
														>
															000065-R1
														</td>
														<td
															aria-readonly="true"
															data-th="Purchase order confirmation headers for Supplier Portal"
															aria-label=""
															style="display: none"
														></td>
													</tr>
													<tr
														data-id="00007d26-0000-0000-f168-000010000000"
														data-entity="mserp_vrmpurchaseorderactiveentity"
														data-name="00000125"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="00000125"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="00000125"
														>
															<a
																href="#"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View"
																>00000125</a
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
																			href="#"
																			title="View Response"
																			aria-setsize="11"
																			aria-posinset="1"
																			style="display: none"
																			>View Response</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Response"
																			aria-setsize="11"
																			aria-posinset="2"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Order Details"
																			aria-setsize="11"
																			aria-posinset="3"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View Received Archived Order"
																			aria-setsize="11"
																			aria-posinset="4"
																			style="display: none"
																			>View Received Order</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Prepare to Submit"
																			aria-setsize="11"
																			aria-posinset="5"
																			style="display: none"
																			>Prepare to Submit</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Save as Draft"
																			aria-setsize="11"
																			aria-posinset="6"
																			style="display: none"
																			>Save as Draft</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Discard all Changes"
																			aria-setsize="11"
																			aria-posinset="7"
																			style="display: none"
																			>Discard all Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Accept PO"
																			aria-setsize="11"
																			aria-posinset="8"
																			style="display: none"
																			>Accept PO</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Suggest Changes"
																			aria-setsize="11"
																			aria-posinset="9"
																			style="display: none"
																			>Suggest Changes</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="Decline"
																			aria-setsize="11"
																			aria-posinset="10"
																			style="display: none"
																			>Decline</a
																		>
																	</li>
																	<li role="none">
																		<a
																			class="details-link dropdown-item"
																			role="menuitem"
																			tabindex="-1"
																			href="#"
																			title="View"
																			aria-setsize="11"
																			aria-posinset="11"
																			>View</a
																		>
																	</li>
																</ul>
															</div>
														</td>
														<td
															data-type="System.DateTime"
															data-attribute="mserp_datetimereceived"
															data-value="/Date(1757421654000)/"
															aria-readonly="true"
															data-th="Date time received"
															aria-label="9/9/2025 12:40 PM"
														>
															<time
																datetime="2025-09-09T12:40:54"
																>9/9/2025 12:40 PM</time
															>
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_company"
															data-value="usmf"
															aria-readonly="true"
															data-th="Company"
															aria-label="usmf"
														>
															usmf
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_numberoflines"
															data-value="3"
															aria-readonly="true"
															data-th="No. of lines"
															aria-label="3"
														>
															3
														</td>
														<td
															data-type="System.Decimal"
															data-attribute="mserp_amount"
															data-value="438.99"
															aria-readonly="true"
															data-th="Amount in transaction currency"
															aria-label="438.990000"
														>
															438,99
														</td>
														<td
															data-type="System.String"
															data-attribute="mserp_currency"
															data-value="USD"
															aria-readonly="true"
															data-th="Currency"
															aria-label="USD"
														>
															USD
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_responsestatus"
															data-value='{"Value":200000005,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Response status"
															aria-label="NoResponse"
														>
															NoResponse
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_fk_responseheader_id"
															data-value='{"Id":"00007c70-0000-0000-0f00-005001000000","LogicalName":"mserp_vrmpurchaseorderresponseheaderentity","Name":"00000125-R1","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Purchase order response header for Supplier Portal"
															aria-label="00000125-R1"
															style="display: none"
														>
															00000125-R1
														</td>
														<td
															data-type="Microsoft.Xrm.Sdk.EntityReference"
															data-attribute="mserp_fk_confirmationheader_id"
															data-value='{"Id":"000078e0-0000-0000-fa5f-000010000000","LogicalName":"mserp_vrmpurchaseorderconfirmationheaderentity","Name":"00000125","KeyAttributes":[],"RowVersion":null,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Purchase order confirmation headers for Supplier Portal"
															aria-label="00000125"
															style="display: none"
														>
															00000125
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div
											class="view-empty message"
											style="display: none"
										>
											There are no records to display.
										</div>
										<div
											class="view-empty-maker message"
											style="display: none"
										>
											To see records displayed here, choose preview.
										</div>
										<div
											class="view-access-denied message"
											style="display: none"
										>
											<div class="alert alert-block alert-danger">
												You don't have permissions to view these
												records.
											</div>
										</div>
										<div
											class="view-error message"
											style="display: none"
										>
											<div class="alert alert-block alert-danger">
												Error completing request.
												<span class="details"></span>
											</div>
										</div>
										<div
											class="view-loading message text-center"
											style="display: block"
										>
											<div class="loading-wrapper">
												<fluent-progress-ring role="progressbar"
													><template shadowrootmode="open"
														><slot
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
															</svg> </slot></template
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
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-insert"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-edit"
																aria-hidden="true"
															></span>
															Create
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-edit"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-edit"
																aria-hidden="true"
															></span>
															Edit
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-details"
											role="dialog"
											tabindex="-1"
											aria-labelledby="modalTitleID_24fab05c-ef6e-f011-bec3-00224809c149"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4
															id="modalTitleID_24fab05c-ef6e-f011-bec3-00224809c149"
															class="modal-title"
														>
															<span
																class="fa fa-info-circle"
																aria-hidden="true"
															></span>
															View details
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															aria-hidden="true"
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-delete"
											role="dialog"
											tabindex="-1"
											aria-label="Delete"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-trash-can"
																aria-hidden="true"
															></span>
															Delete
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Delete</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-error"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-exclamation-triangle"
																aria-hidden="true"
															></span>
															Error
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<p>
															We're sorry, an error has occurred.
														</p>
													</div>
													<div class="modal-footer">
														<button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Close
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-createrecord"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-plus-circle"
																aria-hidden="true"
															></span>
															Create related record
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-run-workflow"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Run workflow
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														&lt;p&gt;Are you sure you want to run
														this workflow?&lt;/p&gt;
													</div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Run workflow</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-deactivate"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Deactivate
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Deactivate</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-activate"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Activate</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Activate</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											aria-label="Resolve case"
											class="modal fade modal-resolvecase"
											data-backdrop="static"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Resolve case
														</h4>
														<button
															class="form-close"
															data-bs-dismiss="modal"
															tabindex="0"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="row mb-3">
															<label
																class="required col-form-label col-md-3"
															>
															</label>
															<div class="col-md-9">
																<input
																	aria-required="true"
																	class="resolution-input required form-control"
																	type="text"
																	aria-label=""
																/>
															</div>
														</div>
														<div class="row mb-3">
															<label
																class="required col-form-label col-md-3"
															>
															</label>
															<div class="col-md-9">
																<textarea
																	aria-required="true"
																	class="resolution-description-input required form-control"
																	cols="20"
																	rows="6"
																	aria-label=""
																></textarea>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button
															tabindex="0"
															class="primary btn btn-success"
															type="button"
														>
															Resolve
														</button>
														<button
															tabindex="0"
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div
								id="confirmedPo"
								class="table-list"
								style="display: none"
							>
								<div class="entitylist">
									<div
										class="entity-grid entitylist"
										data-id="1758816838443.17"
										data-column-width-style="Percent"
										data-defer-loading="false"
										data-enable-actions="true"
										data-get-url="/_services/entity-grid-data.json/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-get-ai-insights-url="/_services/entity-grid-ai-summary.json/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-update-url="/_services/entity-grid-update-entity/a95fa527-1f4a-4589-876f-6ef8db36120d"
										data-grid-class="table-none-striped"
										data-select-mode="None"
										data-selected-view="da1b1acd-1b16-f011-998a-000d3a331ad0"
										data-user-isauthenticated="true"
										data-user-parent-account-name=""
										data-mobile-view-enabled="false"
										data-ai-insights-enabled="false"
										data-enable-streaming="false"
										data-ai-insights-expanded="true"
										data-is-nl-search-enabled="false"
										data-ai-insights-position="top"
										data-nl-search-filter=""
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
											<div
												class="float-start toolbar-actions viewTitle"
												id="activepos"
											>
												<h5 class="fw-bolder">Active POs</h5>
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
															style="width: 30.76923076923077%"
															class="sort-enabled sort sort-asc"
															aria-sort="ascending"
														>
															<a
																href="#"
																role="button"
																aria-label="Purchase order"
																tabindex="0"
																>Purchase order
																<span
																	class="fa fa-arrow-up"
																	aria-hidden="true"
																></span
																><span
																	class="visually-hidden sort-hint"
																	>. sort ascending</span
																></a
															>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 4.962779156327544%"
															class="sort-disabled"
															aria-label="Actions"
															data-th="&lt;span class='sr-only'&gt;Actions&lt;/span&gt;"
														>
															<span class="sr-only">Actions</span
															><a>Actions</a>
														</th>
														<th
															scope="col"
															aria-readonly="true"
															style="width: 24.81389578163772%"
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
															style="width: 39.45409429280397%"
															class="sort-enabled"
														>
															<a
																href="#"
																role="button"
																aria-label="Purchase order status"
																tabindex="0"
																>Purchase order status<span
																	class="visually-hidden sort-hint"
																	>. sort descending</span
																></a
															>
														</th>
													</tr>
												</thead>
												<tbody style="">
													<tr
														data-id="000078e0-0000-0000-fa5f-000010000000"
														data-entity="mserp_vrmpurchaseorderconfirmationheaderentity"
														data-name="00000125"
													>
														<td
															data-type="System.String"
															data-attribute="mserp_purchaseordernumber"
															data-value="00000125"
															aria-readonly="true"
															data-th="Purchase order"
															aria-label="00000125"
														>
															<a
																href="/Purchase-Order-Confirmation/?id=000078e0-0000-0000-fa5f-000010000000"
																class="details-link has-tooltip"
																data-bs-toggle="tooltip"
																title="View details"
																>00000125</a
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
																			href="/Purchase-Order-Confirmation/?id=000078e0-0000-0000-fa5f-000010000000"
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
															data-type="Microsoft.Xrm.Sdk.OptionSetValue"
															data-attribute="mserp_purchaseorderstatus"
															data-value='{"Value":200000001,"ExtensionData":null}'
															aria-readonly="true"
															data-th="Purchase order status"
															aria-label="Open order"
														>
															Open order
														</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div
											class="view-empty message"
											style="display: none"
										>
											There are no records to display.
										</div>
										<div
											class="view-empty-maker message"
											style="display: none"
										>
											To see records displayed here, choose preview.
										</div>
										<div
											class="view-access-denied message"
											style="display: none"
										>
											<div class="alert alert-block alert-danger">
												You don't have permissions to view these
												records.
											</div>
										</div>
										<div
											class="view-error message"
											style="display: none"
										>
											<div class="alert alert-block alert-danger">
												Error completing request.
												<span class="details"></span>
											</div>
										</div>
										<div
											class="view-loading message text-center"
											style="display: block"
										>
											<div class="loading-wrapper">
												<fluent-progress-ring role="progressbar"
													><template shadowrootmode="open"
														><slot
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
															</svg> </slot></template
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
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-insert"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-edit"
																aria-hidden="true"
															></span>
															Create
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-edit"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-edit"
																aria-hidden="true"
															></span>
															Edit
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-details"
											role="dialog"
											tabindex="-1"
											aria-labelledby="modalTitleID_80b50f9a-41d8-ef11-a730-6045bd0144cc"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4
															id="modalTitleID_80b50f9a-41d8-ef11-a730-6045bd0144cc"
															class="modal-title"
														>
															<span
																class="fa fa-info-circle"
																aria-hidden="true"
															></span>
															View details
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															aria-hidden="true"
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-delete"
											role="dialog"
											tabindex="-1"
											aria-label="Delete"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-trash-can"
																aria-hidden="true"
															></span>
															Delete
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Delete</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-error"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-exclamation-triangle"
																aria-hidden="true"
															></span>
															Error
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<p>
															We're sorry, an error has occurred.
														</p>
													</div>
													<div class="modal-footer">
														<button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Close
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-form modal-form-createrecord"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															<span
																class="fa fa-plus-circle"
																aria-hidden="true"
															></span>
															Create related record
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="form-loading">
															<fluent-progress-ring
																role="progressbar"
																><template shadowrootmode="open"
																	><slot
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
																		</svg> </slot></template
															></fluent-progress-ring>
															<span class="saving-loading-label"
																>Loading form..</span
															>
														</div>
														<iframe
															data-page="/_portal/modal-form-template-path/a95fa527-1f4a-4589-876f-6ef8db36120d"
															src="about:blank"
														></iframe>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-run-workflow"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Run workflow
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														&lt;p&gt;Are you sure you want to run
														this workflow?&lt;/p&gt;
													</div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Run workflow</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-deactivate"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Deactivate
														</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Deactivate</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											class="modal fade modal-activate"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">Activate</h4>
														<button
															class="btn-close"
															data-bs-dismiss="modal"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body"></div>
													<div class="modal-footer">
														<button
															class="primary btn btn-primary"
															type="button"
														>
															Activate</button
														><button
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
										<div
											aria-hidden="true"
											aria-label="Resolve case"
											class="modal fade modal-resolvecase"
											data-backdrop="static"
											role="dialog"
											tabindex="-1"
										>
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title">
															Resolve case
														</h4>
														<button
															class="form-close"
															data-bs-dismiss="modal"
															tabindex="0"
															type="button"
														>
															<span aria-hidden="true">×</span
															><span class="visually-hidden"
																>Close</span
															>
														</button>
													</div>
													<div class="modal-body">
														<div class="row mb-3">
															<label
																class="required col-form-label col-md-3"
															>
															</label>
															<div class="col-md-9">
																<input
																	aria-required="true"
																	class="resolution-input required form-control"
																	type="text"
																	aria-label=""
																/>
															</div>
														</div>
														<div class="row mb-3">
															<label
																class="required col-form-label col-md-3"
															>
															</label>
															<div class="col-md-9">
																<textarea
																	aria-required="true"
																	class="resolution-description-input required form-control"
																	cols="20"
																	rows="6"
																	aria-label=""
																></textarea>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button
															tabindex="0"
															class="primary btn btn-success"
															type="button"
														>
															Resolve
														</button>
														<button
															tabindex="0"
															class="cancel btn btn-default"
															data-bs-dismiss="modal"
															type="button"
														>
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection

