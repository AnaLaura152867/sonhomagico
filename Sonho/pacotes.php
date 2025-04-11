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

// Conecta
$conn = new mysqli($host, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Busca os pacotes
$sql = "SELECT id, quantidade, segsex, fds FROM pacotes ORDER BY quantidade";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista de Pacotes - Sonho Mágico</title>
  <style>
    body {
      margin: 0;
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background: linear-gradient(135deg, #f6bcd3, #b2ebf2);
      color: #444;
    }

    header {
      background: rgba(255,255,255,0.6);
      padding: 20px;
      text-align: center;
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
      font-size: 32px;
      color: #87cfe3;
    }

    main {
      max-width: 800px;
      margin: 40px auto;
      background: rgba(255,255,255,0.9);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      border-bottom: 1px solid #ccc;
      text-align: left;
    }

    th {
      background-color: #a8e6cf;
      color: #fff;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    a.btn {
      background-color: #87cfe3;
      color: white;
      padding: 8px 14px;
      border-radius: 8px;
      text-decoration: none;
      transition: 0.3s;
    }

    a.btn:hover {
      background-color: #71bad1;
    }

    .back {
      display: block;
      margin-top: 30px;
      text-align: center;
      color: #666;
      text-decoration: none;
      font-size: 14px;
    }
  </style>
</head>
<body>

<header>
  <img src="sonho.jpg" alt="Logo" class="logo">
  <h1>Lista de Pacotes</h1>
</header>

<main>
  <?php if ($result && $result->num_rows > 0): ?>
    <table>
      <tr>
        <th>Convidados</th>
        <th>Seg a Sex (R$)</th>
        <th>Sáb/Dom/Feriado (R$)</th>
        <th>Ação</th>
      </tr>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['quantidade']) ?></td>
          <td><?= number_format($row['segsex'], 2, ',', '.') ?></td>
          <td><?= number_format($row['fds'], 2, ',', '.') ?></td>
          <td>
            <a class="btn"
               href="manutencaopacote.html?id=<?= $row['id'] ?>&quantidade=<?= urlencode($row['quantidade']) ?>&segsex=<?= $row['segsex'] ?>&fds=<?= $row['fds'] ?>">
              Editar
            </a>
            <a class="btn" href="excluirpacote.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este pacote?')">Excluir</a>

          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  <?php else: ?>
    <p style="text-align:center;">Nenhum pacote cadastrado ainda.</p>
  <?php endif; ?>
  <a class="back" href="manutencaopacote.html">Cadastrar novo pacote</a>
</main>

</body>
</html>

<?php
$conn->close();
?>
