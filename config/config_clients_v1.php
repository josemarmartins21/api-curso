<?php

// MySQL credentials 
define("MYSQL", [
    // [required]
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'minha_api_pura_clients',
    'username' => 'user_minha_api_pura_clients',
    'password' => 'XIYaR3yAMu545ifeWE8eMoQ3Ka3271',
]);

// Basic Auth
define('HTTP_BASIC_AUTH_ACTIVE', false);
define('HTTP_BASIC_AUTH_USER', 'josimar');
define('HTTP_BASIC_AUTH_PW', 'abc123');

// AUTH BY cliente_id and client secret
define('AUTH_CLIENT_SECRET', true);
