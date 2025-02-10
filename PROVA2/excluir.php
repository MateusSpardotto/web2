<?php
    require_once "conexao.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cpf = preg_replace('/\D/', '', $_POST['cpf']);
        $senha = $_POST['senha'];

        if (empty($cpf) || empty($senha)) {
            die("CPF e senha são obrigatórios.");
        }

        try {
            // Buscar o morador pelo CPF
            $stmt = $pdo->prepare("SELECT senha FROM moradores WHERE cpf = ?");
            $stmt->execute([$cpf]);
            $morador = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$morador) {
                die("Morador não encontrado.");
            }

            // Verificar a senha
            if ($senha != $morador['senha']) {
                die("Senha incorreta.");
            }

            // Excluir o morador
            $stmt = $pdo->prepare("DELETE FROM moradores WHERE cpf = ?");
            $stmt->execute([$cpf]);

            echo "Morador excluído com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao excluir: " . $e->getMessage();
        }
    } else {
        echo "Método de requisição inválido.";
    }
?>
