<?php
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$varEmail = addslashes(trim($dados['emailLogar']));
$email = preg_replace('/[^[:alnum:]_.-@]/', '', $varEmail);
$pass = addslashes(trim($dados['senhaLogar']));

$retornoLogar = validarSenhaCriptografia('IdPessoa, Senha', 'pessoa', 'Email', 'Senha', $email, $pass, 'Ativo', 'A');

if ($retornoLogar) {
    if ($retornoLogar === 'usuario') {
        // echo json_encode(['sucesso' => false, 'mensagem' => "Usuário Errado!"]);
        mensagemBox('danger','Falha no Login!','Usuário Inválido');
    } else if ($retornoLogar === 'senha') {
        // echo json_encode(['sucesso' => false, 'mensagem' => "Senha Errada!"]);
        mensagemBox('danger','Falha no Login!','Senha Inválida');
    } else {
        $_SESSION['idsis'] = $retornoLogar->IdPessoa;
        // echo json_encode(['sucesso' => true, 'mensagem' => "Logado com Sucesso!"]);
        // echo "logado";
        $link= $_PREFIXO . "adm/";
        echo <<<EOT
            <script>
            window.location.href = '$link';
            </script>
        EOT;
    }
} else {
    echo "Não logou";
    // echo json_encode(['sucesso' => false, 'mensagem' => "Usuário ou senha inválidos"]);
}

?>
