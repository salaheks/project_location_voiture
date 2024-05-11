function setNextPaymentDate() {
    var datePaiementInput = document.getElementById('date_paiement');
    if (datePaiementInput.value) {
        var inputDate = new Date(datePaiementInput.value);
        inputDate.setFullYear(inputDate.getFullYear() + 1);

        var nextPaymentDate = inputDate.toISOString().split('T')[0];
        document.getElementById('date_prochaine_paiement').value = nextPaymentDate;
    }
}

document.addEventListener('DOMContentLoaded', setNextPaymentDate);

document.getElementById('date_paiement').addEventListener('change', setNextPaymentDate);
