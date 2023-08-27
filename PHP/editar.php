<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição da operação</title>
</head>
<body>
<h1>Editar operação</h1>
<?php
$conectar = new mysqli("localhost", "root", "", "temporario");

if ($conectar->connect_error) {
    die("A conexão falhou: " . $conectar->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id_info"])) {
    $id = $_GET["id_info"];
    $sql = "SELECT id_info, nome, idade, escrita FROM informado WHERE id_info = ?";
    $stmt = $conectar->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $resultado = $stmt->get_result();
        
        if ($resultado->num_rows == 1) {
            $campo = $resultado->fetch_assoc();
            ?>
            <form action="atualizar.php" method="post">
                <input type="hidden" name="id_info" value="<?php echo $campo["id_info"]; ?>">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $campo["nome"]; ?>" required><br><br>
                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" value="<?php echo $campo["idade"]; ?>" required><br><br>
                <label for="escrita">Resenha:</label><br>
                <textarea id="escrita" name="escrita" rows="4" cols="50"><?php echo $campo["escrita"]; ?></textarea><br><br>
                <input type="submit" value="Atualizar">
            </form>
            <?php
        } else {
            echo "Operação não encontrada.";
        }
    } else {
        echo "Erro ao executar a consulta: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Requisição inválida.";
}

$conectar->close();
?>
<p><a href="index.php">Voltar para a lista de operações</a></p>
</body>
</html>
