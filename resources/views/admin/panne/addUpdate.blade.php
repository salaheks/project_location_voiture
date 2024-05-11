@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form method="post"
                    action="{{ isset($panne) ? route('pannes.update', $panne) : route('pannes.store') }}">
                    @csrf
                    @if (isset($panne))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="row">
                            @if ($voitures instanceof \Illuminate\Database\Eloquent\Collection)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('Voiture')</label>
                                        <select class="form-control select2-basic" name="voiture_id">
                                            <option disabled selected>Selectionnez Voiture</option>
                                            @foreach ($voitures as $voiture)
                                                <option value="{{ $voiture->id }}"
                                                    {{ old('voiture_id', isset($panne) ? $panne->voiture_id : null) == $voiture->id ? 'selected' : '' }}>
                                                    {{ $voiture->type->marque . ' ' . $voiture->type->model . ' ' . $voiture->immatriculation }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @else
                                <input type="text" class="d-none" name="voiture_id" value="{{ $voitures->id }}">
                            @endif
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Client')</label>
                                    <select class="form-control select2-basic" name="client_id">
                                        <option disabled selected>Selectionnez Client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}"
                                                {{ old('client_id', isset($panne) ? $panne->client_id : null) == $client->id ? 'selected' : '' }}>
                                                {{ $client->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Type')</label>
                                    <input type="text" class="form-control" name="type"
                                        value="{{ old('type', isset($panne) ? $panne->type : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date panne')</label>
                                    <input type="date" class="form-control" name="date_panne"
                                        value="{{ old('date_panne', isset($panne) ? $panne->date_panne : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date debut')</label>
                                    <input type="date" class="form-control" name="date_debut"
                                        value="{{ old('date_debut', isset($panne) ? $panne->date_debut : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date fin')</label>
                                    <input type="date" class="form-control" name="date_fin"
                                        value="{{ old('date_fin', isset($panne) ? $panne->date_fin : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Garage responsable')</label>
                                    <input type="text" class="form-control" name="garage_responsable"
                                        value="{{ old('garage_responsable', isset($panne) ? $panne->garage_responsable : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Expert')</label>
                                    <input type="text" class="form-control" name="expert"
                                        value="{{ old('expert', isset($panne) ? $panne->expert : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix client')</label>
                                    <input type="number" step="0.01" class="form-control" name="prix_client"
                                        value="{{ old('prix_client', isset($panne) ? $panne->prix_client : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix assurance')</label>
                                    <input type="number" step="0.01" class="form-control" name="prix_assurance"
                                        value="{{ old('prix_assurance', isset($panne) ? $panne->prix_assurance : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix agence')</label>
                                    <input type="number" step="0.01" class="form-control" name="prix_agence"
                                        value="{{ old('prix_agence', isset($panne) ? $panne->prix_agence : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix total')</label>
                                    <input type="number" step="0.01" class="form-control" name="prix_total"
                                        value="{{ old('prix_total', isset($panne) ? $panne->prix_total : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Mode Réglement')</label>
                                    <select class="form-control select2-basic" name="mode_reglement">
                                        @foreach (modereglement() as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('mode_reglement', isset($panne) ? $panne->mode_reglement : null) == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date Paiement')</label>
                                    <input type="date" class="form-control" name="date_paiment"
                                        value="{{ old('date_paiment', isset($panne) ? $panne->date_paiment : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Description')</label>
                                    <textarea name="description">{{ old('description', isset($panne) ? $panne->description : '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--primary w-100">@lang(isset($panne) ? 'Modifier' : 'Ajouter')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    <a href="{{ route('pannes.index') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
@endpush
@push('script')
    <script src="/assets/admin/js/panne/get-next-payment-date.js"></script>
@endpush
