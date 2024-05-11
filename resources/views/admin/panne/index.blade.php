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
                                    <th>@lang('Client')</th>
                                    <th>@lang('Date panne')</th>
                                    <th>@lang('Type')</th>
                                    <th>@lang('Garage responsable')</th>
                                    <th>@lang('Prix total')</th>
                                    <th>@lang('Date Paiement')</th>
                                    <th>@lang('Mode Reglement')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pannes as $panne)
                                    <tr>
                                        <td>
                                            <span class="font-weight-bold">{{ $panne->voiture ? $panne->voiture->type->marque . ' ' . $panne->voiture->type->model . ' ' . $panne->voiture->immatriculation : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $panne->client_id ? $panne->client->nom : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $panne->date_panne ? $panne->date_panne : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $panne->type ? $panne->type : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $panne->garage_responsable ? $panne->garage_responsable : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $panne->prix_total ? $panne->prix_total : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $panne->date_paiment ? $panne->date_paiment : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $panne->mode_reglement ? $panne->mode_reglement : '-' }}</span>
                                        </td>

                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('pannes.edit', $panne) }}" class="icon-btn"
                                                data-toggle="tooltip" title=""
                                                data-original-title="@lang('Modifier')">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn"
                                                data-original-title="@lang('Supprimer')" data-toggle="tooltip"
                                                data-url="{{ route('pannes.destroy', $panne) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">aucun panne disponible</td>
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
    <a href="{{ route('pannes.create') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small">
        <i class="fa fa-fw fa-plus"></i>@lang('Ajouter')
    </a>
@endpush
@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
@endpush
