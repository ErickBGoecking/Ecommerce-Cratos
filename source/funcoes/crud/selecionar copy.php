<?php 
function coletarInfoFormulario($formulario,$id){
    $novoFormulario="";
    $ultimoid = $id;
    $dados = [];
    $padrao = '/name="([^"]+)"/';
    preg_match_all($padrao, $formulario, $matches);
    if (!empty($matches[1])) {
        $dados = $matches[1];
    }

    $tabelas=[];
    $camposImportantes="";
    $ordemTabelas=[];

    foreach($dados as $input => $v){
        $info = explode('_',$v);
        if(isset($info[2])){
            if($info[2]=='s'){
                if($camposImportantes==""){
                    $camposImportantes = $info[1];
                }else{
                    $camposImportantes = $camposImportantes .",".$info[1];
                }
            }
        }
        $tabelas[$info[0]][$info[1]]="";

        if (!in_array($info[0], $ordemTabelas)) { 
            
            $ordemTabelas[]= $info[0];
        }
    }

    $ordemverificada=$ordemTabelas;

    $x = 0;
    $indices=count($ordemTabelas);

    while($x < $indices){
        foreach ($ordemTabelas as $tabela) {
            $coluna = retornarColuna($tabela,2);
            if(array_search($coluna, $ordemverificada)){
                $posicaoOriginal = array_search($tabela, $ordemverificada);
                $elemento = $ordemverificada[$posicaoOriginal];
                array_splice($ordemverificada, $posicaoOriginal, 1);
            
                $posicaoDestino = array_search($coluna, $ordemverificada)+1;
                array_splice($ordemverificada, $posicaoDestino, 0, $elemento);
            }
        }
        $x++;
    }

    $ordemTabelas=$ordemverificada;

    // -----CAMPOS QUE VÃO SER TRAZIDOS----- 
    $proximaColuna="";
    foreach($ordemTabelas as $ordem){
        
        $campos = "";
    
        foreach($tabelas[$ordem] as $coluna => $valor){
            
            if($campos==""){
                $campos = "id" . $ordem . "," . $coluna;
            }else{
                $campos .= ",". $coluna;
            }
        }
        

        if($ordemTabelas[0]==$ordem){ 
            $primeiraColuna = "id".$ordem; 
            $query = $ordem . " WHERE " . $primeiraColuna . " = " . $ultimoid;
        }else{
            $query = $ordem . " WHERE " . $proximaColuna . " = " . $ultimoid;
        }
        
        $retornoDados = listarGeral($campos,$query);
        $proximaColuna = "id".$ordem; 
        $ultimoid = $retornoDados[0]->$proximaColuna;

        foreach($retornoDados[0] as $retorno => $elemento){
            
            $padrao = 'name="'.$ordem."_".$retorno.'"';

            if (strpos($formulario,$padrao) !== false) {
                $novoFormulario = str_replace($padrao, $padrao . 'value="'.$elemento.'"', $formulario);
                $formulario = $novoFormulario;
            }

        }
    }
    
    return $novoFormulario;
}