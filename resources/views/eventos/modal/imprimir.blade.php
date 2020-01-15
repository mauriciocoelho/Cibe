<form action="{{ route('evento.pdf', $evento_id) }}" method="post">
    {{csrf_field()}}
    <div class="modal fade text-left" id="ModalPrint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel8" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title white" id="myModalLabel8">{{ __('Imprimir Lista') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>              

                <div class="modal-body">
                    <p>Escolha um modelo de Relatório</p>

                    <div class="input-group">
                        <div class="form-check">
                            <input type="radio" name="geral" class="form-check-input" id="print" value="Geral">
                            <label class="form-check-label" for="geral">Geral (Ordem Alfabética)</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="pago" class="form-check-input" id="print" value="pago"> 
                            <label class="form-check-label" for="congregacao">pago</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="apagar" class="form-check-input" id="print" value="apagar"> 
                            <label class="form-check-label" for="aniversario">á pagar</label>
                        </div>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Imprimir</button>
                </div>
            </div>
        </div>
    </div>
</form>