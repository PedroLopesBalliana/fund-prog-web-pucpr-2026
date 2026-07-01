<?php
session_start();
require 'conectaBD.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Loja de Livros - Clientes</title>
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- W3.CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body class="w3-light-grey">

    <!-- Menu Superior -->
    <div class="w3-top w3-blue w3-bar w3-large" style="z-index:3;">
        <a class="w3-bar-item w3-button w3-hide-large" href="javascript:void(0)" onclick="w3_open()">☰</a>
        <a class="w3-bar-item w3-button" onclick="document.getElementById('id0L').style.display='block'">Login</a>
        <a class="w3-bar-item w3-button" onclick="document.getElementById('id0C').style.display='block'">Cadastro</a>
    </div>

    <!-- Sidebar -->
    <div class="w3-sidebar w3-bar-block w3-card w3-white" style="width:220px; z-index:2;">
        <a href="index.php" class="w3-bar-item w3-button w3-hover-blue">Home</a>
        <a href="livrosListar.php" class="w3-bar-item w3-button w3-hover-blue">Livros</a>
        <a href="clientesListar.php" class="w3-bar-item w3-button w3-hover-blue">Clientes</a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="w3-main w3-container" style="margin-left:220px; margin-top:80px;">
        <div class="w3-panel w3-card-4 w3-white w3-padding-large">

            <!-- Logo e título -->
            <div class="w3-center w3-margin-bottom">
                <img src="images/logo.png" alt="Loja de Livros" class="w3-image w3-round" style="max-width:250px;">
                <h2 class="w3-text-blue">Listagem de Clientes</h2>
            </div>

            <!-- Data de acesso -->
            <?php
                date_default_timezone_set("America/Sao_Paulo");
                $data = date("d/m/Y H:i:s", time());
                echo "<p class='w3-small'>Acesso em: $data</p>";
            ?>

            <!-- Consulta ao BD -->
            <?php
                $sql = "SELECT ID_Cliente, Nome, Email, Celular, data_nascimento, endereco, cidade, estado FROM Clientes ORDER BY Nome";
                $result = $conn->query($sql);

                echo "<div class='w3-responsive w3-card-4'>";
                if ($result->num_rows > 0) {
                    echo "<table class='w3-table-all'>";
                    echo "<tr class='w3-blue'>";
                    echo "<th>Código</th>";
                    echo "<th>Nome</th>";
                    echo "<th>Email</th>";
                    echo "<th>Celular</th>";
                    echo "<th>Data de Nascimento</th>";
                    echo "<th>Endereço</th>";
                    echo "<th>Cidade</th>";
                    echo "<th>Estado</th>";
                    echo "<th></th>";
                    echo "<th></th>";
                    echo "</tr>";

                    while ($row = $result->fetch_assoc()) {
                        $id = $row["ID_Cliente"];
                        echo "<tr>";
                        echo "<td>".$id."</td>";
                        echo "<td>".$row["Nome"]."</td>";
                        echo "<td>".$row["Email"]."</td>";
                        echo "<td>".$row["Celular"]."</td>";
                        echo "<td>".$row["data_nascimento"]."</td>";
                        echo "<td>".$row["endereco"]."</td>";
                        echo "<td>".$row["cidade"]."</td>";
                        echo "<td>".$row["estado"]."</td>";
                        echo "<td><a href='clienteAtualizar.php?id=$id'><img src='images/Edit.png' title='Editar Cliente' width='24'></a></td>";
                        echo "<td><a href='clienteExcluir.php?id=$id'><img src='images/Delete.png' title='Excluir Cliente' width='24'></a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p style='text-align:center'>Nenhum cliente encontrado.</p>";
                }
                $conn->close();
            ?>
            </div>
        </div>
    </div>

</body>
</html>
