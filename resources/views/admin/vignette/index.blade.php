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
                                    <th>@lang('Date Paiement')</th>
                                    <th>@lang('Prix')</th>
                                    <th>@lang('Mode Reglement')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vignettes as $vignette)
                                    <tr>
                                        <td>
                                            <span class="font-weight-bold">{{ $vignette->voiture ? $vignette->voiture->type->marque . ' ' . $vignette->voiture->type->model . ' ' . $vignette->voiture->immatriculation : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vignette->date_paiement ? $vignette->date_paiement : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vignette->prix ? $vignette->prix : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vignette->mode_reglement ? $vignette->mode_reglement : '-' }}</span>
                                        </td>

                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('vignettes.edit', $vignette) }}" class="icon-btn"
                                                data-toggle="tooltip" title=""
                                                data-original-title="@lang('Modifier')">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn"
                                                data-original-title="@lang('Supprimer')" data-toggle="tooltip"
                                                data-url="{{ route('vignettes.destroy', $vignette) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">aucun vignette disponible</td>
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
    <a href="{{ route('vignettes.create') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small">
        <i class="fa fa-fw fa-plus"></i>@lang('Ajouter')
    </a>
@endpush
@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
@endpush
