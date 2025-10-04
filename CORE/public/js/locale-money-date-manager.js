(function () {
	const selectorHelper = {
		arraySet: (selector) => {
			return Array.from(new Set(selector || []));
		},
		joinSelectors: (qrySelectors = []) => {
			const selectors = qrySelectors.length ? qrySelectors.join(',') : null;
			return document.querySelectorAll(selectors);
		},
		preserveNodes: (selectors = []) => {
			const sanitize = Array.from(new Set(selectors || []));
			if (sanitize.length === 0) return [];
			const nodes = document.querySelectorAll(sanitize.join(','));
			return Array.from(nodes).map((el) => el.cloneNode(true));
		},
	};
	const moneyHelper = {
		getDecimalLength: (num = 0) => {
			const str = num.toString();
			if (str.includes('e')) {
				return (
					num.toFixed(20).replace(/0+$/, '').split('.')[1]?.length || 0
				);
			}
			return str.includes('.') ? str.split('.')[1].length : 0;
		},
		formatNumberWithSeparators: (
			value,
			thousandSeparator,
			decimalSeparator,
			minFractionDigits = 0,
			maxFractionDigits = 2
		) => {
			if (value == null || value === '') return '';
			const reparsed = String(value).replace(/\s/g, '');
			let numericValue = Number(
				String(reparsed).replace(/[^0-9\-+.eE]/g, '')
			);

			if (!isFinite(numericValue)) return String(reparsed);

			const roundingFactor = Math.pow(10, maxFractionDigits);
			const decimalLength = moneyHelper.getDecimalLength(value);
			const currentDecimal = !!minFractionDigits
				? minFractionDigits
				: decimalLength;

			numericValue =
				Math.round(numericValue * roundingFactor) / roundingFactor;

			let [integerPart, fractionPart = ''] = Math.abs(numericValue)
				.toFixed(Math.max(currentDecimal, maxFractionDigits))
				.split('.');

			integerPart = integerPart.replace(
				/\B(?=(\d{3})+(?!\d))/g,
				thousandSeparator
			);
			const signPrefix = numericValue < 0 ? '-' : '';
			return fractionPart
				? `${signPrefix}${integerPart}${decimalSeparator}${fractionPart}`
				: `${signPrefix}${integerPart}`;
		},
	};

	const dateHelper = {
		pad2: (n = '') => String(n).padStart(2, '0'),
		getParts: (ts, { bcp47_locale, time_format }, { iana }) => {
			const wants12h = /hh/.test(time_format);
			const fmt = new Intl.DateTimeFormat(bcp47_locale || 'en-US', {
				timeZone: iana,
				year: 'numeric',
				month: '2-digit',
				day: '2-digit',
				hour: '2-digit',
				minute: '2-digit',
				second: '2-digit',
				hourCycle: wants12h ? 'h12' : 'h23',
			});

			const partsArr = fmt.formatToParts(new Date(ts));
			const parts = Object.fromEntries(
				partsArr.map((p) => [p.type, p.value])
			);

			return {
				year: parts.year,
				month: dateHelper.pad2(parts.month),
				day: dateHelper.pad2(parts.day),
				hour: dateHelper.pad2(parts.hour),
				minute: dateHelper.pad2(parts.minute),
				second: dateHelper.pad2(parts.second || '00'),
				dayPeriod: parts.dayPeriod || '',
			};
		},
		buildFromPattern: (pattern, parts, wants12h) => {
			let hour12 = parts.hour;
			if (wants12h) {
				const h = Number(parts.hour);
				const h12 = h % 12 || 12;
				hour12 = dateHelper.pad2(h12);
			}

			return pattern
				.replace(/yyyy/g, parts.year)
				.replace(/MM/g, parts.month)
				.replace(/dd/g, parts.day)
				.replace(/HH/g, parts.hour)
				.replace(/hh/g, hour12)
				.replace(/mm/g, parts.minute)
				.replace(/ss/g, parts.second)
				.replace(/tt/g, parts.dayPeriod);
		},
		sanitizeDate: (dateValue) => {
			if (!dateValue) return dateValue;
			const s = String(dateValue).trim();
			const quick = new Date(s);
			if (!isNaN(quick)) return quick;
			const norm = s.replace(/[\/.]/g, '-');
			const m = norm.match(
				/^(\d{2})-(\d{2})-(\d{4})(?:\s+(\d{2}):(\d{2}))?$/
			);
			if (m) {
				const [, dd, mm, yyyy, HH = '00', MM = '00'] = m;
				const d = new Date(`${yyyy}-${mm}-${dd}T${HH}:${MM}:00`);
				return isNaN(d) ? dateValue : d;
			}
			return dateValue;
		},
		formatDateTimeByPrefs: (dateValue, language, timezone) => {
			const timeFormat = language.time_format;
			const dateFormat = language.date_format;
			const parseDate = dateHelper.sanitizeDate(dateValue);
			const wants12h = /hh/.test(timeFormat);
			const parts = dateHelper.getParts(parseDate, language, timezone);
			const dateStr = dateHelper.buildFromPattern(
				dateFormat,
				parts,
				wants12h
			);
			const timeStr = dateHelper.buildFromPattern(
				timeFormat,
				parts,
				wants12h
			);
			const hasTime =
				/\d{1,2}:\d{2}/.test(parseDate) || /(AM|PM)/i.test(parseDate);

			return {
				date: dateStr,
				time: timeStr,
				dateTime: `${dateStr}${hasTime ? ' ' + timeStr : ''}`,
			};
		},
		forceToLocaleOptionsFormat: (
			dateValue,
			language,
			timezone,
			options = {}
		) => {
			const parseDate = dateHelper.sanitizeDate(dateValue);
			const isoDate = new Date(parseDate).toISOString();
			const timeOpt = {
				timeZone: timezone.iana,
				year: 'numeric',
				month: '2-digit',
				day: '2-digit',
				hour: '2-digit',
				minute: '2-digit',
				second: '2-digit',
				hour12: false,
				...options,
			};
			const fmt = new Intl.DateTimeFormat(language.bcp47_locale, timeOpt);
			const localISOTime = fmt.format(new Date(isoDate));
			return localISOTime;
		},
	};
	const defaulPreferences = {
		userTimezone: {
			timezonecode: 4,
			userinterfacename: '(GMT-08:00) Pacific Time (US & Canada)',
			windows_standard_name: 'Pacific Standard Time',
			iana: 'America/Los_Angeles',
		},
		userLanguage: {
			lcid: 1033,
			language_name: 'English – United States',
			bcp47_locale: 'en-US',
			date_format: 'MM/dd/yyyy',
			time_format: 'hh:mm tt',
			thousand_separator: ',',
			decimal_separator: '.',
		},
	};

	class SetupUserPreference {
		constructor() {
			const { userLanguage, userTimezone } =
				window?.msdyn?.Portal?.Snippets ?? {};
			if (!userLanguage || !userTimezone) {
				console.error(`Couldn't load user preferences`);
			}
			this.language = userLanguage || defaulPreferences.userLanguage;
			this.timezone = userTimezone || defaulPreferences.userTimezone;
		}

		getPreferences() {
			return { language: this.language, timezone: this.timezone };
		}

		getLanguage() {
			return this.language;
		}

		getTimezone() {
			return this.timezone;
		}

		getLangValueByKey(key) {
			return this.language[key] || null;
		}

		getTimeZValueByKey(key) {
			return this.timezone[key] || null;
		}
	}

	class MSDYNLocaleDateAndMoneyManager {
		constructor() {
			this.userPrefs = new SetupUserPreference();
		}

		setNodes({
			currencyCodeSelectors = [],
			dateSelectors = [],
			moneySelectors = [],
		}) {
			// Original Values
			this.sanitizeSelectors();
			this.originalValueDateSelectors =
				selectorHelper.preserveNodes(dateSelectors);
			this.originalValueMoneySelectors =
				selectorHelper.preserveNodes(moneySelectors);
			this.originalValueCurrencyCodeSelectors = selectorHelper.preserveNodes(
				currencyCodeSelectors
			);
			this.currencyCodeSelectors = currencyCodeSelectors;
			this.dateSelectors = dateSelectors;
			this.moneySelectors = moneySelectors;
			return this;
		}

		sanitizeSelectors() {
			this.dateSelectors = selectorHelper.arraySet(this.dateSelectors);
			this.moneySelectors = selectorHelper.arraySet(this.moneySelectors);
			this.currencyCodeSelectors = selectorHelper.arraySet(
				this.currencyCodeSelectors
			);
		}

		static _isInput(el) {
			return (el?.tagName || '').toLowerCase() === 'input';
		}

		static _readString(el) {
			if (!el) return '';
			return MSDYNLocaleDateAndMoneyManager._isInput(el)
				? (el.value ?? '').toString().trim()
				: (el.textContent ?? '').toString().trim();
		}

		static _writeToNode(el, str) {
			if (!el) return;
			if (MSDYNLocaleDateAndMoneyManager._isInput(el)) {
				el.value = str ?? '';
			} else {
				el.textContent = str ?? '';
			}
		}

		static _hasValue(v) {
			return v !== undefined && v !== null && String(v).trim() !== '';
		}

		formatCurrencyCodes() {
			if (!this.currencyCodeSelectors.length) return this;
			const currencyCode = this.userPrefs.getLangValueByKey('bcp47_locale');
			const regionCode = new Intl.Locale(currencyCode).maximize().region;
			const nodeList = selectorHelper.joinSelectors(
				this.currencyCodeSelectors
			);
			if (nodeList.length && regionCode) {
				nodeList.forEach((nodeElement) => {
					const checkTag = nodeElement.tagName?.toLowerCase();
					const isInputElement = checkTag === 'input';
					nodeElement.textContent = regionCode;
					if (isInputElement) {
						nodeElement.value = regionCode;
					}
				});
			}
			return this;
		}

		formatMoney({ decimalDigits = 2 } = {}) {
			if (!this.moneySelectors.length) return this;
			const nodeList = selectorHelper.joinSelectors(this.moneySelectors);
			const decimal = this.userPrefs.getLangValueByKey('decimal_separator');
			const thousand =
				this.userPrefs.getLangValueByKey('thousand_separator');

			if (nodeList.length) {
				nodeList.forEach((_el) => {
					const value = MSDYNLocaleDateAndMoneyManager._readString(_el);
					const dataSet = _el?.dataset || {};
					const _sysVal = (value = '') => {
						const formattedValue = moneyHelper.formatNumberWithSeparators(
							value,
							thousand,
							decimal,
							decimalDigits
						);
						return formattedValue;
					};
					if (dataSet?.type && dataSet?.type === 'System.Decimal') {
						_el.textContent = _sysVal(dataSet.value);
					} else {
						MSDYNLocaleDateAndMoneyManager._writeToNode(
							_el,
							_sysVal(value)
						);
					}
				});
			}
			return this;
		}

		formatDateTimeByLocaleOptions({ options = {} }) {
			if (!this.dateSelectors.length) return this;
			const nodeList = selectorHelper.joinSelectors(this.dateSelectors);
			const language = this.userPrefs.getLanguage();
			const timezone = this.userPrefs.getTimezone();

			if (nodeList.length) {
				nodeList.forEach((_el) => {
					const value = MSDYNLocaleDateAndMoneyManager._readString(_el);
					const dateFormat = dateHelper.forceToLocaleOptionsFormat(
						value,
						language,
						timezone,
						options
					);
					MSDYNLocaleDateAndMoneyManager._writeToNode(_el, dateFormat);
				});
			}
			return this;
		}

		formatDates() {
			if (!this.dateSelectors.length) return this;
			const nodeList = selectorHelper.joinSelectors(this.dateSelectors);
			const language = this.userPrefs.getLanguage();
			const timezone = this.userPrefs.getTimezone();

			if (nodeList.length) {
				nodeList.forEach((_el) => {
					const value = MSDYNLocaleDateAndMoneyManager._readString(_el);
					const dateFormat = dateHelper.formatDateTimeByPrefs(
						value,
						language,
						timezone
					);
					MSDYNLocaleDateAndMoneyManager._writeToNode(
						_el,
						dateFormat.dateTime
					);
				});
			}
			return this;
		}

		formatDatesByKeysWithLocaleOptions(
			options = {},
			data = [],
			keys = ['date_format']
		) {
			const language = this.userPrefs.getLanguage();
			const timezone = this.userPrefs.getTimezone();
			if (!data.length && !key) return [];
			return data.map((item) => {
				const updated = { ...item };
				keys.forEach((key) => {
					const dateValue = item[key];
					if (!dateValue) return;
					const out = dateHelper.forceToLocaleOptionsFormat(
						dateValue,
						language,
						timezone,
						options
					);
					updated[key] = out.dateTime;
				});
				return updated;
			});
		}

		formatDatesByKeys(data = [], keys = ['date_format']) {
			const language = this.userPrefs.getLanguage();
			const timezone = this.userPrefs.getTimezone();
			if (!data.length && !key) return [];
			return data.map((item) => {
				const updated = { ...item };
				keys.forEach((key) => {
					const dateValue = item[key];
					if (!dateValue) return;
					const out = dateHelper.formatDateTimeByPrefs(
						dateValue,
						language,
						timezone
					);
					updated[key] = out.dateTime;
				});
				return updated;
			});
		}

		formatMoneyByKeys(data = [], keys = ['money']) {
			const decimal = this.userPrefs.getLangValueByKey('decimal_separator');
			const thousand =
				this.userPrefs.getLangValueByKey('thousand_separator');
			if (!data.length && !key) return [];
			return data.map((item) => {
				const updated = { ...item };
				keys.forEach((key) => {
					const moneyValue = item[key];
					if (!moneyValue) return;
					const formattedValue = moneyHelper.formatNumberWithSeparators(
						moneyValue,
						thousand,
						decimal
					);
					updated[key] = formattedValue;
				});
				return updated;
			});
		}

		logUserPreferences() {
			const { language, timezone } = this.userPrefs.getPreferences();
			console.table(language);
			console.table(timezone);
		}

		debugNodes(source = true) {
			const label = source ? 'modified nodes' : 'original unmodified nodes';
			console.log(
				'%cDEBUGGING LOCALE DATEMONEY FORMATTER%c ' + label,
				'color: white; background: #007acc; font-weight: bold; padding: 2px 6px; border-radius: 3px;',
				'color: #4caf50; font-weight: bold; font-size: 13px;'
			);

			const pdates = source
				? this.dateSelectors
				: this.originalValueDateSelectors;
			const pmoney = source
				? this.moneySelectors
				: this.originalValueMoneySelectors;
			const pcurrency = source
				? this.currencyCodeSelectors
				: this.originalValueCurrencyCodeSelectors;

			const dates = source ? selectorHelper.joinSelectors(pdates) : pdates;
			const money = source ? selectorHelper.joinSelectors(pmoney) : pmoney;
			const currency = source
				? selectorHelper.joinSelectors(pcurrency)
				: pcurrency;

			const logIfNotEmpty = (label, value) => {
				console.log({ [label]: value });
				if (!value) {
					console.log({ [label]: value });
				}
			};

			return {
				plainLog: () => {
					logIfNotEmpty('dates', dates);
					logIfNotEmpty('money', money);
					logIfNotEmpty('currency', currency);
				},
				withNodesAndValues: (logType = '') => {
					const nDates = dates;
					const nMoney = money;
					const nCurrency = currency;
					const mergeNodes = [...nDates, ...nMoney, ...nCurrency];
					const getNodeValue = (el) =>
						el?.tagName?.toLowerCase() === 'input'
							? el.value
							: el?.textContent ?? null;

					const snapshot = mergeNodes.map((el) => ({
						rawValue: getNodeValue(el),
						element: el,
						dataset:
							logType === 'table'
								? JSON.stringify(el.dataset, null, 2)
								: { ...el.dataset },
					}));
					(logType === 'table' ? console.table : console.log)(snapshot);
				},
			};
		}
	}
	window.msdyn.LocaleService = new MSDYNLocaleDateAndMoneyManager();
})();
