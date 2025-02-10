<?php
    require_once "conexao.php";

    if (!isset($_GET['busca']) || empty(trim($_GET['busca']))) {
        die("Por favor, insira um nome ou sobrenome para buscar.");
    }
    
    $busca = "%" . trim($_GET['busca']) . "%";
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM moradores WHERE nome LIKE ?");
        $stmt->execute([$busca]);
        $moradores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        if (count($moradores) > 0) {
            foreach ($moradores as $morador) {
                echo "Nome: " . htmlspecialchars($morador['nome']) . " - Apartamento: " . $morador['apartamento'] . "<br>";
            }
        } else {
            echo "Nenhum morador encontrado.";
        }
    } catch (PDOException $e) {
        echo "Erro ao buscar moradores: " . $e->getMessage();
    }
?>