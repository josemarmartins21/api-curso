<?php

// Require Composer's autoloader
require 'vendor/autoload.php';

// Import Medoo namespace
use Medoo\Medoo;

// Initialize database connection
$database = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'api_test',
    'username' => 'josemar_api_test',
    'password' => 'mafo87Ba4isOke2ux5Qoga58nIcEmi'
]);

// Buscar dados
$data = $database->select('clientes', '*');

print_r($data);

