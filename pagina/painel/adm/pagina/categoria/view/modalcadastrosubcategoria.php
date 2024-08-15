
<div class="modal fade" id="modalCadastroSubcategoria"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_PREFIXO?>adm/categoria/cadastrar" method="post" id="frmCadastrarSubCategoria">
                    <input type="text" class="d-none" name="categoria_idPai" id="inputIdPai" required>
                    <input type="text" class="form-control" name="categoria_categoria" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-warning" onclick="cadastrarSubCategoria()">Cadastrar</button>
            </div>
        </div>
    </div>
</div>


<script>
    function inputIdPai(idPai){
        inputIdPai =document.getElementById("inputIdPai")
        inputIdPai.value = idPai
    }
    function cadastrarSubCategoria(){
        document.getElementById('frmCadastrarSubCategoria').submit()
    }
</script>