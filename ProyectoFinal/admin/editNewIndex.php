<?php
session_start();
include_once '../Modelo/Conexion.php';
include_once '../Logica/BackEnd.php';
$BE = new BackEnd();
$BE->autenticar();
$BE->modificarNoticiaIndex();
$P = $BE->consultarNoticiaIndex();
if(!$BE->siAutenticado()) {
    $BE->redireccionar('login.php');
}
if (isset($_GET["salir"])) {
    $BE->salir();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Control de Noticias</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="red" data-image="assets/img/sidebar-5.jpg">

                <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="../index.php" class="simple-text">
                            FKU NEWS
                        </a>
                    </div>

                    <ul class="nav">
                        <li >
                            <a href="indexPanel.php">
                                <i class="pe-7s-graph"></i>
                                <p>Página Principal</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="addNew.php">
                                <i class="pe-7s-user"></i>
                                <p>Agregar Noticia</p>
                            </a>
                        </li>
                        <li>
                            <a href="addNewIndex.php">
                                <i class="pe-7s-user"></i>
                                <p>Agregar Noticia Index</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                   <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand text-uppercase" href="#">Centro de noticias</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="./editNew.php?salir=1">
                                        <p>Log out</p>
                                    </a>
                                </li>
                                <li class="separator hidden-lg hidden-md"></li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Editar Noticia</h4>
                                    </div>
                                    <div class="content">
                                        <form method="POST" action="editNewIndex.php">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Titulo</label>
                                                        <input type="text" class="form-control" name="titulo" value="<?php echo $P["titulo"];?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Subtitulo</label>
                                                        <input type="text" class="form-control" name="subtitulo" value="<?php echo $P["subtitulo"];?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>URL Imagen Circular</label>
                                                        <input type="text" class="form-control" name="circulo" value="<?php echo $P["foto"];?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>URL Imagen Banner</label>
                                                        <input type="text" class="form-control" name="banner" value="<?php echo $P["banner"];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Parrafo 1 Para Noticia Completa</label>
                                                        <input type="text" class="form-control" name="p1" value="<?php echo $P["p1"];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Parrafo 2 Para Noticia Completa</label>
                                                        <input type="text" class="form-control" name="p2" value="<?php echo $P["p2"];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Parrafo 3 Para Noticia Completa</label>
                                                        <input type="text" class="form-control" name="p3" value="<?php echo $P["p3"];?>">
                                                    </div>
                                                </div>
                                            </div>

                                             <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>URL de Video</label>
                                                        <input type="text" class="form-control" name="media" value='<?php echo $P['media'];?>'>
                                                    </div>
                                                </div>
                                                 <input type="hidden" name="id" value="<?php echo $P["id"];?>">
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill pull-right">Editar Noticia</button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-user">
                                    <div class="image">
                                        <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                                    </div>
                                    <div class="content">
                                        <div class="author">
                                            <a href="#">
                                                <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                                <h4 class="title">Sergio GE<br />
                                                    <small>xFeyzk</small>
                                                </h4>
                                            </a>
                                        </div>
                                        <p class="description text-center"> "Panel de control <br>
                                            para Noticias en la pagina"<br>
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                        <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                        <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

</html>
