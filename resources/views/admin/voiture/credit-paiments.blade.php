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
                                    <th>@lang('Date Paiement')</th>
                                    <th>@lang('Date Reglement')</th>
                                    <th>@lang('Montant')</th>
                                    <th>@lang('Status')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($creditPaiements as $creditPaiement)
                                    <tr>
                                        <td data-label="@lang('Date Paiement')">
                                            {{ $creditPaiement->date_paiement ? $creditPaiement->date_paiement : ' ' }}
                                        </td>
                                        <td data-label="@lang('Date Reglement')">
                                            {{ $creditPaiement->date_reglement ? $creditPaiement->date_reglement : '_' }}
                                        </td>
                                        <td data-label="@lang('Montant')">
                                            {{ $creditPaiement->montant ? $creditPaiement->montant : ' ' }}
                                        </td>
                                        <td data-label="@lang('Status')">
                                            @if ($creditPaiement->status == 0)
                                                <span class="badge badge--warning">@lang('Pending')</span>
                                            @elseif($creditPaiement->status == 1)
                                                <span class="badge badge--success">@lang('Approved')</span>
                                                <br>{{ diffForHumans($creditPaiement->updated_at) }}
                                            @endif
                                        </td>
                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('paiement.edit',$creditPaiement->id) }}" class="icon-btn ml-1 " data-toggle="tooltip" title=""
                                                data-original-title="@lang('Details')">
                                                <i class="la la-desktop"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">Pas de paiement disponible</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div><!-- card end -->
            </div>
        </div>
    </div>
@endsection
