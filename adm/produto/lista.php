   <?php
include_once('config/constantes.php');
include_once('config/conexao.php');
include_once('func/func.php');

function stringRandomica(){
    $caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";
    $stringEmbaralhada = str_shuffle($caracteres);

    return $stringEmbaralhada;
}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$getPaginacao=$dados['paginacao'];
$limite = 10;

echo "<div class='card border border-0 shadow'>";
echo "<div class='card-body'>";


$dados = listarGeral(
"p.idproduto, p.foto, p.produto, p.descricao,pv.altura, pv.largura,
pv.peso, pv.destaque,
e.idestoque, e.qtdatual, e.qtdvendido, e.vendaPrevia, e.custo, e.venda, e.lote, e.vencimento"
,
"produto p
INNER JOIN produtovariacao pv ON pv.idproduto = p.idproduto
INNER JOIN estoque e ON e.idprodutovariacao = pv.idprodutovariacao"
);

// $dados = listarLimitPaginacao('pessoa',$getPaginacao,$limite);
foreach ($dados as $row) {

    $foto = $row->foto;
    $produto = $row->produto;
    $descricao = $row->descricao;
    $estoque = $row->qtdatual;
    $vendaprevia = $row->vendaPrevia;
    $quantidadeVendido = $row->qtdvendido;
    $idBotaoAcoes = stringRandomica();
?>
   <div class="card card-lista mt-2 border border-0 shadow-sm d-flex flex-row">
       <div class="card-body d-flex flex-column flex-md-row justify-content-between">
           <div><img src="./produto/img/<?php if(empty($foto)){echo "semfoto.png";}else{ echo $foto;}?>" class="rounded"
                   style="width:50px;height:50px;">
           </div>
           <div>Produto: <strong><?php echo $produto?></strong></div>
           <div>Descrição: <strong><?php echo $descricao?></strong></div>
           <div>Estoque: <strong><?php echo $estoque?></strong></div>
           <div>Valor: <strong><?php echo $vendaprevia?></strong></div>
           <div>Quant./Vendas: <strong><?php echo $quantidadeVendido?></strong></div>
           <div>
               <button class="btn" onclick="menuAcoes(true,'<?php echo $idBotaoAcoes;?>')">
                   <span class="mdi mdi-dots-vertical"></span>
               </button>
               <div id="<?php echo $idBotaoAcoes;?>" class="d-none botaoAcoes"
                   style="position:absolute;top:30px;left:30px; z-index:999;">
                   <div class="card">
                       <div class="d-flex justify-content-end p-2">
                           <div>
                               <button class="btn btn-light" onclick="menuAcoes(false,'<?php echo $idBotaoAcoes;?>')">
                                   <span class="mdi mdi-close"></span>
                               </button>
                           </div>
                       </div>
                       <div class="card-body pt-0">
                           <!-- <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;">
                                    Duplicar
                                    <span class="mdi mdi-content-copy"></span>
                                </button> -->
                           <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                               data-bs-toggle="modal" data-bs-target="#modalAlt"
                               onclick="altCategoriaOnclick('<?php echo $idCategoria?>','<?php echo $categoria?>')">
                               Editar
                               <span class="mdi mdi-file-edit-outline"></span>
                           </button>
                           <button class="btn btn-light d-flex justify-content-between" style="min-width:150px;"
                               onclick="excGeral2(<?php echo $row->idproduto ?>,'produtoExc','btnExcluir','listarProduto','1')">
                               Deletar
                               <span class="mdi mdi-delete-outline"></span>
                           </button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <?php 
}
?>