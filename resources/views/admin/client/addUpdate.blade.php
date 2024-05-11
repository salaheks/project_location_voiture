@extends('admin.layouts.app')

@section('panel')
    <div class="row mb-none-30">

        <div class="col-xl-12 col-lg-12 col-md-12 mb-30">

            <div class="card mt-50">
                <div class="card-body">
                    <h5 class="card-title border-bottom pb-2">@lang('Informations')</h5>

                    @php
                        $formAction = isset($client) ? route('clients.update', $client) : route('clients.store');
                        $formMethod = isset($client) ? 'PUT' : 'POST';
                    @endphp

                    <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($client))
                            @method($formMethod)
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Nom')<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="nom" required
                                        value="{{ isset($client) ? $client->nom : old('nom') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Date naissance')</label>
                                    <input class="form-control" type="date" name="date_naissance"
                                        value="{{ isset($client) ? $client->date_naissance : old('date_naissance') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Adresse')</label>
                                    <input class="form-control" type="text" name="adresse"
                                        value="{{ isset($client) ? $client->adresse : old('adresse') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Cin')</label>
                                    <input class="form-control" type="text" name="cin"
                                        value="{{ isset($client) ? $client->cin : old('cin') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Passeport')</label>
                                    <input class="form-control" type="text" name="num_passeport"
                                        value="{{ isset($client) ? $client->num_passeport : old('num_passeport') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Date livration passeport')</label>
                                    <input class="form-control" type="date" name="date_delivration_passeport"
                                        value="{{ isset($client) ? $client->date_delivration_passeport : old('date_delivration_passeport') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Permis')</label>
                                    <input class="form-control" type="text" name="permis"
                                        value="{{ isset($client) ? $client->permis : old('permis') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Date livration permis')</label>
                                    <input class="form-control" type="date" name="date_delivration_permis"
                                        value="{{ isset($client) ? $client->date_delivration_permis : '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Téléphone')<span
                                            class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="telephone" required
                                        value="{{ isset($client) ? $client->telephone :  old('telephone')  }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Email')</label>
                                    <input class="form-control" type="text" name="email"
                                        value="{{ isset($client) ? $client->email : old('email') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex align-items-center">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>@lang('Société')</label>
                                    <input style="width: 25px; height: 25px;" type="checkbox" name="isCompany"
                                        id="isCompany">
                                </div>
                            </div>
                            <div class="col-md-3" id="iceField" style="display: none">
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('ICE')</label>
                                    <input class="form-control" type="text" name="ice"
                                        value="{{ isset($client) ? $client->ice : old('ice') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="row element">
                                        <div class="col-md-2 imageItem">
                                            <div class="payment-method-item">
                                                <div class="payment-method-header d-flex flex-wrap">
                                                    <div class="thumb" style="position: relative;">
                                                        <div class="avatar-preview">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('Passeport image')</label>
                                                            <div class="profilePicPreview"
                                                                style="background-image: url('{{ isset($client->image_passport) ? asset('/storage/' . $client->image_passport) : asset('assets/images/default.png') }}')">
                                                            </div>
                                                        </div>
                                                        <div class="avatar-edit">
                                                            <input type="file" name="image_passport"
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
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="row element">
                                        <div class="col-md-2 imageItem">
                                            <div class="payment-method-item">
                                                <div class="payment-method-header d-flex flex-wrap">
                                                    <div class="thumb" style="position: relative;">
                                                        <div class="avatar-preview">
                                                            <label
                                                                class="form-control-label font-weight-bold">@lang('Permis Image')</label>
                                                            <div class="profilePicPreview"
                                                                style="background-image: url('{{ isset($client->image_permis) ? asset('/storage/' . $client->image_permis) : asset('assets/images/default.png') }}')">
                                                            </div>
                                                        </div>
                                                        <div class="avatar-edit">
                                                            <input type="file" name="image_permis"
                                                                class="profilePicUpload" id="1"
                                                                accept=".png, .jpg, .jpeg">
                                                            <label for="1" class="bg-primary">
                                                                <!-- Updated this line -->
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

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn--primary btn-block btn-lg">
                                        @lang(isset($client) ? 'Modifier Client' : 'Ajouter Client')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('breadcrumb-plugins')
    <a href="{{ route('clients.index') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
@endpush
@push('script')
    <script src="{{ asset('/assets/admin/js/show-hide-ice.js') }}"></script>
@endpush
