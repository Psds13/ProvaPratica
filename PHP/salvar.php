<?php
$conectar = new mysqli("localhost", "root", "", "temporario");
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $escrita = $_POST["escrita"];

    // Consulta preparada para inserção
    $sql = "INSERT INTO informado (nome, idade, escrita) VALUES (?, ?, ?)";
    
    // Preparar a consulta
    $stmt = $conectar->prepare($sql);
    
    if ($stmt) {
        // Vincular parâmetros
        $stmt->bind_param("sis", $nome, $idade, $escrita);
        
        // Executar a consulta
        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Erro ao adicionar a operação: " . $stmt->error;
        }
        
        // Fechar o statement
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conectar->error;
    }
} else {
    echo "Requisição inválida.";
}