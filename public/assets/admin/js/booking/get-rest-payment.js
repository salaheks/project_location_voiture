$(document).on('change',
    'input[name="total"], input[name="avance"]',
    function () {
        var total = parseFloat($('input[name="total"]').val()) || 0;
        var avance = parseFloat($('input[name="avance"]').val()) || 0;
        $('input[name="reste"]').val(total - avance);
    });
