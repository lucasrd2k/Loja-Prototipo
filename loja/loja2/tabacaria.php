<?php 

session_start();

?>
<?php include_once "../../conexao.php"; ?>
<!doctype html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="icon" href="imagens/icon.png">
    <title>Tabacaria Irmandade</title>
</head>
<style>
    
.card-2{
    width: 20%;
    display: inline-block;
    margin-left:9%;
    margin-top: 3%;
}
.card-title{
    font-size: 23px;
    text-align: center;
}
.card-text{
    font-size: 20px;
    text-align:center;
    color: green;
}
.btn{
    width: 100%;
    height: 45px;
    font-size: 20px;
    border-radius: 20px;
}
.nenhum{
    margin-top: 10%;
    text-align:center;
}
.titulo{
    text-align: center;
    margin-top: 4%;
    font-size:35px;
}
@media only screen and (max-width: 600px) {
    .card-2{
    width: 90%;
    display: inline-block;
    margin-left:2%;  
    margin-top:5%;
}
.titulo{
    margin-top:7%;
    font-size: 30px;
}
.btn{
    margin-left:2%;
    height: 50px;
}
.card-img-top{
    width: 50%;
    margin-left:25%;
}
}
</style>
<?php
      $sql = "SELECT * FROM configuracao";
      $resultado = mysqli_query($conn, $sql);
  
      while ($dados = mysqli_fetch_assoc($resultado)) {
          $banner1 = $dados["banner1"];
          $banner2 = $dados["banner2"];
          $banner3 = $dados["banner3"];


      }
?>
<body>
    <?php include_once "navbar.php"; ?>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img id="img" src="<?php echo $banner1;?>" class="w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img id="img" src="<?php echo $banner2;?>" class="w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img id="img" src="<?php echo $banner3;?>" class=" w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php
    $sql = "SELECT * FROM produtos";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<h1 class='titulo'><b>NOSSOS PRODUTOS</b><h1>";
    }
?>
  <br>

    <?php
        @$titulo = $_GET["titulo"];
        
        $sql = "SELECT * FROM produtos";
        $resultado = mysqli_query($conn, $sql);

        if (mysqli_num_rows($resultado)<1) {
            echo "<h1 class='nenhum'>Nenhum produto cadastrado</h1>";
            exit();
        }
        if ($titulo == '') {
            $sql = "SELECT * FROM produtos LIMIT 12";
            $resultado = mysqli_query($conn, $sql);
        
        }
        else{
            $sql = "SELECT * FROM produtos WHERE categoria = '$titulo'";
            $resultado = mysqli_query($conn, $sql);
        }

        while ($dados = mysqli_fetch_assoc($resultado)) {
    ?>
    
    <div class="card-2">
    <form action="produto.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $dados["id"]; ?>">
        <img src="<?php echo $dados["imagem1"];?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo $dados["titulo"];?></h5>
            <p class="card-text">R$<?php echo $dados["valor"];?><p>
            <button type="submit" class="btn btn-dark">MAIS DETALHES</a>
        </div>
        </form>
    </div>
    
    <?php } ?>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <?php include_once "footer.php"; ?>

</body>

</html>
