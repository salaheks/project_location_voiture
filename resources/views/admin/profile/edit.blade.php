@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-3 col-lg-4 mb-30">
            <!-- Sidebar with user information -->
            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-flex p-3 bg--primary align-items-center">
                        <div class="avatar avatar--lg">
                            <!-- Display user's profile image, ensure getImage() and imagePath() are defined and safe to use -->
                            <img src="{{ route('profile.image') }}">

                        </div>
                        <div class="pl-3">
                            <!-- Display user's name -->
                            <h4 class="text--white">{{ auth()->user()->name }}</h4>
                        </div>
                    </div>
                    <ul class="list-group">
                        <!-- Display user's name and email -->
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Name')
                            <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            @lang('Email')
                            <span class="font-weight-bold">{{ auth()->user()->email }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 mb-30">
            <!-- Profile information editing form -->
            <div class="card">
                <div class="card-body">
                    <!-- Form title -->
                    <h5 class="card-title mb-50 border-bottom pb-2">@lang('Profile Information')</h5>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview"
                                                    style="background-image: url({{ getImage(imagePath()['profile']['admin']['path'], imagePath()['profile']['admin']['size']) }})">
                                                    <button type="button" class="remove-image"><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <!-- Ensure proper handling of image uploads in your controller -->
                                                <input type="file" class="profilePicUpload" name="image"
                                                    id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                <label for="profilePicUpload1" class="bg--success">@lang('Upload Image')</label>
                                                <small class="mt-2 text-facebook">@lang('Supported files: jpeg, jpg. Image will be resized into 400x400px')</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Name input -->
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Name')</label>
                                    <input class="form-control" type="text" name="name"
                                        value="{{ old('name', auth()->user()->name) }}">
                                </div>
                                <!-- Email input, ensure to use old('email', $user->email) for value -->
                                <div class="form-group">
                                    <label class="form-control-label font-weight-bold">@lang('Email')</label>
                                    <input class="form-control" type="email" name="email"
                                        value="{{ old('email', auth()->user()->email) }}">
                                </div>
                            </div>
                        </div>
                        <!-- Save changes button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Save Changes')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
