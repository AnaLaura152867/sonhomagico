session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Manutenção de Adicional - Sonho Mágico</title>
  <style>
    body {
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background: linear-gradient(135deg, #f6bcd3, #b2ebf2);
      margin: 0;
    }

    main {
      max-width: 600px;
      margin: 40px auto;
      background-color: rgba(255,255,255,0.9);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #87cfe3;
    }

    label {
      display: block;
      margin-top: 20px;
      font-weight: bold;
      color: #444;
    }

    input, select {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      margin-top: 5px;
    }

    button {
      margin-top: 30px;
      padding: 12px 20px;
      font-size: 16px;
      border: none;
      background-color: #a8e6cf;
      color: white;
      border-radius: 10px;
      cursor: pointer;
    }

    button:hover {
      background-color: #93d9c0;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 20px;
      text-decoration: none;
      color: #555;
    }
  </style>
</head>
<body>
<main>
  <h1><?php echo isset($_GET['id']) ? 'Editar Adicional' : 'Novo Adicional'; ?></h1>

  <form action="salvar_adicional.php" method="post">
    <!-- Se estiver editando, envia o ID escondido -->
    <?php if (isset($_GET['id'])): ?>
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>">
    <?php endif; ?>

    <label for="adicional">Adicional:</label>
    <input type="text" id="adicional" name="adicional" value="<?php echo $_GET['adicional'] ?? ''; ?>" required>

    <label for="quantidade">Quantidade:</label>
    <select id="quantidade" name="quantidade" required>
      <option value="">Selecione</option>
      <?php
        $opcoes = ["Porção", "Pacote", "Unidade", "Evento", "Atividade", "1 Hora", "Apresentação"];
        foreach ($opcoes as $opcao) {
          $selecionado = (isset($_GET['quantidade']) && $_GET['quantidade'] == $opcao) ? 'selected' : '';
          echo "<option value=\"$opcao\" $selecionado>$opcao</option>";
        }
      ?>
    </select>

    <label for="valor">Valor (R$):</label>
    <input type="number" id="valor" name="valor" step="0.01" value="<?php echo $_GET['valor'] ?? ''; ?>" required>

    <button type="submit">Salvar</button>
  </form>

  <a href="adicionais.html">Voltar</a>
</main>
</body>
</html>
