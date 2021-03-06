<?php
    session_start();
    require_once("../../php_libraries/bd.php");

    insertJuegoJugado($_SESSION["idIS"]["id_usuario"], 4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <script type="text/javascript" src="./script/script.js" charset="UTF-8"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row gameTitle">
            <div class="titleGame mt-4 mb-4 pb-5 pt-5">
                <h1 class="text-center">HASTA EL CIELO</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-2 pt-4 div1">
                <div class="col time">
                    <h2>PUNTOS:</h2>
                    <p id="scoreboard">0</p>
                </div>
            </div>
            <div class="col-8 bg-primary div2 board">
                <div class="column4p1 box"></div>
                <div class="column4p2 box"></div>
                <div class="column4p3 box"></div>
                <div class="column3p1 box"></div>
                <div class="column3p2 box"></div>
                <div class="column3p3 box"></div>
                <div class="column3p4 box"></div>
                <div class="column2p1 box"></div>
                <div class="column2p2 box"></div>
                <div class="column2p3 box"></div>
                <div class="column1p1 box"></div>
                <div class="column1p2 box"></div>
                <div class="column1p3 box"></div>
                <div class="column1p4 box"></div>
                <div class="character"></div>
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Modal body text goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="countdown()"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" onclick="countdown()" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 div3">
                <div class="col pt-4 time">
                    <h2>TIEMPO:</h2>
                    <p id="timer">40</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>