<?php
$hostname = "localhost";
$bd = "temporario";
$usuario = "root";
$senha = "";

// Conectar ao banco de dados
$conectar = new mysqli($hostname, $usuario, $senha, $bd);
if ($conectar->connect_error) {
    die("A conexão falhou: " . $conectar->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_info"])) {
    $id = $_POST["id_info"];
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $escrita = $_POST["escrita"];

    // Preparar a consulta
    $sql = "UPDATE informado SET nome=?, idade=?, escrita=? WHERE id_info=?";
    $stmt = $conectar->prepare($sql);

    if ($stmt) {
        // Vincular parâmetros
        $stmt->bind_param("sisi", $nome, $idade, $escrita, $id);

        // Executar a consulta
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao atualizar a operação: " . $stmt->error;
        }

        // Fechar o statement
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conectar->error;
    }
} else {
    echo "Requisição inválida.";
}
?>