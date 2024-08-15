<div class="modal fade" id="modalCadastro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_PREFIXO?>adm/produto/cadastrar" method="post" id="frmCadastrar">
                    <div class="col-md-6">
                        <input type="file" name="produto_foto_s" id="">
                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Produto</label>
                            <input type="text" id="inputNome" class="form-control" name="produto_produto_s">
                        </div>
                        <div class="mb-3">
                            <label for="inputSobrenome" class="form-label">Descrição</label>
                            <input type="text" id="inputSobrenome" class="form-control" name="produto_descricao_s">
                        </div>
                        <select class="form-select" aria-label="Default select example" name="produto_idcategoria_s">
                            <option selected></option>
                            <?php 
                            $categorias = listarGeral('idcategoria,categoria', 'categoria where idpai = 0');
                            foreach($categorias as $categoria){
                                echo "<option value='" . $categoria->Idcategoria . "'>".$categoria->categoria."</option>";
                            };
                            ?>
                        </select>
                        </div>
                        <div>
                    
                        <div class="d-flex flex-wrap gap-3 justify-content-between mt-3 mb-3">
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Altura</label>
                                <input type="text" id="inputSobrenome" class="form-control"
                                    name="produtovariacao_altura_s">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Largura</label>
                                <input type="text" id="inputSobrenome" class="form-control"
                                    name="produtovariacao_largura_s">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Peso</label>
                                <input type="text" id="inputSobrenome" class="form-control"
                                    name="produtovariacao_peso_s">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Destaque</label>
                                <input type="text" id="inputSobrenome" class="form-control"
                                    name="produtovariacao_destaque_s">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Quatidade Atual</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_qtdatual_s">
                            </div>
                            <div class="col-3">
                                <label for="inputSobrenome" class="form-label">Quatidade Vendido</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_qtdvendido_s">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Custo</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_custo_s">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Venda</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_venda_s">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Lote</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_lote_s">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Vencimento</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_vencimento_s">
                            </div>
                        </div>                        
                    </div>
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
function enviarCadastro() {
    document.getElementById('frmCadastrar').submit()
}
</script>