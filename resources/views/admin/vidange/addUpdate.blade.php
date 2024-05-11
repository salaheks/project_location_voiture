@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form method="post"
                    action="{{ isset($vidange) ? route('vidanges.update', $vidange) : route('vidanges.store') }}">
                    @csrf
                    @if (isset($vidange))
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
                                                    {{ old('voiture_id', isset($vidange) ? $vidange->voiture_id : null) == $voiture->id ? 'selected' : '' }}>
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
                                    <label>@lang('Date Changement')</label>
                                    <input type="date" class="form-control" name="date_changement"
                                        value="{{ old('date_changement', isset($vidange) ? $vidange->date_changement : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Km debut')</label>
                                    <input type="number" class="form-control" name="km_debut"
                                        value="{{ old('km_debut', isset($vidange) ? $vidange->km_debut : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Km Vidange')</label>
                                    <input type="number" class="form-control" name="km_vidange"
                                        value="{{ old('km_vidange', isset($vidange) ? $vidange->km_vidange : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Type huile')</label>
                                    <input type="text" class="form-control" name="type_huile"
                                        value="{{ old('type_huile', isset($vidange) ? $vidange->type_huile : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Filtre huile')</label>
                                    <select class="form-control" name="filtre_huile">
                                        @foreach (listBoolean() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Filtre air')</label>
                                    <select class="form-control" name="filtre_air">
                                        @foreach (listBoolean() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Filtre gazoil')</label>
                                    <select class="form-control" name="filtre_gazoil">
                                        @foreach (listBoolean() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix')</label>
                                    <input type="number" step="0.01" class="form-control" name="prix"
                                        value="{{ old('prix', isset($vidange) ? $vidange->prix : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Mode Réglement')</label>
                                    <select class="form-control select2-basic" name="mode_reglement">
                                        @foreach (modereglement() as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('mode_reglement', isset($vidange) ? $vidange->mode_reglement : null) == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--primary w-100">@lang(isset($vidange) ? 'Modifier' : 'Ajouter')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    <a href="{{ route('vidanges.index') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
@endpush
@push('script')
    <script src="/assets/admin/js/vidange/get-next-payment-date.js"></script>
@endpush
