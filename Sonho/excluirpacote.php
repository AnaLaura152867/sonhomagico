<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
// Conexão com o banco
$host = "sql311.infinityfree.com";
$usuario = "if0_38727661";
$senha = "SUA_SENHA_AQUI"; // Substitua pela sua senha real
$banco = "if0_38727661_eventos";

$conn = new mysqli($host, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Verifica se o ID foi passado
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Executa exclusão
    $sql = "DELETE FROM pacotes WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: pacotes.php"); // Redireciona de volta para a lista
        exit;
    } else {
        echo "<p style='text-align:center; color:red;'>Erro ao excluir pacote: " . $conn->error . "</p>";
    }
} else {
    echo "<p style='text-align:center; color:red;'>ID do pacote não informado.</p>";
}

$conn->close();
?>
