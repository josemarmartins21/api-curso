<?php

use Medoo\Medoo;
require_once __DIR__.'/../../../../config/config_clients_v1.php';
require_once __DIR__.'/../../../../inc/init.php';


Api::checkHTTPMethod('post');

$requestData = json_decode(file_get_contents('php://input'), true);
Api::checkAuthClientSecret($requestData);
$databse = new Medoo(MYSQL);

$results = $databse->select('clients', '*');

Api::successMessage(200, $results);