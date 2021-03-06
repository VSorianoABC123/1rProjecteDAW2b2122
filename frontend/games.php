<?php
    require_once("../php_libraries/bd.php");
    session_start();
    include "../php_controllers/configuracionIdiomas.php";

    $nombresModal = array("One", "Two", "Three", "Four", "Five");

    if(isset($_SESSION["idIS"]))
    {
        $juegosJugados = selectJuegosJugadosUnUsuario($_SESSION["idIS"]["id_usuario"]);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Portes Obertes</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/games.css">
    <link rel="stylesheet" href="../style/login.css">
    <link rel="stylesheet" href="../style/navbaraboutus.css">
    <link rel="icon"  href="../img/politecnicsico.png" type="image/png" />
</head>
<!---------------------------------------BODY-------------------------------------->
<body style="font-family: 'Assistant';">
<!---------------------------------------NAVBAR-------------------------------------->
<?php
    include 'login.php';
    include 'navbarfija.php';
?>
<!---------------------------------------FINAL NAVBAR-------------------------------------->

<section id="contentSection" class="content">
        <div class="container pb-4">
            <header>
                <div class="pb-2 mb-4 rounded-3">
                    <div class="container-fluid py-5">
                        <h1 class="display-5 text-center" style="color: #0089ff; font-size: 5rem; font-family: 'Montserrat'; letter-spacing: 10px;"><?php echo $idioma['NavbarJocs'] ?></h1>
                </div>
            </header>
            <div class="row text-center m-3">
                <div class="col-md-12 col-12">
                    <div id="carouselExampleControls" class="carousel bg-dark slide mb-3" data-bs-ride="carousel" data-bs-interval="false">
                        <div class="carousel-inner">
                        <?php
                            $juegos = selectJuegos();

                            foreach ($juegos as $juego) 
                            {
                                if($juego["id"] == 1)
                                {
                                    if(isset($_SESSION["idIS"]["id_usuario"]))
                                    {
                        ?>
                                    <div class="carousel-item active">
                                        <a href="<?php echo $juego["url_juego"] ?>" type="button">
                                            <img src="<?php echo $juego["url_imagen"] ?>" class="d-block w-100" alt="..." height="400px">
                                        </a>
                                    </div>

                                    <button onclick="rankingPrevious()" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button onclick="rankingNext()" class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                        <span class="carousel-control-next-icon bg-dark rounded-circle p-3 fs-1" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                        <?php
                                    }
                                    else
                                    {
                        ?>
                                    <div class="carousel-item active" style="filter: saturate(0); cursor: default;">
                                        <a href="#exampleModal" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <img src="<?php echo $juego["url_imagen"] ?>" class="d-block w-100" alt="..." height="400px" style="z-index: -1;">
                                        </a>
                                    </div> 

                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-l">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h1 class="modal-title" id="exampleModalLabel" style="color: #0089ff;">Informaci??</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Registra't o inicia sessi??!
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Ok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php                        
                                    }
                                }
                                else
                                {   
                                    if(isset($juegosJugados))
                                    {
                                        $encontrado = false;

                                        foreach ($juegosJugados as $juegoJugado) 
                                        {
                                            if($juegoJugado["juego_id"] == $juego["id"])
                                            {
                                                $encontrado = true;
                                            }
                                        }

                                        if($encontrado)
                                        {                                        
                        ?>
                                        <div class="carousel-item">
                                            <a href="<?php echo $juego["url_juego"] ?>" type="button">
                                                <img src="<?php echo $juego["url_imagen"] ?>" class="d-block w-100" alt="..." height="400px">
                                            </a>
                                        </div>
                        <?php
                                        }
                                        else
                                        {
                        ?>
                                        <div class="carousel-item" style="filter: saturate(0); pointer-events: none; cursor: default;">
                                            <a href="<?php echo $juego["url_juego"] ?>" type="button" disabled>
                                                <img src="<?php echo $juego["url_imagen"] ?>" class="d-block w-100" alt="..." height="400px">
                                            </a>
                                        </div> 
                        <?php
                                        }
                                    }
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div id="carouselExampleControls2" class="carousel slide col-md-4 col-1" data-bs-ride="carousel" data-bs-interval="false" style="height: 400px; display: none;">
                    <div class="carousel-inner h-100">
                        <?php
                            for ($i = 0; $i < 5; $i++) 
                            {
                                if($i == 0)
                                {
                        ?>
                                    <div class="carousel-item active h-100">
                                        <div class="card bg-dark h-100" style="color: white;">
                                            <div class="card-header h-15 fs-1">
                                                Ranking joc <?php echo $i + 1; ?>
                                            </div>
                                            <div class="card-body h-85 fs-2">
                                                <ul class="list-group list-group-flush h-100">    
                        <?php
                                }
                                else
                                {
                        ?>
                                    <div class="carousel-item h-100">
                                    <div class="card bg-dark h-100" style="color: white;">
                                            <div class="card-header h-15 fs-1">
                                                Ranking joc <?php echo $i + 1; ?>
                                            </div>
                                            <div class="card-body h-85 fs-2">
                                                <ul class="list-group list-group-flush h-100 bg-light">
                        <?php
                                }

                                $registros = selectRegistros($i + 1);

                                foreach ($registros as $registro) 
                                {
                                    if(isset($registro))
                                    {
                        ?>    
                                    <li class="list-group-item h-50 w-100 d-flex">
                                        <div class="col h-100 w-100 d-flex justify-content-center align-items-center fw-bold">
                                            <div class="h-100 d-flex justify-content-center align-items-center fw-bold"><?php echo $registro["nombre_usuario"]; ?></div>
                                        </div>
                                        <div class="col h-100 w-100< d-flex justify-content-center align-items-center fw-bold">
                                            <div class="h-100 d-flex justify-content-center align-items-center fw-bold"><?php echo $registro["puntuacion"] . " punts"; ?></div>
                                        </div>
                                    </li>
                        <?php
                                    }
                                }
                        ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>  
                        <?php       
                            }
                        ?>
                    </div>                
                </div>
            </div>
        </div>
    </section>

<!-----------------FINAL BODY----------------->  
</body>
<!-----------------FOOTER----------------->  
<?php
    include './footer.php';
?>
<!-----------------FINAL FOOTER----------------->   

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/navbar.js"></script>
  <script src="https://kit.fontawesome.com/668120ee8a.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/games.js"></script>
</body>
</html>