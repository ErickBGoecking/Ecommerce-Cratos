<?php 


$idSelecionado = base64_decode($url[3]);

?>
<div class="modal fade" id="modalEditarCategoria"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_PREFIXO?>adm/categoria/alterar" method="post" id="frmSalvar">
                    <input type="text" value="<?php echo $idSelecionado?>" name="categoria_idcategoria" class="d-none">
                    <?php 
                    $inputs = <<<EOT
                    <input type="text" class="form-control" name="categoria_categoria" value="@val="categoria_categoria"">
                    EOT;
                    echo coletarInfoFormulario($inputs,$idSelecionado)
                    ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-warning" onclick="salvar()">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalElement = document.getElementById('modalEditarCategoria');
        const bootstrapModal = new bootstrap.Modal(modalElement);
        bootstrapModal.show();
    });
    function salvar(){
        document.getElementById('frmSalvar').submit()
    }
    
</script>