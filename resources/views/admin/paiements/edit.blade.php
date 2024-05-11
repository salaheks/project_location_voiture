@extends('admin.layouts.app')
@section('panel')
    <div class="row mb-none-30">
        <div class="col-xl-8 col-md-6 mb-30">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body">
                    <h5 class="card-title mb-50 border-bottom pb-2">@lang('User Deposit Information')</h5>
                    <div class="row mt-4">
                        <form class="col-md-12 row paymentForm" action="{{ route('paiement.update', $paiement->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date de Paiement')</label>
                                    <input type="date" class="form-control" name="date_paiement"
                                        value="{{ old('date_paiement') ?? (isset($paiement->date_paiement) ? \Carbon\Carbon::createFromFormat('Y-m-d', $paiement->date_paiement)->format('Y-m-d') : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Date de Reglement')</label>
                                    <input type="date" class="form-control" name="date_reglement"
                                        value="{{ old('date_reglement') ?? (isset($paiement->date_reglement) ? \Carbon\Carbon::createFromFormat('Y-m-d', $paiement->date_reglement)->format('Y-m-d') : '') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Montant')</label>
                                    <input type="number" class="form-control" name="montant"
                                        value="{{ $paiement->montant ? $paiement->montant : old('montant') }}" required>
                                </div>
                            </div>
                            <div class="col-md-8 my-4">
                                <div class="col-md-2 imageItem">
                                    <div class="payment-method-item">
                                        <div class="payment-method-header d-flex flex-wrap">
                                            <div class="thumb" style="position: relative;">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview"
                                                    style="background-image: url('@if ($paiement->image) {{ asset('/storage/' . $paiement->image) }}@else{{ asset('assets/images/default.png') }} @endif')">
                                                    </div>
                                                </div>
                                                <div class="avatar-edit">
                                                    <input type="file" name="image" class="profilePicUpload"
                                                        id="0" accept=".png, .jpg, .jpeg">
                                                    <label for="0" class="bg-primary">
                                                        <i class="la la-pencil"></i>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12">
                            <button class="btn btn--success ml-1 approveBtn" data-id="3" data-toggle="tooltip"
                                data-original-title="@lang('Approve')"><i class="fas fa-check"></i>
                                @lang('Approve')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- APPROVE MODAL --}}
    <div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Approve Deposit Confirmation')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="approveForm">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="modal-body">
                        <p>@lang('Are you sure to') <span class="font-weight-bold">@lang('approve')</span> <span
                                class="font-weight-bold withdraw-amount text-success"></span> @lang('deposit of') <span
                                class="font-weight-bold withdraw-user"></span>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                        <button type="button" class="btn btn--success approveBtnSubmit">@lang('Approve')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        (function($) {
            "use strict";

            $('.approveBtn').on('click', function() {
                $('#approveModal').modal('show')
            });

            $('.approveBtnSubmit').on('click', function() {
                $('.paymentForm').submit();
            });
        })(jQuery);
    </script>
@endpush
