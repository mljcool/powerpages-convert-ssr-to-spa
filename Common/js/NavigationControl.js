$(document).ready(function () {
	// Utility: add keyboard activation support
	function activateWithKeyboard(selector, handler) {
		document.querySelectorAll(selector).forEach(el => {
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
	document.querySelectorAll('.menus-links').forEach(link => {
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
				setTimeout(() => m.style.display = 'none', 300);
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
	document.addEventListener('click', event => {
		const isInsideMenu = [...menus].some(menu => menu.contains(event.target));
		const isNavItem = [...toggleButtons].some(btn => btn.contains(event.target));

		if (!isInsideMenu && !isNavItem) {
			menus.forEach((menu, index) => {
				if (menu.classList.contains('expanded')) {
					menu.classList.remove('expanded');
					setTimeout(() => menu.style.display = 'none', 300);
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
});