<?php 

function insert($tabela, $campos, $values) {
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $interrogacoes = rtrim(str_repeat('?,', count($values)), ',');
        $sqlInsert = $conn->prepare("INSERT INTO $tabela ($campos) VALUES ($interrogacoes)");

        foreach ($values as $i => $value) {
            $sqlInsert->bindParam($i + 1, $values[$i], PDO::PARAM_STR);
        }

        $sqlInsert->execute();

        if ($sqlInsert->rowCount() > 0) {
            $idRetorno = $conn->lastInsertId();
            $conn->commit();
            return $idRetorno;
        } else {
            $conn->rollback();
            return False;
        }
    } catch (PDOException $e) {
        $conn->rollback();
        return 'Exception -> ' . $e->getMessage();
    } finally {
        $conn = null;
    }
}

function retornarColuna($tabela,$coluna){
    try {
        $conn = conectar();
        $conn->beginTransaction();
        $sqInsert = $conn->prepare("SHOW COLUMNS FROM $tabela");
        $sqInsert->execute();
        $idInsertRetorno = $sqInsert->fetchAll(PDO::FETCH_OBJ);
        
        return  substr($idInsertRetorno[1]->Field, $coluna);
    } catch (PDOException $e) {
        echo 'Exception -> ';
        echo $e->getMessage();
        $conn->rollback();
    }
    $conn = null;
}
function listarGeral($campos, $tabela)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $query = "SELECT $campos FROM $tabela";
        $sqlLista = $conn->prepare($query);
        $sqlLista->execute();
        $retornoLista = $sqlLista->fetchAll(PDO::FETCH_OBJ);
        if ($retornoLista) {
            return $retornoLista;
        } else {
            return false;
        }
    } catch (Throwable $e) {
        $conn->rollback();
        $error_message = '';

        $previousException = $e->getPrevious();
        if ($previousException) {
            $error_message .= 'Previous Exception: ' . $previousException->getMessage() . PHP_EOL;
        }

        $error_message .= 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'Code: ' . $e->getCode() . PHP_EOL;
        $trace = $e->getTrace();
        $error_message .= 'Trace: ' . print_r($trace, true) . PHP_EOL;
        $error_message .= 'Trace File: ' . $trace[0]['file'] . PHP_EOL;
        $error_message .= 'Trace Line: ' . $trace[0]['line'] . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;

        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        throw $e;
    } finally {
        $conn = null;
    }
}
function listarGeralPDO($campos, $tabela, $condicoes = '', $parametros = [])
{
    $conn = conectar();
    try {
//                                    testar se o arquivo de log está funcionando descomente essa linha abaixo
//                                    throw new Exception('Erro de teste para verificar o log.');
        $query = "SELECT $campos FROM $tabela";
        if (!empty($condicoes)) {
            $query .= " WHERE $condicoes";
        }
        $stmt = $conn->prepare($query);
        $stmt->execute($parametros);
        $retornoLista = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $retornoLista ?: false;
    } catch (Throwable $e) {
        $error_message = '';
        $previousException = $e->getPrevious();
        if ($previousException) {
            $error_message .= 'Previous Exception: ' . $previousException->getMessage() . PHP_EOL;
        }
        $error_message .= 'Throwable: ' . $e->getMessage() . PHP_EOL;
        $error_message .= 'Code: ' . $e->getCode() . PHP_EOL;
        $trace = $e->getTrace();
        $error_message .= 'Trace: ' . print_r($trace, true) . PHP_EOL;
        $error_message .= 'Trace File: ' . $trace[0]['file'] . PHP_EOL;
        $error_message .= 'Trace Line: ' . $trace[0]['line'] . PHP_EOL;
        $error_message .= 'File: ' . $e->getFile() . PHP_EOL;
        $error_message .= 'Line: ' . $e->getLine() . PHP_EOL;
        error_log($error_message, 3, 'log/arquivo_de_log.txt');
        throw $e;
    }
}
function listarRegistroUnico($tabela, $campos, $idcampo, $idparametro)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqlLista = $conn->prepare("SELECT $campos "
            . "FROM $tabela "
            . "WHERE $idcampo = ? ");
        $sqlLista->bindValue(1, $idparametro, PDO::PARAM_STR);
        $sqlLista->execute();
        if ($sqlLista->rowCount() > 0) {
            return $sqlLista->fetchAll(PDO::FETCH_OBJ);
        } else {
            return false;
        };
    } catch
    (PDOExecption $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
        $conn->rollback();
    };
    $conn = null;
}
function deleteRegistroUnico($tabela, $campoReferencia, $idparametro)
{
    $conn = conectar();
    try {
        $conn->beginTransaction();
        $sqUpdate = $conn->prepare("DELETE FROM $tabela WHERE $campoReferencia = ?");
        $sqUpdate->bindValue(1, $idparametro, PDO::PARAM_INT);
        $sqUpdate->execute();
        $conn->commit();
        if ($sqUpdate->rowCount() > 0) {
            $conn->rollback();
        }
    } catch
    (PDOException $e) {
        echo 'Exception -> ';
        return ($e->getMessage());
    };
    $conn = null;
}

function upGeral($tabela, $campos, $values, $condicao="") {
    $conn = conectar();
    try {
        $conn->beginTransaction();
        
        $campos = explode(',', $campos);
        $i = 0;
        $encaixar = "";
        foreach ($campos as $c) {
            if ($i == 0) {
                $encaixar = "$c = ?";
            } else {
                $encaixar .= ", $c = ?";
            }
            $i++;
        }

        $sqlUpdate = $conn->prepare("UPDATE $tabela SET $encaixar $condicao");

        foreach ($values as $indice => $value) {
            $sqlUpdate->bindValue($indice + 1, $value, PDO::PARAM_STR);
        }
        $sqlUpdate->execute();
        $conn->commit();
        if ($sqlUpdate->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        $conn->rollback();
        return $e;
    }
}
function listarLimitPaginacao($tabela,$getpaginacao,$limite=10,$condicao=""){
    $conn = conectar();
    $pagina = isset($getpaginacao) ? (int)$getpaginacao : 1;
    $inicio = ($pagina - 1) * $limite;

    $stmt = $conn->prepare("SELECT * FROM $tabela $condicao LIMIT :inicio, :limite");

    $stmt->bindParam(':inicio', $inicio, PDO::PARAM_INT);
    $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}