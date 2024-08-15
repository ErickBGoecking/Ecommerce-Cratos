<?php 
$idSelecionado = base64_decode($url[3]);
$lista = listarGeral(
    "p.idproduto, p.foto, p.produto,
    e.idestoque,e.custo, e.idfornecedor"
    ,
    "produto p
    INNER JOIN produtovariacao pv ON pv.idproduto = p.idproduto
    INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao
    WHERE e.idfornecedor = $idSelecionado
    "
    );
?>
<div class="modal fade" id="modalProdutos"  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastrar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <?php
                    if($lista){
                        foreach($lista as $row){
                            ?>
                            <button class="btn btn-light d-flex justify-content-between" style="width:100%;">
                            <img src="<?php echo $_PREFIXO . "img/produto/".$row->foto?>" alt="" style="max-height:100px;max-width:100px;">
                            <strong><?= $row->produto?></strong>
                            <span class="bg-warning p-2 rounded">R$ <?= $row->custo?></span>
                            </button>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    modalElement = document.getElementById('modalProdutos');
    bootstrapModal = new bootstrap.Modal(modalElement);
    bootstrapModal.show();
});

</script>