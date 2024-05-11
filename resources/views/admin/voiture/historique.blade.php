@extends('admin.layouts.app')

@section('panel')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card b-radius--10">
                <div class="p-0 card-body">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th>@lang('Km')</th>
                                    <th>@lang('Date')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($historiques as $historique)
                                    <tr>
                                        <td data-label="@lang('Date Prochaine Visite')">
                                            {{ $historique->km ?? ' ' }}
                                        </td>
                                        <td data-label="@lang('Centre Visite')">
                                            {{ $historique->date ?? ' ' }}
                                        </td>
                                        <td data-label="@lang('Action')">
                                            <a href="javascript:void(0)" class="ml-1 icon-btn editBtn"
                                                data-original-title="@lang('Modifier')"
                                                data-url="{{ route('historiques.update', $historique->id) }}}"
                                                data-name="{{ json_encode(['date' => $historique->date, 'km' => $historique->km]) }}"
                                                data-toggle="tooltip">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="ml-1 icon-btn btn--danger deleteBtn"
                                                data-original-title="@lang('Supprimer')" data-toggle="tooltip"
                                                data-url="{{ route('historiques.destroy', $historique->id) }}}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="100%">Vide</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div><!-- card end -->
            </div>
        </div>
        <x-delete-confirmation-modal />
        <x-car-history-modal :id="$id" />
        <x-edit-car-history-modal :id="$id" />
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{ route('voiture.index') }}" class="text-white btn btn-sm btn--primary box--shadow1 text--small"><i
            class="fa fa-fw fa-backward"></i>@lang('Retour')</a>
    <a class="text-white btn btn-sm btn--primary box--shadow1 text--small" data-toggle="modal"
        data-target="#CarHistoryModal"><i class="fa fa-fw fa-plus"></i>@lang('Ajouter')</a>
@endpush

@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
    <script>
        (function($) {
            "use strict";

            // Edit
            $('.editBtn').on('click', function() {
                var modal = $('#editCarHistoryModal');
                var url = $(this).data('url');
                var nameData = $(this).data('name');
                var date = nameData.date;
                var km = nameData.km;

                modal.find('form').attr('action', url);
                modal.find('input[name="date"]').val(date);
                modal.find('input[name="km"]').val(km);
                modal.modal('show');
            });

        })(jQuery);
    </script>
@endpush
