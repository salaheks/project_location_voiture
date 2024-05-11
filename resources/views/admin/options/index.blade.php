@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two">
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Type Paiement</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Quantite</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($options as $option)
                                    <tr>
                                        <td><strong>{{ __($option->nom) }}</strong></td>
                                        <td>{{ __($option->type_paiement) }}</td>
                                        <td>{{ __($option->prix) }}</td>
                                        <td>{{ __($option->quantite) }}</td>

                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('options.edit',$option) }}" class="icon-btn ml-1"
                                                data-original-title="@lang('Edit')">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn"
                                                data-original-title="@lang('Delete')" data-toggle="tooltip"
                                                data-url="{{ route('options.destroy',$option) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">aucun options supplimentaire disponible</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>

    <x-delete-confirmation-modal/>

@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('options.create') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-plus"></i>@lang('Ajouter')</a>
@endpush

@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
@endpush
