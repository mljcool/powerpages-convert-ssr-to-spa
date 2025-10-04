$(document).ready(function () {
  const plusIcon = iconList.find(_icon => _icon.id === 'plus-icon');
  $(".create-action").each(function () {
    console.log($(this).length)

    const currentButtonText = $(this).text();
    $(this).html(`<span class="icon-msdyn-plus-icon">${plusIcon.svg}</span><span class="txt-regular-action">${currentButtonText}</span>`)
  })


  $(".create-action").on("click", function () {
    const userManagmentPopup = "msdyn-custom-dialog-form-user-management";
    const className = $(this).text().toLowercase().replace(/ /g, "-");
    console.log('className', className)

    IframeInjector(userManagmentPopup);
  });

  $(".back-btn").click(function (e) {
    e.preventDefault();
    window.location.href = '/';
  });

  $(document).on('click', 'a.details-link', function (e) {
    e.preventDefault();
    console.log('Details link clicked:', this);
    const userManagmentPopup = "msdyn-custom-dialog-form-user-management";
    IframeInjector(userManagmentPopup);
   
  });

})

function addCustomActionButtonsToTable() {
  const observer = new MutationObserver((mutationsList) => {
    mutationsList.forEach((mutation) => {
      if (mutation.type === 'childList' && $('table tbody tr').length) {
        triggerTableElement();
        observer.disconnect();
      }
    });
  });

  observer.observe(document.body, { childList: true, subtree: true });
}

function triggerTableElement() {
  updateCellsBasedOnValue((cell, { label, logicalName }) => {
    console.log('logicalName', logicalName);
    if (logicalName === 'statecode') {
      cell.html(`<span class="label-status ${label}">${label}</span>`);
    }

  });
}


function updateCellsBasedOnValue(updateFn) {

  $('.view-grid > table')
    .find('tbody tr td')
    .each(function () {
      const cell = $(this);
      const cellText = cell.text().trim(); 
      const cellValue = cell.data('value'); 
      const logicalName = cell.data('attribute'); 
      const tableProps = {
        label: cellText,
        value: cellValue,
        logicalName: logicalName,
      };
      updateFn(cell, tableProps);
    });
}


// Cancel or X button closes modal and resets veId
$('#defaultDialog .close, #defaultDialog .btn-secondary').on('click', function () {
  $('#defaultDialog').attr('hidden', '');
  currentVeId = null;
});

// Dummy helper - replace with your logic to get Contact Id related to veId
async function getContactIdFromVEId(veId) {
  return veId;
}

async function deactivateContact(contactId) {
  const fetchUrl = `/_api/msdyn_globalvendorportalaccesses?$select=msdyn_globalvendorportalaccessid,statuscode&$filter=_msdyn_contact_value eq ${contactId}`;

  return new Promise((resolve, reject) => {
    webapi.safeAjax({
      type: "GET",
      url: fetchUrl,
      success: async function (data) {
        if (data.value && data.value.length > 0) {
          try {
            const updatePromises = data.value.map((record) => {
              const updateUrl = `/_api/msdyn_globalvendorportalaccesses(${record.msdyn_globalvendorportalaccessid})`;
              const updateBody = { statecode: 1, statuscode: 192350001 };

              return new Promise((res, rej) => {
                webapi.safeAjax({
                  type: "PATCH",
                  url: updateUrl,
                  data: JSON.stringify(updateBody),
                  success: res,
                  error: (xhr) => rej(new Error(xhr.responseText || 'Failed to update status')),
                });
              });
            });

            await Promise.all(updatePromises);
            resolve(); // All updates succeeded

          } catch (updateErr) {
            reject(updateErr);
          }
        } else {
          resolve(); // No records found — optionally treat as success
        }
      },
      error: (xhr) => reject(new Error(xhr.responseText || 'Failed to retrieve access records')),
    });
  });
}



async function ODataAction(email) {
  // Step 1: Search for the record by mserp_userid (email)
  const fetchUrl = `/_api/mserp_vrmportaluserentities?$select=mserp_userid&$filter=mserp_userid eq '${email}'`;

  return new Promise((resolve, reject) => {
    webapi.safeAjax({
      type: "GET",
      url: fetchUrl,
      success: function (data) {
        if (data.value && data.value.length > 0) {
          const userRecord = data.value[0]; // Assume first match
          const userId = userRecord.mserp_vrmportaluserentityid;

          // Step 2: Build the payload
          const record = {
            mserp_actionname: "deactivateuser",
            mserp_actionparameters: `[{"Name": "_userId", "Value":"${email}"}]`
          };

          // Step 3: Send PATCH request to update action
          webapi.safeAjax({
            type: "PATCH",
            contentType: "application/json",
            url: `/_api/mserp_vrmportaluserentities(${userId})`,
            data: JSON.stringify(record),
            success: function (response) {
              resolve(response);
            },
            error: function (xhr) {
              reject(new Error(xhr.responseText || "Action patch failed"));
            }
          });

        } else {
          // ✅ No user found = skip PATCH, still resolve
          resolve({ message: "No matching user found, but considered successful." });
        }
      },
      error: function (xhr) {
        reject(new Error(xhr.responseText || "Failed to retrieve user by email"));
      }
    });
  });
}


$(document).ready(function () {
  $(".entity-grid.subgrid.portal-users-grid").on("loaded", function () {
    $('tr[data-entity="contact"] a.edit-link').each(function () {
      $(this).attr('href', 'javascript:void(0)');

      $(this).on('click', function () {
        $('#contactDeactivateModal').modal('show');

        var veGuidId = $(this).closest('tr').attr('data-id');
        var veEmailId = $(this).closest('tr').find('td[data-attribute="emailaddress1"]').text().trim();

        currentVeId = veGuidId;
        currentEmailId = veEmailId;

        console.log("currentVeId:", currentVeId);
        console.log("currentEmailId:", currentEmailId);

        $('#contactDeactivateModal .continue-submit').off('click').on('click', async function () {
          console.log("Function triggered");
          if (!currentVeId) return;

          const dialog = document.getElementById('defaultDialog');
          const $dialog = $(dialog);

          $dialog.find('.saving-loading-label').text('Processing...');
          $dialog.find('.flutent-ring').show();
          $dialog.find('.modal-fluent-footer').hide();

          $('#contactDeactivateModal').modal('hide'); // hide confirmation modal
          $('#defaultDialog').removeAttr('hidden');   // show processing modal

          try {
            await ODataAction(currentEmailId);
            const contactId = await getContactIdFromVEId(currentVeId);
            await deactivateContact(contactId);

            $dialog.find('.saving-loading-label').html('✅ Request processed successfully.');
            $dialog.find('.flutent-ring').hide();
            $dialog.find('.modal-fluent-footer').show();
          } catch (err) {
            console.error(err);
            $dialog.find('.saving-loading-label').html('⚠️ Something went wrong. Please try again.');
          }

          $dialog.find('.flutent-ring').hide();
          $dialog.find('.modal-fluent-footer').show();
        });
      });
    });
  });

  $('.continue-remain').on('click', function () {
    $('#contactDeactivateModal').modal('hide');
  });
  $('.continue-save').on('click', function () {
    window.location.href = window.location.href;
  });
});