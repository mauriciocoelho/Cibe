<form id="add-row-form" action="{{ route('irmas.inativar', $register->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title white" id="myModalLabel8">Apagar Conta</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" name="id" id="id-input" class="form-control">

                <div class="modal-body">
                    <p>Você certeza que deseja <b>apagar</b> o registro?</p>
                </div>

                <input type="hidden" name="status">

                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>