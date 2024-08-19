
<div class="modal fade" id="modalCadastro"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_PREFIXO?>adm/fornecedor/cadastrar" method="post" id="frmCadastrar">
                    <label for="">Fornecedor:</label>
                    <input type="text" class="form-control" name="pessoa_nome" required>
                    <label for="">Razão Social:</label>
                    <input type="text" class="form-control" name="pessoa_sobrenome" required>
                    <label for="">CNPJ:</label>
                    <input type="text" class="form-control" name="pessoa_cnpj" required>
                    <label for="">telefone:</label>
                    <input type="text" class="form-control" name="pessoa_telefone" required>
                    <label for="">Email:</label>
                    <input type="text" class="form-control" name="pessoa_email" required>
                    <label for="">Descricao Fornecedor:</label>
                    <textarea class="form-control" name="fornecedor_descricao" rows="3"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-warning" onclick="enviarCadastro()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>


<script>
    function enviarCadastro(){
        document.getElementById('frmCadastrar').submit()
    }
</script>