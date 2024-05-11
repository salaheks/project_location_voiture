@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="p-0 card-body">
                    <div class="table-responsive--md table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Nom')</th>
                                    <th>@lang('adresse')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($assureurs as $assureur)
                                    <tr>
                                        <td>
                                            <span class="font-weight-bold">{{ $assureur->nom ?? '-' }}</span>
                                        </td>

                                        <td>
                                            <span
                                                class="font-weight-bold">{{ $assureur->adresse ?? '-' }}</span>
                                        </td>

                                        <td data-label="@lang('Action')">
                                            <a href="javascript:void(0)" class="icon-btn editBtn"
                                                data-original-title="@lang('Modifier')"
                                                data-id="{{ $assureur->id }}"
                                                data-url="{{ route('assureurs.update', ['assureur' => '__id__']) }}"
                                                data-name="{{ json_encode(['nom' => $assureur->nom, 'adresse' => $assureur->adresse]) }}"
                                                data-toggle="tooltip">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="ml-1 icon-btn btn--danger deleteBtn"
                                                data-original-title="@lang('Supprimer')" data-toggle="tooltip"
                                                data-url="{{ route('assureurs.destroy', $assureur) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="100%">aucun Assureur disponible</td>
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
    <x-add-assureur-modal />
    <x-edit-assureur-modal />
@endsection
@push('breadcrumb-plugins')
    <a class="text-white btn btn-sm btn--primary box--shadow1 text--small" data-toggle="modal" data-target="#AssureurModal">
        <i class="fa fa-fw fa-plus"></i>@lang('Ajouter')
    </a>
@endpush
@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
    <script>
        (function($) {
            $('.editBtn').on('click', function() {
                var modal = $('#EditAssureurModal');
                var urlTemplate = $(this).data('url');
                var id = $(this).data('id');
                var nom = $(this).data('name').nom;
                var adresse = $(this).data('name').adresse;
                var actionUrl = urlTemplate.replace('__id__', id);

                modal.find('form').attr('action', actionUrl);
                modal.find('input[name="nom"]').val(nom);
                modal.find('input[name="adresse"]').val(adresse);
                modal.modal('show');
            });
        })(jQuery);
    </script>
@endpush
