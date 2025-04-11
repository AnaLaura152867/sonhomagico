<?php
// Conexão com o banco de dados
$host = "sql311.infinityfree.com";
$usuario = "if0_38727661";
$senha = "SUA_SENHA_AQUI"; // Substitua pela senha real
$banco = "if0_38727661_eventos";
$conn = new mysqli($host, $usuario, $senha, $banco);

$nome = "";
$telefone = "";
$funcao = "";
$id = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM colaboradores WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows > 0) {
        $dados = $res->fetch_assoc();
        $nome = $dados['nome'];
        $telefone = $dados['telefone'];
        $funcao = $dados['funcao'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Manutenção de Colaboradores</title>
  <style>
    body {
      margin: 0;
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background: linear-gradient(135deg, #f6bcd3, #b2ebf2);
    }

    header {
      background: rgba(255,255,255,0.6);
      padding: 20px;
      text-align: center;
      position: relative;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .logo {
      position: absolute;
      left: 20px;
      top: 10px;
      width: 70px;
      height: 70px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid white;
    }

    h1 {
      color: #87cfe3;
    }

    main {
      max-width: 600px;
      margin: 40px auto;
      background: rgba(255,255,255,0.95);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    button {
      margin-top: 25px;
      background-color: #87cfe3;
      color: white;
      border: none;
      padding: 12px 24px;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #6cb6cd;
    }
  </style>
</head>
<body>
  <header>
    <img src="sonho.jpg" alt="Logo" class="logo">
    <h1><?= $id ? "Editar Colaborador" : "Novo Colaborador" ?></h1>
  </header>
  <main>
    <form action="gravar_colaborador.php" method="post">
      <input type="hidden" name="id" value="<?= $id ?>">
      
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($nome) ?>" required>

      <label for="telefone">Telefone:</label>
      <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($telefone) ?>" required>

      <label for="funcao">Função:</label>
      <select id="funcao" name="funcao" required>
        <option value="">Selecione</option>
        <option value="Monitor" <?= $funcao == 'Monitor' ? 'selected' : '' ?>>Monitor</option>
        <option value="Garçom" <?= $funcao == 'Garçom' ? 'selected' : '' ?>>Garçom</option>
      </select>

      <button type="submit">Salvar</button>
    </form>
  </main>
</body>
</html>

<?php $conn->close(); ?>
