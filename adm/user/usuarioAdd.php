<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';
$idAdmin = $_SESSION['idsis'];
$conn = conectar();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$response = validarCampos($dados, 'IdGenero,Nome,Sobrenome,Nascimento,Cpf,Telefone,Email,Senha');
if ($response['sucesso']) {
    $value = recebeForm($dados, 'value');
    $campos = recebeForm($dados, 'campos');
    
    if($foto = validaFoto('Foto','user/img/')){  
        $campos .= ',Foto';
        $value[] = $foto;
    }

    $insert = insert('pessoa', $campos, $value);
    $response = auditoria($insert,'O novo usuario foi adicionado no sistema','pessoa');
}
echo json_encode($response);
?>

