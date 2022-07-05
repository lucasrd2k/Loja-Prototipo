<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->


<?php 

session_start();

include_once "../../conexao.php";

  $sql = "SELECT * FROM produtos";
  $resultado = mysqli_query($conn, $sql);
  $numero = mysqli_num_rows($resultado);

  $sql = "SELECT * FROM logincliente";
  $resultado = mysqli_query($conn, $sql);
  $numero1 = mysqli_num_rows($resultado);

  $sql = "SELECT * FROM login";
  $resultado = mysqli_query($conn, $sql);
  $numero2 = mysqli_num_rows($resultado);

  
  $sql = "SELECT * FROM aguardando";
  $resultado = mysqli_query($conn, $sql);
  $numero3 = mysqli_num_rows($resultado);

    
  $sql = "SELECT * FROM login WHERE email = '$_SESSION[email]'";
  $resultado = mysqli_query($conn, $sql);
  while ($dados = mysqli_fetch_assoc($resultado)) {
    $_SESSION["id"] = $dados["id"];
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">

  <title>

    Tabacaria Irmandade


  </title>



  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- CSS Files -->



  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />





</head>
<style>
  #estatisticas {
    margin-left: 12%;
  }

  @media only screen and (max-width: 600px) {
    #estatisticas {
      margin-left: -10px;
    }
  }
</style>

<body class="g-sidenav-show  bg-gray-100">





  <aside style="height: 70%;"
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">




    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="?titulo=inicio">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>

            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white " href="?titulo=listaprodutos">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>

            <span class="nav-link-text ms-1">Produtos cadastrados</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white " href="?titulo=listaadmins">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>

            <span class="nav-link-text ms-1">Admins Cadastrados</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white " href="?titulo=novoproduto">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>

            <span class="nav-link-text ms-1">Novo Produto</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link text-white " href="?titulo=novoadm">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">add</i>
            </div>

            <span class="nav-link-text ms-1">Novo administrador</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="?titulo=aguardando">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>

            <span class="nav-link-text ms-1">Clientes Aguardando</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="?titulo=configuracao">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">build</i>
            </div>

            <span class="nav-link-text ms-1">Configuração</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="?titulo=automatizacao">

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">android</i>
            </div>

            <span class="nav-link-text ms-1">Automatização</span>
          </a>
        </li>
  </aside>
  
  <main class="main-content border-radius-lg ">
    <!-- Navbar -->

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
      data-scroll="true">
      <div class="container-fluid py-1 px-3">

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

          <ul class="navbar-nav  justify-content-end">

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
          </ul>
        </div>
      </div>
    </nav>

    <!-- End Navbar -->

    <?php 
        @$titulo = $_GET["titulo"];

        if ($titulo == 'inicio' OR $titulo ==  '') {
    ?>
        <h1 class="font-bold mt-4 mb-3 h3" style="text-align:center; margin-top: 2%; color: #1C1C1C	!important;">DASHBOARD ADMINISTRATIVA</h1>

    <br><br>
    <div class="row" id="estatisticas">
    <div class="col-lg-5 col-sm-5">
      <div class="card  mb-2">
        <div class="card-header p-3 pt-2">
          <div
            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">weekend</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">CLIENTES CADASTRADOS</p>
            <h4 class="mb-0"><?php echo $numero1 ?></h4>
          </div>
        </div>

        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">Todos os clientes cadastrados</p>
        </div>
      </div>
      <br>
      <div class="card  mb-2">
        <div class="card-header p-3 pt-2">
          <div
            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">leaderboard</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">ADMINS CADASTRADOS</p>
            <h4 class="mb-0"><?php echo $numero2 ?></h4>
          </div>
        </div>

        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-dark text-sm font-weight-bolder">Todos tem acesso total ao sistema</p>
        </div>
      </div>
          <?php 
          
          ?>
    </div>
    <div class="col-lg-5 col-sm-5 mt-sm-0 mt-4">
      <div class="card  mb-2">
        <div class="card-header p-3 pt-2 bg-transparent">
          <div
            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">store</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize ">PRODUTOS CADASTRADOS</p>
            <h4 class="mb-0 "><?php echo $numero;?></h4>
          </div>
        </div>

        <hr class="horizontal my-0 dark">
        <div class="card-footer p-3">
          <p class="mb-0 "><span class="text-dark text-sm font-weight-bolder">Todos os produtos ativos na loja</p>
        </div>
      </div>
      <br>
      <div class="card ">
        <div class="card-header p-3 pt-2 bg-transparent">
          <div
            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person_add</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize ">TOTAL DE VENDAS</p>
            <h4 class="mb-0 "><?php echo $numero3 ?></h4>
          </div>
        </div>

        <hr class="horizontal my-0 dark">
        <div class="card-footer p-3">
          <p class="mb-0 "><span class="text-dark text-sm font-weight-bolder">Todas as vendas realizadas pela loja
          </p>
        </div>
      </div>

    </div>
  </div>

  <div class="row mt-4">
    <div class="col-10">
      <div class="card mb-4 ">



      </div>
    </div>
  </div>
  </div>









  </div>


</main>
<?php } ?>

<?php 
        @$titulo = $_GET["titulo"];

        if ($titulo == 'listaprodutos') {
            include_once "listaprodutos.php";
        }
        if ($titulo == 'listaadmins') {
          include_once "listaradmin.php";
      }
      if ($titulo == 'novoproduto') {
        include_once "novoproduto.php";
    }
    if ($titulo == 'novoadm') {
      include_once "novoadm.php";
  }
  if ($titulo == 'aguardando') {
    include_once "aguardando.php";
}
if ($titulo == 'configuracao') {
  include_once "configuracao.php";
}
if ($titulo == 'automatizacao') {
  include_once "automatizar.php";
}
    ?>
      

        <!-- Navbar Fixed -->


       
    
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>









































































  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>


  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>