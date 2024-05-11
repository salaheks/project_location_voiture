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
                                    <th>@lang('N° reservation')</th>
                                    <th>@lang('Date Heure Livraison')</th>
                                    <th>@lang('Date Heure Récupération')</th>
                                    <th>@lang('Utilisateur')</th>
                                    <th>@lang('Client')</th>
                                    <th>@lang('Voiture')</th>
                                    <th>@lang('Prix Total')</th>
                                    <th>@lang('Reste')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                    <tr>
                                        <td>
                                            <span class="font-weight-bold">{{ $booking->num_ref ? $booking->num_ref : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $booking->date_livraison ? $booking->date_livraison : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $booking->date_retour ? $booking->date_retour : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $booking->user ? $booking->user->name : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $booking->client ? $booking->client->nom : '-' }}</span>
                                        </td>

                                        <td>
                                            <span class="font-weight-bold">{{ $booking->voiture ? $booking->voiture->type->marque . ' ' . $booking->voiture->type->model . ' ' . $booking->voiture->immatriculation : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $booking->total ? $booking->total : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $booking->avance ? $booking->total - $booking->avance : '0' }}</span>
                                        </td>


                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('bookings.edit', $booking) }}" class="icon-btn"
                                                data-toggle="tooltip" title=""
                                                data-original-title="@lang('Modifier')">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn"
                                                data-original-title="@lang('Supprimer')" data-toggle="tooltip"
                                                data-url="{{ route('bookings.destroy', $booking) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">aucun booking disponible</td>
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
    <a href="{{ route('bookings.create') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small">
        <i class="fa fa-fw fa-plus"></i>@lang('Ajouter')
    </a>
@endpush
@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
@endpush
