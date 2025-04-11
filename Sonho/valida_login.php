<?php
session_start();

// Conexão com o banco
$host = "sql311.infinityfree.com";
$usuario = "if0_38727661";
$senha = "SUA_SENHA_AQUI"; // Substitua pela senha real
$banco = "if0_38727661_eventos";
$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Recebe dados do formulário
$user = $_POST['usuario'];
$pass = $_POST['senha'];

// Busca o usuário
$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

$mensagem = "";

if ($result && $result->num_rows === 1) {
    $dados = $result->fetch_assoc();
    if (password_verify($pass, $dados['senha'])) {
        $_SESSION['usuario'] = $user;
        header("Location: inicial.php"); // <-- REDIRECIONA PARA A PÁGINA CORRETA
        exit;
    } else {
        $mensagem = "Senha incorreta.";
    }
} else {
    $mensagem = "Usuário não encontrado.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <title>Erro de Login</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8d7da;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .mensagem-erro {
      background-color: #fff0f0;
      padding: 30px;
      border: 1px solid #f5c2c7;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      color: #842029;
      text-align: center;
      max-width: 400px;
    }
    .mensagem-erro a {
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      background-color: #f5c2c7;
      color: #842029;
      padding: 10px 20px;
      border-radius: 6px;
      transition: background-color 0.3s;
    }
    .mensagem-erro a:hover {
      background-color: #e4b3b7;
    }
  </style>
</head>
<body>
  <div class="mensagem-erro">
    <h2>Erro ao fazer login</h2>
    <p><?= htmlspecialchars($mensagem) ?></p>
    <a href="index.html">Voltar para o login</a>
  </div>
</body>
</html>
