$(document).ready(function() {
    $(document).on('change', 'select[name="option_id[]"], input[name="nbr_jour"], select[name="type_paiement[]"], input[name="prix[]"], input[name="quantite[]"]', function() {
        var row = $(this).closest('tr');

        if ($(this).attr('name') !== 'option_id[]') {
            var type = row.find('select[name="type_paiement[]"]').val();
            var price = row.find('input[name="prix[]"]').val();
            calculateAmount(row, type, price);
        } else {
            var optionId = $(this).val();
            if (optionId) {
                fetchOptionData(optionId, row);
            }
        }
    });

    $(document).on('change', 'input[name="amount[]"]', function() {
        calculateTotalOptions();
    });

    function fetchOptionData(optionId, row) {
        $.ajax({
            url: `${APP_URL}/options/` + optionId,
            type: 'GET',
            success: function(response) {
                fillData(row, response);
            },
            error: function(xhr, status, error) {
                console.error("An error occurred: " + status + " " + error);
            }
        });
    }

    function fillData(row, data) {
        row.find('input[name="quantite[]"]').val(1);
        row.find('input[name="prix[]"]').val(data.prix);
        row.find('select[name="type_paiement[]"]').val(data.type_paiement);
        calculateAmount(row, data.type_paiement, data.prix);
    }

    function calculateAmount(row, type, price) {
        var quantity = row.find('input[name="quantite[]"]').val();
        var bookingDuration = $('input[name="nbr_jour"]').val() || 1;

        var amount = 0;
        if (type === 'par reservation') {
            amount = quantity * price;
        } else if (type === 'par jour') {
            amount = (quantity * price) * bookingDuration;
        }

        row.find('input[name="amount[]"]').val(amount);
        calculateTotalOptions();
    }

    $('table').on('click', '.deleteBtn', function(e) {
        e.preventDefault();
        var rowCount = $('table tbody tr').length;
        if (rowCount > 1) {
            $(this).closest('tr').remove();
            calculateTotalOptions();
        }
    });

    function calculateTotalOptions() {
        var total = 0;
        $('input[name="amount[]"]').each(function() {
            var amount = parseFloat($(this).val()) || 0;
            total += amount;
        });
        $('input[name="prix_accessoires"]').val(total.toFixed(2));
        $('input[name="prix_accessoires"]').change();
    }
});
