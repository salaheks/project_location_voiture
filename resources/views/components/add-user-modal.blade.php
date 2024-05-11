<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModal" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addClientModal">@lang('Client')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form class="form-horizontal" method="post">
                @csrf

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Nom')</label>
                                <input type="text" class="form-control" name="nom"
                                    value="{{ old('nom') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">@lang('Date naissance')</label>
                                <input class="form-control" type="date" name="date_naissance"
                                    value="{{ isset($client) ? $client->date_naissance : old('date_naissance') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Adresse')</label>
                                <input type="text" class="form-control" name="adresse"
                                    value="{{ old('adresse') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">@lang('CIN')</label>
                                <input class="form-control" type="text" name="cin"
                                    value="{{ isset($client) ? $client->cin : old('cin') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">@lang('Passeport')</label>
                                <input class="form-control" type="text" name="num_passeport"
                                    value="{{ isset($client) ? $client->num_passeport : old('num_passeport') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Date livraison passeport')</label>
                                <input type="date" class="form-control" name="date_delivration_passeport">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('N°Permis')</label>
                                <input type="text" class="form-control" name="permis">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Date livraison permis')</label>
                                <input type="date" class="form-control" name="date_delivration_permis">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Téléphone')</label>
                                <input type="phone" class="form-control" name="telephone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('Email')</label>
                                <input class="form-control" type="text" name="email"
                                    value="{{ isset($client) ? $client->email : old('email') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('Société')</label>
                                <input style="width: 25px; height: 25px;" type="checkbox" name="isCompany"
                                    id="isCompany">
                            </div>
                        </div>
                        <div class="col-md-3" id="iceField" style="display: none">
                            <div class="form-group">
                                <label class="form-control-label font-weight-bold">@lang('ICE')</label>
                                <input class="form-control" type="text" name="ice"
                                    value="{{ isset($client) ? $client->ice : old('ice') }}">
                            </div>
                        </div>
                        <input name="from_booking" class="d-none" value="true">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                    <button type="button" class="btn btn--primary" id="btn-save"
                        value="add">@lang('Ajouter')</button>
                </div>
            </form>
        </div>
    </div>
</div>
