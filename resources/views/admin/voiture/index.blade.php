@extends('admin.layouts.app')
@section('panel')
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="p-0 card-body">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light tabstyle--two">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('Immatriculation')</th>
                                    <th scope="col">@lang('Image')</th>
                                    <th scope="col">@lang('Type')</th>
                                    <th scope="col">@lang('Couleur')</th>
                                    <th scope="col">@lang('Paiments')</th>
                                    <th scope="col">@lang('Km')</th>
                                    <th scope="col">@lang('Charges')</th>
                                    <th scope="col">@lang('Actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($voitures as $voiture)
                                    <tr>
                                        <td data-label="immatriculation">
                                            {{ $voiture->immatriculation ? $voiture->immatriculation : ' ' }}</td>
                                        <td data-label="image">
                                            <img src="{{ $voiture->image ? asset('/storage/' . $voiture->image) : asset('assets/images/default.png') }}" style="width: 50px; cursor: pointer;" onclick="showImageModal(this.src, 'modalImage')"></td>
                                        <td data-label="type">
                                            {{ $voiture->type ? $voiture->type->marque . ' ' . $voiture->type->model . ' ' . $voiture->type->carburant . ' ' . $voiture->type->transmission : ' ' }}
                                        </td>
                                        <td data-label="couleur">{{ $voiture->couleur ? $voiture->couleur : ' ' }}</td>
                                        <td data-label="couleur">
                                            <a href="{{ route('voiture.payments', $voiture->id) }}" class="m-1 text-dark">
                                                Paiments
                                            </a>
                                        </td>
                                        <td data-label="km">
                                            <a href="{{ route('voiture.historiques', $voiture) }}" class="m-1 text-primary">
                                                Historique
                                            </a>
                                        </td>
                                        <td data-label="charges">
                                            <div class="btn-group">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Charges
                                                </button>
                                                <div class="dropdown-menu d-flex flex-column">
                                                    <a href="{{ route('voiture.visitetechniques', $voiture->id) }}"
                                                        class="m-1 text-dark">
                                                        Visite Technique
                                                    </a>
                                                    <a href="{{ route('voiture.assurances', $voiture) }}"
                                                        class="m-1 text-dark">
                                                        Assurance
                                                    </a>
                                                    <a href="{{ route('voiture.vignette', $voiture) }}"
                                                        class="m-1 text-dark">
                                                        Vignette
                                                    </a>
                                                    <a href="{{ route('voiture.vidanges', $voiture) }}"
                                                        class="m-1 text-dark">
                                                        Vidange
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="@lang('Action')">
                                            <a href="{{ route('voiture.edit', $voiture->id) }}" class="ml-1 icon-btn"
                                                data-original-title="@lang('Modifier')" data-toggle="tooltip">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <a href="javascript:void(0)" class="ml-1 icon-btn btn--danger deleteBtn"
                                                data-original-title="@lang('Supprimer')" data-toggle="tooltip"
                                                data-url="{{ route('voiture.destroy', $voiture->id) }}">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-muted" colspan="100%">aucun voiture disponible</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
            </div><!-- card end -->
        </div>
    </div>
    <x-show-image-modal />
    <x-delete-confirmation-modal />
@endsection


@push('breadcrumb-plugins')
    <a href="{{ route('voiture.add') }}" class="text-white btn btn-sm btn--primary box--shadow1 text--small"><i
            class="fa fa-fw fa-plus"></i>@lang('Ajouter')</a>
@endpush

@push('script')
    <script src="{{ asset('/assets/admin/js/delete-confirmation.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/show-image-modal.js') }}"></script>
@endpush
