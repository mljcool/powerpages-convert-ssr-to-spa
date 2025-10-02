async function fetchHtmlPage(url) {
	try {
		const response = await fetch(url, {
			method: 'GET',
			headers: { 'Content-Type': 'text/html' },
		});

		if (!response.ok) {
			throw new Error(`HTTP error! Status: ${response.status}`);
		}

		const htmlText = await response.text();
		const parser = new DOMParser();
		const doc = parser.parseFromString(htmlText, 'text/html');
		const cleanedHtml = doc.documentElement.outerHTML;
		return cleanedHtml;
	} catch (err) {
		console.error('Failed to fetch page:', err);
		return null;
	}
}

async function fetchMultiple(pageLinks) {
	const pageToCall = pageLinks.map((link) => fetchHtmlPage(link));
	const results = await Promise.all(pageToCall);

	return results;
}

var storeTestPages = [];
function crmTestPages() {
	const testPages = [
		{
			pathURL: '/RFQ-list/?activeView=Active',
		},
		{
			pathURL: '/Purchase-order-workspace/?activeView=activePO',
		},
		{
			pathURL: '/invoice-workspace/?activeView=allInv',
		},
	];
	const urlOnly = testPages.map((item) => item.pathURL);
	fetchMultiple(urlOnly).then((_pages) => {
		_pages.forEach((page, index) => {
			storeTestPages.push({
				route: testPages[index].pathURL,
				htmlPage: page,
			});
		});
		console.log('storeTestPages', storeTestPages);
	});
}

crmTestPages();