@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('voiture.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border--dark mb-4">
                                    <div class="card-header bg--dark d-flex justify-content-between">
                                        <h5 class="text-white">@lang('Information General')</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <div class="form-group">
                                                <label>@lang('Immatriculation')</label>
                                                <input type="text" class="form-control" name="immatriculation"
                                                    value="{{ old('immatriculation') }}" required>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <label>@lang('categorie')</label>
                                                <select class="form-control" name="categorie">
                                                    @foreach (voiturecategories() as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <label>@lang('type')</label>
                                                <select class="form-control" name="type_id">
                                                    @foreach ($types as $type)
                                                        <option value="{{ $type->id }}">
                                                            {{ $type->marque . ' ' . $type->model . ' ' . $type->carburant . ' ' . $type->transmission }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <label>@lang('couleur')</label>
                                                <select class="form-control" name="couleur">
                                                    @foreach (voiturecouleurs() as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border--dark mb-4">
                                    <div class="card-header bg--dark d-flex justify-content-between">
                                        <h5 class="text-white">@lang('Donnée Notification')</h5>
                                    </div>
                                    <div class="card-body">
                                        <p><small class="text-facebook">@lang('Les images seront redimensionnées en')
                                                {{ imagePath()['vehicles']['size'] }}px</small></p>
                                        <div class="row element">

                                            <div class="col-md-2 imageItem">
                                                <div class="payment-method-item">
                                                    <div class="payment-method-header d-flex flex-wrap">
                                                        <div class="thumb" style="position: relative;">
                                                            <div class="avatar-preview">
                                                                <div class="profilePicPreview"
                                                                    style="background-image: url('{{ asset('assets/images/default.png') }}')">

                                                                </div>
                                                            </div>
                                                            <div class="avatar-edit">
                                                                <input type="file" name="image"
                                                                    class="profilePicUpload" id="0"
                                                                    accept=".png, .jpg, .jpeg">
                                                                <label for="0" class="bg-primary">
                                                                    <i class="la la-pencil"></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card border--dark mb-4">
                                    <div class="card-header bg--dark d-flex justify-content-between">
                                        <h5 class="text-white">@lang('Information Detaille')</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('Date de Mise')</label>
                                                    <input type="date" class="form-control" name="date_mise"
                                                        value="{{ old('date_mise') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('Nombre de Porte')</label>
                                                    <input type="number" class="form-control" name="nombre_porte"
                                                        value="{{ old('nombre_porte') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('Nombre de Passager')</label>
                                                    <input type="number" class="form-control" name="nombre_passager"
                                                        value="{{ old('nombre_passager') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('Capacité de Bagage')</label>
                                                    <input type="text" class="form-control" name="capacite_bagage"
                                                        value="{{ old('capacite_bagage') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('Climatisation')</label>
                                                    <select class="form-control" name="climatisation">
                                                        <option value="1">@lang('Oui')</option>
                                                        <option value="0">@lang('Non')</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('Airbag')</label>
                                                    <select class="form-control" name="airbag">
                                                        <option value="1">@lang('Oui')</option>
                                                        <option value="0">@lang('Non')</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card border--dark mb-4">
                                    <div class="card-header bg--dark d-flex justify-content-between">
                                        <h5 class="text-white">@lang('Mode Achat')</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('Mode réglement')</label>
                                                    <select class="form-control select2-basic" name="mode_reglement">
                                                        @foreach (modereglement() as $key => $value)
                                                            <option value="{{ $key }}">{{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('Prix')</label>
                                                    <input type="number" class="form-control" name="prix_achat"
                                                        value="{{ old('prix_achat') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('Credit')</label>
                                                    <select class="form-control" name="credit">
                                                        <option value="1">@lang('Oui')</option>
                                                        <option value="0" selected>@lang('Non')</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 credit-related">
                                                <div class="form-group">
                                                    <label>@lang('Avance')</label>
                                                    <input type="number" class="form-control" name="avance_credit"
                                                        value="{{ old('avance_credit') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 credit-related">
                                                <div class="form-group">
                                                    <label>@lang('Duree du Credit') (mois)</label>
                                                    <input type="number" class="form-control" name="duree_credit_mois"
                                                        value="{{ old('duree_credit_mois') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 credit-related">
                                                <div class="form-group">
                                                    <label>@lang('Montant de Paiement') (mois)</label>
                                                    <input type="number" class="form-control"
                                                        name="montant_paiement_par_mois"
                                                        value="{{ old('montant_paiement_par_mois') }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 credit-related">
                                                <div class="form-group">
                                                    <label>@lang('Date Debut de Paiement')</label>
                                                    <input type="date" class="form-control" name="date_debut_paiement"
                                                        value="{{ old('date_debut_paiement') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--primary w-100">@lang('Create')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('voiture.index') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
@endpush

@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select the credit dropdown
            var creditSelect = document.querySelector('select[name="credit"]');

            // Function to toggle visibility based on credit value
            function toggleVisibility() {
                var value = creditSelect.value;
                // Select only the divs with class "credit-related" to show/hide
                var divsToToggle = document.querySelectorAll('.credit-related');

                // Loop through each div and set display based on credit value
                divsToToggle.forEach(function(div) {
                    div.style.display = (value === '1') ? 'block' : 'none';
                });
            }

            // Call the function initially to set the correct state
            toggleVisibility();

            // Add event listener for when the credit value changes
            creditSelect.addEventListener('change', toggleVisibility);
        });
    </script>
@endpush
