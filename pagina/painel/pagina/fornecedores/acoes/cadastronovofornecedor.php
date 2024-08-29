<?php 

$nome = $dados['pessoa_nome'];
$sobrenome = $dados['pessoa_sobrenome'];
$cnpj=$dados['pessoa_cnpj'];
$telefone=$dados['pessoa_telefone'];
$email=$dados['pessoa_email'];
$descricao=$dados['fornecedor_descricao'];

$campos = "nome,sobrenome,cnpj,telefone,email";
$values = [$nome,$sobrenome,$cnpj,$telefone,$email];

$pessoa = insert('pessoa',$campos,$values);

if($pessoa){
    $campos = "idpessoa,descricao";
    $values = [$pessoa,$descricao];
    $fornecedor = insert('fornecedor',$campos,$values) ;
    if($fornecedor){
        $response['sucesso'] = true;
        $response['mensagem'] = 'Novo fornecedor cadastrado com sucesso!';
        $response['id'] = $fornecedor;
    }else{   
        $response['sucesso'] = false;
        $response['mensagem'] = 'Erro ao cadastrar o novo fornecedor.';
    }
}else{
    $response['sucesso'] = false;
    $response['mensagem'] = 'Erro ao cadastrar o novo fornecedor.';
}

header('Content-Type: application/json');
echo json_encode($response);