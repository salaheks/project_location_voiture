@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="p-0 card-body">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Marque</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Transmission</th>
                                    <th scope="col">Carburant</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($types as $type)
                                    <tr>
                                        <td data-label="image">
                                            <img src="{{ $type->image ? asset('/storage/' . $type->image) : asset('assets/images/default.png') }}" style="width: 50px; cursor: pointer;" onclick="showImageModal(this.src, 'modalImage')">
                                        </td>
                                        <td data-label="marque"><strong>{{ __($type->marque) }}</strong></td>
                                        <td data-label="model">{{ __($type->model) }}</td>
                                        <td data-label="transmission">{{ __($type->transmission) }}</td>
                                        <td data-label="Carburant">{{ __($type->carburant) }}</td>
                                        <td data-label="Prix">{{ __($type->prix) }}</td>

                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('type.edit', $type->id) }}" class="ml-1 icon-btn"
                                                data-original-title="@lang('Edit')">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="ml-1 icon-btn btn--danger deleteBtn"
                                                data-original-title="@lang('Delete')" data-toggle="tooltip"
                                                data-url="{{ route('type.destroy', $type->id) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="100%">aucun type disponible</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>
    <x-show-image-modal />
    <x-delete-confirmation-modal/>

@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('type.add') }}" class="text-white btn btn-sm btn--primary box--shadow1 text--small"><i
            class="fa fa-fw fa-plus"></i>@lang('Ajouter')</a>
@endpush

@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/show-image-modal.js') }}"></script>
@endpush
