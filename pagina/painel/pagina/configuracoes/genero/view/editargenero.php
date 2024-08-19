<?php 
// $idSelecionado = $url[3];
$idSelecionado = base64_decode($url[3]);
?>
<div class="modal fade" id="modalEditarFornecedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Genero</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_PREFIXO?>adm/genero/alterar" method="post" id="frmCadastrar">
                    <input type="text" name="genero_idgenero" class="d-none" value="<?= $idSelecionado?>">
                    <?php 
                    $inputs = <<<EOT
                    <label for="">Genero:</label>
                    <input type="text" class="form-control" name="genero_genero" value="@val="genero_genero"" required>

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