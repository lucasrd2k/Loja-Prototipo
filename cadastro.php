<?php 
    include_once "conexao.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    .center{
      font-weight: bold;
    }
    .btn{
      background: #198754 !important;
      margin-left:83%;
      margin-top:-10%;
      border-radius: 15px !important;
    }
    @media only screen and (max-width: 600px) {
      .center{
      font-weight: bold;
      font-size: 25px;
    }
    .btn{
      background: #198754 !important;
      margin-left:70%;
      margin-top:-20%;
      border-radius: 15px !important;
    }
    }
  </style>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>

<body>
    <h1 class="font-bold mt-4 mb-3 h3 center light" style="color: #1C1C1C;">CADASTRE-SE</h1>
    <form action="" method="POST">
    <div class="container">
    <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <input id="nome" name="nome" type="text" class="validate">
          <label for="nome">Nome</label>
        </div>
      </div>
  </div>
  <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <input id="email" name="email" type="email" class="validate">
          <label for="email">E-mail</label>
        </div>
      </div>
  </div>
  <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <input id="senha" name="senha" type="password" class="validate">
          <label for="senha">Senha</label>
        </div>
      </div>
  </div>
  <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <input id="whatsapp" name="whatsapp" type="tel" class="validate">
          <label for="whatsapp">Whatsapp</label>
        </div>
      </div>
  </div>
  <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <input id="endereco" name="endereco" type="text" class="validate">
          <label for="endereco">Endereço</label>
        </div>
      </div>
  </div>
  <br>
  <button class="btn waves-effect waves-light" type="submit" name="cadastrar">Cadastrar
    <i class="material-icons right">send</i>
  </button>
    </div>
</form>
    <footer class="page-footer" style="background: black;  ">
          <div class="footer-copyright">
            <div class="container center" style=" font-size: 120% !important; height:30px;">
            ©2022 Indutiva Tecnologia
            </div>
          </div>
        </footer>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>
<?php 

    if (isset($_POST["cadastrar"])) {
        @$nome = $_POST["nome"];
        @$email = $_POST["email"];
        @$senha = $_POST["senha"];
        @$whatsapp = $_POST["whatsapp"];
        @$endereco = $_POST["endereco"];

        $_SESSION["nome"] = $nome;
        $_SESSION["email"] = $email;
        $_SESSION["senha"] = $senha;
        $_SESSION["whatsapp"] = $whatsapp;
        $_SESSION["endereco"] = $endereco;

    
        $sql = "INSERT INTO logincliente (email, senha, nome, endereco, whatsapp) VALUES ('$email', '$senha', '$nome', '$endereco', '$whatsapp')";
        $resultado = mysqli_query($conn, $sql);
    
        echo "<script>window.location.replace('loja/loja2/tabacaria.php');</script>";
    }

   
  
?>