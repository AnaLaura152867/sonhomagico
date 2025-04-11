<?php
// Conexão com o banco
$host = "sql311.infinityfree.com";
$usuario = "if0_38727661";
$senha = "SUA_SENHA_AQUI"; // Substitua pela sua senha real
$banco = "if0_38727661_eventos";

$conn = new mysqli($host, $usuario, $senha, $banco);
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Receber os dados do formulário
$id_orcamento = isset($_POST['id_orcamento']) ? intval($_POST['id_orcamento']) : 0;
$valor = isset($_POST['valor']) ? floatval($_POST['valor']) : 0;
$data_pagamento = isset($_POST['data_pagamento']) ? $_POST['data_pagamento'] : '';
$forma_pagamento = isset($_POST['forma_pagamento']) ? $_POST['forma_pagamento'] : '';

if ($id_orcamento > 0 && $valor > 0 && $data_pagamento && $forma_pagamento) {
    // Inserir o pagamento na tabela pagamentos
    $stmt = $conn->prepare("INSERT INTO pagamentos (id_orcamento, valor, data_pagamento, forma_pagamento) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("idss", $id_orcamento, $valor, $data_pagamento, $forma_pagamento);
    if ($stmt->execute()) {
        header("Location: contratos.php");
        exit;
    } else {
        echo "Erro ao salvar pagamento: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Dados inválidos!";
}

$conn->close();
?>
