function updateExpirationDetails(expirationDate, url, tagId, badgeId) {
    var $tag = $('#' + tagId);
    var today = new Date();
    var $statusBadge = $('#' + badgeId);
    if (expirationDate) {
        var expiryDate = new Date(expirationDate);
        $tag.text(expirationDate).attr('href', url);
        if (expiryDate < today) {
            $statusBadge.removeClass('bg--success').addClass('bg--danger').text('Expiré');
        } else {
            $statusBadge.removeClass('bg--danger').addClass('bg--success').text('Valide');
        }
    }
    else {
        $tag.text('');
        $statusBadge.removeClass('bg--success').addClass('bg--danger').text('Expiré');
    }
}

function updatePanneDetails(startDate, EndDate, startTagId, endTagId, badgeId) {
    var $startTag = $('#' + startTagId);
    var $endTag = $('#' + endTagId);
    var $statusBadge = $('#' + badgeId);

    if (startDate) {
        $startTag.text(startDate);
        if (!EndDate) {
            $endTag.text('');
            $statusBadge.removeClass('bg--success').addClass('bg--danger').text('en panne');
        } else {
            $endTag.text(EndDate);
            $statusBadge.removeClass('bg--danger').addClass('bg--success').text('Fonctionnelle');
        }
    } else {
        $startTag.text('');
        $statusBadge.removeClass('bg--danger').addClass('bg--success').text('Fonctionnelle');
    }
}

$('#selectedCar').on('change', function () {
    var carId = $(this).val();
    if (!carId) return;

    $('.car-infos').removeClass('d-none');

    // Change prix location input value
    $.ajax({
        url: `${APP_URL}/voiture/${carId}`,
        type: 'GET',
        success: function (response) {
            $('#prix_location').val(response.type.prix).change();
        },
        error: function (xhr, status, error) {
            console.error("Error fetching car info: ", error);
        }
    });

    // Visites technique
    $.ajax({
        url: `${APP_URL}/visitestechnique/${carId}`,
        type: 'GET',
        success: function (response) {
            var tagId = 'dateExpirationVT';
            var badgeId = 'statusBadgeVT';
            if (response) {
                var expirationDate = response.date_prochaine_visite;
                var url = `${APP_URL}/voiture/visitetechniques/${carId}`;
                updateExpirationDetails(expirationDate, url, tagId, badgeId);
            }
            else {
                updateExpirationDetails(null, null, tagId, badgeId);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching visite technique: ", error);
        }
    });

    // Assurance
    $.ajax({
        url: `${APP_URL}/assurance/${carId}`,
        type: 'GET',
        success: function (response) {
            var badgeId = 'statusBadgeAssurance';
            var tagId = 'dateExpirationAssurance';
            if (response) {
                var expirationDate = response.date_fin;
                var url = `${APP_URL}/voiture/assurance/${carId}`;
                updateExpirationDetails(expirationDate, url, tagId, badgeId);
            }
            else {
                updateExpirationDetails(null, null, tagId, badgeId);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching assurance: ", error);
        }
    });

    // Vignette
    $.ajax({
        url: `${APP_URL}/vignette/${carId}`,
        type: 'GET',
        success: function (response) {
            var badgeId = 'statusBadgeVignette';
            var tagId = 'dateExpirationVignette';
            if (response) {
                var nextPaiementDate = new Date(response.date_paiement);
                nextPaiementDate.setFullYear(nextPaiementDate.getFullYear() + 1);
                var expirationDate = nextPaiementDate.toISOString().split('T')[0];
                var url = `${APP_URL}/voiture/vignette/${carId}`;
                updateExpirationDetails(expirationDate, url, tagId, badgeId);
            }
            else {
                updateExpirationDetails(null, null, tagId, badgeId);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching vignette: ", error);
        }
    });

    // Autorisations de circulation
    $.ajax({
        url: `${APP_URL}/autorisation/${carId}`,
        type: 'GET',
        success: function (response) {
            var badgeId = 'statusBadgeAutorisation';
            var tagId = 'dateExpirationAutorisation';
            if (response) {
                var expirationDate = response.date_fin;
                updateExpirationDetails(expirationDate, null, tagId, badgeId);
            }
            else {
                updateExpirationDetails(null, null, tagId, badgeId);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching autorisations de circulation: ", error);
        }
    });

    // Panne
    $.ajax({
        url: `${APP_URL}/panne/${carId}`,
        type: 'GET',
        success: function (response) {
            var badgeId = 'statusBadgePanne';
            var startTagId = 'dateDebutPanne';
            var endTagId = 'dateFinPanne';
            if (response) {
                var start = new Date(response.date_debut);
                var startDate = start.toISOString().split('T')[0];
                var EndDate = null;
                if (response.date_fin) {
                    var end = new Date(response.date_fin);
                    EndDate = end.toISOString().split('T')[0];
                }
                updatePanneDetails(startDate, EndDate, startTagId, endTagId, badgeId);
            }
            else {
                updatePanneDetails(null, null, startTagId, endTagId, badgeId);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error fetching panne: ", error);
        }
    });

    // Vidange
    $.ajax({
        url: `${APP_URL}/vidange/${carId}`,
        type: 'GET',
        success: function (response) {
            var statusBadge = $('#statusBadgeVidange');
            var kmChangementVidange = $('#kmChangementVidange');
            var kmActuel = $('#kmActuel');
            if (response && response.lastCarKm &&  response.lastVidange) {
                var totalKmChangementVidange = response.lastVidange.km_vidange + response.lastVidange.km_debut;
                var totalKmActuel = response.lastCarKm.km;
                kmChangementVidange.text(totalKmChangementVidange);
                kmActuel.text(totalKmActuel);
                if (totalKmActuel < totalKmChangementVidange) {
                    statusBadge.removeClass('bg--danger').addClass('bg--success').text('Vidange');
                }
                else {
                    statusBadge.removeClass('bg--success').addClass('bg--danger').text('Nécessaire');
                }
            }
            else{
                kmChangementVidange.text('');
                kmActuel.text('');
                statusBadge.removeClass('bg--danger bg--success').text('');
            }
    },
        error: function (xhr, status, error) {
            console.error("Error fetching panne: ", error);
        }
    });

    // Chaine de distribution
    $.ajax({
        url: `${APP_URL}/chain/${carId}`,
        type: 'GET',
        success: function (response) {
            var statusBadge = $('#statusBadgeChain');
            var kmChangementChain = $('#kmChangementChain');
            var kmActuel = $('#kmActuelChain');
            if (response && response.lastCarKm &&  response.lastChain) {
                console.log(response);
                var totalKmChangementChain = response.lastChain.km_changement + response.lastChain.km_initial;
                var totalKmActuel = response.lastCarKm.km;
                var url = `${APP_URL}/voiture/vidange/${carId}`;
                kmChangementChain.text(totalKmChangementChain).attr('href', url);
                kmActuel.text(totalKmActuel).attr('href', url);
                if (totalKmActuel < totalKmChangementChain) {
                    statusBadge.removeClass('bg--danger').addClass('bg--success').text('Chaine');
                }
                else {
                    statusBadge.removeClass('bg--success').addClass('bg--danger').text('Nécessaire');
                }
            }
            else{
                kmChangementChain.text('');
                kmActuel.text('');
                statusBadge.removeClass('bg--danger bg--success').text('');
            }
    },
        error: function (xhr, status, error) {
            console.error("Error fetching Distribution chain: ", error);
        }
    });
});
