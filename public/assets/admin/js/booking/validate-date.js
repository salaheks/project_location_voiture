const updateNbrJours = () => {
    const dateLivraison = new Date($('input[name="date_livraison"]').val());
    const dateRetour = new Date($('input[name="date_retour"]').val());
    const diff = dateRetour - dateLivraison;

    if (diff > 0) {
        $('input[name="nbr_jour"]').val(Math.round(diff / (1000 * 60 * 60 * 24)));
    } else {
        $('input[name="date_retour"], input[name="nbr_jour"]').val('');
        if (diff < 0) alert('La date de retour ne peut pas être antérieure ou égale à la date de livraison.');
    }
};

const fetchAvailableCars = () => {
    const dateLivraison = $('input[name="date_livraison"]').val();
    const dateRetour = $('input[name="date_retour"]').val();
    if (dateLivraison && dateRetour) {
        const url = '/voiture/available-voitures'; // Use a relative URL
        $.ajax({
            url: url,
            data: { dateLivraison: dateLivraison, dateRetour: dateRetour },
            type: 'GET',
            dataType: 'json',
            success: function(voitures) {
                console.log('Fetch successful.'); 
                const options = voitures.map(voiture => `<option value="${voiture.id}">${voiture.type.marque} ${voiture.type.model} ${voiture.immatriculation}</option>`).join('');
                $('select[name="voiture_id"]').html('<option disabled selected value="">Selectionnez Voiture</option>' + options);
            },
            error: function(xhr, status, error) {
                console.error('Error fetching available cars:', error); 
                $('select[name="voiture_id"]').html('<option disabled selected>Selectionnez Voiture</option>');
            }
        });
    }
};


function updateAndFetchCars() {
    updateNbrJours();
    fetchAvailableCars();
}

$('input[name="date_livraison"], input[name="date_retour"]').on('change', updateAndFetchCars);

$(window).on('pageshow', function() {
    updateAndFetchCars();
});
