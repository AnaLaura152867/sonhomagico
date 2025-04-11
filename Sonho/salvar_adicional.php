<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
// Configurações de conexão
$host = "sql311.infinityfree.com";
$usuario = "if0_38727661";
$senha = "SUA_SENHA_AQUI"; // <- substitua pela senha correta
$banco = "if0_38727661_eventos";

// Conectar ao banco
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Receber dados do formulário
$id = $_POST['id'] ?? null;
$adicional = $conn->real_escape_string($_POST['adicional'] ?? '');
$quantidade = $conn->real_escape_string($_POST['quantidade'] ?? '');
$valor = floatval($_POST['valor'] ?? 0);

// Verificar se é inserção ou atualização
if ($id) {
    // Atualizar
    $sql = "UPDATE adicionais 
            SET adicional='$adicional', quantidade='$quantidade', valor=$valor 
            WHERE id=$id";
} else {
    // Inserir novo
    $sql = "INSERT INTO adicionais (adicional, quantidade, valor) 
            VALUES ('$adicional', '$quantidade', $valor)";
}

// Executar a query
if ($conn->query($sql) === TRUE) {
    echo "<h2 style='color: green; text-align: center;'>Adicional salvo com sucesso!</h2>";
} else {
    echo "<h2 style='color: red; text-align: center;'>Erro: " . $conn->error . "</h2>";
}

echo "<p style='text-align:center;'><a href='adicionais.html'>Voltar para lista</a></p>";

$conn->close();
?>
