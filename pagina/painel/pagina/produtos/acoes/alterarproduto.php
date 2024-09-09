<?php
// include_once('../../../../../source/funcoes/funcoes.php');

header('Content-Type: application/json');
function removerCaracteres($string){
    return preg_replace("/[^0-9.]/", "", $string);
}

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$produto=$dados['produto'];
$descricao=$dados['descricao'];
$detalhe=$dados['detalhe'];
$video=$dados['video'];
$venda=removerCaracteres($dados['venda']);
$vendapromocional=removerCaracteres($dados['vendaPromocional']);
$custo=removerCaracteres($dados['custo']);
$fornecedor=$dados['fornecedor'];
$codigosku=$dados['codigo_sku'];
$codigobarras=$dados['codigo_barras'];
$peso=removerCaracteres($dados['peso']);
$comprimento=removerCaracteres($dados['comprimento']);
$largura=removerCaracteres($dados['largura']);
$altura=removerCaracteres($dados['altura']);


$campos = 'video, produto, descricao';
$values = [$video, $produto, $descricao];

if(isset($dados['categoria'])){
    $idCategoria = $dados['categoria'];
    $campos.=  ', idcategoria';
    $values[]=$idCategoria;
}
if(isset($_FILES['fotoProduto'])){
    $fotoPrincipal = $_FILES['fotoProduto']['name'][0];
    $campos.=  ', foto';
    $values[]=$fotoPrincipal;
}
$idproduto = $dados['idproduto'];
$produto = upGeral('produto', $campos, $values, "where idproduto = $idproduto");



if(!isset($dados['idprodutovariacao'])){
    $campos = 'detalhe, altura, largura, comprimento, peso, codigosku, codigobarras';
    $values = [];
    $values = [$detalhe ,$altura, $largura, $comprimento ,$peso, $codigosku, $codigobarras];
    
    $variacao = listarGeral('idprodutovariacao',"produtovariacao where idproduto = $idproduto");
    $idprodutovariacao = $variacao[0]->idprodutovariacao;

    $produtovariacao = upGeral('produtovariacao',$campos,$values,"where idprodutovariacao = $idprodutovariacao");

    $campos = 'idfornecedor, custo, venda, vendapromocional';
    $values = [];
    $values = [$fornecedor, $custo, $venda, $vendapromocional];

    if(isset($dados['qtdatual'])){
        $qtdatual = removerCaracteres($dados['qtdatual']);
        $campos.=  ', qtdatual';
        $values[]=$qtdatual;
    }


    $idestoque = upgeral('estoque',$campos,$values,"where idprodutovariacao = $idprodutovariacao");

}
else{
    $variacoes = $dados['idTipoVariacao'];
    foreach($variacoes as $indice => $variacao){
        $idprodutovariacao = $dados['idprodutovariacao'][$indice];
        $qtdatual = $dados['VariacaoEstoque'][$indice];
        $venda = $dados['VariacaoPrecoVenda'][$indice];
        $vendapromocional =$dados['VariacaoPrecoPromocional'][$indice];
        $custo = $dados['VariacaoCusto'][$indice];
        $peso = $dados['VariacaoPeso'][$indice];
        $comprimento = $dados['VariacaoComprimento'][$indice];
        $largura = $dados['VariacaoLargura'][$indice];
        $altura = $dados['VariacaoAltura'][$indice];
        $codigosku = $dados['VariacaoSku'][$indice];
        $codigobarras = $dados['VariacaoCodigoBarras'][$indice];
        $detalhe = $dados['variavelDetalhe'][$indice];
        
        $campos = 'idtipovariacao ,detalhe, altura, largura, comprimento ,peso, codigosku, codigobarras';
        $values = [];
        $values = [$variacao,$detalhe ,$altura, $largura, $comprimento, $peso, $codigosku, $codigobarras];
        $produtovariacao = upGeral('produtovariacao',$campos,$values,"where idprodutovariacao = $idprodutovariacao");
        

        $campos = 'idfornecedor, qtdatual, custo, venda, vendapromocional';
        $values = [];
        $values = [$fornecedor,$qtdatual, $custo, $venda, $vendapromocional];
        $idestoque = upGeral('estoque',$campos,$values,"where idprodutovariacao = $idprodutovariacao");
    }
}

$response['sucesso'] = true;
$response['mensagem'] = 'Produto alterado com sucesso!';
echo json_encode($response);