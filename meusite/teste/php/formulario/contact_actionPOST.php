<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  
  <title>Loja de livros</title>
</head>
<body>
  <?php
    // Captura dados via POST
    $nome     = $_POST["name"];
    $email    = $_POST["email"];
    $celular  = $_POST["celular"];
    $agree    = isset($_POST["agree-term"]) ? "Sim" : "Não";
    $data     = $_POST["dt_nasc"];
    $endereco = $_POST["endereco"];
    $cidade   = $_POST["cidade"];
    $estado   = $_POST["estado"];

    // Formata data
    list($ano, $mes, $dia) = explode('-', $data);
    $aniversario = $dia . '/' . $mes . '/' . $ano;

    // Calcula idade
    $hoje = time();
    $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);
    $idade = floor(($hoje - $nascimento) / (60*60*24*365.25));
  ?>

  
    <div class="sidebar">
        <a class="active" href="index.html">Home</a>
        <a href="form.html">Cadastro</a>
        <a href="about.html">Sobre</a>
    </div>

    <script src=js/formValidation.js></script>
    <div class="content">
        <h2 class="titleTop">Dados Do contato</h2>

        <p><b>PHP</b> recebe os dados enviados via <b>GET</b> de um FORM HTML</p>
        
        <table class="tableCSS">
          <tr><th>Campo</th><th>Valor</th></tr>
          <tr><td>Nome</td><td><?php echo $nome; ?></td></tr>
          <tr><td>Email</td><td><?php echo $email; ?></td></tr>
          <tr><td>Celular</td><td><?php echo $celular; ?></td></tr>
          <tr><td>Aniversário</td><td><?php echo $aniversario; ?></td></tr>
          <tr><td>Idade</td><td><?php echo $idade; ?></td></tr>
          <tr><td>Endereço</td><td><?php echo $endereco; ?></td></tr>
          <tr><td>Cidade</td><td><?php echo $cidade; ?></td></tr>
          <tr><td>Estado</td><td><?php echo $estado; ?></td></tr>
          <tr><td>Aceitou os termos?</td><td><?php echo $agree; ?></td></tr>
        </table>
          <input type="button" class="form-submit" value="Voltar" onclick="history.go(-1)">
    </div>
</body>
</html>
