<?php 
// // ###############CONFIG################
include_once("config/conexao.php");
include_once("config/globais.php");

// // ###############CRUD################
include_once("crud/crud.php");
include_once("crud/selecionar.php");
include_once('crud/deletar.php');
include_once('crud/cadastrar.php');
include_once('crud/alterar.php');
######################################
// include_once('toasts/toasts.php');
include_once('validacao/validacao.php');


// #################
function stringRandomica(){
    $caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";
    $stringEmbaralhada = str_shuffle($caracteres);

    return $stringEmbaralhada;
}

function formatarDataExtenso()
{
    setlocale(LC_TIME, 'pt_BR.utf-8', 'Portuguese_Brazil.utf-8', 'pt_BR.utf-8', 'Portuguese_Brazil');
    date_default_timezone_set('America/Sao_Paulo');
    $dataFormatada = strftime('%A, %d de %B de %Y', strtotime('today'));
    $dataFormatada = mb_convert_case($dataFormatada, MB_CASE_TITLE, 'UTF-8');
    echo "<span style='font-size: small'>" . $dataFormatada . "</span>";
}
function validaFoto($nomeCampo, $caminho){
    $extensaoArquivo = array('jpg', 'jpeg', 'png');
    $nome_original = $_FILES[$nomeCampo]['name'];
    $extensao = strtolower(pathinfo($nome_original, PATHINFO_EXTENSION));
    if (!in_array($extensao, $extensaoArquivo)) {
        return false;
    }else {
        $identificador = uniqid();
        $novo_nome = 'Exclusivy-' . $identificador . '.' . $extensao;
    if (move_uploaded_file($_FILES[$nomeCampo]['tmp_name'], $caminho . $novo_nome)) {
            return $novo_nome;     
        } else {
            return $novo_nome;
        }
    }
}
function codificar($codificar, $tipo)
{
    if ($tipo == 'codificar') {
        return base64_encode($codificar);
    } else {
        return base64_decode($codificar);
    };
}

