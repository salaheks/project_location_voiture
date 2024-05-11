$(document).ready(function () {
    $('#adresse_livraison').change(function () {
        var prixLivraison = $('option:selected', this).data('prix-livraison');
        $('#prix_ville_livraison').val(prixLivraison);
    });

    $('#adresse_retour').change(function () {
        var prixRetour = $('option:selected', this).data('prix-retour');
        $('#prix_ville_retour').val(prixRetour);
    });
});
