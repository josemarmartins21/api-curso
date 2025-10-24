<?php
use Medoo\Medoo;

// Carregamentos do scripts essenciais, como o vendor e a API
require_once __DIR__.'/../../config/config_clients_v1.php';
require_once __DIR__.'/../../inc/init.php';


$db = new Medoo(MYSQL); 

Api::checkBasicAuth();

$livros = $db->select('livros', '*', 'id[<]', 3);

foreach ($livros as $livro) {
    echo $livro['nome'] . " escrito por ---- " . $livro['autor']. PHP_EOL;
}



