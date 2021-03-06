<?php
    session_start();
    require_once("../../php_libraries/bd.php");

    insertJuegoJugado($_SESSION["idIS"]["id_usuario"], 2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleMenu.css">
    <title>Patronus</title>
</head>
<body class="mainMenu">
    
    <!-- Suelo -->
    <div id="sueloMenu"></div>

    <!-- Tuberia -->
    <img src="media/pipeGris - copia.png" class="tuberiaMenu">

    <!-- Fantasma -->
    <div id="fantasmaMenu"></div>

    <!-- Portal -->
    <div id="portalMenu"></div>

    <!-- Título y botón play -->
    <div class="botonesMenu">
        <span class="tituloMenu"></span>
        <a href="juego/game.html" class="botonPlayMenu"></a>
    </div>

    <script src="js/scriptMenu.js"></script>
</body>
</html>