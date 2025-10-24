<?php

use Medoo\Medoo;
require_once __DIR__.'/../../../../config/config_clients_v1.php';
require_once __DIR__.'/../../../../inc/init.php';


Api::checkHTTPMethod('post');

$requestData = json_decode(file_get_contents('php://input'), true);
Api::checkAuthClientSecret($requestData);


// Validations 
if (!key_exists('id', $requestData)) {
    Api::errorMessage(400, 'O campo id é obrigatorio e deve conter um valor numerico');
}

if (!is_numeric($requestData['id'])) {
    Api::errorMessage(400, 'O campo id deve ser um número');

}

$databse = new Medoo(MYSQL);

$results = $databse->select('clients', '*', ['id' => $requestData['id']]);

Api::successMessage(200, $results);