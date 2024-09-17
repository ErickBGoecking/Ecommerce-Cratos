<?php
function gerarTokenCorreiosNovo()
{
    $url = 'https://api.correios.com.br/token/v1/autentica/cartaopostagem';
    $data = array(
        "numero" => "0077783832"
    );
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Basic NDc0Njc5NjIwMDAxMTk6cFRJcEN4UnpoV0I4V1c1Y0VSakpkcjRHSlRnWUVncWRMaE1rcElWbQ=='
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Erro ao chamar a API: ' . curl_error($ch);
    }
    curl_close($ch);
    $responseData = json_decode($response, true);
    if ($responseData === null) {
        echo 'Erro ao decodificar a resposta JSON';
    } else {
        return $responseData['token'];
    }
}

//gerar uma data e hora com 24 horas futuras
function dataVinteQuatroHoras()
{
    $currentDateTime2 = new DateTime();
    $currentDateTime2->add(new DateInterval('P1D'));
    $novaDataHora2 = $currentDateTime2->format('Y-m-d H:i:s');
    return $novaDataHora2;
}

//verificar se é sabado ou domingo para usar o proximo dia util para envio dos correios
function proximoDiaUtil($data)
{
    $diaSemana = date('N', strtotime($data)); // Obtém o dia da semana (1 para segunda-feira, 7 para domingo)

    // Verifica se é sábado (6) ou domingo (7)
    if ($diaSemana == 6 || $diaSemana == 7) {
        // Se sim, adiciona 1 ou 2 dias para ir para segunda-feira
        $data = date('Y-m-d', strtotime("next Monday", strtotime($data)));
    } elseif ($diaSemana == 5) {
        // Se for segunda-feira (1), adiciona 1 dia para ir para terça-feira
        $data = date('Y-m-d', strtotime("+3 day", strtotime($data)));
    }
    return $data;
}

//verificar se o token dos correios esta expirado
function isTokenExpired($expirationTime)
{
    $currentDate = new DateTime();
    $expirationDateTime = new DateTime($expirationTime);
    if ($expirationDateTime <= $currentDate) {
        return false;
    } else {
        return true;
    }
}

function enderecoCorreiosCep($tokenCorreios, $cepCliente)
{
    $token = "$tokenCorreios";
    $url = 'https://api.correios.com.br/cep/v2/enderecos/';
    $cep = "$cepCliente";
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url . $cep,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'Accept: application/json',
            'Authorization: Bearer ' . $token
        ]
    ]);
    $response = curl_exec($curl);
    if ($response === false) {
        echo 'Erro ao buscar endereço: ' . curl_error($curl);
    } else {
        $data = json_decode($response, true);
        return $data;
//        echo $data['cep'];
//    echo'<pre>';
//    var_dump($data);
//    echo'</pre>';
    }
    curl_close($curl);
}

//calcular frete
function calcularFreteNovo($cepPost)
{
    // calcular valor do frente entre ceps

    //04162 – SEDEX CONTRATO AGENCIA / Pacote ENCOMENDA 1
    //4170 – SEDEX Reverso / Pacote ENCOMENDA 1
    //04669 – PAC CONTRATO AGENCIA / Pacote ENCOMENDA 1
    //4677 – PAC Reverso / Pacote ENCOMENDA 1

    //04553 – SEDEX CONTRATO AGENCIA TA/ Pacote ENCOMENDA BÁSICO
    //4928 – SEDEX Reverso
    //04596 – PAC CONTRATO AGENCIA TA
    //4936 - PAC Reverso

    //04391 mini envio ou 04235 ou 04227 depende o tipo de contrato

    //                                no contrato do Pedro achei:
    //                                03298 - PAC CONTRATO AG
    //                                03140 - SEDEX 12 CONTRATO AG
    //                                03158 - SEDEX 10 CONTRATO AG
    //                                03174 - SEDEX 12 REVERSO
    //                                03182 - SEDEX 10 REVERSO
    //                                03190 - SEDEX HOJE REVERSO
    //                                03204 - SEDEX HOJE CONTRATO AG
    //                                03212 - SEDEX CONTR GRAND FORMATO
    //                                03220 - SEDEX CONTRATO AG
    //                                03247 - SEDEX REVERSO
    //                                03271 - SEDEX CONTRATO PGTO ENTREGA
    //                                03298 - PAC CONTRATO AG
    //                                03301 - PAC REVERSO
    //                                03310 - PAC CONTRATO PGTO ENTREGA
    //                                03328 - PAC CONTR GRAND FORMATO
    //                                03352 - SEDEX KIT
    //                                03662 - SEDEX HOJE EMPRESARIAL
    //                                04000 - PAC PC CONTRATO AG
    //                                04090 - SEDEX PC CONTRATO AG
    //                                04219 - SEDEX KIT ISENCAO
    //                                04227 - CORREIOS MINI ENVIOS CTR AG
    //                                04960 - DESVIO MINI ENVIOS AG
    //                                05991 - LOGISTICA REVERSA SEDEX PC
    $tipoFrete = '03220';
    $cepOrigem = '35012170';
    $cepDestino = $cepPost;
    $nuRequisicao = '03220';
    $nuContrato = '9912610699';
    $nuDR = '20';
    $psObjeto = '0.5';
    $tpObjeto = '2';
    $comprimento = '15';
    $largura = '10';
    $altura = '1';
    $dataUtil = date('d-m-Y');
    $listarToken = listarGeral('token, expiracao', 'fretetoken');
    if ($listarToken) {
        foreach ($listarToken as $itemFreteToken) {
            $dataExpiracao = $itemFreteToken->expiracao;
            $tokenAtivo = $itemFreteToken->token;
        }
        if (isTokenExpired($dataExpiracao)) {
            $tokenNovo = $tokenAtivo;
        } else {
            $novoTokenGerado = gerarTokenCorreiosNovo();
            $novaData24h = dataVinteQuatroHoras();
            $retornoNovoToken = upDois('fretetoken', 'token', 'expiracao', 'idfretetoken', "$novoTokenGerado", "$novaData24h", 1);
            $tokenNovo = $novoTokenGerado;
        }
    } else {
        $tokenNovo = '';
    }
    $dtEvento = proximoDiaUtil($dataUtil);
    $token = $tokenNovo;
    $url = "https://api.correios.com.br/preco/v1/nacional/$tipoFrete?cepDestino=$cepDestino&nuRequisicao=$nuRequisicao&nuContrato=$nuContrato&nuDR=$nuDR&cepOrigem=$cepOrigem&psObjeto=$psObjeto&tpObjeto=$tpObjeto&comprimento=$comprimento&largura=$largura&altura=$altura";
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            'accept: application/json',
            'Authorization: Bearer ' . $token,
        ],
    ]);
    $response = curl_exec($curl);
    if ($response === false) {
        echo "Erro ao realizar a requisição: " . curl_error($curl);
    } else {
        $data = json_decode($response, true);
        if ($data === null) {
            echo "Erro ao decodificar a resposta JSON: " . json_last_error_msg();
        } else {
//                                        print_r($data);
//                                        echo "Valor: " . $data['pcFinal'];
            $url = "https://api.correios.com.br/prazo/v1/nacional/$tipoFrete?cepOrigem=$cepOrigem&cepDestino=$cepDestino&dtEvento=$dtEvento";
            $options = [
                'http' => [
                    'header' => "Accept: application/json\r\n" .
                        "Authorization: Bearer $token\r\n"
                ]
            ];
            $context = stream_context_create($options);
            $response = file_get_contents($url, false, $context);
            if ($response === false) {
                echo "Erro ao acessar a API dos Correios.";
            } else {
                $dataPrazo = json_decode($response, true);
                if ($dataPrazo !== null) {
                    $retonrnoEndereco = enderecoCorreiosCep($token, $cepPost);
                    $cepCliente = $retonrnoEndereco['cep'];
                    $ufCliente = $retonrnoEndereco['uf'];
                    $cidadeCliente = $retonrnoEndereco['localidade'];
                    $ruaCliente = $retonrnoEndereco['logradouro'];
                    $tipoLogradouroCliente = $retonrnoEndereco['tipoLogradouro'];
                    $nomeRuaCliente = $retonrnoEndereco['nomeLogradouro'];
                    $nomeRuaAbreviadoCliente = $retonrnoEndereco['abreviatura'];
                    $bairroCliente = $retonrnoEndereco['bairro'];
                    $_SESSION['enderecoFrete'] = $ruaCliente . ', ' . $bairroCliente . ' - ' . $cidadeCliente . ' - ' . $ufCliente . ' | ' . $cepCliente;
                    $_SESSION['valorFrete'] = $data['pcFinal'];
                    $_SESSION['prazoEntrega'] = $dataPrazo['prazoEntrega'];
//                    echo "Valor: " . $data['pcFinal'] . "\n";
//                    echo " - Prazo: " . $dataPrazo['prazoEntrega'] . " dia(s)\n";
                    $enderecoCompleto = $_SESSION['enderecoFrete'];
                    $valorFrete = $_SESSION['valorFrete'];
                    $prazo = $_SESSION['prazoEntrega'];
                    if ($prazo > 1) {
                        $dia = 'Dias';
                    } else {
                        $dia = 'Dia';
                    }
                    echo "<div class='text-secondary text-small'><strong style='font-size: larger'>SEDEX R$ $valorFrete</strong></div>";
                    echo "<div class='text-secondary text-small'><i class='mdi mdi-truck'></i>&nbsp;receber em até <strong>$prazo $dia útil</strong></div>";
                    echo "<div class='row'><div class='col-12 bg-cidade-frete box-bg'><span class='mdi mdi-map-marker-radius frete-icon'></span><p style='font-size:small'>$enderecoCompleto</p><span class='alterar-config float-end'>alterar</span></div></div>";


//                    echo $data['pcFinal'];
//                                                echo "Data Máxima de Entrega: " . $dataPrazo['dataMaxima'] . "\n";
//                                                echo "Entrega Domiciliar: " . $dataPrazo['entregaDomiciliar'] . "\n";
//                                                echo "Entrega aos Sábados: " . $dataPrazo['entregaSabado'] . "\n";
                } else {
                    echo "Erro ao decodificar a resposta JSON.";
                }
            }
        }
    }
    curl_close($curl);
}
function converterParaFloat($valor) {
    // Substitui a vírgula por um ponto
    $valor = str_replace(',', '.', $valor);
    // Converte o valor para float
    return floatval($valor);
}