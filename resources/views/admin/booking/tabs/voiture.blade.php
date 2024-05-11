<div class="card mt-50">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Date livraison')</label>
                    <input type="datetime-local" class="form-control" name="date_livraison"
                        value="{{ old('date_livraison') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Date retour')</label>
                    <input type="datetime-local" class="form-control" name="date_retour"
                        value="{{ old('date_retour') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Nombre jour')</label>
                    <input type="number" class="form-control" name="nbr_jour" value="{{ old('nbr_jour') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>@lang('Voiture')</label>
                    <select class="form-control" name="voiture_id" id="selectedCar">
                    </select>
                </div>
            </div>
            <div class="col-md-6 d-none car-infos">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @lang('Visite techniques')
                        <span class="badge badge-pill" id="statusBadgeVT"></span>
                        <span>
                            @lang("Date d'expiration : ")
                            <span class="font-weight-bold"><a id="dateExpirationVT"></a></span>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @lang('Assurances')
                        <span class="badge badge-pill" id="statusBadgeAssurance"></span>
                        <span>
                            @lang("Date d'expiration : ")
                            <span class="font-weight-bold"><a id="dateExpirationAssurance"></a></span>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @lang('Vignette')
                        <span class="badge badge-pill" id="statusBadgeVignette"></span>
                        <span>
                            @lang("Date d'expiration : ")
                            <span class="font-weight-bold"><a id="dateExpirationVignette"></a></span>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @lang('Autorisations de circulation')
                        <span class="badge badge-pill" id="statusBadgeAutorisation"></span>
                        <span>
                            @lang("Date d'expiration : ")
                            <span class="font-weight-bold"><a id="dateExpirationAutorisation"></a></span>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 d-none car-infos">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @lang('Pannes')
                        <span class="badge badge-pill" id="statusBadgePanne"></span>
                        <span>
                            @lang('Date debut : ')
                            <span class="font-weight-bold"><a id="dateDebutPanne"></a></span>
                        </span>
                        <span>
                            @lang('Date fin : ')
                            <span class="font-weight-bold"><a id="dateFinPanne"></a></span>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @lang('Vidange')
                        <span class="badge badge-pill" id="statusBadgeVidange"></span>
                        <span>
                            @lang('Km Changement : ')
                            <span class="font-weight-bold"><a id="kmChangementVidange"></a></span>
                        </span>
                        <span>
                            @lang('Km Actuel : ')
                            <span class="font-weight-bold"><a id="kmActuel"></a></span>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @lang('Chaine De Distribution')
                        <span class="badge badge-pill" id="statusBadgeChain"></span>
                        <span>
                            @lang('Km Changement : ')
                            <span class="font-weight-bold"><a id="kmChangementChain"></a></span>
                        </span>
                        <span>
                            @lang('Km Actuel : ')
                            <span class="font-weight-bold"><a id="kmActuelChain"></a></span>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
