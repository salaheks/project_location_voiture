<div class="card mt-50">
    <div class="card-body">
        <div class="row">
            <div class="col-md-11">
                <div class="form-group">
                    <label>@lang('Conducteur 2')</label>
                    <select class="form-control select2-basic" name="driver_id" id="driverSelect">
                        <option disabled selected>Selectionnez Conducteur</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-1 d-flex align-items-center justify-content-center">
                <a class="btn btn-success text-white" data-toggle="modal" data-target="#addClientModal">
                    <i class="fa fa-fw fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="d-none" id="inputs-container-driver">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold">@lang('Date naissance')</label>
                        <input class="form-control" type="date" name="date_naissance" id="date_naissance_driver"
                            value="{{ isset($client) ? $client->date_naissance : '' }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold">@lang('N° Permis')</label>
                        <input class="form-control" type="text" name="permis" id="permis_driver"
                            value="{{ isset($client) ? $client->permis : '' }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold">@lang('Cin')</label>
                        <input class="form-control" type="text" name="cin" id="cin_driver"
                            value="{{ isset($client) ? $client->cin : '' }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold">@lang('N° Télephone')</label>
                        <input class="form-control" type="text" name="telephone" id="telephone_driver"
                            value="{{ isset($client) ? $client->telephone : '' }}" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold">@lang('Passeport')</label>
                        <input class="form-control" type="text" name="num_passeport" id="num_passeport_driver"
                            value="{{ isset($client) ? $client->num_passeport : '' }}" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label font-weight-bold">@lang('Date livration passeport')</label>
                        <input class="form-control" type="date" name="date_delivration_passeport"
                            id="date_delivration_passeport_driver"
                            value="{{ isset($client) ? $client->date_delivration_passeport : '' }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
