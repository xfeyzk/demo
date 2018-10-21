<?php
include_once './Logica/FrontEnd.php';
include_once './Modelo/Conexion.php';
$FE = new FrontEnd();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>FKU</title>
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
            <div class="container" style="height: auto">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        echo $FE->showSlider();
                        ?>
                    </div>
                    <a class="carousel-control-prev navegacion" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next navegacion" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <section class="container pt-4" style="color: whitesmoke">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="col-md-12 pb-3" style="background-color: rgba(0,0,0,0.5);">
                            <h1 class="pt-4">
                                AQUÍ PUEDES VER LOS PRIMEROS CINCO MINUTOS DE ZOIDS WILD
                            </h1>
                            <p class="pt-4 text-justify">En anticipación al estreno de Zoids Wild, Takara Tomy presentó los primeros cinco minutos del 
                                anime y aunque están en japonés son igualmente disfrutables (vía Anime News Network).</p> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12 embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" width="555" height="315" src="https://www.youtube.com/embed/ASk48JezSuM" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 dozoom">
                        <img src="imagenes/566278.jpg" class="img-fluid" style="width: 100%; height: 305px" alt="Teclado">
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="col-md-12 pb-3" style="background-color: rgba(0,0,0,0.5);">
                            <h1 class="pt-4">
                                RUMOR!
                            </h1>
                            <p class="pt-4 text-justify pb-4">Microsoft y Razer trabajan para habilitar uso de mouse y teclado en Xbox One
                                Desde hace tiempo, el tema relacionado con el soporte oficial de Microsoft para mouse y teclado en 
                                Xbox One ha dado mucho de qué hablar. Aunque es posible que el usuario use algunos adaptadores de terceros 
                                para usar los periféricos de PC, la división de Xbox ha manifestado que sigue trabajando para habilitar la 
                                característica en la consola, pero aún no hay nada concreto</p>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container pt-4" style="color: whitesmoke">
                    <div>
                        <h2 class="text-center pb-3">ÚLTIMAS NOTICIAS</h2>
                    </div>
                    <div class="row">
                        <?php
                        echo $FE->indexnoticias();
                        ?>
                    </div>
                </div>
            </section>

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
            <!--            <footer class="container pt-4">
                            <div class="container" style="background-color: #333333; color: white">
                                <div class="row">
                                    <div class="col-md-4 mb-2 mt-2">
                                        <div class="row">
                                            <div class="col-md-2 circulo"><a href="#"><i class="fab fa-facebook-f"></i></a></div>
                                            <div class="col-md-2 circulo"><a href="#"><i class="fab fa-twitter"></i></a></div>
                                            <div class="col-md-2 circulo"><a href="#"><i class="fab fa-google-plus-g"></i></a></div>
                                            <div class="col-md-2 circulo"><a href="#"><i class="fab fa-youtube"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="text-align: right">
                                        <h4>FK<span class="font-weight-bold" style="color: red;">U</span></h4>
                                    </div>
                                </div>
                            </div>
                        </footer>-->
        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</body>
</html>
