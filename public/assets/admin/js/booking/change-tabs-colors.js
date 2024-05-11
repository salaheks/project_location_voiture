document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('#myTab .nav-link');

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            let clickedIndex = parseInt(this.getAttribute('data-index'));

            tabs.forEach((t, index) => {
                t.classList.remove('text--primary', 'text-danger', 'text-success');
                if (index < clickedIndex) {
                    t.classList.add('text-success');
                } else if (index === clickedIndex) {
                    t.classList.add('text--primary');
                } else {
                    t.classList.add('text-danger');
                }
            });
        });
    });
});
