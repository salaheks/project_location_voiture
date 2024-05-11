@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form method="post"
                    action="{{ isset($vignette) ? route('vignettes.update', $vignette) : route('vignettes.store') }}">
                    @csrf
                    @if (isset($vignette))
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
                                                    {{ old('voiture_id', isset($vignette) ? $vignette->voiture_id : null) == $voiture->id ? 'selected' : '' }}>
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
                                    <label>@lang('Date paiement')</label>
                                    <input type="date" class="form-control" id="date_paiement" name="date_paiement"
                                        value="{{ old('date_paiement', isset($vignette) ? $vignette->date_paiement : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date Prochaine paiement')</label>
                                    <input type="date" class="form-control" id="date_prochaine_paiement" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix')</label>
                                    <input type="number" step="0.01" class="form-control" name="prix"
                                        value="{{ old('prix', isset($vignette) ? $vignette->prix : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Mode Réglement')</label>
                                    <select class="form-control select2-basic" name="mode_reglement">
                                        @foreach (modereglement() as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ old('mode_reglement', isset($vignette) ? $vignette->mode_reglement : null) == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--primary w-100">@lang(isset($vignette) ? 'Modifier' : 'Ajouter')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    <a href="{{ route('vignettes.index') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
@endpush
@push('script')
    <script src="/assets/admin/js/vignette/get-next-payment-date.js"></script>
@endpush
