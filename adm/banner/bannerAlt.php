<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$idBanner = $dados['IdBanner'];
$response = validarCampos($dados, 'Img,Titulo,Tipo,DataInicial,DataFinal', true, "IdBanner", $idBanner);
if ($response['sucesso']){
    $value = recebeForm($dados, 'value');
    $campos = recebeForm($dados, 'campos');
    
    if($foto = validaFoto('Img','banner/img/')){
        $campos .= ',Img';
        $value[] = $foto;
    }
    $update = upGeral('banner', $campos, $value,"WHERE IdBanner = $idBanner");
    $response = auditoria($update,'Foi alterado no sistema Banner ','banner');
}
echo json_encode($response);
?>
