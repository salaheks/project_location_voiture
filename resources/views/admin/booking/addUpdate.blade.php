@extends('admin.layouts.app')

@section('panel')
    <!-- Modal -->
    <div class="modal fade" id="emptyFieldModal" tabindex="-1" role="dialog" aria-labelledby="emptyFieldModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emptyFieldModalLabel">Champs Obligatoires Manquants</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="voiture_errors">
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-none-30">
        <div class="col-xl-12 col-lg-12 col-md-12 mb-30">
            <div class="card mt-50">
                <div class="card-body">
                    <x-add-user-modal />
                    <form action="{{ route('bookings.store') }}" method="POST" id="form-booking">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @foreach ($tabs as $index => $tab)
                                <li class="nav-item">
                                    <a class="nav-link {{ $loop->first ? 'active text--primary' : 'text-danger' }}"
                                        id="{{ $tab['id'] }}-tab" data-toggle="tab" href="#{{ $tab['id'] }}"
                                        role="tab" aria-controls="{{ $tab['id'] }}"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}"
                                        data-index="{{ $index }}">{{ $tab['name'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            @foreach ($tabs as $tab)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $tab['id'] }}"
                                    role="tabpanel" aria-labelledby="{{ $tab['id'] }}-tab">
                                    @include($tab['view'])
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group text-right mt-4">
                            <button type="submit" id="submitNextButton" class="btn btn--primary" form="form-booking">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        var APP_URL = "{{ env('APP_URL') }}";
        var companyId = "<?php echo auth()->user()->company->id; ?>";
        var clientStoreUrl = "{{ route('clients.store') }}";
    </script>
    <script src="{{ asset('/assets/admin/js/booking/booking.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/booking/add-option.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/booking/show-client-infos.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/booking/validate-date.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/show-hide-ice.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/booking/show-price-city.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/booking/get-option-infos.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/booking/change-tabs-colors.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/booking/get-car-location-price.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/booking/get-reglement-infos.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/booking/get-rest-payment.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/booking/change-navigation-button.js') }}"></script>
    <script>
        $('#form-booking').on('submit', function(e) {
            var isValid = true;
            var $voitureErrors = $('#voiture_errors');
            $voitureErrors.empty();

            var errorCategories = {
                'Voiture': {
                    'date_livraison': 'Veuillez saisir la date de livraison.',
                    'date_retour': 'La date de retour est requise. Veuillez la saisir.',
                    'nbr_jour': 'Indiquez le nombre de jours de location.',
                    'voiture_id': 'Sélectionnez une voiture pour la location.',
                },
                'Client': {
                    'client_id': 'Veuillez sélectionner un client pour cette location.',
                },
                'Réglement': {
                    'total': 'Le total à régler est obligatoire. Veuillez le saisir.',
                },
            };

            $.each(errorCategories, function(title, messages) {
                var errorsFound = false;

                $('#form-booking').find('input[type="datetime-local"], input[type="number"], select').each(
                    function() {
                        var fieldName = $(this).attr('name');
                        if ($.trim($(this).val()) === '' && messages[fieldName]) {
                            if (!errorsFound) {
                                $voitureErrors.append(
                                    `<h4>${title}</h4><ul class="${title.toLowerCase()}-errors"></ul>`
                                    );
                                errorsFound = true;
                            }
                            $(`.${title.toLowerCase()}-errors`).append(
                                `<li>${messages[fieldName]}</li>`);
                            isValid = false;
                        }
                    });
            });

            if (!isValid) {
                e.preventDefault();
                $('#emptyFieldModal').modal('show');
            }
        });
    </script>
@endpush
