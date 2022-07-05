<?php include_once "../../conexao.php"; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
    #cadastrar{
        margin-left:83%;
    }
    @media only screen and (max-width: 600px) {
  #cadastrar{
    margin-left:55%;
    margin-top:-5%;
  }
  .form{
    margin-top:7% !important;
  }
}
</style>
<body>
<h1 class="font-bold mt-4 mb-3 h2" style="text-align:center; margin-top: 2%; font-weight: bold; color: #1C1C1C;">CADASTRAR NOVO ADMIN</h1>
    <form action="" method="POST" class="form" style="width:80%; margin-left:9%; margin-top:3%;">
        <label for="titulo" class="form-label">Nome:</label>
        <input type="text" id="titulo" name="nome" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <label for="valor" class="form-label">Whatsapp:</label>
        <input type="text" id="valor" name="whatsapp" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <label for="marca" class="form-label">E-mail:</label>
        <input type="email" name="email" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <label for="imagem1" class="form-label">Senha</label>
        <input type="password" id="imagem1" name="senha" class="form-control" aria-describedby="passwordHelpBlock">
        <br><br>
    <button type="submit" name="cadastrar" class="btn btn-lg btn-success" id="cadastrar">CADASTRAR</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>
</html>
<?php 
  if (isset($_POST["cadastrar"])) {
    $nome = $_POST["nome"];
  $whatsapp = $_POST["whatsapp"];
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  $sql = "INSERT INTO login (email, senha, whatsapp, nome) VALUES('$email', '$senha', '$whatsapp', '$nome')";
  $resultado = mysqli_query($conn, $sql);

  }
  
?>