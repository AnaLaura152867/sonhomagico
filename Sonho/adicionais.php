<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Pacotes - Sonho Mágico</title>
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
      position: relative;
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

    .btn {
      background-color: #87cfe3;
      color: white;
      padding: 10px 16px;
      border-radius: 10px;
      text-decoration: none;
      display: inline-block;
      margin-bottom: 20px;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #71bad1;
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
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body
