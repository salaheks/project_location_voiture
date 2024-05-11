@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form method="post"
                    action="{{ isset($assurance) ? route('assurances.update', $assurance) : route('assurances.store') }}">
                    @csrf
                    @if (isset($assurance))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="row">
                            @if ($voitures instanceof \Illuminate\Database\Eloquent\Collection)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>@lang('Voiture')</label>
                                        <select class="form-control select2-basic" name="voiture_id">
                                            <option disabled selected>@lang('Selectionnez Voiture')</option>
                                            @foreach ($voitures as $voiture)
                                                <option value="{{ $voiture->id }}"
                                                    {{ old('voiture_id', isset($assurance) ? $assurance->voiture_id : null) == $voiture->id ? 'selected' : '' }}>
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
                                    <label>@lang('Assureur')</label>
                                    <select class="form-control select2-basic" name="assureur_id">
                                        @foreach ($assuseurs as $assuseur)
                                            <option value="{{ $assuseur->id }}">
                                                {{ $assuseur->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Type')</label>
                                    <select class="form-control select2-basic" name="type">
                                        <option disabled>Selectionnez Type</option>
                                        @foreach (typeassurance() as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('type', isset($assurance) ? $assurance->type : null) == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date paiement')</label>
                                    <input type="date" class="form-control" name="date_paiement"
                                        value="{{ old('date_paiement', isset($assurance) ? $assurance->date_paiement : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date debut')</label>
                                    <input type="date" class="form-control" name="date_debut"
                                        value="{{ old('date_debut', isset($assurance) ? $assurance->date_debut : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date fin')</label>
                                    <input type="date" class="form-control" name="date_fin"
                                        value="{{ old('date_fin', isset($assurance) ? $assurance->date_fin : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix')</label>
                                    <input type="number" step="0.01" class="form-control" name="prix_assurance"
                                        value="{{ old('prix_assurance', isset($assurance) ? $assurance->prix_assurance : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Mode Réglement')</label>
                                    <select class="form-control select2-basic" name="mode_reglement">
                                        @foreach (modereglement() as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('mode_reglement', isset($assurance) ? $assurance->mode_reglement : null) == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--primary w-100">@lang(isset($assurance) ? 'Modifier' : 'Ajouter')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    <a href="{{ route('assurances.index') }}" class="text-white btn btn-sm btn--primary box--shadow1 text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
@endpush
