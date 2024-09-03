<?php
//include_once '../../../../source/funcoes/config/globais.php';
//include_once '../../../../source/funcoes/funcoes.php';
//include_once '../../../../source/funcoes/crud/crud.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($controle[3])) {
    $idproduto = $controle[4];
    $tiposSelecionados = $controle[3];
    $idtipos = explode(',', $tiposSelecionados);
    $condicoes = "idproduto = :idproduto";
    $parametros = [':idproduto' => $idproduto];

    foreach ($idtipos as $index => $idtipo) {
        $idtipo = trim($idtipo);
        $condicoes .= " AND REPLACE(idtipovariacao, ' ', '') LIKE :idtipovariacao_$index";
        $parametros[":idtipovariacao_$index"] = "%$idtipo%";
    }

    $retornoProduto = listarGeralPDO('idprodutovariacao', 'produtovariacao', $condicoes, $parametros);

    if ($retornoProduto) {
        $id = codificar($retornoProduto[0]->idprodutovariacao, 'codificar');
        $response['sucesso'] = true;
        $response['id'] = $id;
        echo json_encode($response);
    } else {
        $response['sucesso'] = false;
        $response['mensagem'] = 'Nenhum produto encontrado com as variações selecionadas!';
        echo json_encode($response);
    }
} else {
    $response['sucesso'] = false;
    $response['mensagem'] = 'Nenhum idtipovariacao recebido!';
    echo json_encode($response);
}

?>
