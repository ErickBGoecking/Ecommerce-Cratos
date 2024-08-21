<?php 
$idSelecionado = $url[3];
$idSelecionado = base64_decode($url[3]);
?>
<div class="modal fade" id="modalEditarFornecedor" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo $_PREFIXO?>adm/produto/alterar" method="post" id="frmCadastrar">
                    <div class="col-md-6">
                    <input type="text" name="produto_idproduto" value="<?php echo base64_encode($idSelecionado)?>" class="d-none">
                        <?php
                        $info = <<<EOT
                        <input type="file" name="produto_foto_s" value="@val="produto_foto"">
                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Produto</label>
                            <input type="text" id="inputNome" class="form-control" name="produto_produto_s" value="@val="produto_produto"">
                        </div>
                        <div class="mb-3">
                            <label for="inputSobrenome" class="form-label">Descrição</label>
                            <input type="text" id="inputSobrenome" class="form-control" name="produto_descricao_s" value="@val="produto_descricao"">
                        </div>
                        </div>
                        <div>
                    
                        <div class="d-flex flex-wrap gap-3 justify-content-between mt-3 mb-3">
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Altura</label>
                                <input type="text" id="inputSobrenome" class="form-control"
                                    name="produtovariacao_altura_s" value="@val="produtovariacao_altura"">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Largura</label>
                                <input type="text" id="inputSobrenome" class="form-control"
                                    name="produtovariacao_largura_s" value="@val="produtovariacao_largura"">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Peso</label>
                                <input type="text" id="inputSobrenome" class="form-control"
                                    name="produtovariacao_peso_s" value="@val="produtovariacao_peso"">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Destaque</label>
                                <input type="text" id="inputSobrenome" class="form-control"
                                    name="produtovariacao_destaque_s" value="@val="produtovariacao_destaque"">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Quatidade Atual</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_qtdatual_s" value="@val="estoque_qtdatual"">
                            </div>
                            <div class="col-3">
                                <label for="inputSobrenome" class="form-label">Quatidade Vendido</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_qtdvendido_s" value="@val="estoque_qtdvendido"">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Custo</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_custo_s" value="@val="estoque_custo"">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Venda</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_venda_s" value="@val="estoque_venda"">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Lote</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_lote_s" value="@val="estoque_lote"">
                            </div>
                            <div class="col-2">
                                <label for="inputSobrenome" class="form-label">Vencimento</label>
                                <input type="text" id="inputSobrenome" class="form-control" name="estoque_vencimento_s" value="@val="estoque_vencimento"">
                            </div>
                        </div>   
                        EOT;

                        echo coletarInfoFormulario($info,$idSelecionado);
                        
                        ?>
                    </div>
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