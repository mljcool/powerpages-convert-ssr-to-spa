(function ($) {

	if (!($)) {
		return;
	}

	$(function () {
		var moment = window.moment;
		var prvKeypress = '';
		var dateFormatConverter = window.dateFormatConverter;
		var datePickerDescriptionId = "_datepicker_description";
		if (!(moment && $.isFunction($.fn.datetimepicker))) {
			return;
		}

		$('input[data-ui="datetimepicker"]').each(function (_, e) {
			var $e = $(e),
				readonly = $e.is('[readonly]'),
				disabled = $e.is('[disabled]'),
				pickerDisabled = $e.closest('[data-datetimepicker-disabled]').data('datetimepicker-disabled'),
				pickerElement,
				pickerInput,
				pickerCalendar,
				picker,
				pickerConfig,
				roundTripUserLocalFormat = 'YYYY-MM-DDTHH:mm:ss.0000000\\Z',
				roundTripFormat = 'YYYY-MM-DDTHH:mm:ss.0000000',
				dateOnly = $e.data('type') === 'date',
				dateFormat = dateFormatConverter.convert($e.closest('[data-dateformat]').data('dateformat') || 'M/d/yyyy', dateFormatConverter.dotNet, dateFormatConverter.momentJs),
				timeFormat = dateFormatConverter.convert($e.closest('[data-timeformat]').data('timeformat') || 'h:mm tt', dateFormatConverter.dotNet, dateFormatConverter.momentJs),
				dateTimeFormat = dateOnly ? dateFormat : (dateFormatConverter.convert($e.closest('[data-datetimeformat]').data('datetimeformat'), dateFormatConverter.dotNet, dateFormatConverter.momentJs) || (dateFormat + ' ' + timeFormat)),
				language = $e.closest('[lang]').attr('lang'),
				dateIcon = $e.closest('[data-datetimepicker-date-icon]').data('datetimepicker-date-icon') || 'icon-calendar fa fa-calendar',
				timeIcon = $e.closest('[data-datetimepicker-time-icon]').data('datetimepicker-time-icon') || 'icon-time fa fa-clock',
				loadEvent,
				changeEvent,
				lastGoodValue = "",
				isUTC = ($e.closest('[data-behavior]').data('behavior') == "UserLocal"),
				keyMap = {
					'tab': 9,
					9: 'tab',
					'escape': 27,
					27: 'escape',
					'enter': 13,
					13: 'enter',
					'right': 39,
					39: 'right',
					'up': 38,
					38: 'up',
					'down': 40,
					40: 'down',
					'left': 37,
					37: 'left',
					'pageUp': 33,
					33: 'pageUp',
					'pageDown': 34,
					34: 'pageDown',
					'control': 17,
					17: 'control',
					'delete': 46,
					46: 'delete',
					't': 84,
					84: 't',
					'space': 32,
					32: 'space',
				};

			if (pickerDisabled) {
				return;
			}

			pickerConfig = {
				format: dateTimeFormat,
				useCurrent: false,
				useStrict: true,
				locale: language,
				icons: {
					time: 'icon-time fa fa-clock',
					date: 'icon-calendar fa fa-calendar',
					up: 'icon-chevron-up fa fa-chevron-up',
					down: 'icon-chevron-down fa fa-chevron-down'
				},
				keyBinds: {
					enter: function () {
						this.toggle();
						refreshKeyUp(keyMap.enter);
						restoreTabIndexFocus();
					},
					escape: function () {
						this.hide();
						refreshKeyUp(keyMap.escape);
						restoreTabIndexFocus();
					}
				},
				widgetPositioning: {
					horizontal: 'auto',
					vertical: 'bottom'
				}
			};

			loadEvent = $.Event('adx:datetimepicker:init', {
				element: e,
				config: pickerConfig
			});

			$e.trigger(loadEvent);

			if (loadEvent.isDefaultPrevented()) {
				return;
			}

			$e.hide();

			pickerElement = $('<div />')
				.addClass('input-append input-group datetimepicker')
				.attr('role','none')
				.insertAfter($e);

			$('#' + e.id + "_label").attr('for', e.id + datePickerDescriptionId);

			pickerInput = $('<input />')
				.attr('type', 'text')
				.attr('data-date-format', dateTimeFormat)
				.attr("aria-describedby", e.id + "_description")
				.attr("id", e.id + datePickerDescriptionId)
				.attr("aria-labelledby", e.id + "_label")
				.attr("onchange", "setIsDirty(this.id);")
				.addClass('form-control')
				.addClass('input-text-box')
				.appendTo(pickerElement);

			pickerCalendar = $('<span/>')
				.attr('tabindex', '0')
				.attr('role', 'button')
				.attr("title", window.ResourceManager['Datetimepicker_Datepicker_Label'])
				.addClass('input-group-addon')
				.addClass('btn')
				.append($('<span />').attr('data-date-icon', dateIcon).attr('data-time-icon', timeIcon).addClass(dateIcon).addClass("iconBorder"))
				.appendTo(pickerElement);


			pickerElement.datetimepicker(loadEvent.config);

			picker = pickerElement.data('DateTimePicker');

			var currentValue = isUTC ? moment.utc($e.val()) : moment($e.val());

			if (currentValue.isValid()) {
				picker.date(currentValue.toDate());
			}

			if (readonly) {
				pickerElement.find('input').attr('readonly', 'readonly').addClass('readonly');
			}
			else {
				pickerElement.find('input').attr('placeholder', dateTimeFormat)
			}

			if (disabled) {
				pickerElement.find('input').attr('disabled', 'disabled').addClass('aspNetDisabled');
			}

			if (readonly || disabled) {
				pickerElement.removeClass('input-append').removeClass('input-group').find('.input-group-addon').hide();

				return;
			}

			pickerElement.on('dp.change', function (ev) {
				if (ev.date) {
					var localDate = moment(ev.date);

					// if format doesn't contatin seconds - reset them to 0
					if (!loadEvent.config.format || loadEvent.config.format.toLowerCase().indexOf('s') < 0) {
						localDate = localDate.seconds(0);
					}

					// if format doesn't contatin hours - time is not supported
					// reset hours, minutes, seconds to 0
					if (!loadEvent.config.format || loadEvent.config.format.toLowerCase().indexOf('h') < 0) {
						localDate = localDate.hours(0).minutes(0).seconds(0);
					}

					if (pickerInput.parent().parent().find(".date-error").length > 0)
						pickerInput.parent().parent().find(".date-error").remove();

					changeEvent = $.Event('adx:datetimepicker:change', {
						element: e,
						date: localDate.toDate()
					});

					$e.trigger(changeEvent);

					if (changeEvent.isDefaultPrevented()) {
						return;
					}
					$e.prev().attr("aria-label", localDate.format('dddd') + " " + localDate.format("LL"));
					if (moment.locale() == "ar") {
						$e.val(changeEvent.date ? (isUTC ? moment(changeEvent.date).locale("en").utc().format(roundTripUserLocalFormat) : moment(changeEvent.date).locale("en").format(roundTripFormat)) : '');
					}
					else {
						$e.val(changeEvent.date ? (isUTC ? moment(changeEvent.date).utc().format(roundTripUserLocalFormat) : moment(changeEvent.date).format(roundTripFormat)) : '');
                    }
				} else {
					changeEvent = $.Event('adx:datetimepicker:change', {
						element: e,
						date: null
					});

					$e.trigger(changeEvent);

					if (changeEvent.isDefaultPrevented()) {
						return;
					}

					if (moment.locale() == "ar") {
						$e.val(changeEvent.date ? (isUTC ? moment(changeEvent.date).locale("en").utc().format(roundTripUserLocalFormat) : moment(changeEvent.date).locale("en").format(roundTripFormat)) : '');
					}
					else {
						$e.val(changeEvent.date ? (isUTC ? moment(changeEvent.date).utc().format(roundTripUserLocalFormat) : moment(changeEvent.date).format(roundTripFormat)) : '');
					}
				}
				pickerInput[0].setSelectionRange(0, pickerInput.val().length);
			}).on("change", function () {
				var val = pickerInput.val().trim();
				if (val) {
					var d = moment(val, dateTimeFormat, true);
					if (!d.isValid()) {
						if (lastGoodValue) {
							d = moment(lastGoodValue, dateTimeFormat, true);
							$e.val(isUTC ? d.utc().format(roundTripUserLocalFormat) : d.format(roundTripFormat));
							pickerInput.val(d.local().format(dateTimeFormat));
						} else {
							$e.val('');
							pickerInput.val('');
						}
					} else {
						lastGoodValue = val;
					}
				} else {
					$e.val('');
					pickerInput.val('');
					lastGoodValue = '';
				}
			}).on('keydown', function (e) {
				if (e.keyCode == keyMap.enter) {
					if (pickerElement.find(".bootstrap-datetimepicker-widget").length == 0) {
						pickerElement.data('DateTimePicker').show();
					}
				}
				else if (e.keyCode == keyMap.escape) {
					pickerElement.data('DateTimePicker').hide();
				}
				//Codition For Checking Right,Left,Up,Down key press
				else if (prvKeypress == '' && (e.keyCode == keyMap.right || e.keyCode == keyMap.left || e.keyCode == keyMap.up || e.keyCode == keyMap.down || e.keyCode == keyMap.pageUp || e.keyCode == keyMap.pageDown || e.keyCode == keyMap.delete)) {
					var calender = pickerElement.find(".bootstrap-datetimepicker-widget")[0];
					var monthSection = $(calender).find('.datepicker-months')[0];
					var yearSection = $(calender).find('.datepicker-years')[0];
					var decadesSection = $(calender).find('.datepicker-decades')[0];
					var dateSection = $(calender).find('.datepicker-days')[0];
					var hourSection = $(calender).find('.timepicker-hours')[0];
					var minuteSection = $(calender).find('.timepicker-minutes')[0];
					var secondSection = $(calender).find('.timepicker-seconds')[0];
					if ($(dateSection).is(":visible")) {
						dateSectionDirectionKeyOperation(pickerElement, pickerInput, keyMap, e)
					}
					else if ($(monthSection).is(":visible")) {
						monthSectionDirectionKeyOperation(keyMap, monthSection, e);
					}
					else if ($(yearSection).is(":visible")) {
						monthSectionDirectionKeyOperation(keyMap, yearSection, e);
					}
					else if ($(decadesSection).is(":visible")) {
						decadeSectionDirectionKeyOperation(keyMap, decadesSection, e);
					}
					else if ($(hourSection).is(":visible")) {
						hourSectionDirectionKeyOperation(pickerElement,keyMap, e);
					}
					else if ($(minuteSection).is(":visible")) {
						minuteSectionDirectionKeyOperation(pickerElement, keyMap, e);
					}
					else if ($(secondSection).is(":visible")) {
						secondSectionDirectionKeyOperation(pickerElement, keyMap, e);
					}
				}
				else if (e.keyCode == keyMap.tab) {
					if (pickerElement.find(".bootstrap-datetimepicker-widget").length == 0) {

					}
					else {
						var calender = pickerElement.find(".bootstrap-datetimepicker-widget")[0];
						var dateSection = $(calender).find('.datepicker-days')[0];
						var monthSection = $(calender).find('.datepicker-months')[0];
						var yearSection = $(calender).find('.datepicker-years')[0];
						var decadesSection = $(calender).find('.datepicker-decades')[0];
						var timepicker = $(calender).find('.timepicker-picker')[0];
						var hourSection = $(calender).find('.timepicker-hours')[0];
						var minuteSection = $(calender).find('.timepicker-minutes')[0];
						var secondSection = $(calender).find('.timepicker-seconds')[0];
						if ($(dateSection).is(":visible") || $(timepicker).is(":visible")) {
							dateSectionOperation(calender, e);
						}
						else if ($(monthSection).is(":visible")) {
							monthSectionOperation(monthSection, e);
						}
						else if ($(yearSection).is(":visible")) {
							monthSectionOperation(yearSection, e);
						}
						else if ($(decadesSection).is(":visible")) {
							monthSectionOperation(decadesSection, e);
						}
						else if ($(hourSection).is(":visible")) {
							TimeSectionOperation(calender, e);
						}
						else if ($(minuteSection).is(":visible")) {
							TimeSectionOperation(calender, e);
						}
						else if ($(secondSection).is(":visible")) {
							TimeSectionOperation(calender, e);
						}
					}
				}
				else if (e.keyCode == keyMap.control) {
					prvKeypress = keyMap[e.keyCode];
				}
				else if (prvKeypress != '' && e.keyCode == keyMap.up || e.keyCode == keyMap.down) {
					var pressKey = prvKeypress + ' ' + keyMap[e.keyCode];
					keyPressedValue = e.keyCode;
					e.preventDefault();
					$(".datepicker-days td").removeAttr("tabindex");
					var keydownEvent = $.Event('customKeydown', { which: pressKey });
					pickerInput.trigger(keydownEvent);
					$(".datepicker-days").find(".active").attr("tabindex", "-1");
					$(".datepicker-days").find(".active").find("button").first().trigger("focus");
					prvKeypress = '';
				}
				else {
					prvKeypress = '';
				}
			}).on("dp.hide", function () {
				pickerInput[0].setSelectionRange(0, 0);
				setDirtyOnChange();
				$(pickerCalendar).trigger("focus");
				$(pickerCalendar).attr("aria-expanded", "false");
			}).on("dp.show", function (e) {
				var calender = pickerElement.find(".bootstrap-datetimepicker-widget")[0];
				var datepickerDays = $(calender).find('.datepicker-days')[0];
				var datepickerMonths = $(calender).find('.datepicker-months')[0];
				var datepickerYears = $(calender).find('.datepicker-years')[0];
				var datepickerDecades = $(calender).find('.datepicker-decades')[0];
				if ($(datepickerDays).css('display') == 'none') {
					$(datepickerDays).css('display','block')
				}
				if ($(datepickerMonths).css('display') != 'none') {
					$(datepickerMonths).css('display', 'none')
				}
				if ($(datepickerYears).css('display') != 'none') {
					$(datepickerYears).css('display', 'none')
				}
				if ($(datepickerDecades).css('display') != 'none') {
					$(datepickerDecades).css('display', 'none')
				}
				var previous = $(calender).find('.prev').find("button")[0];
				$(previous).attr("tabindex", "0");
				$(pickerCalendar).attr("aria-expanded", "true");
				setTimeout(function () { $(previous).trigger("focus"); }, 0);
			});

			pickerCalendar.on('keyup', function (calendarEvent) {
				var code = calendarEvent.keyCode || calendarEvent.which;
				if (code == keyMap.tab) {
					if (pickerElement.find(".bootstrap-datetimepicker-widget").length == 0) {
						refreshKeyUp(keyMap.tab);
					}
				}
				else if (code == keyMap.escape) {
					refreshKeyUp(keyMap.escape);
				}
			}).on('mouseover', function () {
				$(pickerCalendar).trigger("focus");
			});

			// datetimepicker v.4.17.47 doesn't handle keyup for enter, tab, escape
			// this is to explicitly clear keyState history
			function refreshKeyUp(pressedKey) {
				var keyUpEvent = $.Event('keyup', { which: pressedKey });
				pickerInput.trigger(keyUpEvent);
			};


			// In IE and Microsoft Edge browsers after selecting a date focus gets set to the page
			// to avoid that we need explicitly set focus to our active control
			function restoreTabIndexFocus() {
				if (pickerCalendar) {
					pickerCalendar.trigger("focus");
				}
			}
			var keyPressedValue;
			jQuery(document).on("click", function (ele) {
				if (ele.target.className?.toString().indexOf("input-text-box") < 1 && pickerElement.find(".bootstrap-datetimepicker-widget").length != 0 && (ele.target.className?.toString().indexOf("input-group-addon") == -1
					&& ele.target.className?.toString().indexOf("icon-calendar") == -1) && (keyPressedValue != keyMap.up && keyPressedValue != keyMap.down && keyPressedValue != keyMap.space)) {
					pickerElement.data('DateTimePicker').hide();
				}
				else {
					keyPressedValue = 0;
				}
			})

			//Trigger setIsDirty() method when calendar control value change
			function setDirtyOnChange() {
				if (typeof setIsDirty === "function")
					pickerInput.trigger("onchange");
			}

			// Tab Operation for dates
			function dateSectionOperation(calender, e) {
				var previous = $(calender).find('.prev').find("button")[0];
				var next = $(calender).find('.next').find("button")[0];
				var monthSelect = $(calender).find('.picker-switch').find("button")[0];
				var time = $(calender).find('a[data-action="togglePicker"]')[0];
				var inrhr = $(calender).find('a[data-action="incrementHours"]')[0];
				var dechr = $(calender).find('a[data-action="decrementHours"]')[0];
				var inrmi = $(calender).find('a[data-action="incrementMinutes"]')[0];
				var decmi = $(calender).find('a[data-action="decrementMinutes"]')[0];
				var hourbtn = $(calender).find('a[data-action="showHours"]')[0];
				var minutebtn = $(calender).find('a[data-action="showMinutes"]')[0];
				var inrseconds = $(calender).find('a[data-action="incrementSeconds"]')[0];
				var decseconds = $(calender).find('a[data-action="decrementSeconds"]')[0];
				var secondbtn = $(calender).find('a[data-action="showSeconds"]')[0];
				var togglePeriod = $(calender).find('[data-action="togglePeriod"]')[0];
				if ($(inrhr).is(":focus")) {
					e.preventDefault();
					!e.shiftKey ? $(hourbtn).trigger("focus") : $(time).trigger("focus");
				}
				else if ($(hourbtn).is(":focus")) {
					e.preventDefault();
					!e.shiftKey ? $(dechr).trigger("focus") : $(inrhr).trigger("focus");
				}
				else if ($(dechr).is(":focus")) {
					e.preventDefault();
					!e.shiftKey ? $(inrmi).trigger("focus") : $(hourbtn).trigger("focus");
				}
				else if ($(inrmi).is(":focus")) {
					e.preventDefault();
					!e.shiftKey ? $(minutebtn).trigger("focus") : $(dechr).trigger("focus");
				}
				else if ($(minutebtn).is(":focus")) {
					e.preventDefault();
					!e.shiftKey ? $(decmi).trigger("focus") : $(inrmi).trigger("focus");
				}
				else if ($(decmi).is(":focus")) {
					e.preventDefault();
					if (!e.shiftKey) {
						if (togglePeriod != undefined) {
							$(togglePeriod).trigger("focus");
						}
						else if (inrseconds != undefined) {
							e.preventDefault();
							$(inrseconds).trigger("focus");
						}
						else {
							$(time).trigger("focus");
						}
					}
					else {
						$(minutebtn).trigger("focus");
					}
				}
				else if ($(inrseconds).is(":focus")) {
					e.preventDefault();
					!e.shiftKey ? $(secondbtn).trigger("focus") : $(decmi).trigger("focus");
				}
				else if ($(secondbtn).is(":focus")) {
					e.preventDefault();
					!e.shiftKey ? $(decseconds).trigger("focus") : $(inrseconds).trigger("focus");
				}
				else if ($(decseconds).is(":focus")) {
					e.preventDefault();
					!e.shiftKey ? $(time).trigger("focus") : $(secondbtn).trigger("focus");
				}
				else if (e.target.parentNode.className == previous.parentNode.className && e.shiftKey) {
					e.preventDefault();
					if (time) {
						$(time).trigger("focus");
					}
					else if ($(".datepicker-days").find(".active").length == 0) {
						var keydownEvent = $.Event('customKeydown', { which: "t" });
						pickerInput.trigger(keydownEvent);
						$(".datepicker-days").find(".active").find("button").first().trigger("focus");
					}
					else {
						$(".datepicker-days").find(".active").find("button").first().trigger("focus");
					}
				}
				else if ($(monthSelect).is(":focus")) {
					e.preventDefault();
					$(monthSelect).blur();
					!e.shiftKey ? $(next).trigger("focus") : $(previous).trigger("focus");
				}
				else if (!time && !$(next).is(":focus") && !$(previous).is(":focus")) {
					e.preventDefault();
					!e.shiftKey ? $(previous).trigger("focus") : $(next).trigger("focus");
				}
				else if ($(time).is(":focus") && !pickerElement.find('.timepicker').is(':visible')) {
					e.preventDefault();
					if (!e.shiftKey) {
						$(previous).trigger("focus")
					}
					else {
						if ($(".datepicker-days").find(".active").length == 0) {
							var keydownEvent = $.Event('customKeydown', { which: "t" });
							pickerInput.trigger(keydownEvent);
							$(".datepicker-days").find(".active").find("button").first().trigger("focus");
						}
						else {
							$(".datepicker-days").find(".active").find("button").first().trigger("focus");
						}
					}
				}
				else if (!$(next).is(":focus") && !$(previous).is(":focus") && !$(time).is(":focus")) {
					e.preventDefault();
					!e.shiftKey ? $(time).trigger("focus") : (pickerElement.find('.timepicker').is(':visible') ? $(decmi).trigger("focus") : $(next).trigger("focus"));
				}
				else if ($(next).is(":focus")) {
					e.preventDefault();
					$(next).blur();
					if (!e.shiftKey) {
						if ($(".datepicker-days").find(".active").length == 0) {
							var keydownEvent = $.Event('customKeydown', { which: "t" });
							pickerInput.trigger(keydownEvent);
							$(".datepicker-days").find(".active").find("button").first().trigger("focus");
						}
						else {
							$(".datepicker-days").find(".active").find("button").first().trigger("focus");
						}
					}
					else {
						$(monthSelect).trigger("focus");
					}
				}
				// Bug Fixes 2150699
				else if ($(time).is(":focus")) {
					if (pickerElement.find('.timepicker').is(':visible')) {
						var hr = $(calender).find('a[data-action="incrementHours"]')[0];
						e.preventDefault();
						if (!e.shiftKey) {
							$(hr).trigger("focus");
						}
						else {
							if (togglePeriod) {
								$(togglePeriod).trigger("focus");
							}
							else if (decseconds) {
								$(decseconds).trigger("focus");
							}
							else {
								$(decmi).trigger("focus");
							}
						}
						//pickerElement.find('.btn[data-action="togglePeriod"]').click();
					}
				}
			}

			// Tab Operation for month/year/decades section
			function monthSectionOperation(calender, e) {
				var previous = $(calender).find('.prev').find("button")[0];
				var next = $(calender).find('.next').find("button")[0];
				var monthSelect = $(calender).find('.picker-switch').find("button")[0];
				if ($(next).is(":focus")) {
					e.preventDefault();
					$(next).blur();
					if (!e.shiftKey) {
						if ($(calender).find('.active').length > 0) {
							$(calender).find('.active').find("button").first().trigger("focus");
						}
						else {
							$(calender).find('tbody').first().find('tr').first().find('span').first().addClass('active');
							$(calender).find('tbody').first().find('tr').first().find('span').first().find("button").first().trigger("focus");
						}
					}
					else {
						$(monthSelect).trigger('focus');
					}
				}
				else if (e.target.parentNode.className == previous.parentNode.className && e.shiftKey) {
					e.preventDefault();
					if ($(calender).find('.active').length > 0) {
						$(calender).find('.active').find("button").first().trigger("focus");
					}
					else {
						$(calender).find('tbody').first().find('tr').first().find('span').first().addClass('active');
						$(calender).find('tbody').first().find('tr').first().find('span').first().find("button").first().trigger("focus");
					}
				}
				else if ($(calender).find('.active').find("button").first().is(":focus")) {
					e.preventDefault();
					$(calender).find('.active').find("button").first().blur();
					!e.shiftKey ? $(previous).trigger('focus') : $(next).trigger('focus');
				}
				if (!$(next).is(":focus") && !$(previous).is(":focus") && !$(monthSelect).is(":focus") && !$(calender).find('.active').find("button").first().is(":focus")) {
					e.preventDefault();
					$(previous).trigger('focus');
				}
			}

			// Tab Operation for Hour/Minute/Seconds selection
			function TimeSectionOperation(calender, e) {
				var togglePicker = $(calender).find('a[data-action="togglePicker"]')[0];
				if ($(togglePicker).is(":focus")) {
					e.preventDefault();
					$(togglePicker).blur();
					if ($(".timepicker-hours").is(':visible')) {
						$(calender).find('.hour.active').first().trigger("focus");
					}
					else if ($(".timepicker-minutes").is(':visible')) {
						$(calender).find('.minute').first().trigger("focus");
					}
					else if ($(".timepicker-seconds").is(':visible')) {
						$(calender).find('.second').first().trigger("focus");
					}
					else {
						$(togglePicker).trigger('focus');
					}
				}
				else {
					e.preventDefault();
					$(togglePicker).trigger('focus');
				}
			}

			//Direction key operation for date section
			function dateSectionDirectionKeyOperation(pickerElement, pickerInput, keyMap, e) {
				e.preventDefault();
				$(".datepicker-days td").removeAttr("tabindex");
				if ((e.keyCode == keyMap.up || e.keyCode == keyMap.down) && pickerElement.find('.timepicker').is(':visible')) {
					var keyvalue = keyMap[e.keyCode];
					keyPressedValue = e.keyCode;
				} else {
					var keyvalue = keyMap[e.keyCode];
					keyPressedValue = e.keyCode;
					var keydownEvent = $.Event('customKeydown', { which: keyvalue });

					if ($(".datepicker-days").find(".active").length > 0) {
						pickerInput.trigger(keydownEvent);
						$(".datepicker-days").find(".active").attr("tabindex", "-1");
						$(".datepicker-days").find(".active").find("button").first().trigger("focus");
					}
					else {
						$(".datepicker-days").find(".today").attr("tabindex", "-1");
						$(".datepicker-days").find(".today").find("button").first().trigger("focus");
						$(".datepicker-days").find(".today").addClass("active");
					}
					
					if (e.keyCode == keyMap.delete) {
						e.preventDefault();
						var calender = pickerElement.find(".bootstrap-datetimepicker-widget")[0];
						var next = $(calender).find('.next').find("button")[0];
						$(next).blur();
						if ($(".datepicker-days").find(".active").length == 0) {
							var keydownEvent1 = $.Event('customKeydown', { which: "t" });
							pickerInput.trigger(keydownEvent1);
							$(".datepicker-days").find(".active").find("button").first().trigger("focus");
						}
						else {
							$(".datepicker-days").find(".active").find("button").first().trigger("focus");
						}
						pickerInput.val('');
					}
				}
			}
			//Direction key operation for month/year section
			function monthSectionDirectionKeyOperation(keyMap, calender, e) {
				var elementArray = $(calender).find("tbody").find('span');
				var currentActiveElement = $(calender).find("tbody").find('.active')
				var currentActiveButton = $(calender).find("tbody").find('.active').find("button").first();
				var currentActiveIndex = elementArray.index(currentActiveElement);
				var previous = $(calender).find('.prev').find("button")[0];
				var next = $(calender).find('.next').find("button")[0];
				var monthSelect = $(calender).find('.picker-switch').find("button")[0];
				if ((e.keyCode == keyMap.up || e.keyCode == keyMap.down)) {
					keyPressedValue = e.keyCode;
				}
				if (e.keyCode == keyMap.up) {
					e.preventDefault();
					var remainingIndex = currentActiveIndex - 4;
					if (remainingIndex < 0) {
						$(currentActiveButton).blur();
						$(currentActiveButton).parent().removeClass('active');
						$(previous).trigger('click');
						$(calender).find("tbody").find('span').removeClass('active');
						$($(calender).find("tbody").find('span')[(elementArray.length) + (remainingIndex)]).addClass('active');
						$($(calender).find("tbody").find('span')[(elementArray.length) + (remainingIndex)]).find('button').first().trigger('focus');
					}
					else {
						$(currentActiveButton).blur();
						$(currentActiveButton).parent().removeClass('active');
						$(elementArray[currentActiveIndex - 4]).addClass('active');
						$(elementArray[currentActiveIndex - 4]).find('button').first().trigger('focus');
					}
				}
				else if (e.keyCode == keyMap.down) {
					e.preventDefault();
					var totalIndex = currentActiveIndex + 4;
					if (totalIndex > elementArray.length - 1) {
						var remaining = totalIndex - (elementArray.length);
						$(currentActiveButton).blur();
						$(currentActiveButton).parent().removeClass('active');
						$(next).trigger('click');
						$(calender).find("tbody").find('span').removeClass('active');
						$($(calender).find("tbody").find('span')[remaining]).addClass('active');
						$($(calender).find("tbody").find('span')[remaining]).find('button').first().trigger('focus');
					}
					else {
						$(currentActiveButton).blur();
						$(currentActiveButton).parent().removeClass('active');
						$(elementArray[currentActiveIndex + 4]).addClass('active');
						$(elementArray[currentActiveIndex + 4]).find('button').first().trigger('focus');
					}
				}
				else if (e.keyCode == keyMap.left) {
					e.preventDefault();
					if ($(currentActiveButton).is(':focus')) {
						if (currentActiveIndex == 0) {
							$(currentActiveButton).blur();
							$(currentActiveButton).parent().removeClass('active');
							$(previous).trigger('click');
							$(calender).find("tbody").find('span').removeClass('active');
							$(calender).find("tbody").find('span').last().addClass('active');
							$(calender).find("tbody").find('span').last().find('button').first().trigger('focus')
						}
						else {
							$(currentActiveButton).blur();
							$(currentActiveButton).parent().removeClass('active');
							var previousButton = $(currentActiveButton).parent().prev();
							$(previousButton).addClass('active');
							$(previousButton).find("button").first().trigger('focus');
						}
					}
				}
				else if (e.keyCode == keyMap.right) {
					e.preventDefault();
					if ($(currentActiveButton).is(':focus')) {
						if (currentActiveIndex < elementArray.length - 1) {
							$(currentActiveButton).blur();
							$(currentActiveButton).parent().removeClass('active');
							var nextButton = $(currentActiveButton).parent().next();
							$(nextButton).addClass('active');
							$(nextButton).find("button").first().trigger('focus');
						}
						else {
							$(currentActiveButton).blur();
							$(currentActiveButton).parent().removeClass('active');
							$(next).trigger('click');
							$(calender).find("tbody").find('span').removeClass('active');
							$(calender).find("tbody").find('span').first().addClass('active');
							$(calender).find("tbody").find('span').first().find('button').first().trigger('focus')
						}
					}
				}
			}

			//Direction key operation for decades section
			function decadeSectionDirectionKeyOperation(keyMap, calender, e) {
				var elementArray = $(calender).find("tbody").find('span').filter(function (index, element) {
					return !$(element).is(':empty');
				});
				var currentActiveElement = $(calender).find("tbody").find('.active')
				var currentActiveButton = $(calender).find("tbody").find('.active').find("button").first();
				var currentActiveIndex = elementArray.index(currentActiveElement);
				var previous = $(calender).find('.prev').find("button")[0];
				var next = $(calender).find('.next').find("button")[0];
				var monthSelect = $(calender).find('.picker-switch').find("button")[0];
				if ((e.keyCode == keyMap.up || e.keyCode == keyMap.down)) {
					keyPressedValue = e.keyCode;
				}
				if (e.keyCode == keyMap.up) {
					e.preventDefault();
					var remainingIndex = currentActiveIndex - 4;
					if (remainingIndex < 0) {
						$(currentActiveButton).blur();
						$(currentActiveButton).parent().removeClass('active');
						$(previous).trigger('click');
						$(calender).find("tbody").find('span').removeClass('active');
						$($(calender).find("tbody").find('span').filter(function (index, element) {
							return !$(element).is(':empty');
						})[(elementArray.length) + (remainingIndex)]).addClass('active');
						$($(calender).find("tbody").find('span').filter(function (index, element) {
							return !$(element).is(':empty');
						})[(elementArray.length) + (remainingIndex)]).find('button').first().trigger('focus');
					}
					else {
						$(currentActiveButton).blur();
						$(currentActiveButton).parent().removeClass('active');
						$(elementArray[currentActiveIndex - 4]).addClass('active');
						$(elementArray[currentActiveIndex - 4]).find('button').first().trigger('focus');
					}
				}
				else if (e.keyCode == keyMap.down) {
					e.preventDefault();
					var totalIndex = currentActiveIndex + 4;
					if (totalIndex > elementArray.length - 1) {
						var remaining = totalIndex - (elementArray.length - 1);
						$(currentActiveButton).blur();
						$(currentActiveButton).parent().removeClass('active');
						$(next).trigger('click');
						$(calender).find("tbody").find('span').removeClass('active');
						$($(calender).find("tbody").find('span').filter(function (index, element) {
							return !$(element).is(':empty');
						})[remaining]).addClass('active');
						$($(calender).find("tbody").find('span').filter(function (index, element) {
							return !$(element).is(':empty');
						})[remaining]).find('button').first().trigger('focus');
					}
					else {
						$(currentActiveButton).blur();
						$(currentActiveButton).parent().removeClass('active');
						$(elementArray[currentActiveIndex + 4]).addClass('active');
						$(elementArray[currentActiveIndex + 4]).find('button').first().trigger('focus');
					}
				}
				else if (e.keyCode == keyMap.left) {
					e.preventDefault();
					if ($(currentActiveButton).is(':focus')) {
						if (currentActiveIndex == 0) {
							$(currentActiveButton).blur();
							$(currentActiveButton).parent().removeClass('active');
							$(previous).trigger('click');
							$(calender).find("tbody").find('span').removeClass('active');
							$(calender).find("tbody").find('span').filter(function (index, element) {
								return !$(element).is(':empty')
							}).last().addClass('active');
							$(calender).find("tbody").find('span').filter(function (index, element) {
								return !$(element).is(':empty')
							}).last().find('button').first().trigger('focus')
						}
						else {
							$(currentActiveButton).blur();
							$(currentActiveButton).parent().removeClass('active');
							var previousButton = $(currentActiveButton).parent().prev();
							$(previousButton).addClass('active');
							$(previousButton).find("button").first().trigger('focus');
						}
					}
				}
				else if (e.keyCode == keyMap.right) {
					e.preventDefault();
					if ($(currentActiveButton).is(':focus')) {
						if (currentActiveIndex < elementArray.length - 1) {
							$(currentActiveButton).blur();
							$(currentActiveButton).parent().removeClass('active');
							var nextButton = $(currentActiveButton).parent().next();
							if (!$(nextButton).is(':empty')) {
								$(nextButton).addClass('active');
								$(nextButton).find("button").first().trigger('focus');
							}
							else {
								$(next).trigger('click');
								$(calender).find("tbody").find('span').removeClass('active');
								$(calender).find("tbody").find('span').first().addClass('active');
								$(calender).find("tbody").find('span').first().find('button').first().trigger('focus')
							}
						}
						else {
							$(currentActiveButton).blur();
							$(currentActiveButton).parent().removeClass('active');
							$(next).trigger('click');
							$(calender).find("tbody").find('span').removeClass('active');
							$(calender).find("tbody").find('span').first().addClass('active');
							$(calender).find("tbody").find('span').first().find('button').first().trigger('focus')
						}
					}
				}
			}

			//Direction key operation for Hour section
			function hourSectionDirectionKeyOperation(pickerElement, keyMap, e) {
				e.preventDefault();
				if ((e.keyCode == keyMap.up || e.keyCode == keyMap.down)) {
					keyPressedValue = e.keyCode;
				}
				var calender = pickerElement.find(".bootstrap-datetimepicker-widget")[0];
				var elementArray = $(".timepicker-hours").find('a[data-action="selectHour"]').filter(function (index, element) {
					return !$(element).is(':empty');
				});
				if (pickerElement.find('.timepicker-hours').is(':visible')) {
					var togglePicker = $(calender).find('a[data-action="togglePicker"]')[0];
					if ($(togglePicker).is(":focus")) {
						e.preventDefault();
						$(togglePicker).blur();
						$(calender).find('.hour').first().trigger("focus");
						$(calender).find('.hour').first().addClass('active');
					}
					else {
						var currentActiveElement = $(".timepicker-hours").find('.active').first();
						var currentActiveIndex = elementArray.index(currentActiveElement);
						if (e.keyCode == keyMap.up) {
							var remainingIndex = currentActiveIndex - 4;
							if (remainingIndex < 0) {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');

								var element = $(".timepicker-hours").find('a[data-action="selectHour"]')[elementArray.length + remainingIndex];
								$(element).addClass('active');
								$(element).trigger('focus');
							}
							$(currentActiveElement).blur();
							$(currentActiveElement).removeClass('active');
							$(elementArray[currentActiveIndex - 4]).addClass('active');
							$(elementArray[currentActiveIndex - 4]).first().trigger('focus');
						}
							else if (e.keyCode == keyMap.down) {
								var totalIndex = currentActiveIndex + 4;
								if (totalIndex > elementArray.length - 1) {
									var remaining = totalIndex - (elementArray.length);
									$(currentActiveElement).blur();
									$(currentActiveElement).removeClass('active');
									var element = $(".timepicker-hours").find('a[data-action="selectHour"]')[remaining];
									$(element).addClass('active');
									$(element).trigger('focus');
								}
								else {
									$(currentActiveElement).blur();
									$(currentActiveElement).removeClass('active');
									$(elementArray[currentActiveIndex + 4]).addClass('active');
									$(elementArray[currentActiveIndex + 4]).first().trigger('focus');
								}
						}
						else if (e.keyCode == keyMap.left) {
								if (currentActiveIndex == 0) {
									$(currentActiveElement).blur();
									$(currentActiveElement).removeClass('active');

									var element = $(".timepicker-hours").find('a[data-action="selectHour"]').last();
									$(element).addClass('active');
									$(element).trigger('focus');
								}
								else {
									$(currentActiveElement).blur();
									$(currentActiveElement).removeClass('active');
									var element = $(".timepicker-hours").find('a[data-action="selectHour"]')[currentActiveIndex-1];
									$(element).addClass('active');
									$(element).trigger('focus');
								}
						}
						else if (e.keyCode == keyMap.right) {
								if (currentActiveIndex < elementArray.length - 1) {
									$(currentActiveElement).blur();
									$(currentActiveElement).removeClass('active');
									var element = $(".timepicker-hours").find('a[data-action="selectHour"]')[currentActiveIndex + 1];
									$(element).addClass('active');
									$(element).trigger('focus');
								}
								else {
									$(currentActiveIndex).blur();
									$(currentActiveIndex).removeClass('active');
									var element = $(".timepicker-hours").find('a[data-action="selectHour"]').first();
									$(element).addClass('active');
									$(element).trigger('focus');
								}
						}
					}
				}
			}

			//Direction key operation for Minute section
			function minuteSectionDirectionKeyOperation(pickerElement, keyMap, e) {
				e.preventDefault();
				if ((e.keyCode == keyMap.up || e.keyCode == keyMap.down)) {
					keyPressedValue = e.keyCode;
				}
				var calender = pickerElement.find(".bootstrap-datetimepicker-widget")[0];
				var elementArray = $(".timepicker-minutes").find('a[data-action="selectMinute"]').filter(function (index, element) {
					return !$(element).is(':empty');
				});
				if (pickerElement.find('.timepicker-minutes').is(':visible')) {
					var togglePicker = $(calender).find('a[data-action="togglePicker"]')[0];
					if ($(togglePicker).is(":focus")) {
						e.preventDefault();
						$(togglePicker).blur();
						$(calender).find('.minute').first().trigger("focus");
						$(calender).find('.minute').first().addClass('active');
					}
					else {
						var currentActiveElement = $(".timepicker-minutes").find('.active').first();
						var currentActiveIndex = elementArray.index(currentActiveElement);
						if (e.keyCode == keyMap.up) {
							var remainingIndex = currentActiveIndex - 4;
							if (remainingIndex < 0) {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');

								var element = $(".timepicker-minutes").find('a[data-action="selectMinute"]')[elementArray.length + remainingIndex];
								$(element).addClass('active');
								$(element).trigger('focus');
							}
							$(currentActiveElement).blur();
							$(currentActiveElement).removeClass('active');
							$(elementArray[currentActiveIndex - 4]).addClass('active');
							$(elementArray[currentActiveIndex - 4]).first().trigger('focus');
						}
						else if (e.keyCode == keyMap.down) {
							var totalIndex = currentActiveIndex + 4;
							if (totalIndex > elementArray.length - 1) {
								var remaining = totalIndex - (elementArray.length);
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');
								var element = $(".timepicker-minutes").find('a[data-action="selectMinute"]')[remaining];
								$(element).addClass('active');
								$(element).trigger('focus');
							}
							else {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');
								$(elementArray[currentActiveIndex + 4]).addClass('active');
								$(elementArray[currentActiveIndex + 4]).first().trigger('focus');
							}
						}
						else if (e.keyCode == keyMap.left) {
							if (currentActiveIndex == 0) {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');

								var element = $(".timepicker-minutes").find('a[data-action="selectMinute"]').last();
								$(element).addClass('active');
								$(element).trigger('focus');
							}
							else {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');
								var element = $(".timepicker-minutes").find('a[data-action="selectMinute"]')[currentActiveIndex - 1];
								$(element).addClass('active');
								$(element).trigger('focus');
							}
						}
						else if (e.keyCode == keyMap.right) {
							if (currentActiveIndex < elementArray.length - 1) {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');
								var element = $(".timepicker-minutes").find('a[data-action="selectMinute"]')[currentActiveIndex + 1];
								$(element).addClass('active');
								$(element).trigger('focus');
							}
							else {
								$(currentActiveIndex).blur();
								$(currentActiveIndex).removeClass('active');
								var element = $(".timepicker-minutes").find('a[data-action="selectMinute"]').first();
								$(element).addClass('active');
								$(element).trigger('focus');
							}
						}
					}
				}
			}

			//Direction key operation for Minute section
			function secondSectionDirectionKeyOperation(pickerElement, keyMap, e) {
				e.preventDefault();
				if ((e.keyCode == keyMap.up || e.keyCode == keyMap.down)) {
					keyPressedValue = e.keyCode;
				}
				var calender = pickerElement.find(".bootstrap-datetimepicker-widget")[0];
				var elementArray = $(".timepicker-seconds").find('a[data-action="selectSecond"]').filter(function (index, element) {
					return !$(element).is(':empty');
				});
				if (pickerElement.find('.timepicker-seconds').is(':visible')) {
					var togglePicker = $(calender).find('a[data-action="togglePicker"]')[0];
					if ($(togglePicker).is(":focus")) {
						e.preventDefault();
						$(togglePicker).blur();
						$(calender).find('.second').first().trigger("focus");
						$(calender).find('.second').first().addClass('active');
					}
					else {
						var currentActiveElement = $(".timepicker-seconds").find('.active').first();
						var currentActiveIndex = elementArray.index(currentActiveElement);
						if (e.keyCode == keyMap.up) {
							var remainingIndex = currentActiveIndex - 4;
							if (remainingIndex < 0) {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');

								var element = $(".timepicker-seconds").find('a[data-action="selectSecond"]')[elementArray.length + remainingIndex];
								$(element).addClass('active');
								$(element).trigger('focus');
							}
							$(currentActiveElement).blur();
							$(currentActiveElement).removeClass('active');
							$(elementArray[currentActiveIndex - 4]).addClass('active');
							$(elementArray[currentActiveIndex - 4]).first().trigger('focus');
						}
						else if (e.keyCode == keyMap.down) {
							var totalIndex = currentActiveIndex + 4;
							if (totalIndex > elementArray.length - 1) {
								var remaining = totalIndex - (elementArray.length);
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');
								var element = $(".timepicker-seconds").find('a[data-action="selectSecond"]')[remaining];
								$(element).addClass('active');
								$(element).trigger('focus');
							}
							else {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');
								$(elementArray[currentActiveIndex + 4]).addClass('active');
								$(elementArray[currentActiveIndex + 4]).first().trigger('focus');
							}
						}
						else if (e.keyCode == keyMap.left) {
							if (currentActiveIndex == 0) {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');

								var element = $(".timepicker-seconds").find('a[data-action="selectSecond"]').last();
								$(element).addClass('active');
								$(element).trigger('focus');
							}
							else {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');
								var element = $(".timepicker-seconds").find('a[data-action="selectSecond"]')[currentActiveIndex - 1];
								$(element).addClass('active');
								$(element).trigger('focus');
							}
						}
						else if (e.keyCode == keyMap.right) {
							if (currentActiveIndex < elementArray.length - 1) {
								$(currentActiveElement).blur();
								$(currentActiveElement).removeClass('active');
								var element = $(".timepicker-seconds").find('a[data-action="selectSecond"]')[currentActiveIndex + 1];
								$(element).addClass('active');
								$(element).trigger('focus');
							}
							else {
								$(currentActiveIndex).blur();
								$(currentActiveIndex).removeClass('active');
								var element = $(".timepicker-seconds").find('a[data-action="selectSecond"]').first();
								$(element).addClass('active');
								$(element).trigger('focus');
							}
						}
					}
				}
			}
		});
	});

})(window.jQuery);