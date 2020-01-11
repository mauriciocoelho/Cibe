<form id="add-row-form" action="{{route('eventos.lancar')}}" method="post">
    @csrf
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{ __('Lancar Irmã') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>{{ __('Irmã') }}</label>
                        <select class="form-control" name="pessoa_id">
                            @foreach($pessoas as $pessoa)
                                <option value="{{ $pessoa->id }}">{{ $pessoa->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Tipo') }}</label>
                        <select class="form-control" name="tipo">
                            <option value="Inscrição">Inscrição</option> 
                            <option value="Incrição/Ônibus">Incrição/Ônibus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Status') }}</label>
                        <select class="form-control" name="status_evento">                                
                            <option value="á Pagar">á Pagar</option>        
                            <option value="Pago">Pago</option>                    
                        </select>
                    </div>
                    <input type="text" name="evento_id" id="id-input">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancelar') }}</button>
                    <button type="submit" class="btn btn-success" id="add-row">{{ __('Salvar') }}</button>
                </div>
            </div>
        </div>
    </div>
</form>