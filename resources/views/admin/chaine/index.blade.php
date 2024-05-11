@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Voiture')</th>
                                    <th>@lang('Date Changement')</th>
                                    <th>@lang('KM initial')</th>
                                    <th>@lang('KM de changement')</th>
                                    <th>@lang('Prix')</th>
                                    <th>@lang('Mode Reglement')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($chains as $chain)
                                    <tr>
                                        <td>
                                            <span class="font-weight-bold">{{ $chain->voiture ? $chain->voiture->type->marque . ' ' . $chain->voiture->type->model . ' ' . $chain->voiture->immatriculation : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $chain->date_changement ? $chain->date_changement : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $chain->km_initial ? $chain->km_initial : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $chain->km_changement ? $chain->km_changement : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $chain->prix ? $chain->prix : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $chain->mode_reglement ? $chain->mode_reglement : '-' }}</span>
                                        </td>

                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('chains.edit', $chain) }}" class="icon-btn"
                                                data-toggle="tooltip" title=""
                                                data-original-title="@lang('Modifier')">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn"
                                                data-original-title="@lang('Supprimer')" data-toggle="tooltip"
                                                data-url="{{ route('chains.destroy', $chain) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">aucun chain disponible</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-delete-confirmation-modal />
@endsection
@push('breadcrumb-plugins')
    <a href="{{ route('chains.create') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small">
        <i class="fa fa-fw fa-plus"></i>@lang('Ajouter')
    </a>
@endpush
@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
@endpush
