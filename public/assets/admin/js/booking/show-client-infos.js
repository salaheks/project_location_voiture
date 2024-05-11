$('#clientSelect').change(function () {
    var clientId = $(this).val();
    $.ajax({
        url: `${APP_URL}/clients/` + clientId,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var element = document.querySelector('.inputs-container');
            if (element && element.classList.contains('d-none')) {
                element.classList.remove('d-none');
            }
            $('#dateNaissance').val(data.date_naissance);
            $('#permis').val(data.permis);
            $('#cin').val(data.cin);
            $('#telephone').val(data.telephone);
            $('#num_passeport').val(data.num_passeport);
            $('#date_delivration_passeport').val(data.date_delivration_passeport);
        },
        error: function (xhr, status, error) {
            console.error("Error occurred: " + error);
        }
    });
});

$('#driverSelect').change(function () {
    var driverId = $(this).val();
    var driverAmountInput = document.getElementById('second_driver_amount');
    var nbrJourInput = $('input[name="nbr_jour"]').val();
    driverAmountInput.value = 20 * nbrJourInput;
    $(driverAmountInput).change();
    $.ajax({
        url: `${APP_URL}/clients/` + driverId,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var element = $('#inputs-container-driver')[0];
            if (element && element.classList.contains('d-none')) {
                element.classList.remove('d-none');
            }
            $('#dateNaissance_driver').val(data.date_naissance);
            $('#permis_driver').val(data.permis);
            $('#cin_driver').val(data.cin);
            $('#telephone_driver').val(data.telephone);
            $('#num_passeport_driver').val(data.num_passeport);
            $('#date_delivration_passeport_driver').val(data.date_delivration_passeport);
        },
        error: function (xhr, status, error) {
            console.error("Error occurred: " + error);
        }
    });
});

$('#btn-save').click(function(e) {
    e.preventDefault();
    var formData = new FormData($('.form-horizontal')[0]);
    $.ajax({
        type: 'POST',
        url: clientStoreUrl,
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $('.modal').modal('hide');
            var newOption = $('<option>', {
                value: response.id,
                text: response.nom
            });
            $('#clientSelect').append(newOption);
            $('#clientSelect').select2();
            $('#clientSelect').val(response.id).trigger('change');
        },
        error: function(error) {
            console.log(error);
        }
    });
});
