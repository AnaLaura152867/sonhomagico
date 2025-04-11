<?php
// Conexão
$host = "sql311.infinityfree.com";
$usuario = "if0_38727661";
$senha = "SUA_SENHA_AQUI"; // Substitua pela senha real
$banco = "if0_38727661_eventos";
$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM colaboradores WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: colaboradores.php");
} else {
    echo "Erro ao excluir: " . $stmt->error;
}

$conn->close();
?>
