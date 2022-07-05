<?php 

include_once "../../conexao.php";
$id = $_GET["id"];

$sql = "DELETE FROM login WHERE id = $id";
$resultado = mysqli_query($conn, $sql);

echo "<script>window.location.replace('index.php?titulo=listaadmins');</script>";
