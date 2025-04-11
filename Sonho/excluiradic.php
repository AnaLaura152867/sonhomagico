<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
$host = "sql311.infinityfree.com";
$usuario = "if0_38727661";
$senha = "SUA_SENHA_AQUI"; // Coloque sua senha real
$banco = "if0_38727661_eventos";

$conn = new mysqli($host, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$id = $_GET['id'] ?? '';

if ($id) {
    $stmt = $conn->prepare("DELETE FROM adicionais WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: adicional.php?msg=excluido");
        exit;
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "ID inválido.";
}

$conn->close();
?>
