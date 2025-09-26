const userData = {
	regWelModalTitle: 'Welcome to Registration',
	regThankModalContent:
		'We will review the provided information. The team will reach out to you if we have suitable projects for further collaboration.',
	headerVendorBidding: 'Vendor Bidding',
	allInv: 'All open invoices',
	draftInv: 'Draft',
	submittedInv: 'Submitted',
	approvedInv: 'Approved',
	paidInv: 'Paid',
	userLanguage: {
		lcid: 1033,
		language_name: 'English – United States',
		bcp47_locale: 'en-US',
		date_format: 'MM/dd/yyyy',
		time_format: 'hh:mm tt',
		thousand_separator: ',',
		decimal_separator: '.',
	},
	userTimezone: {
		timezonecode: 110,
		userinterfacename:
			'(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna',
		windows_standard_name: 'W. Europe Standard Time',
		iana: 'Europe/Berlin',
	},
};
((root = window) => {
	root.msdyn ??= {};
	root.msdyn.Portal ??= {};
	root.msdyn.Portal.Snippets = userData;
})();
