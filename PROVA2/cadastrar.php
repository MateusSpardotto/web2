<?php
    require_once "conexao.php";

    $nome = trim(ucwords(strtolower($_POST['nome'])));
    $idade = intval($_POST['idade']);
    $cpf = preg_replace('/\D/', '', $_POST['cpf']);
    $apartamento = intval($_POST['apartamento']);
    $senha = $_POST['senha'];

    if ($idade < 18 || strlen($cpf) != 11 || !preg_match('/^\d{4}$/', $senha)) {
        die("Dados inválidos!");
    }

    $stmt = $pdo->prepare("INSERT INTO moradores (nome, idade, cpf, apartamento, senha) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $idade, $cpf, $apartamento, $senha]);

    echo "Morador cadastrado com sucesso!";
?>
