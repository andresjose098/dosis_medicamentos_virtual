<?php
require 'db.php';
$query = $conn->query("SELECT id, nombre, presentacion FROM medicamentos");
$medicamentos = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <title>Calculadora de Dosis</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Calculadora de Dosis</h1>
    <form id="form-dosis" action="calcular_dosis.php" method="POST">
        <div class="mb-3">
            <label for="medicamento" class="form-label">Selecciona un medicamento</label>
            <select class="form-select" id="medicamento" name="medicamento" required>
                <option value="">-- Selecciona --</option>
                <?php foreach ($medicamentos as $medicamento): ?>
                    <option value="<?= $medicamento['id'] ?>">
                        <?= $medicamento['nombre'] ?> - <?= $medicamento['presentacion'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="peso" class="form-label">Peso del paciente (kg)</label>
            <input type="number" step="0.01" class="form-control" id="peso" name="peso" required>
        </div>
        <button type="submit" class="btn btn-primary">Calcular Dosis</button>
    </form>
</div>
</body>
<script>
$(document).ready(function() {
    $('#medicamento').select2(); // Inicializamos select2
});
</script>
</html>
