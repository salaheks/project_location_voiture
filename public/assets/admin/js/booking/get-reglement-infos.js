$(document).ready(function () {
    $(document).on('change', 'input[name="prix_accessoires"], input[name="prix_location"], select[name="adresse_livraison"], select[name="adresse_retour"], input[name="prix_franchise"], input[name="second_driver_amount"]', function () {
        var prix_accessoires = parseFloat($('input[name="prix_accessoires"]').val()) || 0;
        var prix_location = parseFloat($('input[name="prix_location"]').val()) || 0;
        var prix_ville_livraison = parseFloat($('#prix_ville_livraison').val()) || 0;
        var prix_ville_retour = parseFloat($('#prix_ville_retour').val()) || 0;
        var prix_franchise = parseFloat($('input[name="prix_franchise"]').val()) || 0;
        var second_driver_amount = parseFloat($('input[name="second_driver_amount"]').val()) || 0;
        $('input[name="total"]').val(prix_location + prix_accessoires + prix_ville_livraison + prix_ville_retour + prix_franchise + second_driver_amount);
    });
    $('#rachat_franchise').change(function () {
        var rachatFranchiseValue = $(this).val();

        if (rachatFranchiseValue === '0') {
            $('#prix_franchise').val('');
            return;
        }

        var url = APP_URL + '/companies/' + companyId;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                franchiseData = data.franchise;
                updateFranchiseCost(franchiseData);
            },
            error: function (xhr, status, error) {
                console.error("Error occurred: " + error);
            }
        });
    });

    $('input[name="nbr_jour"]').change(function () {
        if (franchiseData !== undefined) {
            updateFranchiseCost(franchiseData);
        }
    });

    function updateFranchiseCost(data) {
        var nbrJourInput = $('input[name="nbr_jour"]').val();
        var totalCost = data * nbrJourInput;
        var prix_franchise = document.getElementById('prix_franchise');
        prix_franchise.value = totalCost;
        $(prix_franchise).change();
    }
});
