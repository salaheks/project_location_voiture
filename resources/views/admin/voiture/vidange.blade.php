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
                                    <th>@lang('Km Debut')</th>
                                    <th>@lang('Type Huile')</th>
                                    <th>@lang('Prix')</th>
                                    <th>@lang('Mode Reglement')</th>
                                    <th>@lang('Filtre Huile')</th>
                                    <th>@lang('Filtre Air')</th>
                                    <th>@lang('Filtre Gazoil')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($vidanges as $vidange)
                                    <tr>
                                        <td>
                                            <span class="font-weight-bold">{{ $vidange->voiture ? $vidange->voiture->type->marque . ' ' . $vidange->voiture->type->model . ' ' . $vidange->voiture->immatriculation : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vidange->date_changement ? $vidange->date_changement : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vidange->km_debut ? $vidange->km_debut : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vidange->type_huile ? $vidange->type_huile : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vidange->prix ? $vidange->prix : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vidange->mode_reglement ? $vidange->mode_reglement : '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vidange->filtre_huile ? 'Oui' : 'Non' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vidange->filtre_air ? 'Oui' : 'Non' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $vidange->filtre_gazoil ? 'Oui' : 'Non' }}</span>
                                        </td>

                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('vidanges.edit', $vidange) }}" class="icon-btn"
                                                data-toggle="tooltip" title=""
                                                data-original-title="@lang('Modifier')">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn"
                                                data-original-title="@lang('Supprimer')" data-toggle="tooltip"
                                                data-url="{{ route('vidanges.destroy', $vidange) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">aucun vidange disponible</td>
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
    <a href="{{ route('voiture.index') }}"
        class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
    <a href="{{ route('vidanges.add', ['id' => $id ?? null]) }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-plus"></i>@lang('Ajouter')</a>
@endpush
@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
@endpush
