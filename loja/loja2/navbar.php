<?php include_once "../../conexao.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food</title>
    <link rel="stylesheet" href="first.css">

    <!-- font awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


<style>
    header{
        z-index: 1;
    }
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap');
* {
    font-family: 'Nunito', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    border: none;
    outline: none;
    text-decoration: none;
    text-transform: capitalize;
    transition: all .2s linear;
}

:root {
    --green: #008080;
    --black: #2c2c54;
}

::selection {
    background: var(--green);
    color: #fff;
}

html {
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-padding-top: 6.5rem;
    scroll-behavior: smooth;
}

.header-1 {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2rem 9%;
   background: white;
}

.header-1 .logo {
    font-size: 3rem;
    color: var(--black);
    font-weight: bolder;
}

.header-1 .logo i {
    color: var(--green);
    padding: .5rem;
}

.header-1 .search-box-container {
    display: flex;
    height: 5rem;
}

.header-1 .search-box-container #search-box {
    height: 100%;
    width: 100%;
    padding: 1rem;
    border: .1rem solid rgba(0, 0, 0, .3);
    color: #333;
    font-size: 2rem;
    text-transform: none;
}

.header-1 .search-box-container label {
    width: 8rem;
    height: 100%;
    background-color: var(--green);
    font-size: 2.5rem;
    line-height: 5rem;
    color: #fff;
    cursor: pointer;
    text-align: center;
}

.header-1 .search-box-container label:hover {
    background-color: var(--black);
}

.header-2 {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 2rem 9%;
    box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 10%);
    background-color: #fff;
    position: relative;
}

.header-2.active {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1;
}

.header-2 .navbar a {
    padding: .5rem 1.5rem;
    font-size: 2rem;
    color: var(--black);
    border-radius: .5rem;
}

.header-2 .navbar a:hover {
    color: white;
    background-color: #1C1C1C;
}

.header-2 .icons a {
    font-size: 2.5rem;
    color: var(--black);
    padding-left: 1rem;
}

.header-2 .icons a:hover {
    color: var(--green);
}

#menu-bar {
    font-size: 3rem;
    border-radius: .5rem;
    border: .1rem solid var(--black);
    padding: .8rem 1.5rem;
    cursor: pointer;
    color: var(--black);
    display: none;
}


/* ----------------- media query start -----------------  */

@media (max-width:1200px) {
    html {
        font-size: 55%;
    }
}

@media (max-width:991px) {
    .header-1,
    .header-2 {
        padding: 2rem;
    }
}

@media (max-width:768px) {
    #menu-bar {
        display: initial;
    }
    .header-2 .navbar {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: black;
        padding: 1rem 2rem;
        display: none;
        z-index: 1;
    }
    .header-2 .navbar.active {
        display: initial;
    }
    .header-2 .navbar a {
        font-size: 2.5rem;
        display: block;
        background: #fff;
        text-align: center;
        padding: 1rem;
        margin: 1.5rem 0;
    }
}

@media(max-width:450px) {
    html {
        font-size: 50%;
    }
    .header-1 {
        flex-flow: column;
    /* } */
    .header-1 .search-box-container {
        width: 100%;
        margin-top: 2rem;
    }
    .header-1 .logo {
        font-size: 4rem;
        z-index: 1;
    }
}

</style>
</head>
<?php 
    $sql = "SELECT * FROM configuracao";
    $resultado = mysqli_query($conn, $sql);

    while ($dados = mysqli_fetch_assoc($resultado)) {
        $logotipo = $dados["logotipo"];
    }
?>
<body>
    <header>
        <div class="header-1">

            <a href="tabacaria.php" class="logo"><img src="<?php echo $logotipo;?>" width="180"></a>
<br><br><br>

            <form action="" class="search-box-container">
                <input type="search" id="search-box" style="border-bottom: solid; border-top: none; border-left: none; border-right:none" placeholder="Pesquise...">
                <label for="search-box" style="border-radius: 15px; margin-left:-5%; background: #1C1C1C;" class="fas fa-search"></label>
            </form>

        </div>


        <div class="header-2">

            <div id="menu-bar" class="fas fa-bars"></div>

            <nav class="navbar">
                <a href="tabacaria.php?titulo=charutaria">CHARUTARIA</a>
                <a href="tabacaria.php?titulo=headshop">HEADSHOP</a>
                <a href="tabacaria.php?titulo=vapeshop">VAPESHOP</a>
                <a href="tabacaria.php?titulo=nargshop">NARGSHOP</a>
                <a href="tabacaria.php?titulo=bebidas">BEBIDAS</a>
            </nav>
            
        </div>
    </header>
   
    <!-- custom js link  -->
    <script src="first.js"></script>
</body>

</html>
<script>
    let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let header = document.querySelector('.header-2');

menu.addEventListener('click', () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
});

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    if (window.scrollY > 150) {
        header.classList.add('active');
    } else {
        header.classList.remove('active');
    }

}
</script>
