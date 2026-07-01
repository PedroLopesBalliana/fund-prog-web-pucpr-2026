<?php
session_start();
require 'conectaBD.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Loja de Livros</title>
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- W3.CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

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
        <a href="contatosListar.php" class="w3-bar-item w3-button w3-hover-blue">Clientes</a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="w3-main w3-container" style="margin-left:220px; margin-top:80px;">
        <div class="w3-panel w3-card-4 w3-light-grey w3-padding-large">

            <!-- Logo e título -->
            <div class="w3-center w3-margin-bottom">
                <img src="images/logo.png" alt="Loja de Livros" class="w3-image w3-round" style="max-width:200px;">
                <h2 class="w3-text-blue">Listagem de Livros</h2>
            </div>

            <!-- Data de acesso -->
            <?php
                date_default_timezone_set("America/Sao_Paulo");
                $data = date("d/m/Y H:i:s", time());
                echo "<p class='w3-small'>Acesso em: $data</p>";
            ?>

            <!-- Consulta ao BD -->
            <?php
                $sql = "SELECT id_livro, titulo, id_autor, genero, ano_publicacao FROM Livros ORDER BY titulo";
                $result = $conn->query($sql);

                echo "<div class='w3-responsive w3-card-4'>";
                if ($result->num_rows > 0) {
                    echo "<table class='w3-table-all'>";
                    echo "<tr>";
                    echo "<th width='25%'>Título</th>";
                    echo "<th width='25%'>Autor</th>";
                    echo "<th width='20%'>Gênero</th>";
                    echo "<th width='10%'>Ano</th>";
                    echo "<th width='10%'> </th>";
                    echo "<th width='10%'> </th>";
                    echo "</tr>";

                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id_livro"];
                        echo "<tr>";
                        echo "<td>".$row["titulo"]."</td>";
                        echo "<td>".$row["id_autor"]."</td>";
                        echo "<td>".$row["genero"]."</td>";
                        echo "<td>".$row["ano_publicacao"]."</td>";
                        echo "<td><a href='livroAtualizar.php?id=$id'><img src='images/edit.png' title='Editar Livro' width='24'></a></td>";
                        echo "<td><a href='livroExcluir.php?id=$id'><img src='images/delete.png' title='Excluir Livro' width='24'></a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p style='text-align:center'>Nenhum livro encontrado.</p>";
                }
                $conn->close();
            ?>
            </div>
        </div>
    </div>

</body>
</html>
