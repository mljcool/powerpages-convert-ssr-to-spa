
if (window.jQuery) {
	(function ($) {
		$(document).ready(function () {
			var activeStep = $(".progress .list-group-item.active");
			if (activeStep.length) {
				//Placing div outside of ol parent because div is not allowed as direct children inside ol/ul
				$(activeStep).parents().eq(1).append('<div id=' + activeStep.text() + ' class="sr-only" aria-live="assertive">' + activeStep.text() + '</div>');
				$("fieldset").first().attr("aria-labelledby", activeStep.text());
				setTimeout(function () {
					$("fieldset .control").first()[0].firstChild.focus();
				});
			}

			// Linkify readonly url and email input types.
			$(".entity-form input[type='url'][readonly], .entity-form input[type='url'][disabled]").each(function () {
				var url = null;
				var text = '';
				if ($(this).hasClass("tickersymbol")) {
					url = "http://go.microsoft.com/fwlink?linkid=8506&Symbol=" + encodeURIComponent($(this).val().toString().toUpperCase());
					text = $(this).val();
				} else {
					url = $(this).val();
					text = url;
				}
				if (text == null || text == '' || url == null || url == '') {
					return;
				}
				var $parent = $(this).parent();
				var $container = $("<div></div>").addClass("control");
				var $link = $("<a></a>").addClass("text-primary").css("cursor", "pointer").attr("href", url).attr("target", "_blank").attr("readonly", "readonly").text(text);
				$(this).hide();
				$container.append($link).appendTo($parent);
			});
			$(".entity-form input[type='email'][readonly], .entity-form input[type='email'][disabled]").each(function () {
				var email = $(this).val();
				if (email == null || email == '') {
					return;
				}
				var $parent = $(this).parent();
				var $container = $("<div></div>").addClass("control");
				var $link = $("<a></a>").addClass("text-primary").css("cursor", "pointer").attr("href", "mailto:" + email).attr("readonly", "readonly").text(email);
				$(this).hide();
				$container.append($link).appendTo($parent);
			});

			// Add "required" attribute anywhere it couldn't be done on the server
			$(".entity-form span[data-required]").each(function () {
				$(this).find("input,select,textarea").prop("required", $(this).data("required"));
			});

			$(".entity-form").on("keypress.entityform", "*", function (e) {
				var keyCode = e.keyCode ? e.keyCode : e.which;
				if (keyCode == '13') {
					//stop form from submitting in address composite control on press of enter key
					let addresscomposite = $('textarea[id^=address]');
					if (addresscomposite != undefined && addresscomposite.length != 0) {
						let addresscompositepopover = addresscomposite.closest('.control').find('.popover-content');
						if (addresscompositepopover != undefined && addresscompositepopover.has($(document.activeElement)).length != 0) {
							e.preventDefault();
						}
					}
					e.stopPropagation();
				}
			});

			$("form").find("input[type=submit],button").on("keypress.entityform", function (e) {
				var keyCode = e.keyCode ? e.keyCode : e.which;
				if (keyCode == '13') {
					e.preventDefault();
					e.stopPropagation();
					$(this).trigger("click");
				}
			});
		});
	}(window.jQuery));
}
//changed to fix accessibilty bug 4471976
$(window).load(function () {
	setfocusOnSuccessMessage();
});
function setfocusOnSuccessMessage() {
	if ($('#MessageLabel').is(':visible')) {
		$('div.status > span.label-default').text($('#casetypecode option[selected="selected"]').text());
		$('#MessageLabel').attr('tabindex', 0);
		if ($('#MessageLabel').parent("div").hasClass("success")) 
		{
			if (window.history.replaceState) {
				window.history.replaceState(null, $("title").text(), window.location.href);
			}
		}
		$('#MessageLabel').trigger("focus");
	}
	else {
		if ($('#PreviousButton').is(':visible')) {
			$('form:not(.filter,.form-search) input,select,textarea').filter(function () {
				if ($(this).is(':visible:enabled:not([readonly])'))
					return this;
			}).first().trigger('focus');
		}
	}
}
// Simple helper to return the "exMaxLen" attribute for
// the specified field.  Using "getAttribute" won't work
// with Firefox.
function GetMaxLength(targetField) {
	return targetField.exMaxLen;
}

//
// Limit the text input in the specified field.
//
function LimitInput(targetField, sourceEvent) {
	var isPermittedKeystroke;
	var enteredKeystroke;
	var maximumFieldLength;
	var currentFieldLength;
	var inputAllowed = true;
	var selectionLength = parseInt(GetSelectionLength(targetField));

	if (GetMaxLength(targetField) != null) {
		// Get the current and maximum field length
		currentFieldLength = parseInt(targetField.value.length);
		maximumFieldLength = parseInt(GetMaxLength(targetField));

		// Allow non-printing, arrow and delete keys
		enteredKeystroke = window.event ? sourceEvent.keyCode : sourceEvent.which;
		isPermittedKeystroke = ((enteredKeystroke < 32)
			|| (enteredKeystroke >= 33 && enteredKeystroke <= 40)
			|| (enteredKeystroke == 46));

		// Decide whether the keystroke is allowed to proceed
		if (!isPermittedKeystroke) {
			if ((currentFieldLength - selectionLength) >= maximumFieldLength) {
				inputAllowed = false;
			}
		}

		// Force a trim of the textarea contents if necessary
		if (currentFieldLength > maximumFieldLength) {
			targetField.value = targetField.value.substring(0, maximumFieldLength);
		}
	}

	sourceEvent.returnValue = inputAllowed;
	return (inputAllowed);
}

//
// Limit the text input in the specified field.
//
function LimitPaste(targetField, sourceEvent) {
	var clipboardText;
	var resultantLength;
	var maximumFieldLength;
	var currentFieldLength;
	var pasteAllowed = true;
	var selectionLength = GetSelectionLength(targetField);

	if (GetMaxLength(targetField) != null) {
		// Get the current and maximum field length
		currentFieldLength = parseInt(targetField.value.length);
		maximumFieldLength = parseInt(GetMaxLength(targetField));

		clipboardText = (window.clipboardData || sourceEvent.clipboardData).getData("Text");
		resultantLength = currentFieldLength + clipboardText.length - selectionLength;
		if (resultantLength > maximumFieldLength) {
			pasteAllowed = false;
		}
	}

	sourceEvent.returnValue = pasteAllowed;
	return (pasteAllowed);
}

function LengthError(targetField, sourceEvent) {
	var maxLength = parseInt($(targetField).attr("maxlength"));
	var errorMessageID = 'length_error_message';
	if ($('#' + errorMessageID).length) {
		$('#' + errorMessageID).remove(); 
	}

	if ($(targetField).val().length == maxLength) {
		$(targetField).after('<p class="alert sr-only" role="alert" id="' + errorMessageID + '">' + window.ResourceManager['Length_ErrorText'] + '</p>');
		return false; 
	}
	return true;
}

//
// Returns the number of selected characters in 
// the specified element
//
function GetSelectionLength(targetField) {
	if (targetField.selectionStart == undefined) {
		return document.selection.createRange().text.length;
	}
	else {
		return (targetField.selectionEnd - targetField.selectionStart);
	}
}

// Rounds the value of the specified element to the precision provided
function setPrecision(id, precision) {
	if (!id) {
		return;
	}
	precision = precision || 0;
	var y = document.getElementById(id).value;
	if (y == "" || isNaN(y)) {
		return;
	}
	document.getElementById(id).value = (parseFloat(y)).toFixed(precision);
}

// Opens ticker symbol with web url in a new window
function launchTickerSymbolUrl(symbol) {
	if (symbol == '') {
		return false;
	}
	var url = "http://go.microsoft.com/fwlink?linkid=8506" + "&Symbol=" + encodeURIComponent(symbol.toString().toUpperCase());
	window.open(url, '_blank');
	return false;
}

// Sets the input elements string to uppercase
function uppercaseTickerSymbol(element) {
	if (element.value == '') {
		return;
	}
	element.value = element.value.toUpperCase();
}

// Opens a url in a new window
function launchUrl(url) {
	if (url == '') {
		return false;
	}
	var scheme = getUrlScheme(url);
	var validUrl;
	switch (scheme.toLowerCase()) {
		case "http": case "https": case "ftp": case "ftps": case "onenote": case "tel":
			validUrl = true;
			break;
		default:
			validUrl = false;
			break;
	}
	if (validUrl) {
		window.open(url, '_blank');
		return false;
	}
	return false;
}

// Launch email
function launchEmail(email) {
	if (email == '') {
		return false;
	}
	window.location.href = "mailto:" + email;
	return false;
}

// Returns the scheme of a url such as http, https, ftp etc.
function getUrlScheme(value) {
	var index = value.indexOf("://");
	if (index === -1) {
		return "";
	}
	else {
		return value.substr(0, index);
	}
}

// Ensures the input url has a valid scheme
function validateUrlInput(element, maxLength) {
	var url = element.value;
	element.value = validateUrlProtocol(url, maxLength);
}

// If the url scheme is not valid it prepends a valid scheme to the url.
function validateUrlProtocol(url, maxLength) {
	if (url == '') {
		return url;
	}
	maxLength = maxLength || 100;
	var scheme = getUrlScheme(url);
	switch (scheme.toLowerCase()) {
		case "http": case "https": case "ftp": case "ftps": case "onenote": case "tel": return url;
		case "": return prefixHttp(url, maxLength);
		default:
			alert('Invalid Protocol. Only HTTP, HTTPS, FTP, FTPS, ONENOTE and TEL protocols are allowed in this field.');
			return url;
	}
}

// Checks if required field is empty
function validateRequiredField(id) {
	var control = document.getElementById(id);
	if (control != undefined && (control.value == "" || control.value == null || control.value == undefined)) {
		control.setAttribute("aria-invalid", "true");
	}
	else {
		control.setAttribute("aria-invalid", "false");
	}
	// To check for radio button
	$("#" + id).find("input:radio").each(function (i) {
		if ($(this).is(":checked")) {
			control.setAttribute("aria-invalid", "false");
		}
	});

	// To check for checkbox
	$("#" + id).find("input:checkbox").each(function (i) {
		if ($(this).is(":checked")) {
			control.setAttribute("aria-invalid", "false");
		}
	});
}

// Returns a url with a valid scheme
function prefixHttp(url, maxlength) {
	url = url.trim();
	if ("http://" != url.substr(0, "http://".length).toLowerCase() && "https://" != url.substr(0, "https://".length).toLowerCase()) url = "https://" + url.substring(0, maxlength - "https://".length);
	return url;
}

// Scroll to element and focus on element.
function scrollToAndFocus(scollToId, focusOnId) {
	if (focusOnId == null || focusOnId.length <= 0) {
		return;
	}
	if (scollToId == null || scollToId.length <= 0) {
		scrollToPosition(focusOnId);
	} else {
		scrollToPosition(scollToId);
	}
	setFocus(focusOnId);
}

// Set focus on the element with the specified id.
function setFocus(id) {
	if (id == null) {
		return;
	}
	var element = document.getElementById(id);
	if (element != null) {
		element.focus();
	}
}

// Scroll to the position of the element with the specified id.
function scrollToPosition(id) {
	if (id == null) {
		return;
	}
	var element = document.getElementById(id);
	var posX = element.offsetLeft;
	var posY = element.offsetTop;
	var parentElement = element.offsetParent;
	while (parentElement != null) {
		posX += parentElement.offsetLeft;
		posY += parentElement.offsetTop;
		parentElement = parentElement.offsetParent;
	}
	window.scrollTo(posX, posY);
}

function disableButtons() {
	var inputs = document.getElementsByTagName("input");
	for (var i = 0, j = inputs.length; i < j; i++) {
		if (inputs[i].type === 'submit' || inputs[i].type === 'button') {
			inputs[i].disabled = true;
		}
	}
}

// Remove whitespace from the ends of a string
String.prototype.trim = function () {
	return this.replace(/^\s+|\s+$/g, "");
};

document.getElementsByClassName = function (cl) {
	var retnode = [];
	var myclass = new RegExp('\\b' + cl + '\\b');
	var elem = this.getElementsByTagName('*');
	for (var i = 0, j = elem.length; i < j; i++) {
		var classes = elem[i].className;
		if (myclass.test(classes)) retnode.push(elem[i]);
	}
	return retnode;
};

// Updates the total of a constant sum composite control
function updateConstantSum(name) {
	var elements = document.getElementsByClassName(name);
	var total = 0;
	for (var i = 0, j = elements.length; i < j; i++) {
		var value = elements[i].value;
		if (!isNaN(value) && value.length > 0) {
			total += parseInt(value);
		}
		if (i == (j - 1)) {
			var totalField = document.getElementById("ConstantSumTotalValue" + name);
			if (totalField != null) {
				totalField.value = total;
			}
		}
	}
};

// for image control

function createInputElement(label, size, message, messageForAttachmentLimit) {
	var inputElement = document.createElement("input");
	inputElement.setAttribute("type", "file");
	inputElement.setAttribute("accept", "image/*");
	inputElement.setAttribute("aria-label", label);
	inputElement.setAttribute("id", label);
	inputElement.setAttribute("onchange", "imageLoad(this,'" + messageForAttachmentLimit + "', '" + size + "', '" + message + "')");
	return inputElement;

}

function imageSuccessMessage(message) {
	var para = document.createElement("p");
	para.setAttribute("role", "alert");
	para.setAttribute("style", "font-size: 0; margin: 0 0 !important");
	para.setAttribute("tabindex","0");
	para.setAttribute("aria-label", message);
	return para;
}

function deleteImage(element, label) {
	var parent = element.parentNode;
	var grandParent = parent.parentNode;
	var grandGrandParent = grandParent.parentNode;
	element.setAttribute("style", "display:none");
	var divForImage = grandParent.firstChild;
	divForImage.setAttribute("style", "display:none");
	divForImage.firstChild.setAttribute("href", "");
	divForImage.firstChild.firstChild.setAttribute("src", "");
	var hidden = document.getElementById(label + "hidden");
	hidden.setAttribute("value", "");
	var hiddenForImageSize = document.getElementById(label + "hidden_image_size");
	var hiddenForImageChange = document.getElementById(label + "hidden_image_change");
	hiddenForImageChange.value = "true";
	if (hiddenForImageSize.value != null && hiddenForImageSize.value != "") {
		window.sizeOfFiles -= parseInt(hiddenForImageSize.value);
	}
	var elementForZeroFile = document.createElement("input");
	elementForZeroFile.setAttribute("type", "file");

	// for show message after delete image.
	var imageSuccessMessageParaForDelete = imageSuccessMessage(window.ResourceManager['Image_Deleted_Successfully']);
	grandGrandParent.appendChild(imageSuccessMessageParaForDelete);


	var inputElement = grandGrandParent.firstChild.firstChild;
	inputElement.files = elementForZeroFile.files;
	inputElement.nextSibling.removeAttribute("style");
};
function renderInlineImage(element, id, imageData, size, message, messageForAttachmentLimit) {

	var parent = element.parentNode;
	var divForImageDelete = parent.nextSibling;
	var divForImage = divForImageDelete.firstChild;
	divForImage.setAttribute("class", "image-inline");
	divForImage.removeAttribute("style");
	var imageElement = divForImage.firstChild.firstChild;
	imageElement.setAttribute("src", imageData);
	var divForDelete = divForImage.nextSibling;

	var buttonForDelete = divForDelete.firstChild;
	buttonForDelete.removeAttribute("style");

	// for show success message after upload image.
	var imageSuccessMessageParaForUpload = imageSuccessMessage(window.ResourceManager['Image_Uploaded_Successfully']);
	divForImage.appendChild(imageSuccessMessageParaForUpload);

	var uploadingDiv = divForImageDelete.nextSibling;
	var grandparent = parent.parentNode;
	grandparent.removeChild(uploadingDiv);
	var hidden = document.getElementById(id + "hidden");
	var imageValue = imageData.substr(imageData.indexOf(',') + 1);
	hidden.setAttribute("value", imageValue);
};
function renderErrorMessage(element, id, size, showMessage, message, messageForAttachmentLimit) {
	var elementForZeroFile = document.createElement("input");
	elementForZeroFile.setAttribute("type", "file");
	element.files = elementForZeroFile.files;
	var parent = element.parentNode;
	var grandparent = parent.parentNode;
	var divForImageDelete = parent.nextSibling;
	var divForInputFile = element.nextSibling;
	divForInputFile.removeAttribute("style");

	var hidden = document.getElementById(id + "hidden");
	hidden.setAttribute("value", "");

	var divForErrorMessage = document.createElement("div");
	divForErrorMessage.setAttribute("class", "error_message");
	var elementForError = document.createElement("p");
	elementForError.setAttribute("class", "validator-text");
	elementForError.innerText = showMessage;
	divForErrorMessage.appendChild(elementForError);

	var uploadingDiv = divForImageDelete.nextSibling;
	grandparent.removeChild(uploadingDiv);
	grandparent.insertBefore(divForErrorMessage, hidden);
};

function renderUploadingMessage(element) {
	var parent = element.parentNode;
	var grandParent = parent.parentNode;
	var id = element.getAttribute("id");
	var hidden = document.getElementById(id + "hidden");
	var uploadingDiv = document.createElement("div");
	uploadingDiv.innerText = "Uploading...";

	grandParent.insertBefore(uploadingDiv, hidden);
	var elementForDivInput = element.nextSibling;
	elementForDivInput.setAttribute("style", "display:none");
};

function chooseImage(element, id) {
	var elementForInputImage = document.getElementById(id);
	elementForInputImage.click();
}
function imageLoad(element, maxSizeInMB, size) {
	var id = element.getAttribute("id");
	var hidden = document.getElementById(id + "hidden");
	var hiddenForImageSize = document.getElementById(id + "hidden_image_size");
	var hiddenForImageChange = document.getElementById(id + "hidden_image_change");
	var errorElement = element.parentElement.parentElement.getElementsByClassName("error_message");
	var messageForAttachmentLimit = window.ResourceManager['Max_Attachment_Limit_Exceeded'];
	var message = window.ResourceManager['MaxSize_Image_Exceeded'];
	message = message.replace("{0}", maxSizeInMB);

	if (errorElement.length > 0) {
		errorElement[0].parentNode.removeChild(errorElement[0]);
	}
	renderUploadingMessage(element);
	var file = element.files;
	var imageValue = "";
	if (file) {
		var fileReader = new FileReader();

		if (fileReader && file && file.length) {
			if (file[0].size > parseInt(size)) {
				renderErrorMessage(element, id, size, message, message, messageForAttachmentLimit);
			}
			else if (window.sizeOfFiles + file[0].size > window.maxAllowedRequestSize) {
				renderErrorMessage(element, id, size, messageForAttachmentLimit, message, messageForAttachmentLimit);
			}
			else {
				fileReader.readAsDataURL(file[0]);

				fileReader.onload = function () {
					hiddenForImageChange.value = "true";
					hiddenForImageSize.value = file[0].size;
					window.sizeOfFiles += file[0].size;
					var imageData = fileReader.result;
					imageValue = imageData.substr(imageData.indexOf(',') + 1);
					hidden.setAttribute("value", imageValue);
					renderInlineImage(element, id, imageData, size, message, messageForAttachmentLimit);
				};
			}
		}
	}
};

// for file control

function renderSizeLimitVoilatedMessage(element, id, message) {
	var parent = element.parentNode;
	var grandParent = parent.parentNode;
	var hiddenForFileName = document.getElementById(id + "hidden_filename");
	var divForErrorMessage = document.createElement("div");
	divForErrorMessage.setAttribute("class", "error_message");
	var elementForError = document.createElement("p");
	elementForError.setAttribute("role", "alert");
	elementForError.setAttribute("class", "validator-text");
	elementForError.innerText = message;
	element.value = null;
	divForErrorMessage.appendChild(elementForError);
	grandParent.parentNode.parentNode.insertBefore(divForErrorMessage, hiddenForFileName);
};

function fileLoad(element, id, size, maxSizeInMB) {
	var hiddenForFileName = document.getElementById(id + "hidden_filename");
	var hiddenForFileType = document.getElementById(id + "hidden_filetype");
	var hiddenForFileChanged = document.getElementById(id + "hidden_file_change");
	var elementForInputButton = document.getElementById(id);
	var elementForFileSize = document.getElementById(id + "hidden_file_size");
	var elementForFileName = document.getElementById(id + "_file_name");
	var elementForDelete = document.getElementById(id + "_delete_button");
	var messageForFileAttachmentLimit = window.ResourceManager['Max_Attachment_Limit_Exceeded'];
	var messageForNoFile = window.ResourceManager['Text_For_No_File'];
	var messageForChooseFile = window.ResourceManager['Text_For_Choose_File'];
	var messageForChangeFile = window.ResourceManager['Text_For_Change_File'];
	var messageForUpperLimit = window.ResourceManager['MaxSize_File_Error'].replace("{0}", maxSizeInMB);
	var messageForLowerLimit = window.ResourceManager['MinSize_File_Error'];
	var errorElement = element.parentElement.parentElement.parentElement.parentElement.getElementsByClassName("error_message");
	if (errorElement.length > 0) {
		errorElement[0].parentNode.removeChild(errorElement[0]);
	}
	var file = element.files;
	if (file) {
		var fileReader = new FileReader();

		if (fileReader && file && file.length) {
			var earlierFileSize = 0;
			if (elementForFileSize.value != null && elementForFileSize.value != "") {
				earlierFileSize = parseInt(elementForFileSize.value);
			}

			if (file[0].size == 0) {
				renderSizeLimitVoilatedMessage(element, id, messageForLowerLimit);
				deleteFile(elementForDelete, id, messageForNoFile, messageForChooseFile);
			}
			else if (file[0].size > parseInt(size)) {
				renderSizeLimitVoilatedMessage(element, id, messageForUpperLimit);
				deleteFile(elementForDelete, id, messageForNoFile, messageForChooseFile);
			}
			else if ((window.sizeOfFiles + file[0].size - earlierFileSize) > window.maxAllowedRequestSize) {
				renderSizeLimitVoilatedMessage(element, id, messageForFileAttachmentLimit);
				deleteFile(elementForDelete, id, messageForNoFile, messageForChooseFile);
			}
			else {
				window.sizeOfFiles -= earlierFileSize;
				window.sizeOfFiles += file[0].size;
				elementForFileSize.value = file[0].size;
				elementForInputButton.innerText = messageForChangeFile;
				elementForInputButton.ariaLabel = messageForChangeFile;
				elementForFileName.innerText = file[0].name;
				hiddenForFileName.setAttribute("value", file[0].name);
				hiddenForFileType.setAttribute("value", file[0].type);
				hiddenForFileChanged.setAttribute("value", "upload");
				elementForFileName.parentElement.setAttribute("style", "display:none");
				elementForFileName.parentNode.parentNode.lastChild.innerText = file[0].name;
				elementForFileName.parentNode.parentNode.lastChild.removeAttribute("style");
				elementForDelete.removeAttribute("style");
			}
		}
	}
};

function chooseFile(element, id) {
	var elementForInputFile = document.getElementById(id + "_input_file");
	elementForInputFile.click();
}

$(document).ready(function () {
	var elementForFileControl = document.getElementsByClassName("break-file-name");
	for (var i = 0, j = elementForFileControl.length; i < j; i++) {
		var fileName = elementForFileControl[i].firstChild.firstChild.innerText;
		var elementForHiddenFileName = elementForFileControl[i].parentNode.parentNode.nextSibling;
		elementForHiddenFileName.value = fileName;
		var elementForHiddenFileSize = elementForFileControl[i].parentNode.parentNode.parentNode.lastChild;
		elementForHiddenFileSize.setAttribute("value", "");
	}
	var elementForImageControl = document.getElementsByClassName("image-inline");
	for (var i = 0, j = elementForImageControl.length; i < j; i++) {
		if (elementForImageControl[i].firstChild.href == null || elementForImageControl[i].firstChild.href == "") {
			elementForImageControl[i].parentNode.nextSibling.setAttribute("value", "");
		}
		elementForImageControl[i].parentNode.nextSibling.nextSibling.setAttribute("value", "");
	}

	window.sizeOfFiles = 0;
	window.maxAllowedRequestSize = 122880000;
	var elements = document.getElementsByClassName("file-control-container");
	for (var i = 0, j = elements.length; i < j; i++) {
		if (elements[i].clientWidth < 250 && elements[i].clientWidth >= 120) {
			elements[i].removeAttribute("class");
			elements[i].firstChild.nextSibling.setAttribute("class", "container-filelink-delete gap-between-vertical-element");
		}
		else if (elements[i].clientWidth < 120) {
			elements[i].removeAttribute("class");
			elements[i].firstChild.nextSibling.removeAttribute("class");
			elements[i].firstChild.nextSibling.firstChild.setAttribute("class", "break-file-name gap-between-vertical-element");
			elements[i].firstChild.nextSibling.lastChild.setAttribute("class", "gap-between-vertical-element");

		}
	}
	var elementForImageControl = document.getElementsByClassName("break-image-name");
	for (var i = 0, j = elementForImageControl.length; i < j; i++) {
		if (elementForImageControl[i].parentElement.parentElement.clientWidth >= 250) {

			elementForImageControl[i].parentElement.setAttribute("class", "div-for-image-input");
			elementForImageControl[i].parentNode.firstChild.setAttribute("class", "btn btn-default btn-for-image-input btn-for-inputofimage");
			elementForImageControl[i].setAttribute("class","break-image-name")
		}
	}

});

function deleteFile(element, id) {
	var messageForNoFile = window.ResourceManager['Text_For_No_File'];
	var messageForChooseFile = window.ResourceManager['Text_For_Choose_File'];
	element.setAttribute("style", "display:none");
	var elementForChooseFile = document.getElementById(id);
	elementForChooseFile.innerText = messageForChooseFile;
	var spanElementForFile = document.getElementById(id + "_file_name");
	var anchorForFile = spanElementForFile.parentElement;
	anchorForFile.setAttribute("style", "display:none");
	var hiddenForFileChanged = document.getElementById(id + "hidden_file_change");
	hiddenForFileChanged.setAttribute("value", "delete");
	var elementForNoFile = spanElementForFile.parentNode.parentNode.lastChild;
	elementForNoFile.removeAttribute("style");
	elementForNoFile.innerText = messageForNoFile;
	var elementForZeroFile =  document.createElement("input");
	elementForZeroFile.setAttribute("type", "file");
	var elementForFileInput = document.getElementById(id + "_input_file");
	elementForFileInput.setAttribute("value", "");
	elementForFileInput.files = elementForZeroFile.files;
	var hiddenForFileName = document.getElementById(id + "hidden_filename");
	hiddenForFileName.setAttribute("value", "");
	var hiddenForFileType = document.getElementById(id + "hidden_filetype");
	hiddenForFileType.setAttribute("value", "");
	var elementForFileSize = document.getElementById(id + "hidden_file_size");
	if (elementForFileSize.value != null && elementForFileSize.value != "") {
		window.sizeOfFiles -= parseInt(elementForFileSize.value);
		elementForFileSize.setAttribute("value", "");
	}
	//for success message after delete file.
	var para = document.createElement("span");
	para.setAttribute("role", "alert");
	para.setAttribute("style", "font-size: 0");
	para.setAttribute("aria-label", window.ResourceManager['File_Deleted_Successfully']);
	elementForChooseFile.appendChild(para);

	// for set focus on choose file button after delete file.
	$(".btn-for-file-input").attr("tabindex", 0);
	setFocus(elementForChooseFile.id);
};

// Adds class name "dirty"
function setIsDirty(id) {
	if (!id) {
		return;
	}
	var className = "dirty";
	var element = document.getElementById(id);
	if (element == null) {
		return;
	}
	if (!element.className.match(new RegExp('(\\s|^)' + className + '(\\s|$)'))) {
		element.className += " " + className;
	}
	if ($("#" + id).attr("aria-invalid") != undefined) {
		validateRequiredField(id);
	}
};

// Returns true if is dirty (i.e. an input has a class name 'dirty'. Otherwise returns false.
function isDirty() {
	var elements = document.getElementsByClassName("dirty");
	if (elements.length > 0) {
		return true;
	} else {
		return false;
	}
};

function clearIsDirty() {
	var elements = document.getElementsByClassName("dirty");
	for (var i = 0, j = elements.length; i < j; i++) {
		var className = "dirty";
		var reg = new RegExp('(\\s|^)' + className + '(\\s|$)');
		elements[i].className = elements[i].className.replace(reg, '');
	}
}

window.onbeforeunload = confirmExit;

function confirmExit() {
	var confirm = false;
	var confirmOnExit = document.getElementById("confirmOnExit");
	if (confirmOnExit != null) {
		if (confirmOnExit.value != null) {
			if (confirmOnExit.value == 'true') {
				confirm = true;
			}
		}
	}
	if (confirm) {
		// check to see if any changes to the data entry fields have been made
		if (isDirty()) {
			var message = window.ResourceManager['Click_Stay_To_Save_Your_Changes'];
			var element = document.getElementById("confirmOnExitMessage");
			if (element != null) {
				if (element.value != null && element.value != '') {
					message = element.value;
				}
			}
			return message;
		}
		// no changes - return nothing
	}
};


if (window.jQuery) {
	(function ($) {
		if (typeof (Page_ClientValidate) != 'undefined') {
			var originalValidationFunction = Page_ClientValidate;
			if (originalValidationFunction && typeof (originalValidationFunction) == "function") {
				Page_ClientValidate = function () {
					originalValidationFunction.apply(this, arguments);
					if (typeof (Page_IsValid) != 'undefined' && !Page_IsValid) {
						var validationSummary = $(".validation-summary");
						if (validationSummary != null && validationSummary != undefined) {
							var validationheader = $(".validation-header");
							validationSummary.removeAttr("role");
							//Setting role to none to restrict unecessary announcement by  MS Narrator on form controls
							validationheader.attr("role", 'none');
							validationSummary.attr('tabindex', '0');
							validationSummary.trigger("focus");
							validationSummary.find("ul").attr("role", "presentation");
							// To add aria-invalid attribute for form input required fields on submit/update 
							validationSummary.find("ul li a").each(
								function () {
									var id = $(this).attr("referenceControlId");
									if (id && ($("#" + id).is("input") || $("#" + id).is("textarea") || $("#" + id).is("select"))) {
										validateRequiredField(id);
									}
								});
							return false;
						}
					}
					return true;
				};
			}
		}
	}(window.jQuery));
}

$(window).bind("load", function () {
	if (portal) {
		portal.setValidationSummaryFocus();
	}
});