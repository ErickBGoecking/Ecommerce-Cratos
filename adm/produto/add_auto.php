<?php
include_once './config/constantes.php';
include_once './config/conexao.php';
include_once './func/func.php';

function retornarSegundaColuna($tabela){
    try {
        $conn = conectar();
        $conn->beginTransaction();
        $sqInsert = $conn->prepare("SHOW COLUMNS FROM $tabela");
        $sqInsert->execute();
        $idInsertRetorno = $sqInsert->fetchAll(PDO::FETCH_OBJ);
        
        return  substr($idInsertRetorno[1]->Field, 2);
    } catch (PDOException $e) {
        echo 'Exception -> ';
        echo $e->getMessage();
        $conn->rollback();
    }
    $conn = null;
}


$idAdmin = $_SESSION['idsis'];
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$tabelas=[];
$camposImportantes="";
$ordemTabelas=[];



foreach($dados as $input => $valor){
    $info = explode('_',$input);
    if(isset($info[2])){
        if($info[2]=='s'){
            if($camposImportantes==""){
                $camposImportantes = $info[1];
            }else{
                $camposImportantes = $camposImportantes .",".$info[1];
            }
        }
    }
    // $tabelas[$info[0]][$info[1]]=$valor;
    $tabelas=[$info[0]=>$info[1]=$valor];

    if (!in_array($info[0], $ordemTabelas)) { 
        
        $ordemTabelas[]= $info[0];
    }
}
// // ------------ VERIFICAR ORDEM DAS TABELAS ----------------

$ordemverificada=$ordemTabelas;

$x = 0;
$indices=count($ordemTabelas);

while($x < $indices){
    foreach ($ordemTabelas as $tabela=>$vlores) {
        try {
            $coluna = retornarSegundaColuna($tabela);
            // $coluna = retornarSegundaColuna($tabela);
            if(array_search($coluna, $ordemverificada)){
                $posicaoOriginal = array_search($tabela, $ordemverificada);
                $elemento = $ordemverificada[$posicaoOriginal];
                array_splice($ordemverificada, $posicaoOriginal, 1);
            
                $posicaoDestino = array_search($coluna, $ordemverificada)+1;
                array_splice($ordemverificada, $posicaoDestino, 0, $elemento);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    $x++;
}

$ordemTabelas=$ordemverificada;

$ultimoid="";

//     foreach($ordemTabelas as $ordem){
//         $campos = "";
//         $valores = "";
    
//         foreach($tabelas[$ordem] as $coluna => $valor){
    
//             if($campos==""){
//                 $campos = $coluna;
//             }else{
//                 $campos .= ",". $coluna;
//             }
//             if($valores==""){
//                 $valores = $valor;
//             }else{
//                 $valores = $valores .",". $valor;
//             }

//             if($coluna=='foto'){
//                 if($coluna = validaFoto('Foto','user/img/')){  
//                     $campos .= ',Foto';
//                     $value[] = $foto;
//                 }
//             }
//         }
        
//         $valores = explode(",",$valores);
        
//         $coluna = retornarSegundaColuna($ordem);
    
//         if(in_array($coluna,$ordemTabelas)){
//             $campos = $campos . ',id'.$coluna;
//             $valores[] = $ultimoid;
//         } 
//         $ultimoid = insert($ordem,$campos,$valores);
//     }
//     $response = ['sucesso' => false, 'mensagem' => "Produto Cadastrado"];
$response = ['sucesso' => false, 'mensagem' => $ordemTabelas];
echo json_encode($response);