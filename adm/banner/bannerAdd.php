<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$response = validarCampos($dados, 'Img,Titulo,Tipo,DataInicial,DataFinal');
if ($response['sucesso']) {
    $value = recebeForm($dados, 'value');
    $campos = recebeForm($dados, 'campos');

    $campos.= ',IdAdm';
    $value[] = $idAdmin;
    
    if($foto = validaFoto('Img','banner/img/')){  
        $campos .= ',Img';
        $value[] = $foto;
    }

    $insert = insert('banner', $campos, $value);
    $response = auditoria($insert,'O banner foi adicionado no sistema','banner');
}
echo json_encode($response);
?>

