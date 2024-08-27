<div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header" style="background-color: var(--cor-principal)">
            <strong class="me-auto">Mensagem de Sucesso</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" style="background-color: var(--cor-principal)">
            Ação efetuada com sucesso!
        </div>
    </div>
    
    <div id="liveToastErro" class="toast  bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Erro!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body text-light">
        </div>
    </div>
</div>

<div class="toast-container position-fixed top-50 start-50 p-3" style="margin-top:-50px; margin-left: -200px;">
    <div id="liveToastConfirmacao" class="toast  bg-warning" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto">Mensagem de Sucesso</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Mensagem Pergunta
            <div class="mt-2 pt-2 border-top">
                <div class="d-flex gap-3">
                    <a href="" id="btnConfirma"><button class="btn btn-danger btn-sm">Sim</button></a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="toast">Não</button>
                </div>
            </div>
        </div>
    </div>
</div>
