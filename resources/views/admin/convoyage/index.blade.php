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
                                    <th scope="col">Ville</th>
                                    <th scope="col">Prix Mad Ville Livraison</th>
                                    <th scope="col">Prix Mad Ville Retour</th>
                                    <th scope="col">Prix Euro Ville Livraison</th>
                                    <th scope="col">Prix Euro Ville Retour</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($convoyages as $convoyage)
                                    <tr>
                                        <td><strong>{{ __($convoyage->ville) }}</strong></td>
                                        <td>{{ __($convoyage->prix_mad_ville_livraison) }}</td>
                                        <td>{{ __($convoyage->prix_mad_ville_retour) }}</td>
                                        <td>{{ __($convoyage->prix_euro_ville_livraison) }}</td>
                                        <td>{{ __($convoyage->prix_euro_ville_retour) }}</td>

                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('convoyages.edit',$convoyage) }}" class="icon-btn ml-1"
                                                data-original-title="@lang('Edit')">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="icon-btn btn--danger ml-1 deleteBtn"
                                                data-original-title="@lang('Delete')" data-toggle="tooltip"
                                                data-url="{{ route('convoyages.destroy',$convoyage) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">aucun convoyage disponible</td>
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
    <a href="{{ route('convoyages.create') }}" class="btn btn-sm btn--primary box--shadow1 text-white text--small"><i
            class="fa fa-fw fa-plus"></i>@lang('Ajouter')</a>
@endpush

@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
@endpush
