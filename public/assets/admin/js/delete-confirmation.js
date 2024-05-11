(function($) {
    "use strict";

    $('.deleteBtn').on('click', function() {
        var url = $(this).data('url');
        var modal = $('#deleteConfirmationModal');

        modal.find('form').attr('action', url);
        modal.modal('show');
    });

})(jQuery);
