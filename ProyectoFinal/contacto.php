<?php
include_once './Logica/FrontEnd.php';
include_once './Modelo/Conexion.php';
$FE = new FrontEnd();
echo $FE->procesarFormulario();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FKU2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/myStyle.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">

    </head>
    <body class="pt-4" style="background-image: url(imagenes/gray-patterns-textures-background-665301.jpg)">
        <main>
            <div class="container fixed-top">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand font-weight-bold" href="index.php">FK<span class="font-weight-bold" style="color: red">U</span></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="noticias.php">NOTICIAS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contacto.php">CONTACTO</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="container" style="padding-top: 60px;">
                <div class="row">
                    <h1 style="color: white; margin-left: 20px;"> <span>CONTACTANOS!</span> </h1>
                </div>
                <div class="row">
                    <h4 style="color: white; margin-left: 20px;">NOS GUSTARIA SABER TU OPINION!</h4>
                </div>
                <form method="POST" action="contacto.php">
                    <div class="row input-container">
                        <div class="col-xs-6 col-md-12">
                            <div class="styled-input wide">
                                <input type="text" required name="nombre" />
                                <label>NOMBRE</label> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input">
                                <input type="email" required name="email"/>
                                <label>EMAIL</label> 
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="styled-input" style="float:right;">
                                <input type="text" required name="telefono"/>
                                <label>TELÉFONO</label> 
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-12">
                            <div class="styled-input wide">
                                <textarea required name="mensaje"></textarea>
                                <label>MENSAJE</label>
                            </div>
                        </div>
                        <div class="col-xs-12 ml-3">
                            <button type="submit" class="btn-lrg submit-btn">ENVIAR MENSAJE</button>
                        </div>
                    </div>
                </form>
            </div>

            <footer class="container mt-4">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <a class="navbar-brand font-weight-bold" style="color: white; font-size: 3em;" href="index.php">FK<span class="font-weight-bold" style="color: red">U</span></a>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <ul class="menu">
                                <span>Menu</span>    
                                <li>
                                    <a href="index.php">HOME</a>
                                </li>

                                <li>
                                    <a href="noticias.php">NOTICIAS</a>
                                </li>

                                <li>
                                    <a href="contacto.php">CONTACTO</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <ul class="address">
                                <span>CONTACTO</span>       
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i> <a href="#">TELEFONO:0123815689 </a>
                                </li>
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> <a href="#">DIRECCIÓN: EVERYWHERE</a>
                                </li> 
                                <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> <a href="#">EMAIL: FKU@GODDAMN.COM</a>
                                </li> 
                            </ul>
                        </div>
                    </div> 
                </div>
            </footer>
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</body>
</html>
