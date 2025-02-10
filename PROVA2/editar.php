<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Morador</title>
</head>
    <body>
        <h2>Alterar ou Excluir Cadastro</h2>
        <form action="editadb.php" method="POST">
            <input type="text" name="cpf" placeholder="Digite seu CPF">
            <input type="password" name="senha" placeholder="Senha">
            <input type="text" name="novo_nome" placeholder="Novo nome">
            <button type="submit">Alterar</button>
        </form>

        <h2>Excluir Cadastro</h2>
        <form action="excluir.php" method="POST">
            <input type="text" name="cpf" placeholder="Digite seu CPF">
            <input type="password" name="senha" placeholder="Senha">
            <button type="submit">Excluir</button>
        </form>
    </body>
</html>