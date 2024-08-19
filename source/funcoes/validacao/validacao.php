<?php
function validarSessaoAdm()
{
    // if (!isset($_SESSION['idsis']) && empty($_SESSION['idsis'])) {
    //     $_SESSION = array();
    //     if (ini_get("session.use_cookies")) {
    //         $params = session_get_cookie_params();
    //         setcookie(session_name(), '', time() - 42000,
    //             $params["path"], $params["domain"],
    //             $params["secure"], $params["httponly"]
    //         );
    //     };
    //     return false;
    // }else{
    //     return true;
    // }
    if(isset($_SESSION['idsis'])){
        return true;
    }else{
        return false;
    }
}
function validarSenhaCriptografia($campos, $tabela, $campoBdString, $campoBdString2, $campoParametro, $campoParametro2, $campoBdAtivo, $valorAtivo)
{
    $conn = conectar();

    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos "
            . "FROM $tabela "
            . "WHERE $campoBdString = ? AND $campoBdAtivo = ? ");
        $sqlLista->bindValue(1, $campoParametro, PDO::PARAM_STR);
        $sqlLista->bindValue(2, $valorAtivo, PDO::PARAM_STR);
        $sqlLista->execute();
        $conn->commit();

        if ($sqlLista->rowCount() > 0) {
            $retornoSql = $sqlLista->fetch(PDO::FETCH_OBJ);
            $senha_hash = $retornoSql->$campoBdString2;
            if (password_verify($campoParametro2, $senha_hash)) {
                return $retornoSql;
            }
            return 'senha';
        } else {
            return 'usuario';
        }
    } catch (Throwable $e) {
        $error_message = 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;
        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        $conn->rollback();
        throw $e;
    }
}