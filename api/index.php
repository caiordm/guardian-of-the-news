<?php

header("Access-Control-Allow-Origin: *");

// Header para identificar minha aplicação
$headers = array(
    'User-Agent: GuardianOfTheNews/1.0'
);

// Url da API do NewsAPI
$url = 'https://newsapi.org/v2/top-headlines?country=us&apiKey=5742b25cc0294dfca865018611b079d7';


// Iniciando o cURL
$curl = curl_init($url);


// Configurando as bibliotecas do cURL
// Esse diz que a requisição deve ser retornada em uma string
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Esse aqui ta enviando cabeçalhos HTTP com a requisição, no caso enviando $headers
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// Executando a requisição
$response = curl_exec($curl);

$data = json_encode($response, true);

echo $data;
?>
