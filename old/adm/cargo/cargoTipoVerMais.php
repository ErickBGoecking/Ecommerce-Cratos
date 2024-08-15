<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';

$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$response = array();

if (empty($dados['vermais'])) {
    $response = ['sucesso' => false, 'mensagem' => "O tipo de cargo não foi reconhecido!"];
} else {
    $idCargoTipo = $dados['vermais'];
    $listarCargoTipo = listarGeral('IdCargoTipo, TipoCargo, Cadastro, Alteracao, Ativo', "cargotipo WHERE IdCargoTipo = $idCargoTipo ORDER BY IdCargoTipo DESC");
    if ($listarCargoTipo) {
        $cargotipoData = reset($listarCargoTipo);
        echo json_encode($cargotipoData);
        exit();
    } else {
        $response = ['sucesso' => false, 'mensagem' => "Nenhum tipo de cargo Encontrado para mostrar mais detalhes!"];
    }
}
?>
