<?php
// --------------------RECEBER OS POST-----------------------
function alterar($destino){
    try {
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

            $tabelas[$info[0]][$info[1]]=$valor;

            if (!in_array($info[0], $ordemTabelas)) { 
                
                $ordemTabelas[]= $info[0];
            }
        }
        // ------------ VERIFICAR ORDEM DAS TABELAS ----------------

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

        $ultimoid = "";
        foreach($ordemTabelas as $ordem){
            $campos = "";
            $valores = "";

            foreach($tabelas[$ordem] as $coluna => $valor){

                if($campos==""){
                    $campos = $coluna;
                }else{
                    $campos .= ",". $coluna;
                }
                if($valores==""){
                    $valores = $valor;
                }else{
                    $valores = $valores .",". $valor;
                }
            }
            
            $valores = explode(",",$valores);
            
            $coluna = retornarColuna($ordem,2);

            // if(in_array($coluna,$ordemTabelas)){
            //     $campos = $campos . ',id'.$coluna;
            //     $valores[] = $ultimoid;
            // }else{
            //     $ultimoid = [$valor];
            // }
            $onde = 'id'.$ordem;
            $id = $tabelas[$ordem][$onde];

            $ultimoid = upGeral($ordem, $campos, $valores,"WHERE $onde = $id");
            // $ultimoid = insert($ordem,$campos,$valores);
        }

        $retorno = <<<EOT
                <form action="../$destino" method="post" id="frmRetorno">
                <input type="text" name="retorno" value="true_Registro alterado com sucesso!">
                </form>
                <script>
                document.getElementById('frmRetorno').submit();
                </script>
                EOT;
        echo $retorno;
    } catch (\Throwable $e) {
        $retorno = <<<EOT
        <form action="../$destino" method="post" id="frmRetorno">
        <input type="text" name="retorno" value="false_Não foi possível alterar.">
        </form>
        <script>
        document.getElementById('frmRetorno').submit();
        </script>
        EOT;
        echo $retorno;
    }
}