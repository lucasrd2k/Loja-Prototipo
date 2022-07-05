<?php 

include_once "../../conexao.php";
$id = $_GET["id"];

$sql = "DELETE FROM aguardando WHERE id = $id";
$resultado = mysqli_query($conn, $sql);

echo "<script>window.location.replace('index.php?titulo=aguardando');</script>";
