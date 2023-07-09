<script type = "text/javascript">

// CSRF ajax setup
$.ajaxSetup({
    headers: 
    {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

// Loading overlay ajax setup
$.LoadingOverlaySetup({
    image: "",
    //fontawesome : "fa fa-refresh fa-spin",
    custom: '<div class="alert alert-default text-center d-inline-block animated fadeIn faster"><h4 class="alert-heading">Cargando</h4><p><i class="fa fa-refresh fa-spin fa-2x"></i></p><p class="mb-0"><small>Espere por favor</small></p></div>',
    size: "10",
    background: "rgba(255, 255, 255, 0.9)"
});

// Intercept 419 Token Mismatch / 401 Unauthorized / 403 Forbidden
$(document).ajaxComplete(function(event, xhr, settings) {
    if (xhr.status == 419 || xhr.status == 401 || xhr.status == 403 || xhr.status == 302) {
        // redirect to force login
        location.reload();
    }
});

// Display errors
function displayErrors(result) {
    var errorTitle = "{{ trans('general.messages.check_errors') }}";
    var errorsHtml = '';

    errorsHtml += '<ul class="alert alert-warning alert-dismissible fade show text-justify">';

    $.each(result.responseJSON.errors, function(key, value) {
        //$("#" + key).addClass("red-border");
        errorsHtml += '<strong><li>' + value + '</li></strong>';
    });

    errorsHtml += '</ul>';

    Swal.fire({
        icon: "warning",
        title: errorTitle,
        confirmButtonText: "{{ trans('general.messages.ack') }}",
        html: errorsHtml
    });
}

// Reload table
function reloadDatatable(tableSelector) {
    // Reload table
    tableSelector.DataTable().ajax.reload(null, false);
}

// Display message
// Success: displayMessage('center', 'success', 'Success message');
// Error: displayMessage('center', 'error', 'Error message');
// Warning: displayMessage('center', 'warning', 'Warning message');
function displayMessage(location, type, message, duration = 1500) {
    // Display message
    Swal.fire({
        position: location,
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: duration
    }).then(function() {});
}

// Display success and reload table
function successReloadTable(data, tableSelector) {
    // Success message
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: data.responseJSON.message,
        showConfirmButton: false,
        timer: 1500
    }).then(function() {
        // Reload table
        reloadDatatable(tableSelector);
    });
}

// Confirmation message
function displayConfirmation(title, text, confirmButtonText, cancelButtonText, successCalback) 
{
    Swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: confirmButtonText,
        cancelButtonText: cancelButtonText
    }).then((result) => 
    {
        if (result.isConfirmed) 
        {
            successCalback();
        }
    });
}

// Show modal
function showModal(modalSelector) {
    modalSelector.modal('show');
}

// Hide modal
function hideModal(modalSelector) {
    modalSelector.modal('hide');
}

// Toggle Modal
function toggleModal(modalSelector) {
    modalSelector.modal('toggle');
}

// Ajax Call
function ajaxCall(url, method, data, callback) {
    $.ajax({
        url: url,
        method: method,
        data: data,
        cache: true,
        success: function(data, textStatus, jqXHR) {
            callback(textStatus, jqXHR);
        },
        error: function(jqXHR, textStatus, error) {
            callback(textStatus, jqXHR);
        }
    });
}

</script>