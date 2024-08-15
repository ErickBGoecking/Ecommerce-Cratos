<?php 
function db(){
    $info = array(
        "compra1" => array(
            "produto" => "Tela Para Notebook Acer Nitro 5 An515-54-58cl 15.6",
            "idCompra" => "1",
            "fotoProduto" => "product03.png",
            "quantidade" => "1 unidade",
            "valorProduto" => "350,99",
            "valorFrete" => "0",
            "valorTotal" => "350,99",
            "status" => "Entregue",
            "dataCompra" => "30 de dezembro de 2023",
            "dataEntrega" => "Chegou no dia 6 de janeiro",
            "enderecoEntrega" => "Rua França, 492, Grã Duquesa - Governador Valadares, Minas Gerais",
        ),
        "compra2" => array(
            "produto" => "Fone De Ouvido Bluetooth Head Phone Headphone Sem Fio",
            "idCompra" => "2",
            "fotoProduto" => "product02.png",
            "quantidade" => "1 unidade",
            "valorProduto" => "36,29",
            "valorFrete" => "15,99",
            "valorTotal" => "55,28",
            "status" => "Entregue",
            "dataCompra" => "06 de dezembro de 2023",
            "dataEntrega" => "Chegou no dia 15 de dezembro de 2023",
            "enderecoEntrega" => "Rua França, 492, Grã Duquesa - Governador Valadares, Minas Gerais",
        ),
        "compra3" => array(
            "produto" => "Smartphone Motorola Moto G84 5g 256 Gb Grafite 8 Gb Ram",
            "idCompra" => "3",
            "fotoProduto" => "product07.png",
            "quantidade" => "1 unidade",
            "valorProduto" => "1.471,55",
            "valorFrete" => "0",
            "valorTotal" => "1.471,55",
            "status" => "Entregue",
            "dataCompra" => "25 de novembro de 2023",
            "dataEntrega" => "Chegou no dia 09 de dezembro de 2023",
            "enderecoEntrega" => "Rua França, 492, Grã Duquesa - Governador Valadares, Minas Gerais",
        ));

    return $info;
}
function dados(){
    $db = db();
    $dados = array();

        foreach($db as $compra){

        $produto = $compra['produto'];
        $idCompra = $compra['idCompra'];
        $quantidade = $compra['quantidade'];
        $valorProduto = $compra['valorProduto'];
        $valorFrete = $compra['valorFrete'];
        $valorTotal = $compra['valorTotal'];
        $fotoProduto = $compra['fotoProduto'];
        $status = $compra['status'];
        $dataCompra = $compra['dataCompra'];
        $dataEntrega = $compra['dataEntrega'];
        $enderecoEntrega = $compra['enderecoEntrega'];


        $dados[$idCompra] = array(
                "produto" => $produto,
                "idCompra" => $idCompra,
                "fotoProduto" => $fotoProduto,
                "quantidade" => $quantidade,
                "valorProduto" => $valorProduto,
                "valorFrete" => $valorFrete,
                "valorTotal" => $valorTotal,
                "status" => $status,
                "dataCompra" => $dataCompra,
                "dataEntrega" => $dataEntrega,
                "enderecoEntrega" => $enderecoEntrega
        );
    };


    return $dados;
}

function dbMensagem(){
    $info = array(
        "compra1" => array(
            "mensagem1"=> array(
                "data" => "05/02",
                "hora" => "18:35",
                "remetente" => "adm",
                "mensagem" => "Obrigado por realizar a compra conosco!",
            ),
            "mensagem2"=> array(
                "data" => "05/02",
                "hora" => "18:50",
                "remetente" => "cliente",
                "mensagem" => "Oi",
            ),
            "mensagem3"=> array(
                "data" => "05/02",
                "hora" => "19:15",
                "remetente" => "cliente",
                "mensagem" => "De nada! eu que agradeço!",
            ),
            "mensagem4"=> array(
                "data" => "05/02",
                "hora" => "20:00",
                "remetente" => "adm",
                "mensagem" => "Tenha um bom aproveito!",
            ),
        ),
        "compra2" => array(
            "mensagem1"=> array(
                "data" => "05/02",
                "hora" => "18:35",
                "remetente" => "adm",
                "mensagem" => "Obrigado por realizar a compra conosco!",
            ),
            "mensagem2"=> array(
                "data" => "05/02",
                "hora" => "20:00",
                "remetente" => "cliente",
                "mensagem" => "Por que meu produto ainda não chegou?",
            ),
            "mensagem3"=> array(
                "data" => "05/02",
                "hora" => "18:35",
                "remetente" => "adm",
                "mensagem" => "Desculpe! tivemos um imprevisto na sua entrega.",
            ),
            "mensagem4"=> array(
                "data" => "05/02",
                "hora" => "18:35",
                "remetente" => "adm",
                "mensagem" => "A estimativa de entrega é no dia xx/xx",
            ),
            "mensagem"=> array(
                "data" => "05/02",
                "hora" => "18:35",
                "remetente" => "cliente",
                "mensagem" => "Ok",
            ),
        ),
        "compra3" => array(
            "mensagem1"=> array(
                "data" => "05/02",
                "hora" => "18:35",
                "remetente" => "adm",
                "mensagem" => "Obrigado por realizar a compra conosco!",
            ),
        ),
    );
    
    return $info;
};