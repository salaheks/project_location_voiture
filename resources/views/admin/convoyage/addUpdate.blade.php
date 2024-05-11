@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form method="post" action="{{ isset($convoyage) ? route('convoyages.update', $convoyage) : route('convoyages.store') }}">
                    @csrf
                    @if(isset($convoyage))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Ville')</label>
                                    <input type="text" class="form-control" name="ville" value="{{ old('ville', isset($convoyage) ? $convoyage->ville : '') }}" placeholder="Ex: Marrakech (bureau)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix MAD Ville Livraison')</label>
                                    <input type="number" class="form-control" name="prix_mad_ville_livraison" value="{{ old('prix_mad_ville_livraison', isset($convoyage) ? $convoyage->prix_mad_ville_livraison : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix MAD Ville Retour')</label>
                                    <input type="number" class="form-control" name="prix_mad_ville_retour" value="{{ old('prix_mad_ville_retour', isset($convoyage) ? $convoyage->prix_mad_ville_retour : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix EURO Ville Livraison')</label>
                                    <input type="number" class="form-control" name="prix_euro_ville_livraison" value="{{ old('prix_euro_ville_livraison', isset($convoyage) ? $convoyage->prix_euro_ville_livraison : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix EURO Ville Retour')</label>
                                    <input type="number" class="form-control" name="prix_euro_ville_retour" value="{{ old('prix_euro_ville_retour', isset($convoyage) ? $convoyage->prix_euro_ville_retour : '') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--primary w-100">@lang(isset($convoyage) ? 'Modifier' : 'Ajouter')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('convoyages.index') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i class="fa fa-fw fa-backward"></i>@lang('Go Back')</a>
@endpush
