<?php
require 'db.php';

$idMedicamento = $_POST['medicamento'] ?? 0;
$peso = $_POST['peso'] ?? 0;

if ($idMedicamento && $peso) {
    $query = $conn->prepare("SELECT * FROM medicamentos WHERE id = :id");
    $query->execute(['id' => $idMedicamento]);
    $medicamento = $query->fetch(PDO::FETCH_ASSOC);

    if ($medicamento) {
        $dosis = $medicamento['dosis_base'] * $peso;
        echo "<h1>Resultado</h1>";
        echo "<p>La dosis recomendada de <strong>{$medicamento['nombre']}</strong> para un paciente con un peso de {$peso} kg es de <strong>{$dosis} mg</strong>.</p>";
    } else {
        echo "<p>Error: Medicamento no encontrado.</p>";
    }
} else {
    echo "<p>Error: Faltan datos para el cálculo.</p>";
}
?>