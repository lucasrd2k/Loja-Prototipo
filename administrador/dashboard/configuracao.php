<style>
    #cadastrar{
        margin-left:75%;
    }
    @media only screen and (max-width: 600px) {
        #cadastrar{
        margin-left:55%;
    }
  }
</style>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
<h1 class="font-bold mt-4 mb-3 h2" style="text-align:center; margin-top: 2%; font-weight: bold; color: #1C1C1C;">CONFIGURAÇÃO DO SITE</h1>
    <form action="" method="POST" style="width: 80%; margin-left: 10%; margin-top: 5%;"  enctype="multipart/form-data">
        <label for="inputPassword5" class="form-label">Faça upload da sua logomarca</label>
        <input type="file" name="arquivo" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <label for="inputPassword5" class="form-label">Primeiro banner</label>
        <input type="file" name="arquivo1" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <label for="inputPassword5" class="form-label">Segundo banner</label>
        <input type="file" name="arquivo2" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <label for="inputPassword5" class="form-label">Terceiro banner</label>
        <input type="file" name="arquivo3" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <button type="submit" name="cadastrar" class="btn btn-lg btn-success" id="cadastrar">CADASTRAR</button>

    </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
</body>
</html>
<?php 

include_once("../../conexao.php");

if (isset($_POST["cadastrar"])) {
    $ext = strtolower(substr($_FILES['arquivo'] ['name'],-4));
    $new_name = date("Y.m.d-H.i.s") . $ext; 
    
    $destino = "../../img/" . $_FILES['arquivo']['name'];
    
    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
     
    move_uploaded_file( $arquivo_tmp, $destino);
    
    $ext = strtolower(substr($_FILES['arquivo1'] ['name'],-4));
    $new_name = date("Y.m.d-H.i.s") . $ext; 
    
    $destino1 = "../../img/" . $_FILES['arquivo1']['name'];
    
    $arquivo_tmp = $_FILES['arquivo1']['tmp_name'];
     
    move_uploaded_file($arquivo_tmp, $destino1);
    
    $ext = strtolower(substr($_FILES['arquivo2'] ['name'],-4));
    $new_name = date("Y.m.d-H.i.s") . $ext; 
    
    $destino2 = "../../img/" . $_FILES['arquivo2']['name'];
    
    $arquivo_tmp = $_FILES['arquivo2']['tmp_name'];
     
    move_uploaded_file( $arquivo_tmp, $destino2);
    
    $ext = strtolower(substr($_FILES['arquivo3'] ['name'],-4));
    $new_name = date("Y.m.d-H.i.s") . $ext; 
    
    $destino3 = "../../img/" . $_FILES['arquivo3']['name'];
    
    $arquivo_tmp = $_FILES['arquivo3']['tmp_name'];
     
    move_uploaded_file( $arquivo_tmp, $destino3);

    $sql = "DELETE FROM configuracao";
    $resultado = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM configuracao";
    $resultado = mysqli_query($conn, $sql);
    
    $sql = "INSERT INTO configuracao (banner1, banner2, banner3, logotipo) VALUES('$destino1', '$destino2', '$destino3', '$destino')";
    $resultado = mysqli_query($conn, $sql);
}
?>