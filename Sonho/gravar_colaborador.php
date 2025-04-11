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

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$funcao = $_POST['funcao'];
$id = $_POST['id'];

if ($id) {
    $sql = "UPDATE colaboradores SET nome = ?, telefone = ?, funcao = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nome, $telefone, $funcao, $id);
} else {
    $sql = "INSERT INTO colaboradores (nome, telefone, funcao) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $telefone, $funcao);
}

if ($stmt->execute()) {
    header("Location: colaboradores.php");
} else {
    echo "Erro ao salvar: " . $stmt->error;
}

$conn->close();
?>
