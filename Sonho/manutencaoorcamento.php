<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Orçamentos</title>
  <style>
    body {
      margin: 0;
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background: linear-gradient(135deg, #f6bcd3, #b2ebf2);
      color: #87cfe3;
    }

    header {
      background: rgba(255, 255, 255, 0.6);
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
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

    nav {
      display: flex;
      gap: 40px;
    }

    .menu {
      position: relative;
    }

    .menu > a {
      color: #87cfe3;
      text-decoration: none;
      font-size: 20px;
      font-weight: bold;
      padding: 8px;
    }

    .submenu {
      display: none;
      position: absolute;
      background-color: #ffffff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.15);
      top: 100%;
      left: 0;
      border-radius: 10px;
      z-index: 1000;
    }

    .submenu a {
      color: #555;
      padding: 10px 15px;
      text-decoration: none;
      display: block;
      border-bottom: 1px solid #eee;
    }

    .submenu a:hover {
      background-color: #f6bcd3;
    }

    .menu:hover .submenu {
      display: block;
    }

    main {
      padding: 40px 30px;
      max-width: 1200px;
      margin: 30px auto;
      background-color: rgba(255,255,255,0.8);
      border-radius: 20px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    h1 {
      text-align: center;
      font-size: 36px;
      margin-bottom: 40px;
      color: #87cfe3;
    }

    a.botao-adicionar {
      background-color: #a8e6cf;
      color: white;
      padding: 12px 24px;
      text-decoration: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: bold;
      display: inline-block;
      margin-bottom: 20px;
    }

    a.botao-adicionar:hover {
      background-color: #93d9c0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #ffffff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    th, td {
      padding: 14px;
      text-align: center;
      border-bottom: 1px solid #eee;
      color: #444;
    }

    th {
      background-color: #f6bcd3;
      color: #555;
    }

    .acoes a {
      padding: 6px 12px;
      margin: 2px;
      font-size: 14px;
      border-radius: 8px;
      text-decoration: none;
      display: inline-block;
      transition: background-color 0.3s ease;
    }

    .editar {
      background-color: #87cfe3;
      color: white;
    }

    .excluir {
      background-color: #f67280;
      color: white;
    }

    .contrato {
      background-color: #b39ddb;
      color: white;
    }

    .acoes a:hover {
      opacity: 0.9;
    }

    .fechado {
      background-color: #a8e6cf;
      color: #fff;
      padding: 5px 10px;
      border-radius: 8px;
      font-weight: bold;
    }

    .aberto {
      background-color: #ffd54f;
      color: #000;
      padding: 5px 10px;
      border-radius: 8px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<header>
  <img src="logo.png" alt="Logo" class="logo">
  <nav>
    <div class="menu"><a href="inicial.php">Início</a></div>
    <div class="menu">
      <a href="#">Cadastros</a>
      <div class="submenu">
        <a href="adicionais.php">Adicionais</a>
        <a href="pacotes.php">Pacotes</a>
        <a href="colaboradores.php">Colaboradores</a>
      </div>
    </div>
    <div class="menu"><a href="orcamentos.php">Orçamentos</a></div>
    <div class="menu"><a href="contratos.php">Contratos</a></div>
  </nav>
</header>

<main>
  <h1>Lista de Orçamentos</h1>

  <a href="manutencaoorcamento.php" class="botao-adicionar">+ Novo Orçamento</a>

  <table>
    <thead>
      <tr>
        <th>Cliente</th>
        <th>Data</th>
        <th>Hora</th>
        <th>Pacote</th>
        <th>Valor Total</th>
        <th>Entrada</th>
        <th>Status</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>João Silva</td>
        <td>20/04/2025</td>
        <td>16:00</td>
        <td>Pacote Ouro</td>
        <td>R$ 1.500,00</td>
        <td>R$ 450,00</td>
        <td><span class="fechado">Fechado</span></td>
        <td class="acoes">
          <a href="manutencaoorcamento.php?id=1" class="editar">Editar</a>
          <a href="#" class="excluir">Excluir</a>
          <a href="contrato.php?id=1" class="contrato">Contrato</a>
        </td>
      </tr>
      <tr>
        <td>Maria Oliveira</td>
        <td>28/04/2025</td>
        <td>18:30</td>
        <td>Pacote Prata</td>
        <td>R$ 1.200,00</td>
        <td>R$ 360,00</td>
        <td><span class="aberto">Aberto</span></td>
        <td class="acoes">
          <a href="manutencaoorcamento.php?id=2" class="editar">Editar</a>
          <a href="#" class="excluir">Excluir</a>
          <a href="contrato.php?id=2" class="contrato">Contrato</a>
        </td>
      </tr>
    </tbody>
  </table>
</main>

</body>
</html>
