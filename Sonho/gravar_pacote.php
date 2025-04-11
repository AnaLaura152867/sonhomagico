<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
// Conexão com o banco
$host = "sql311.infinityfree.com";
$usuario = "if0_38727661";
$senha = "SUA_SENHA_AQUI"; // Substitua pela senha real
$banco = "if0_38727661_eventos";

$conn = new mysqli($host, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Receber dados
$id         = $_POST['id'] ?? '';
$quantidade = $conn->real_escape_string($_POST['quantidade'] ?? '');
$segsex     = floatval($_POST['segsex'] ?? 0);
$fds        = floatval($_POST['fds'] ?? 0);

if ($id) {
    // Atualizar pacote existente
    $sql = "UPDATE pacotes SET quantidade='$quantidade', segsex=$segsex, fds=$fds WHERE id=$id";
} else {
    // Inserir novo pacote
    $sql = "INSERT INTO pacotes (quantidade, segsex, fds) VALUES ('$quantidade', $segsex, $fds)";
}

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='text-align:center; color:green;'>Pacote salvo com sucesso!</h2>";
    echo "<p style='text-align:center;'><a href='pacotes.php'>Voltar para lista de pacotes</a></p>";
} else {
    echo "<h2 style='text-align:center; color:red;'>Erro ao salvar: " . $conn->error . "</h2>";
}

$conn->close();
?>
