<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">@lang('Confirmation')</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        <form method="post" action="">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                <p class="text-muted">@lang('étes vous sur de vouloir supprimer?')</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Non')</button>
                <button type="submit" class="btn btn--danger deleteButton">@lang('Oui')</button>
            </div>
        </form>
    </div>
</div>
</div>
