<?php
/**
 * Created by PhpStorm.
 * User: Luciano
 * Date: 19/10/2019
 * Time: 14:31
 */
//-------------configuração banco de dados
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_ALL, 'pt_BR');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
define( 'URLBASEPATH', __DIR__ . '/../');
define( 'BASEPATH', __DIR__ . DIRECTORY_SEPARATOR );
define( 'BASEPATHFILE', __FILE__);
define( 'BASEPATHVIRTUAL',$_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR);
define('DOMINIO',$_SERVER['SERVER_NAME']);
define('TITULOSITE','NÚCLEO INVESTIGACION INTERNACIONAL EN CIENCIAS MEDICAS');
define('TEMPOFALHA','15');
define('TENTATIVAFALHA','3');
define('DATATIMEATUAL', date("Y-m-d H:i:s"));
define('PASTAUSUARIO', 'adm/img');
define('PASTAADM', 'administrador/img');
define('PASTAMENU', 'menu/img/');
define('PASTAPRODUTO', 'produto/img/');
define('PASTAPRODUTOTESTE', 'produto/img2/');
define('PASTABANNER', 'banner/img/');
define('PASTAREVISTA', 'artigos/img/');
define('PASTAREVISTAARQUIVO', 'artigos/arquivo/');
define('PASTAFOTO', 'foto/img/');
define('PASTACOLABORADOR', 'colaborador/img/');
define('PASTADEPOIMENTO', 'depoimento/img/');
define('PASTAESTRUTURA', 'estrutura/img/');
define('FRETEUNICOSTATUS', 'TODOS');
//SIM, NÃO, TODOS
define('FRETEUNICO', '14.90');
define('FRETEUNICOVALADARES', '9.90');
$ip = $_SERVER['REMOTE_ADDR'];
$usuarioPc = get_current_user();
if(isset($usuarioPc)){
    $pc = $usuarioPc;
}else{
    $pc='Desconhecido';
}
$user_agent = $_SERVER['HTTP_USER_AGENT'];
// Verifica se o User-Agent contém strings comuns para determinar o tipo de dispositivo
if (strpos($user_agent, 'Mobile') !== false || strpos($user_agent, 'Android') !== false || strpos($user_agent, 'iPhone') !== false || strpos($user_agent, 'iPad') !== false) {
    $dispositivo = $user_agent;
} else {
    $dispositivo = 'Computador';
}

$servidorLocal = true;
if ($servidorLocal) {
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '010203');
    define('DBNAME', 'cratosbd');
} else {
    define('HOST', 'localhost');
    define('USER', 'localhost');
    define('PASS', 'localhost');
    define('DBNAME', 'localhost');
}