$('#isCompany').change(function() {
    if (this.checked) {
        $('#iceField').show();
    } else {
        $('#iceField').hide();
    }
});
