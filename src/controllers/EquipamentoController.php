<?php
require_once __DIR__ . '/../models/Equipamento.php';

class EquipamentoController {

    private $equipamentoModel;

    public function __construct($pdo) {
        $this->equipamentoModel = new Equipamento($pdo);
    }

    public function criar($dados) {
        if (!isset($dados['nome'], $dados['numero_serie'], $dados['tipo'])) {
            return "Erro: Todos os campos são obrigatórios!";
        }
        return $this->equipamentoModel->criar($dados['nome'], $dados['numero_serie'], $dados['tipo']);
    }

    public function listar() {
        return $this->equipamentoModel->listar();
    }

    public function buscarPorId($id) {
        return $this->equipamentoModel->buscarPorId($id);
    }

    public function atualizar($id, $dados) {
        return $this->equipamentoModel->atualizar($id, $dados['nome'], $dados['numero_serie'], $dados['tipo']);
    }

    public function deletar($id) {
        return $this->equipamentoModel->deletar($id);
    }
    
}