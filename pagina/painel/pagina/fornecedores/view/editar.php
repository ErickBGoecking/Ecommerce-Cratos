<?php 
// $idSelecionado = $url[3];
$idSelecionado = base64_decode($url[3]);
?>
<div class="modal fade" id="modalEditarFornecedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Fornecedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_PREFIXO?>adm/fornecedor/alterar" method="post" id="frmCadastrar">
                    <input type="text" name="pessoa_idpessoa" class="d-none" value="<?=$idSelecionado?>">
                    <?php 
                    $inputs = <<<EOT
                    <label for="">Fornecedor:</label>
                    <input type="text" class="form-control" name="pessoa_nome" value="@val="pessoa_nome"" required>
                    <label for="">Razão Social:</label>
                    <input type="text" class="form-control" name="pessoa_sobrenome" value="@val="pessoa_sobrenome"" required>
                    <label for="">CNPJ:</label>
                    <input type="text" class="form-control" name="pessoa_cnpj" value="@val="pessoa_cnpj"" required>
                    <label for="">telefone:</label>
                    <input type="text" class="form-control" name="pessoa_telefone" value="@val="pessoa_telefone"" required>
                    <label for="">Email:</label>
                    <input type="text" class="form-control" name="pessoa_email" value="@val="pessoa_email"" required>
                    <label for="">Descricao Fornecedor:</label>
                    <input type="text" class="form-control" name="fornecedor_descricao" value="@val="fornecedor_descricao"" required>
                    EOT;
                    
                    // <textarea class="form-control" name="fornecedor_descricao" rows="3"></textarea>
                    echo coletarInfoFormulario($inputs,$idSelecionado);
                    ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-warning" onclick="enviarCadastro()">Salvar</button>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const modalElement = document.getElementById('modalEditarFornecedor');
    const bootstrapModal = new bootstrap.Modal(modalElement);
    bootstrapModal.show();
});

function enviarCadastro() {
    document.getElementById('frmCadastrar').submit()
}
</script>