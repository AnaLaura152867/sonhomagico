<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
// Conexão com o banco de dados (ajuste conforme necessário)
$host = "sql311.infinityfree.com";
$usuario = "if0_38727661";
$senha = "sua_senha_aqui"; // <--- coloque sua senha real aqui
$banco = "if0_38727661_eventos";

// Conectar
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Receber dados do formulário
$adicional = $_POST['adicional'] ?? '';
$quantidade = $_POST['quantidade'] ?? '';
$valor = $_POST['valor'] ?? '';

// Prevenir SQL Injection
$adicional = $conn->real_escape_string($adicional);
$quantidade = $conn->real_escape_string($quantidade);
$valor = floatval($valor);

// Inserir no banco
$sql = "INSERT INTO adicionais (adicional, quantidade, valor) VALUES ('$adicional', '$quantidade', $valor)";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='text-align:center; color:green;'>Adicional cadastrado com sucesso!</h2>";
    echo "<p style='text-align:center;'><a href='cadastro.html'>Voltar ao cadastro</a></p>";
} else {
    echo "<h2 style='text-align:center; color:red;'>Erro ao cadastrar: " . $conn->error . "</h2>";
}

$conn->close();
?>
