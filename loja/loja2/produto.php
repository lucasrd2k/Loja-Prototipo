<?php 
include_once "../../conexao.php";
session_start();
$id = $_POST["id"];
$_SESSION['id'] = $id;

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</head>
<style>
    #add{
        height:50px;
        width: 94%;
        font-size:150%;
    }
.container {
    margin-top: 80px;
}

.newarrival {
    background: green;
    width: 50px;
    font-size: 12px;
    font-weight: bold;
    color: white !important;
}

.col-md-7 h2 {
    color: #555;
}

.start {
    height: 50px;
}

.price {
    color: green;
    font-size: 30px;
    font-weight: bold;
    padding-top: 20px;
}

.quantidade {
    border: 1px solid #ccc;
    font-weight: bold;
    text-align: center;
    width: 30%;
    height: 40px;
    font-size: 13.5px;
}

.cart {
    background: black;
    color: #FFFFFF;
    font-size: 15px;
    margin-left: 35%;
    margin-top: -8.5%;
    height: 40px;
}

.titulo {
    font-size: 40px;
}

.disponibilidade {
    font-size: 15px;
}

a {
    text-decoration: none;
}

.desc {
    font-size: 15px;
    margin-top: 2%;
}
.pagamento{
    border: 1px solid #ccc;
    font-weight: bold;
    text-align: center;
    width: 30%;
    height: 40px;
    font-size: 13.5px;
    margin-left:32%;
    margin-top: -8.5%;
}
.entrega{
    border: 1px solid #ccc;
    font-weight: bold;
    text-align: center;
    width: 30%;
    height: 40px;
    font-size: 13.5px;
    margin-left:64%;
    margin-top: -6%;
}
.btn{
    margin-left:0% !important;
    margin-top:3%;
}


@media only screen and (max-width: 600px) {
    #add{
        height:50px;
        width: 103.5%;
        font-size:150%;
        margin-left:-2% !important;
    }
    .titulo {
        text-align: center;
        margin-top: 5%;
    }

    .start {
        display: none;
    }

    .codigo {
        display: none;
    }

    .price {
        text-align: center;
        margin-top: -2%;
    }

    .quantidade {
        width: 50%;
        margin-left: 26%;
        margin-top: 1%;
    }

    #quantidade {
        display: none;
    }

    .disponibilidade {
        text-align: center;
        margin-top: 3%;
    }

    .cart {
        margin-top: 3%;
        width: 100%;
        margin-left: 0%;
        height: 50px;
        margin-bottom: 20px;
    }

    .desc {
        font-size: 12px;
        text-align: center;
        margin-top: 5%;
    }
.pagamento{
    width: 50%;
    margin-left: 26%;
    margin-top: -2.1%;
}
.entrega{
    width: 50%;
    margin-left: 26%;
    margin-top: 1%;
}
}
</style>

<body>
    <?php include_once "navbar.php"; ?>
    <?php

$sql = "SELECT * FROM produtos WHERE id = '$id'";
$resultado = mysqli_query($conn, $sql);

while ($dados = mysqli_fetch_assoc($resultado)) {
    $_SESSION["produto"] = $dados["titulo"];
    $produto = $_SESSION["produto"];
    $_SESSION["valor"] = $dados["valor"];
    $valor = $_SESSION["valor"];


?>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $dados["imagem1"];?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $dados["imagem2"];?>" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $dados["imagem3"];?>" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-md-7">
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
                    <p class="newarrival text-center">NOVO</p>
                    <h2 class="titulo"><?php echo $dados["titulo"] ?></h2>
                    <p class="codigo">Código: <?php echo $id; ?></p>
                    <img src="https://www.pngplay.com/wp-content/uploads/8/5-Stars-PNG-HD-Quality.png" class="start">
                    <p class="desc"><?php echo $dados["descricao"];?></p>
                    <p class="price">R$<?php echo $dados["valor"];?></p>
                    <p class="disponibilidade"><b>Disponibilidade:</b> Em estoque</p>
                    <p class="disponibilidade"><b>Condição:</b> Novo</p>
                    <p class="disponibilidade"><b>marca: </b><?php echo $dados["marca"]; ?></p>
                    <div class="form-floating"></div>
                    <select class="form-select quantidade" name="quantidade" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option selected>QUANTIDADE</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>

                    </select>
                    <br>
                    <select class="form-select pagamento" name="pagamento" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option value="pix">PIX</option>
                        <option value="crédito">CARTÃO DE CRÉDITO</option>
                        <option value="débito">CARTÃO DE DÉBITO</option>
                        <option value="dinheiro">DINHEIRO</option>
                    </select>
                    <select class="form-select entrega" name="entrega" id="floatingSelect"
                        aria-label="Floating label select example">
                        <option value="entrega">ENTREGA</option>
                        <option value="retirada">RETIRADA</option>
    
                    </select>
                    <button type="submit" name="comprar" id="add" class="btn btn-success">
                        COMPRAR
                        <?php } ?>
            </div>
            </form>

        </div>
    </div>
    <br><br>
    <?php include_once "footer.php"; ?>
</body>

</html>
<?php 
    if (isset($_POST["comprar"])) {
        $id = $_POST["id"];
        $quantidade = $_POST["quantidade"];
        $metodo = $_POST["entrega"];
        $pagamento = $_POST["pagamento"];
        
        $sql = "SELECT * FROM produtos WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sql);

        while ($dados = mysqli_fetch_assoc($resultado)) {
            $titulo = $dados["titulo"];
            $valor = $dados["valor"];
          

            $sql = "INSERT INTO aguardando (nome, produto, valor, whatsapp, endereco, quantidade, metodo, pagamento) VALUES ('$_SESSION[nome]', '$produto', '$valor', '$_SESSION[whatsapp]', '$_SESSION[endereco]', '$quantidade', '$metodo', '$pagamento')";
            $resultado = mysqli_query($conn, $sql);

	$numero = "6284718001";
	
	$cliente = $_SESSION['nome'];
    $endereco = $_SESSION['endereco'];
    $whatsapp = $_SESSION['whatsapp'];
    
	$msg = 
"COMPRA REALIZADA PELA LOJA
cliente: $cliente
Produto: $produto
valor: $valor
Método de pagamento: $metodo 
Pagamento: $pagamento 
Endereço: $endereco
Whatsapp: $whatsapp";
	
    $data = array(
        "instancia"=>"Mapapon-Teste",
        "number"=>"55$numero@c.us",
        "msg"=>$msg
    );
    
	//$postfield = "{\"instancia\": \"Mapapon-Teste\",\"number\": \"55$numero@c.us\",\"msg\": \"$msg\"}";
	$postfield = json_encode($data);
    // A sample PHP Script to POST data using cURL
    // Data in JSON format
     
    //$payload = json_encode($data);
    $payload = $postfield;
    // Prepare new cURL resource
    $ch = curl_init('http://138.197.58.167:3000/wp/sendMsg');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
     
    // Set HTTP Header for POST request 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload))
    );
     
    // Submit the POST request
    $result = curl_exec($ch);
    echo $result;
    // Close cURL session handle
    curl_close($ch);
 

            echo "<script>window.location.replace('agradecimento.php');</script>";

        }
    }
?>