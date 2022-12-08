<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\InterfaceControladorRequisicao;

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if(!array_key_exists($caminho, $rotas)){
    http_response_code(404);
    exit();
}

session_start();

$ehRotaDeLogin = stripos($caminho, 'login'); //procura a palavra 'login' no $caminho, se nao tiver e false

if(!isset($_SESSION['logado']) && $ehRotaDeLogin === false){
    header('Location: /login');
    exit();
}

$classeControladora = $rotas[$caminho];

$controlador = new $classeControladora;

$controlador->processaRequisicao();

