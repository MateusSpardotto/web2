<?php
    require_once "conexao.php"; // Inclui a conexão com o banco

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cpf = preg_replace('/\D/', '', $_POST['cpf']); // Remove pontos e traços do CPF
        $senha = $_POST['senha'];
        $novo_nome = trim(ucwords(strtolower($_POST['novo_nome']))); // Formata o nome corretamente

        // Validações básicas
        if (empty($cpf) || empty($senha) || empty($novo_nome)) {
            die("Todos os campos são obrigatórios.");
        }

        try {
            // Verificar se o usuário existe e se a senha está correta
            $stmt = $pdo->prepare("SELECT senha FROM moradores WHERE cpf = ?");
            $stmt->execute([$cpf]);
            $morador = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$morador) {
                die("Morador não encontrado.");
            }

            // Verifica a senha
            if ($senha != $morador['senha']) {
                die("Senha incorreta.");
            }

            // Atualiza o nome do morador
            $stmt = $pdo->prepare("UPDATE moradores SET nome = ? WHERE cpf = ?");
            $stmt->execute([$novo_nome, $cpf]); // Passa os DOIS parâmetros corretamente

            echo "Nome atualizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao atualizar: " . $e->getMessage();
        }
    } else {
        echo "Método de requisição inválido.";
    }
?>