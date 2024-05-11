@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form method="post"
                    action="{{ isset($autorisation) ? route('autorisations.update', $autorisation) : route('autorisations.store') }}">
                    @csrf
                    @if (isset($autorisation))
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
                                                    {{ old('voiture_id', isset($autorisation) ? $autorisation->voiture_id : null) == $voiture->id ? 'selected' : '' }}>
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
                                    <label>@lang('Date debut')</label>
                                    <input type="date" class="form-control" name="date_debut"
                                        value="{{ old('date_debut', isset($autorisation) ? $autorisation->date_debut : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date fin')</label>
                                    <input type="date" class="form-control" name="date_fin"
                                        value="{{ old('date_fin', isset($autorisation) ? $autorisation->date_fin : '') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn--primary w-100">@lang(isset($autorisation) ? 'Modifier' : 'Ajouter')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    <a href="{{ route('autorisations.index') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
@endpush
