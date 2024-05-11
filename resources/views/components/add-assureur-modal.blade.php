<div class="modal fade" id="AssureurModal" tabindex="-1" role="dialog" aria-labelledby="AssureurModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form class="form-horizontal" method="post" action="{{ route('assureurs.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-row form-group">
                        <div class="col-md-6">
                            <label class="font-weight-bold">@lang('Nom')<span class="text-danger">*</span></label>
                            <input type="string" class="form-control has-error bold" id="nom" name="nom" required>
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold">@lang('Adresse')</label>
                            <input type="adress" class="form-control has-error bold" id="adresse" name="adresse">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Annuler')</button>
                    <button type="submit" class="btn btn--primary" id="btn-save" value="add">@lang('Ajouter')</button>
                </div>
            </form>
        </div>
    </div>
</div>
