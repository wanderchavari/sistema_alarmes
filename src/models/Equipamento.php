<?php
require_once __DIR__ . '/../config/config.php';

class Equipamento {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function criar($nome, $numero_serie, $tipo) {
        $sql = "INSERT INTO equipamentos (nome, numero_serie, tipo, dh_cadastro) VALUES (:nome, :numero_serie, :tipo, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome' => $nome,
            ':numero_serie' => $numero_serie,
            ':tipo' => $tipo
        ]);
    }

    public function listar() {
        $sql = "SELECT * FROM equipamentos";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM equipamentos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome, $numero_serie, $tipo) {
        $sql = "UPDATE equipamentos SET nome = :nome, numero_serie = :numero_serie, tipo = :tipo WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nome' => $nome,
            ':numero_serie' => $numero_serie,
            ':tipo' => $tipo
        ]);
    }

    public function deletar($id) {
        $sql = "DELETE FROM equipamentos WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>