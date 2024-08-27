<?php
header('Content-Type: application/json');
function removerCaracteres($string){
    return preg_replace("/[^0-9.]/", "", $string);
}

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $produto = $dados['produto'];
    // $descricao = $dados['descricao'];
    $video = $dados['video'];
    $idcategoria = $dados['categoria'];

    $foto = $_FILES['foto']['name'][0];

    // $campos = 'produto,descricao,foto,video,idcategoria';
    // $values = array($produto,$descricao,$foto,$video,$idcategoria);
    $campos = 'produto,video,idcategoria';
    $values = array($produto,$video,$idcategoria);

    $idProduto = insert('produto',$campos,$values);

    $index = 1;    
    $fotos = $_FILES['foto'];
    foreach($fotos as $etapa){
        // $nomeTemporario = $_FILES['foto']['tmp_name'][$index];
        $fotoExtra = $_FILES['foto']['name'][$index];

        $campos = 'idproduto,foto';
        $values = array($idProduto,$fotoExtra);

        $cadastroFoto = insert('fotoproduto',$campos,$values);
        $index++;
    }

    // -----------------------PRODUTO VARIACAO-------------------------------

    if(isset($dados['VariacaoEstoque'])){
        $indice = 0;
        $variacaoEstoque = $dados['VariacaoEstoque'];
        foreach($variacaoEstoque as $variacao){
            $altura = removerCaracteres($dados['VariacaoAltura'][$indice]);
            $largura = removerCaracteres($dados['VariacaoLargura'][$indice]);
            $peso = removerCaracteres($dados['VariacaoPeso'][$indice]);

            $campos = 'idproduto,altura, largura, peso';
            $values = array($idProduto,$altura,$largura,$peso);
            $idProdutoVariacao = insert('produtovariacao',$campos,$values);

            $custo = removerCaracteres($dados['VariacaoCusto'][$indice]);
            $venda = removerCaracteres($dados['VariacaoPrecoVenda'][$indice]);
            $vendapromocional = removerCaracteres($dados['VariacaoPrecoPromocional'][$indice]);

            $campos = 'idprodutovariacao, custo, venda, vendapromocional';
            $values = array($idProdutoVariacao,$custo,$venda,$vendapromocional);
            $idEstoque = insert('estoque',$campos,$values);

            $indice++;
        }
    }else{
        $altura = removerCaracteres($dados['altura']);
        $largura = removerCaracteres($dados['largura']);
        $peso = removerCaracteres($dados['peso']);

        $campos = 'idproduto,altura, largura, peso';
        $values = array($idProduto,$altura,$largura,$peso);
        $idProdutoVariacao = insert('produtovariacao',$campos,$values);

        $custo = removerCaracteres($dados['custo']);
        $venda = removerCaracteres($dados['venda']);
        $vendapromocional = removerCaracteres($dados['vendaPromocional']);

        $campos = 'idprodutovariacao, custo, venda, vendapromocional';
        $values = array($idProdutoVariacao,$custo,$venda,$vendapromocional);
        $idEstoque = insert('estoque',$campos,$values);
    }
    
    $response['sucesso']=True;
    $response['mensagem']= 'deu certo';
    echo json_encode($response);

// if($idEstoque){
//     $response['sucesso']=True;
//     $response['mensagem']= 'cadastrado com sucesso';
//     // $response['mensagem']= 'Produto cadastrado com sucesso!'+$dados['variacaoEstoque'];
// }else{
    // $response['sucesso']=False;
    // $response['mensagem']= $_FILES['foto'];
// }
    // echo json_encode($response);
// -------------------------------RETORNO-----------------------------