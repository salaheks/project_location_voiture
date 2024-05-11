@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('visitetechnique.store', $voiture->id ?? '') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Centre Visite')</label>
                                    <select class="form-control select2-basic" name="centre_visite_id">
                                        @foreach ($centresVisite as $centreVisite)
                                            <option value="{{ $centreVisite->id }}">
                                                {{ $centreVisite->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date Controle')</label>
                                    <input type="date" name="date_controle" class="form-control"
                                        value="{{ old('date_controle') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date Prochaine Visite')</label>
                                    <input type="date" name="date_prochaine_visite" class="form-control"
                                        value="{{ old('date_prochaine_visite') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Montant')</label>
                                    <input type="number" name="montant" class="form-control" value="{{ old('montant') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Mode Réglement')</label>
                                    <select class="form-control select2-basic" name="mode_reglement">
                                        @foreach (modereglement() as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 @isset($voiture) invisible @endisset">
                                <div class="form-group">
                                    <label>@lang('Voiture')</label>
                                    <select class="form-control select2-basic" name="voiture_id">
                                        @if (!empty($voitures))
                                            @foreach ($voitures as $car)
                                                <option value="{{ $car->id }}">{{ $car->type->model }}</option>
                                            @endforeach
                                        @else
                                            <option value=""></option>
                                        @endif
                                    </select>
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
    <a href="{{ $voiture ? route('voiture.visitetechniques' , $voiture->id) : route('visitetechnique.index') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
@endpush
