<?php
require_once '../controllers/EquipamentoController.php';
require_once '../config/config.php';
$controller = new EquipamentoController($pdo);
$equipamentos = $controller->listar();
include 'header.php';
?>

<h2>Gerenciar Equipamentos</h2>

<!-- Formulário de Cadastro -->
<form id="equipamentoForm" method="POST">
    <div class="mb-3">
        <label>Nome do Equipamento:</label>
        <input type="text" class="form-control" name="nome" required>
    </div>
    <div class="mb-3">
        <label>Número de Série:</label>
        <input type="text" class="form-control" name="numero_serie" required>
    </div>
    <div class="mb-3">
        <label>Tipo:</label>
        <select class="form-control" name="tipo">
            <option value="Tensão">Tensão</option>
            <option value="Corrente">Corrente</option>
            <option value="Óleo">Óleo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
</form>

<!-- Lista de Equipamentos -->
<table class="table mt-4">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Número de Série</th>
            <th>Tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($equipamentos as $equipamento): ?>
            <tr>
                <td><?= htmlspecialchars($equipamento['nome']) ?></td>
                <td><?= htmlspecialchars($equipamento['numero_serie']) ?></td>
                <td><?= htmlspecialchars($equipamento['tipo']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'footer.php'; ?>