<form id="add-row-form" action="{{ route('eventos.pagar', $register->id) }}" method="post"  enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="ModalPagar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{ __('Pagar') }}</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id-input">
                    <input type="hidden" name="status_evento" id="status_evento-input">
                    <p>Você certeza que deseja que a irmã já <b>pagou?</b></p>
                </div>  
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancelar') }}</button>
                    <button type="submit" class="btn btn-success" id="add-row">{{ __('Pagar') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>