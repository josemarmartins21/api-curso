<?php

use Medoo\Medoo;

// Carregamentos do scripts essenciais, como o vendor e a API
require_once __DIR__.'/../../../../config/config_clients_v1.php';
require_once __DIR__.'/../../../../inc/init.php';


// Chamamda do metódo que valida a requisição
Api::checkHTTPMethod('post');

$requestData = json_decode(file_get_contents('php://input'), true);
Api::checkAuthClientSecret($requestData);

// HTTP Basic authentication
Api::checkBasicAuth();

$databse = new Medoo(MYSQL);

// Busca dados de todos os clientes
$results = $databse->select('clients', '*');

// Mensagem sucesso e o resultado que será convertido para JSON
Api::successMessage(200, $results);