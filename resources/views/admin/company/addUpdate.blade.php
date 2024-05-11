@extends('admin.layouts.app')

@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('companies.update', auth()->user()->company ? auth()->user()->company->id : '') }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border--dark mb-4">
                                    <div class="card-header bg--dark d-flex justify-content-between">
                                        <h5 class="text-white">@lang('Informations')</h5>
                                    </div>
                                    <div class="card-body row">
                                        <!-- Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Nom')</label>
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ old('name', $company->name ?? '') }}" required>
                                            </div>
                                        </div>
                                        <!-- URL -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('URL')</label>
                                                <input type="text" class="form-control" name="url"
                                                    value="{{ old('url', $company->url ?? '') }}">
                                            </div>
                                        </div>
                                        <!-- Address -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Adresse')</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ old('address', $company->address ?? '') }}">
                                            </div>
                                        </div>
                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Email')</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ old('email', $company->email ?? '') }}">
                                            </div>
                                        </div>
                                        <!-- Phone -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Téléphone (Gérant)')</label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ old('phone', $company->phone ?? '') }}">
                                            </div>
                                        </div>
                                        <!-- Director Phone -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Téléphone (Directeur)')</label>
                                                <input type="text" class="form-control" name="directorphone"
                                                    value="{{ old('directorphone', $company->directorphone ?? '') }}">
                                            </div>
                                        </div>
                                        <!-- Capital -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Capital')</label>
                                                <input type="text" class="form-control" name="capital"
                                                    value="{{ old('capital', $company->capital ?? '') }}">
                                            </div>
                                        </div>
                                        <!-- Franchise -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('Franchise')</label>
                                                <input type="number" class="form-control" name="franchise"
                                                    value="{{ old('franchise', $company->franchise ?? '') }}">
                                            </div>
                                        </div>
                                        <!-- Logo Upload -->
                                        <div class="col-md-6">
                                            <label>@lang('logo')</label>
                                            <div class="row element">
                                                <div class="col-md-2 imageItem">
                                                    <div class="payment-method-item">
                                                        <div class="payment-method-header d-flex flex-wrap">
                                                            <div class="thumb" style="position: relative;">
                                                                <div class="avatar-preview">
                                                                    <div class="profilePicPreview"
                                                                        style="background-image: url('{{ $company->logo_url ?? asset('assets/images/default.png') }}')">
                                                                    </div>
                                                                </div>
                                                                <div class="avatar-edit">
                                                                    <input type="file" name="image"
                                                                        class="profilePicUpload" id="imageUpload"
                                                                        accept=".png, .jpg, .jpeg">
                                                                    <label for="imageUpload" class="bg-primary">
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
                            </div>

                            <!-- Legal Information -->
                            <div class="col-md-12">
                                <div class="card border--dark mb-4">
                                    <div class="card-header bg--dark d-flex justify-content-between">
                                        <h5 class="text-white">@lang('Informations juridiques')</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- TP -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('TP')</label>
                                                    <input type="text" class="form-control" name="tp"
                                                        value="{{ old('tp', $company->tp ?? '') }}">
                                                </div>
                                            </div>
                                            <!-- RC -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('RC')</label>
                                                    <input type="text" class="form-control" name="rc"
                                                        value="{{ old('rc', $company->rc ?? '') }}">
                                                </div>
                                            </div>
                                            <!-- IDF -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('IDF')</label>
                                                    <input type="text" class="form-control" name="idf"
                                                        value="{{ old('idf', $company->idf ?? '') }}">
                                                </div>
                                            </div>
                                            <!-- ICE -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('ICE')</label>
                                                    <input type="text" class="form-control" name="ice"
                                                        value="{{ old('ice', $company->ice ?? '') }}">
                                                </div>
                                            </div>
                                            <!-- RIB -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('RIB')</label>
                                                    <input type="text" class="form-control" name="rib"
                                                        value="{{ old('rib', $company->rib ?? '') }}">
                                                </div>
                                            </div>
                                            <!-- SWIFT -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>@lang('SWIFT')</label>
                                                    <input type="text" class="form-control" name="swift"
                                                        value="{{ old('swift', $company->swift ?? '') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn--primary btn-block">@lang('Modifier')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
