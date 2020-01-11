<form id="add-row-form" action="{{route('eventos.store')}}" method="post">
    @csrf
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{ __('Evento') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ __('Evento') }}</label>
                        <input type="text" name="name" id="name-input" class="form-control" placeholder="Nome do Evento" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Local') }}</label>
                        <input type="text" name="local" id="local-input" class="form-control" placeholder="Local do Evento" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Data do Evento') }}</label>
                        <input type="date" name="data_evento" id="data_evento-input" class="form-control">
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