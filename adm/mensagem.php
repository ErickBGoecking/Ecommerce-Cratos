<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="background-color: var(--cor-principal)">
            <strong class="me-auto">Mensagem de Sucesso</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Ação efetuada com sucesso!
        </div>
    </div>
</div>
<div id="confirmacao" class="toast custom-toast" style="display: none;" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header bg-danger text-white">
        <strong class="me-auto">Confirmação de Exclusão</strong>
        <button type="button" class="btn-close" onclick="cancelarExclusao()" aria-label="Close"></button>
    </div>
    <div class="toast-body">
        <p>Deseja realmente excluir este item?</p>
        <button class="btn btn-sm btn-primary" id="btnExcluir" >Confirmar</button>
        <button class="btn btn-sm btn-secondary" onclick="cancelarExclusao()">Cancelar</button>
    </div>
</div>