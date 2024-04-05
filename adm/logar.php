<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';

$conn = conectar();
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$varEmail = addslashes(trim($dados['emailLogar']));
$email = preg_replace('/[^[:alnum:]_.-@]/', '', $varEmail);
$pass = addslashes(trim($dados['senhaLogar']));

$retornoLogar = validarSenhaCriptografia('IdPessoa, Senha', 'pessoa', 'Email', 'Senha', $email, $pass, 'Ativo', 'A');
if ($retornoLogar) {
    if ($retornoLogar === 'usuario') {
        echo json_encode(['sucesso' => false, 'mensagem' => "Usuário Errado!"]);
    } else if ($retornoLogar === 'senha') {
        echo json_encode(['sucesso' => false, 'mensagem' => "Senha Errada!"]);
    } else {
        $_SESSION['idsis'] = $retornoLogar->IdPessoa;
        echo json_encode(['sucesso' => true, 'mensagem' => "Logado com Sucesso!"]);
    }
} else {
    echo json_encode(['sucesso' => false, 'mensagem' => "Usuário ou senha inválidos"]);
}
