<!DOCTYPE html>
<html>
<head>
    <title>Registro de Moradores</title>
    <script src="script.js"></script>
</head>
    <body>

        <h2>Cadastro de Moradores</h2>

        <form action="cadastrar.php" method="POST" onsubmit="return validarFormulario()">
            Nome Completo: <input type="text" id="nome" name="nome" required><br>
            Idade: <input type="number" id="idade" name="idade" required><br>
            CPF: <input type="text" id="cpf" name="cpf" required><br>
            Número do Apartamento: <input type="number" id="apartamento" name="apartamento" required><br>
            Senha (4 dígitos): <input type="password" id="senha" name="senha" required><br>
            <button type="submit">Cadastrar</button>
        </form>
        <br>

        <button onclick="window.location.href='editar.php'">Editar/Excluir Cadastro</button>

        <h2>Buscar Morador</h2>

        <form action="buscar.php" method="GET">
            <input type="text" name="busca" placeholder="Nome ou Sobrenome">
            <button type="submit">Buscar</button>
        </form>
        
    </body>
</html>