<?php session_start(); ?>
<style>
body {
    background-image: url(../imagens/fundo.png);
}

#divlogin {
    background-color: white;
    width: 38%;
    height: 80%;
    margin-top: -17%;
    border-radius: 10%;
}

#logologin {
    width: 20%;
    margin-top: 5%;
}
.login{
    width: 30%;
    margin-left:35%;
    margin-top:-25%;
}
@media only screen and (max-width: 600px) {
    #logologin {
    width: 70%;
}
#divlogin {
    display:none;
}
.login{
    width: 70%;
    margin-left:15%;
    margin-top:-12%;
}
body{
    background-image: url(../imagens/fundocelular.png);
}

}
</style>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>tabacaria Irmandade</title>
    <link rel="icon" href="../imagens/icon.png">
</head>

<body>
    <img src="../imagens/logo.png" class="rounded mx-auto d-block" id="logologin" alt="...">
    <div class="container" id="divlogin">
      
    </div>
    <form action="" method="POST" class="login">
            <div class="form-group">
                <label for="exampleInputEmail1">E-mail</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
            
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="password" name="senha" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" name="entrar" class="btn btn-dark btn-lg">Entrar</button>
            <br><br>
            <center><small>Caso você ainda não tenha cadastro, entre em contato com um admin</small></center>
        </form>
        
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>
<?php 
    include_once "../conexao.php";

    if (isset($_POST["entrar"])) {
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $_SESSION["email"] = $email;

        $sql = "SELECT * FROM login WHERE email = '$email' AND senha = '$senha'";
        $resultado = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultado)>0) {
           echo "<script>window.location.replace('dashboard/');</script>";
        }
        else{
            echo "<script>alert('Usuário ou senha incorretos')</script>";
        }
    }
    