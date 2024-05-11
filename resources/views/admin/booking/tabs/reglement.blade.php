<div class="card mt-50">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('N° reservation')</label>
                    <input type="text" class="form-control" name="num_ref" value="{{ $reference }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('N°Contrat')</label>
                    <input type="text" class="form-control" name="contract_num" value="{{ old('contract_num') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Avance')</label>
                    <input type="number" class="form-control" name="avance" value="{{ old('avance') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Adresse livraison')</label>
                    <select class="form-control select2-basic" name="adresse_livraison" id="adresse_livraison">
                        <option disabled selected>Selectionnez Ville</option>
                        @foreach ($convoyages as $convoyage)
                            <option value="{{ $convoyage->ville }}" data-prix-livraison="{{ $convoyage->prix_mad_ville_livraison }}">{{ $convoyage->ville }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Adresse retour')</label>
                    <select class="form-control select2-basic" name="adresse_retour" id="adresse_retour">
                        <option disabled selected>Selectionnez Ville</option>
                        @foreach ($convoyages as $convoyage)
                            <option value="{{ $convoyage->ville }}" data-prix-retour="{{ $convoyage->prix_mad_ville_retour }}">{{ $convoyage->ville }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Prix Ville Livraison (MAD)')</label>
                    <input type="text" class="form-control" id="prix_ville_livraison" value="{{ old('prix_ville_livraison') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Prix Ville Retour (MAD)')</label>
                    <input type="text" class="form-control" id="prix_ville_retour" value="{{ old('prix_ville_livraison') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Rachat de franchise')</label>
                    <select class="form-control" name="rachat_franchise" id="rachat_franchise">
                        @foreach (listBoolean() as $key => $value)
                            <option value="{{ $key }}">{{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Prix/jour (MAD)')</label>
                    <input type="number" class="form-control" name="prix_location" id="prix_location" value="{{ old('prix_location') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Prix accessoires (MAD)')</label>
                    <input type="number" class="form-control" name="prix_accessoires" value="{{ old('prix_accessoires') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Franchise')</label>
                    <input type="number" class="form-control" name="prix_franchise" value="{{ old('prix_franchise') }}" id="prix_franchise">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Montant conducteur 2')</label>
                    <input id="second_driver_amount" type="number" class="form-control" name="second_driver_amount" value="{{ old('second_driver_amount') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Total (MAD)')</label>
                    <input type="number" class="form-control" name="total" value="{{ old('total') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Reste')</label>
                    <input type="number" class="form-control" name="reste" value="{{ old('reste') }}">
                </div>
            </div>
        </div>
    </div>
</div>
