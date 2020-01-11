<form id="add-row-form" action="{{route('congregacoes.store')}}" method="post">
    @csrf
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{ __('Cadastro de Congregação') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ __('Congregação') }}</label>
                        <input type="text" name="name" id="name-input" class="form-control" placeholder="Nome Congregação" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancelar') }}</button>
                    <button type="submit" class="btn btn-success" id="add-row">{{ __('Salvar') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>