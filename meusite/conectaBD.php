<?php
    // Dados de conexão
    $servername = "localhost:3306"; 
    $username   = "root"; 
    $password   = ""; 
    $database   = "lojaDeLivros";

    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    } else {
        echo "Conectado com sucesso!";
    }
?>
