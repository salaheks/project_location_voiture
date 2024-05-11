function setButtonText() {
    var activeTabId = $('a[data-toggle="tab"].active').attr('id');
    if (activeTabId === 'voiture-tab') {
        $('button[type="submit"], button#nextButton')
            .attr('type', 'button')
            .text('Suivant')
            .attr('id', 'nextButton');
    } else {
        $('#submitNextButton, button#nextButton')
            .attr('type', 'submit')
            .text('Ajouter')
            .removeAttr('id');
    }
}
setButtonText();

$('a[data-toggle="tab"]').on('shown.bs.tab', function () {
    setButtonText();
});

$(document).on('click', '#nextButton', function () {
    $('#client-tab').tab('show');
});