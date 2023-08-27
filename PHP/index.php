<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Operações</title>
</head>
<body>
<h1>Lista de Operações</h1>
<table>
    <tr>
        <th>Nome</th>
        <th>Idade</th>
        <th>Resenha</th>
        <th>Ações</th>
    </tr>
    <?php
    $conectar = new mysqli("localhost", "root", "", "temporario");
    if ($conectar->connect_error) {
        die("A conexão falhou: " . $conectar->connect_error);
    }
    
    $sql = "SELECT id_info, nome, idade, escrita FROM informado";
    $resultado = $conectar->query($sql);
    
    if ($resultado->num_rows > 0) {
        while ($campo = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $campo["nome"] . "</td>";
            echo "<td>" . $campo["idade"] . "</td>";
            echo "<td>" . $campo["escrita"] . "</td>";
            echo "<td>";
            echo "<a href='editar.php?id_info=" . $campo["id_info"] . "'>Editar</a>";
            echo "<form action='deletar.php' method='post' onsubmit='return confirmarDelete();'>";
            echo "<input type='hidden' name='id_info' value='" . $campo["id_info"] . "'>";
            echo "<input type='submit' value='Excluir'>";
            echo "</form>";

        echo "</td>";
        echo "</tr>";
    }
     
    } else {
        echo "<tr><td colspan='4'>Nenhuma operação encontrada.</td></tr>";
    }
    
    $conectar->close();
    ?>
</table>
<p><a href="criar.php">Adicionar Nova Operação</a></p>
<script>
    function confirmarDelete() {
        console.log("Função confirmarDelete() foi chamada");
        return confirm("Tem certeza de que deseja excluir esta operação?");
    }

</script>
</body>
</html>
