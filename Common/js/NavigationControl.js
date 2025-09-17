$(document).ready(function () {
	createMobileNavBarBaseOnExistingMenu();
	// Utility: add keyboard activation support
	function activateWithKeyboard(selector, handler) {
		document.querySelectorAll(selector).forEach((el) => {
			// Make focusable if not natively focusable
			if (!['A', 'BUTTON', 'INPUT', 'TEXTAREA'].includes(el.tagName)) {
				el.setAttribute('tabindex', '0');
			}
			el.addEventListener('keydown', (e) => {
				if (e.key === 'Enter' || e.key === ' ') {
					e.preventDefault();
					handler.call(el, e);
				}
			});
		});
	}

	// 1. Handle menu link clicks
	document.querySelectorAll('.menus-links').forEach((link) => {
		link.addEventListener('click', () => {
			window.location.href = link.dataset.links;
		});
	});
	activateWithKeyboard('.menus-links', function () {
		window.location.href = this.dataset.links;
	});

	// 2. Menu toggle logic
	const toggleButtons = document.querySelectorAll('.navItem');
	const menus = document.querySelectorAll('.menu');

	function handleMenuToggle(button, index) {
		const menu = menus[index - 1];
		if (!menu) return;

		const isExpanded = menu.classList.contains('expanded');

		// Close all menus
		menus.forEach((m, i) => {
			if (m.classList.contains('expanded')) {
				m.classList.remove('expanded');
				setTimeout(() => (m.style.display = 'none'), 300);
				toggleButtons[i + 1]?.classList.remove('active');
			}
		});

		// Toggle current menu if it was not already open
		if (!isExpanded) {
			menu.style.display = 'block';
			setTimeout(() => menu.classList.add('expanded'), 10);
			button.classList.add('active');
		}
	}

	toggleButtons.forEach((button, index) => {
		button.addEventListener('click', () => handleMenuToggle(button, index));
	});
	activateWithKeyboard('.navItem', function () {
		const index = [...toggleButtons].indexOf(this);
		handleMenuToggle(this, index);
	});

	// 3. Close menus when clicking outside
	document.addEventListener('click', (event) => {
		const isInsideMenu = [...menus].some((menu) =>
			menu.contains(event.target)
		);
		const isNavItem = [...toggleButtons].some((btn) =>
			btn.contains(event.target)
		);

		if (!isInsideMenu && !isNavItem) {
			menus.forEach((menu, index) => {
				if (menu.classList.contains('expanded')) {
					menu.classList.remove('expanded');
					setTimeout(() => (menu.style.display = 'none'), 300);
					toggleButtons[index + 1]?.classList.remove('active');
				}
			});
		}
	});

	// 4. Back button logic
	const hasBackButton = $('.back-btn');
	if (!hasBackButton.length) {
		localStorage.setItem('lastUrl', window.location.href);
	} else {
		hasBackButton.on('click', function () {
			const lastUrl = localStorage.getItem('lastUrl');
			if (lastUrl) {
				window.location.href = lastUrl;
			} else {
				window.history.back();
			}
		});
		activateWithKeyboard('.back-btn', function () {
			const lastUrl = localStorage.getItem('lastUrl');
			if (lastUrl) {
				window.location.href = lastUrl;
			} else {
				window.history.back();
			}
		});
	}

	// 5. Dropdown toggle logic
	const dropdownBtnSelector = '.msdyn-dropdown-btn';
	const dropdownMenuSelector = '.msdyn-dropdown-menu';

	$(dropdownBtnSelector).on('click', function (event) {
		const $menu = $(this).next(dropdownMenuSelector);

		$(dropdownMenuSelector).not($menu).hide(); // Close others
		$menu.toggle(); // Toggle current
		event.stopPropagation();
	});
	activateWithKeyboard(dropdownBtnSelector, function () {
		const $menu = $(this).next(dropdownMenuSelector);
		$(dropdownMenuSelector).not($menu).hide();
		$menu.toggle();
	});

	// 6. Close dropdowns on outside click
	$(document).on('click', function (event) {
		if (!$(event.target).closest('.msdyn-dropdown-container').length) {
			$(dropdownMenuSelector).hide();
		}
	});

	document.addEventListener('click', (e) => {
		const btn = e.target.closest('.sub-menu-items.mobile > li');
		if (btn) {
			const submenu = btn.querySelector('.mobile-list-submenu');
			const open = btn.getAttribute('aria-expanded') === 'true';
			btn.setAttribute('aria-expanded', String(!open));
			if (submenu) submenu.hidden = open;
		}
	});
});

function createMobileNavBarBaseOnExistingMenu() {
	const container = document.querySelector('.sub-nav-container');
	const items = container.querySelectorAll('.navItem');
	const iconMenu = `<span class="fa fa-bars"></span>`;
	const menuDiv = `<a class="navItem hamburger" tabindex="0">${iconMenu}</a>`;
	const innerMenuWrapper = (element) =>`<ul class="sub-menu-items mobile">${element}</ul>`;
	const menuCollapseDiv = (element) =>`<div class="mobile-option menu">${innerMenuWrapper(element)}</div>`;
	const navItemSelector = Array.from(new Set(items || []));
	const scrapeExistingMenuNode = navItemSelector
		.map((_node) => {
			const textValue = _node.textContent?.trim();
			if (textValue) {
				const menuContext = _node.nextElementSibling;
				const result = Array.from(
					menuContext.querySelectorAll('ul.sub-menu-items')
				).map((menu) =>
					Array.from(menu.querySelectorAll('li'))
						.map((li) => ({
							href: li.querySelector('a').href,
							text: li.querySelector('a').textContent.trim(),
							desc: li.querySelector('span').textContent.trim(),
						})).flat()
				);
				return (!!result.length && {
						title: textValue,
						properties: result.flat(),
					});
			}
		}).filter(Boolean);
	if (scrapeExistingMenuNode.length) {
		const shapeMenu = scrapeExistingMenuNode.map((_menu) =>`<li>
			<span class="chev" aria-hidden="true"></span>
			<a href="#">${_menu.title}</a>
			<ul class="mobile-list-submenu" role="list">
				${_menu.properties.map((_submenus) => `<li>
										<span class="chev" aria-hidden="true"></span>
										<a href="${_submenus.href}">
											<span>${_submenus.text}</span>
											<small>${_submenus.desc}</small>
										</a>
									</li>`).join('')}
			</ul>
		</li>`).join('');
		items[1].insertAdjacentHTML('beforebegin',`${menuDiv}${menuCollapseDiv(shapeMenu)}`);
	}
}
