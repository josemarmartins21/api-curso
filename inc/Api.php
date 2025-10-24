<?php
use Medoo\Medoo;
class Api {
    
    // Checa qual é o metódo utlizado para fazer a requisição
    public static function checkHTTPMethod($httpMethod) {
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== strtoupper($httpMethod)) {
            self::errorMessage(405, 'Method not allowed');
        }
    }

    // Devolve uma msg de erro caso a requisição for feita atravez de um metódo inesperado pelo sistema
    public static function errorMessage($httpCode, $errorMessage) {
        http_response_code($httpCode);

        echo json_encode([
            'status' => 'error',
            'code' => $httpCode,
            'message' => $errorMessage
        ]);
        exit;
    }

    // Retorna uma mensagem de sucesso caso o metódo utilizado para fazer a requisção foi um que o sistema estava a espera
    public static function successMessage($httpCode, $results) {
        http_response_code($httpCode);
        echo json_encode([
            'status' => 'success',
            'code' => $httpCode,
            'message' => 'success',
            'data' => $results,
        ]);
        exit;
    }

    public static function checkBasicAuth()
    {
        if (HTTP_BASIC_AUTH_ACTIVE) {
            if (
                !isset($_SERVER['PHP_AUTH_USER']) ||                                                           !isset($_SERVER['PHP_AUTH_PW']) || 
                $_SERVER['PHP_AUTH_USER'] != HTTP_BASIC_AUTH_USER || 
                $_SERVER['PHP_AUTH_PW'] != HTTP_BASIC_AUTH_PW
            ) 
            {
                Api::errorMessage(401, 'Autorização inválida');
            } 

        }
        return;
    }

    public static function checkAuthClientSecret($postData)
    {
        if (!AUTH_CLIENT_SECRET) return;
        
        $databse = new Medoo(MYSQL);
        
        if (!isset($postData['client_id']) || !isset($postData['client_secret']) ) {
            Api::errorMessage(401, 'Autorização inválida');
        }
        
        $client_id = $postData['client_id'];
        $client_secret = $postData['client_secret'];
        $results = $databse->select('users', '*', ['client_id' => $client_id]);
        if (count($results) === 0) {
           Api::errorMessage(401, 'Autorização inválida');
        } else {
            if (!password_verify($client_secret, $results[0]['client_secret'])) {
                Api::errorMessage(401, 'Autorização inválida');
            }
            
        }
    }

}