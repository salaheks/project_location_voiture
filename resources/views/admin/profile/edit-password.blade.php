@extends('admin.layouts.app')
@section('panel')
    {{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}
    <div class="row mb-none-30">
        <div class="col-lg-3 col-md-3 mb-30">
            <div class="card b-radius--5 overflow-hidden">
                <div class="card-body p-0">
                    <div class="d-flex p-3 bg--primary">
                        <div class="avatar avatar--lg">
                            <!-- Ensure getImage() and imagePath() are properly defined and safe to use -->
                            <img src="{{ getImage(imagePath()['profile']['admin']['path'], imagePath()['profile']['admin']['size']) }}"
                                alt="User Image">
                        </div>
                        <div class="pl-3">
                            <h4 class="text--white">{{ auth()->user()->name }}</h4>
                        </div>
                    </div>
                    <ul class="list-group">
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

        <div class="col-lg-9 col-md-9 mb-30">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-50 border-bottom pb-2">@lang('Change Password')</h5>

                    <form action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group row">
                            <label for="current_password"
                                class="col-lg-3 col-form-label form-control-label">@lang('Current Password')</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" placeholder="@lang('Current Password')"
                                    name="current_password" id="current_password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-lg-3 col-form-label form-control-label">@lang('New Password')</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" placeholder="@lang('New Password')" name="password"
                                    id="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation"
                                class="col-lg-3 col-form-label form-control-label">@lang('Confirm Password')</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" placeholder="@lang('Confirm Password')"
                                    name="password_confirmation" id="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-9 offset-lg-3">
                                <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Save Changes')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
