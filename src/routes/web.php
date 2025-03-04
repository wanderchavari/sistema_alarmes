<?php
require_once '../config/config.php';
require_once '../controllers/EquipamentoController.php';

$equipamentoController = new EquipamentoController($pdo);

// Obtém a rota da URL
$requestUri = $_SERVER['REQUEST_URI'];

// Define as rotas da aplicação
switch (true) {
    case preg_match('/^\/equipamentos$/', $requestUri):
        $equipamentoController->listar();
        break;

    case preg_match('/^\/equipamento\/criar$/', $requestUri) && $_SERVER['REQUEST_METHOD'] === 'POST':
        $equipamentoController->criar($_POST);
        break;

    case preg_match('/^\/equipamento\/editar\/(\d+)$/', $requestUri, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST':
        $equipamentoController->atualizar($matches[1], $_POST);
        break;

    case preg_match('/^\/equipamento\/deletar\/(\d+)$/', $requestUri, $matches) && $_SERVER['REQUEST_METHOD'] === 'POST':
        $equipamentoController->deletar($matches[1]);
        break;

    default:
        http_response_code(404);
        echo json_encode(["erro" => "Rota não encontrada"]);
        break;
}
