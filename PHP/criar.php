<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer uma nova operação</title>
</head>
<body>
    <h1>Adicionar uma nova Operação</h1>

    <h2>Adicionar Nova Tarefa</h2> <br>
    <form action="salvar.php" method="post">
        <label for="Nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="Idade">Idade:</label>
        <input type="number" id="idade" name="idade" required><br><br>
        <label for="escrita">Resenha:</label><br>
        <textarea id="escrita" name="escrita" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Adicionar">
    </form>
    
    <!-- Adicione um botão de exclusão com confirmação -->
    
    <p><a href="index.php">Voltar para a Lista de Operações</a></p>
</body>
</html>

