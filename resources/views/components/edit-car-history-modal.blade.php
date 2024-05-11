<div class="modal fade" id="editCarHistoryModal" tabindex="-1" role="dialog" aria-labelledby="editCarHistoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form class="form-horizontal" method="post" action="{{ route('historiques.update',$id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-row form-group">
                        <div class="col-md-6">
                            <label class="font-weight-bold">@lang('km')<span class="text-danger">*</span></label>
                            <input type="number" class="form-control has-error bold" id="km" name="km" required>
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold">@lang('date')<span class="text-danger">*</span></label>
                            <input type="date" class="form-control has-error bold" id="date" name="date" required>
                        </div>
                        <input type="number" class="d-none" name="voiture_id" value="{{ $id }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Annuler')</button>
                    <button type="submit" class="btn btn--primary" id="btn-save" value="add">@lang('Modifier')</button>
                </div>
            </form>
        </div>
    </div>
</div>
