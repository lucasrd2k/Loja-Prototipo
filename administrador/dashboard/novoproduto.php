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
        margin-left:75%;
    }
    @media only screen and (max-width: 600px) {
      #cadastrar{
        margin-left:55%;
    }
  .h2{
    font-size:20px;
    margin-left:-2%;
  }
}
</style>
<script language="javascript">  
 //-----------------------------------------------------  
 //Funcao: MascaraMoeda  
 //Sinopse: Mascara de preenchimento de moeda  
 //Parametro:  
 //   objTextBox : Objeto (TextBox)  
 //   SeparadorMilesimo : Caracter separador de milésimos  
 //   SeparadorDecimal : Caracter separador de decimais  
 //   e : Evento  
 //Retorno: Booleano  
 //Autor: Gabriel Fróes - www.codigofonte.com.br  
 // 
 // Alteração: Alteração para a permissão de pagar o conteúdo do componente.
 // Autor: Bruno Lins Alves - www.brunolinsalves.com
 //-----------------------------------------------------  
 function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){  
     var sep = 0;  
     var key = '';  
     var i = j = 0;  
     var len = len2 = 0;  
     var strCheck = '0123456789';  
     var aux = aux2 = '';  
     var whichCode = (window.Event) ? e.which : e.keyCode;  
     if (whichCode == 13 || whichCode == 8) return true;  
     key = String.fromCharCode(whichCode); // Valor para o código da Chave  
     if (strCheck.indexOf(key) == -1) return false; // Chave inválida  
     len = objTextBox.value.length;  
     for(i = 0; i < len; i++)  
         if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;  
     aux = '';  
     for(; i < len; i++)  
         if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);  
     aux += key;  
     len = aux.length;  
     if (len == 0) objTextBox.value = '';  
     if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;  
     if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;  
     if (len > 2) {  
         aux2 = '';  
         for (j = 0, i = len - 3; i >= 0; i--) {  
             if (j == 3) {  
                 aux2 += SeparadorMilesimo;  
                 j = 0;  
             }  
             aux2 += aux.charAt(i);  
             j++;  
         }  
         objTextBox.value = '';  
         len2 = aux2.length;  
         for (i = len2 - 1; i >= 0; i--)  
         objTextBox.value += aux2.charAt(i);  
         objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);  
     }  
     return false;  
 }  
 </script>  
<body>
<h1 class="font-bold mt-4 mb-3 h2" style="text-align:center; margin-top: 2%; font-weight: bold; color: #1C1C1C;">CADASTRAR UM NOVO PRODUTO</h1>
  <form action="" method="POST" style="width:80%; margin-left:9%; margin-top:5%;"  enctype="multipart/form-data"> 
        <label for="titulo" class="form-label">Título do produto:</label>
        <input type="text" id="titulo" name="titulo" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <label for="valor" class="form-label">Valor do produto:</label>
        <input type="text" name="valor" class="form-control" id="exampleInputPassword1"  onKeyPress="return(MascaraMoeda(this,'.',',',event))">
        <br>
        <label for="marca" class="form-label">Marca:</label>
        <input type="text" id="marca" name="marca" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <label for="imagem1" class="form-label">Imagem 1</label>
        <input type="file" id="imagem1" name="arquivo" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <label for="imagem2" class="form-label">Imagem 2</label>
        <input type="file" id="imagem2" name="arquivo1" class="form-control" aria-describedby="passwordHelpBlock">
        <br>
        <label for="imagem3" class="form-label">Imagem 3</label>
        <input type="file" id="imagem3" name="arquivo2" class="form-control" aria-describedby="passwordHelpBlock">
        <div class="form-floating">
            <br>
    <label for="categoria" class="form-label">Selecione a categoria</label>
    <br>
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="categoria">
    <option value="vapeshop">VAPESHOP</option>
    <option value="nargshop">NARGSHOP</option>
    <option value="headshop">HEADSHOP</option>
    <option value="charutaria">CHARUTARIA</option>
    <option value="bebidas">BEBIDAS</option>
  </select>
</div>
<br>
<div class="form-floating">
  <textarea class="form-control" placeholder="Descrição"  maxlength="200" name="descricao" id="floatingTextarea"></textarea>
  <label for="floatingTextarea">Descrição</label>
</div>
<br><br>
    <button type="submit" class="btn btn-lg btn-success" id="cadastrar">CADASTRAR</button>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
<?php

include_once("../../conexao.php");

if (isset($_POST["titulo"])) {

    $ext = strtolower(substr($_FILES['arquivo'] ['name'],-4));
    $new_name = date("Y.m.d-H.i.s") . $ext; 

    $destino = "../../img/" . $_FILES['arquivo']['name'];

    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
     
    move_uploaded_file( $arquivo_tmp, $destino);

    $ext = strtolower(substr($_FILES['arquivo'] ['name'],-4));
    $new_name = date("Y.m.d-H.i.s") . $ext; 
    
    $destino1 = "../../img/" . $_FILES['arquivo1']['name']; 
  
    $arquivo_tmp = $_FILES['arquivo1']['tmp_name'];
     
    move_uploaded_file( $arquivo_tmp, $destino1);

    $ext = strtolower(substr($_FILES['arquivo'] ['name'],-4));
    $new_name = date("Y.m.d-H.i.s") . $ext; 
  
    $destino2 = "../../img/" . $_FILES['arquivo2']['name'];   

    $arquivo_tmp = $_FILES['arquivo2']['tmp_name'];
     
    move_uploaded_file( $arquivo_tmp, $destino2);

$titulo = $_POST["titulo"];
$categoria = $_POST["categoria"];
$valor = $_POST["valor"];
$descricao = $_POST["descricao"];
$marca = $_POST["marca"];

$sql = "INSERT INTO produtos (titulo, categoria, valor, descricao, marca, imagem1, imagem2, imagem3) VALUES ('$titulo', '$categoria', '$valor', '$descricao', '$marca', '$destino', '$destino1', '$destino2')";
$resultado = mysqli_query($conn, $sql);
if (isset($resultado)) {
  echo "<div class='alert alert-success' style='margin-left:65%' role='alert'>
  Produto cadastrado com sucesso
</div>";
}

}
   
?>
