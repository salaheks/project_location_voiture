@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ isset($option) ? route('options.update', $option) : route('options.store') }}" method="post">
                    @csrf
                    @if(isset($option))
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Nom')</label>
                                    <!-- Pre-fill value for update -->
                                    <input type="text" name="nom" class="form-control" value="{{ old('nom', isset($option) ? $option->nom : '') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Prix')</label>
                                    <!-- Corrected value attribute to 'prix' and pre-fill value for update -->
                                    <input type="number" name="prix" class="form-control" value="{{ old('prix', isset($option) ? $option->prix : '') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Quantite')</label>
                                    <!-- Pre-fill value for update -->
                                    <input type="number" name="quantite" class="form-control" value="{{ old('quantite', isset($option) ? $option->quantite : '') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Type paiement')</label>
                                    <select class="form-control select2-basic" name="type_paiement">
                                        <option disabled selected>Selectionnez Type de paiement</option>
                                        @foreach (optionmode() as $key => $value)
                                            <option value="{{ $key }}" {{ (isset($option) && $option->type_paiement == $key) ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <!-- Dynamically change button text -->
                        <button class="btn btn--primary w-100">@lang(isset($option) ? 'Update' : 'Create')</button>
                    </div>
                </form>
            </div><!-- card end -->
        </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('options.index') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Go Back')</a>
@endpush
