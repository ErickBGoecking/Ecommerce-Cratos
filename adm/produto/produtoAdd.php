<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
// $conn = conectar();

// function posicaoArray($texto,$campos,$values){
//     $posicao = 0;
//     $comparacao = "";
//     while($texto != $comparacao){
//         $comparacao = $campos[$posicao];
//         if($comparacao == $texto){
//             return $values[$posicao];
//         }else{
//             $posicao++;
//         }
//     }
// }

function insertVariasTabelas($campos,$values){
    $conn = conectar();
    try {

        $iddepartamento = $campos;
        // $iddepartamento = $values[1];
        // $foto = posicaoArray('foto',$campos,$values);
        // $produto = posicaoArray('produto',$campos,$values);
        // $descricao = posicaoArray('descricao',$campos,$values);
        // $altura = posicaoArray('altura',$campos,$values);
        // $largura = posicaoArray('largura',$campos,$values);
        // $peso = posicaoArray('peso',$campos,$values);
        // $unidadepeso = posicaoArray('unidadepeso',$campos,$values);
        // $destaque = posicaoArray('destaque',$campos,$values);
        // $qtdatual = posicaoArray('qtdatual',$campos,$values);
        // $qtdvendido = posicaoArray('qtdvendido',$campos,$values);
        // $vendaPrevia = posicaoArray('vendaPrevia',$campos,$values);
        // $custo = posicaoArray('custo',$campos,$values);
        // $venda = posicaoArray('venda',$campos,$values);
        // $lote = posicaoArray('lote',$campos,$values);
        // $vencimento = posicaoArray('vencimento',$campos,$values);

    //     $conn->beginTransaction();
    //     $sqInsert = $conn->prepare("
    //     BEGIN;
    //     INSERT INTO produto(iddepartamento, foto, produto, descricao)
    //     VALUES('$iddepartamento', '$foto', '$produto', '$descricao');
    //     INSERT INTO produtoVariacao(idproduto, altura, largura, peso, unidadepeso, destaque)
    //     VALUES(LAST_INSERT_ID(), '$altura', '$largura', '$peso', '$unidadepeso', '$destaque');
    //     INSERT INTO estoque(idprodutovariacao, qtdatual, qtdvendido, vendaPrevia, custo, venda, lote, vencimento)
    //     VALUES(LAST_INSERT_ID(), '$qtdatual', '$qtdvendido', '$vendaPrevia', '$custo', '$venda', '$lote', '$vencimento');
    //     ");
    //     $sqInsert->execute();
    //     $conn->commit();
    //     if ($sqInsert->rowCount() > 0) {
    //         return 'Auditoria Gravada com Sucesso';
    //     } else {
    //         return 'Auditoria Não Gravada';
    //     };
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
    return $iddepartamento;
}


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);



// $response['sucesso']=false;
// $response['mensagem']= $dados;
$response = validarCampos($dados, '');
if ($response['sucesso']) {
    $value = recebeForm($dados, 'value');
    $campos = recebeForm($dados, 'campos');
    
    if($foto = validaFoto('Foto','produto/img/')){  
        $campos .= ',Foto';
        $value[] = $foto;
    }

    $insert = insertVariasTabelas($campos, $value);
    // $response['sucesso'] = auditoria($insert,'O novo usuario foi adicionado no sistema','pessoa');
    $response['sucesso']=false;
    $response['mensagem']=$insert;
}else{
    $response['sucesso']=false;
    $response['mensagem']='deu erro';
}
echo json_encode($response);
?>

