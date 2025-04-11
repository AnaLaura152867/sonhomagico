<?php
$id_orcamento = isset($_GET['id_orcamento']) ? intval($_GET['id_orcamento']) : 0;
if ($id_orcamento <= 0) {
    die("ID do orçamento inválido.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Registrar Pagamento</title>
  <style>
    body {
      margin: 0;
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background: linear-gradient(135deg, #f6bcd3, #b2ebf2);
      color: #333;
    }

    main {
      max-width: 600px;
      margin: 80px auto;
      background: rgba(255, 255, 255, 0.9);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      color: #87cfe3;
      font-size: 32px;
      margin-bottom: 30px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 16px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #87cfe3;
      color: #fff;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      font-size: 18px;
      cursor: pointer;
    }

    button:hover {
      background-color: #6ac0d5;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #87cfe3;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <main>
    <h1>Registrar Pagamento</h1>
    <form action="salvar_pagamento.php" method="POST">
      <input type="hidden" name="id_orcamento" value="<?= $id_orcamento ?>">

      <label for="valor">Valor Pago (R$):</label>
      <input type="number" name="valor" id="valor" step="0.01" min="0" required>

      <label for="data_pagamento">Data do Pagamento:</label>
      <input type="date" name="data_pagamento" id="data_pagamento" required value="<?= date('Y-m-d') ?>">

      <label for="forma_pagamento">Forma de Pagamento:</label>
      <select name="forma_pagamento" id="forma_pagamento" required>
        <option value="">Selecione</option>
        <option value="Pix">Pix</option>
        <option value="Cartão de Crédito">Cartão de Crédito</option>
        <option value="Cartão de Débito">Cartão de Débito</option>
        <option value="Dinheiro">Dinheiro</option>
      </select>

      <button type="submit">Salvar Pagamento</button>
    </form>

    <a href="contratos.php">← Voltar para contratos</a>
  </main>
</body>
</html>
