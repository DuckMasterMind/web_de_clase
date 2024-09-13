<?php
// confirmar sesion

$servername2 = "localhost";
$username2 = "admin";
$password2 = "novaadmin";
$dbname2 = "mysql";

session_start();

// Create connection
$conn = new mysqli(
    $servername2,
    $username2,
    $password2,
    $dbname2
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

if (!isset($_SESSION['loggedin'])) {

    header('Location: index.html');
    exit;
}

$id = $_SESSION['id'];
$name = $_SESSION['name'];

if ($stmt = $conn->prepare('SELECT name, pais FROM Usuarios WHERE id = ?')) {

    // parámetros de enlace de la cadena s
    $stmt->bind_param('s', $_SESSION['id']);
    $stmt->execute();
} else {
    echo "Failed getting user info";
}

$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($name, $pais);
    $stmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="en" translate="yes">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="/img/stean_logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo "$name"; ?></title>
    <link rel="stylesheet" href="css\main.css">

</head>

<body>
    <header>

        <div class="header_btns">
            <p>Stean &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ver &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Amigos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Juegos &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ayuda </p>
        </div>
        <div class="header_blank">

        </div>
        <div class="header_btns">

        </div>
    </header>
    <nav>
        <div class="blank_nav"></div>

        <div class="logo_nav"></div>

        <div class="btn_nav">
            <p class="nav_btn">TIENDA&nbsp;&nbsp; BIBLIOTECA&nbsp;&nbsp; COMUNIDAD&nbsp;&nbsp; <?php echo strtoupper("$name"); ?></p>
        </div>

        <div class="blank_nav"></div>
    </nav>
    <div class="advertisment_background">
        <h1>Stean, el steam para pobres</h1>
    </div>
    <main>
        <div class="small_aside">




        </div>
        <div class="middle">

            <h2 class="middle_cat_title">Recomendado y patrocinado</h2>

            <div class="game_slider">
                <div class="aside_btn">
                    <button>
                        &#129168;
                    </button>
                </div>
                <div class="game_images">
                    <section class="game_thumbnail" style="background-image: url(https://i.ytimg.com/vi/opISyAo4Fxg/hqdefault.jpg);">
                        <a href="https://penusbmic.itch.io/bullet-bunny"></a>
                    </section>
                    <section class="game_section">
                        <a href="https://penusbmic.itch.io/bullet-bunny">
                            <h2>Bullet Bunny</h2>
                            <p>Juego inspirado en vampire survivors y otros de oleadas de enemigos, puntos y mejoras de personaje</p>
                            <img src="https://img.tapimg.net/market/images/2a1861bcd32b11aaa61fb78a2b628401.jpg?imageView2/2/w/1080/h/1080/q/80/format/jpg/interlace/1/ignore-error/1" alt="img">
                        </a>
                    </section>
                </div>
                <div class="aside_btn">
                    <button>
                        &#129170;
                    </button>
                </div>
            </div>

            <h2 class="middle_cat_title">Ofertas Especiales</h2>

            <div class="game_slider">
                <div class="aside_btn">
                    <button>
                        &#129168;
                    </button>
                </div>
                <div class="game_ads">
                    <div class="long_ad">
                        <a href="https://penusbmic.itch.io/bullet-bunny">
                            <div class="long_ad_thumnail" style="background-image: url(https://i.pinimg.com/originals/ac/0d/25/ac0d255cb0d4008daeeb20a523f6ec04.gif);"></div>
                            <div class="long_ad_title">
                                <p>Friday&nbsp;Night&nbsp;Funkin</p>
                            </div>
                        </a>
                    </div>
                    <div class="long_ad2">
                        <a href="https://roboatino.itch.io/shogunshowdown">
                            <div class="long_ad_thumnail" style="background-image: url(/img/Shogun_img.png);"></div>
                            <div class="long_ad_title">
                                <p>Shogun&nbsp;Showdown</p>
                            </div>
                        </a>
                    </div>
                    <div class="small_ad1" style="background-image: url(https://img.itch.zone/aW1nLzQ0NjA1MDUucG5n/315x250%23c/%2F9ypZ7.png);">
                        <a href="https://freds72.itch.io/poom">

                        </a>
                    </div>
                    <div class="small_ad2" style="background-image: url(https://img.itch.zone/aW1nLzI1ODYzNjEucG5n/315x250%23c/62dU0i.png);">
                        <a href="https://rewindgames.itch.io/tanuki-sunset">

                        </a>
                    </div>
                </div>
                <div class="aside_btn">
                    <button>
                        &#129170;
                    </button>
                </div>
            </div>

            <div class="category_slider">
                <div class="cat_btn" style="background-color: rgb(147, 35, 35);">
                    <a href="#">
                        <p>Accion</p>
                    </a>
                </div>
                <div class="cat_btn" style="background-color: rgb(147, 145, 35);">
                    <a href="">
                        <p>Multijugador</p>
                    </a>
                </div>
                <div class="cat_btn" style="background-color: rgb(35, 147, 42);">
                    <a href="">
                        <p>Sandbox</p>
                    </a>
                </div>
                <div class="cat_btn" style="background-color: rgb(35, 143, 147);">
                    <a href="">
                        <p>Mazmorras</p>
                    </a>
                </div>
                <div class="cat_btn" style="background-color: rgb(35, 50, 147);">
                    <a href="">
                        <p>Carreras</p>
                    </a>
                </div>
                <div class="cat_btn" style="background-color: rgb(147, 35, 138);">
                    <a href="">
                        <p>Infinito</p>
                    </a>
                </div>
            </div>
            <div class="game_slider">
                <div class="aside_btn">
                    <button>
                        &#129168;
                    </button>
                </div>
                <div class="game_images">
                    <section class="game_thumbnail" style="background-image: url(https://img.itch.zone/aW1nLzE2MjcwNDc4LnBuZw==/315x250%23c/ajVGk%2F.png);">
                        <a href="https://duckmastermind.itch.io/cleaning-dynasty"></a>
                    </section>
                    <section class="game_section">
                        <a href="https://duckmastermind.itch.io/cleaning-dynasty">
                            <h2>Bullet Bunny</h2>
                            <p>Juego inspirado en vampire survivors y otros de oleadas de enemigos, puntos y mejoras de personaje</p>
                            <img src="https://img.itch.zone/aW1nLzE2MjcwNDc4LnBuZw==/315x250%23c/ajVGk%2F.png" alt="img">
                        </a>
                    </section>
                </div>
                <div class="aside_btn">
                    <button>
                        &#129170;
                    </button>
                </div>
            </div>
        </div>
        <div class="small_aside">
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>