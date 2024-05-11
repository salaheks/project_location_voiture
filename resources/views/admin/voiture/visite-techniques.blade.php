@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Date Controle')</th>
                                    <th>@lang('Date Prochaine Visite')</th>
                                    <th>@lang('Centre Visite')</th>
                                    <th>@lang('Montant')</th>
                                    <th>@lang('Mode Reglement')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($visiteTechniques as $visiteTechnique)
                                    <tr>
                                        <td data-label="@lang('Date Controle')">
                                            {{ $visiteTechnique->date_controle ? $visiteTechnique->date_controle : '_' }}
                                        </td>
                                        <td data-label="@lang('Date Prochaine Visite')">
                                            {{ $visiteTechnique->date_prochaine_visite ? $visiteTechnique->date_prochaine_visite : ' ' }}
                                        </td>
                                        <td data-label="@lang('Centre Visite')">
                                            {{ $visiteTechnique->centre_visite_id ? $visiteTechnique->centreVisite->nom : ' ' }}
                                        </td>
                                        <td data-label="@lang('Montant')">
                                            {{ $visiteTechnique->montant ? $visiteTechnique->montant : ' ' }}
                                        </td>
                                        <td data-label="@lang('Mode Reglement')">
                                            {{ $visiteTechnique->mode_reglement ? $visiteTechnique->mode_reglement : ' ' }}
                                        </td>
                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('visitetechnique.edit', $visiteTechnique->id) }}" class="icon-btn ml-1" data-original-title="@lang('Modifier')" data-toggle="tooltip">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn"
                                                data-original-title="@lang('Supprimer')" data-toggle="tooltip"
                                                data-url="{{ route('visitetechnique.destroy',$visiteTechnique->id) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">Pas de visite technique disponible</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div><!-- card end -->
            </div>
        </div>
        <x-delete-confirmation-modal/>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('voiture.index') }}"
        class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
    <a href="{{ route('visitetechnique.add', $id) }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-plus"></i>@lang('Ajouter')</a>
@endpush

@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
@endpush
