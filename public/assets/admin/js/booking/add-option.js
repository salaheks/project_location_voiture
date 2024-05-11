$(document).ready(function() {
    var selectedOptions = {};

    function refreshDropdowns() {
        $('select[name="option_id[]"]').each(function() {
            var currentVal = $(this).val();
            $(this).find('option').each(function() {
                var optionVal = $(this).val();
                if (selectedOptions[optionVal] && optionVal != currentVal) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    }

    $('select[name="option_id[]"]').change(function() {
        // Reset selected options tracking
        selectedOptions = {};
        $('select[name="option_id[]"]').each(function() {
            var val = $(this).val();
            if (val) {
                selectedOptions[val] = true;
            }
        });
        refreshDropdowns();
    });

    $('.add-option').click(function(e) {
        e.preventDefault();

        var lastRow = $('table tbody tr:last').clone(true);
        lastRow.find('input').val('');
        lastRow.find('select').prop('selectedIndex', 0);
        $('table tbody').append(lastRow);
        refreshDropdowns(); // Ensure new dropdown adheres to selection rules
    });

    refreshDropdowns(); // Initial refresh in case of pre-selected options
});
