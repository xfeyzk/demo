<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FrontEnd
 *
 * @author xfeyz
 */
class FrontEnd {
    //put your code here
    private $conexion;
    
    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function showSlider(){
        $registros = $this->conexion->slider(3);
        $acu = "";
        foreach ($registros as $r){
        $acu = $acu.'<div class="carousel-item '.$r["activo"].'">
                            <img class="d-block w-100 img-fluid" src="'.$r["imagen"].'" alt="Slide">
                            <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0,0,0,0.5);">
                                <a style="text-decoration: none;" class="enlace text-uppercase" href="noticias-relevantes-encabezado.php?ide='.$r["slider_id"].'"><h1>'.$r["titulo"].'</h1></a>
                                <p></p>
                            </div>
                        </div>';
        }
        return $acu;
    }
    
    public function indexnoticias(){
        $registros = $this->conexion->consultarindexnoticias(6);
        $acu = "";
        foreach ($registros as $r){
        $acu = $acu.'<div class="col-md-4 dozoom text-center pt-4">
                            <div class="tarjeta">
                                <a href="noticias-relevantes-from-index.php?ide='.$r["id"].'"><img class="miniaturas" src="'.$r["foto"].'"></a>
                                <h4 class="pt-4 pl-4 text-uppercase">'.$r["titulo"].'</h4>
                                <p>'.$r["p1"].'</p>
                            </div>
                        </div>';
        }
        return $acu;
    }
    
        public function sNews(){
        $registros = $this->conexion->sectionNews(6);
        $acu = "";
        foreach ($registros as $r){
        $acu = $acu.'<div class="row">
                <div class="col-md-2 pl-0 pt-2">
                    <div class="col-md-12">
                        <a href="noticias-relevantes.php?ide='.$r["id"].'"><div class="image pt-2" style="background-image:url(\''.$r["imagen"].'\')"></div></a>
                    </div>
                </div>
                <div class="col-md-10 ">
                    <div class="col-md-12 secnoti">
                        <a style="text-decoration: none;" class="noticia" href="noticias-relevantes.php?ide='.$r["id"].'"><h4 class="pt-4 text-uppercase">
                            '.$r["titulo"].'
                        </h4></a>
                        <p class="pt-2 pb-3 text-justify">
                            '.$r["p1"].'
                        </p>
                    </div>
                </div>
            </div>';
        }
        return $acu;
    }
    
    public function videosDestacados(){
        $registros = $this->conexion->sectionVideos();
        $acu = "";
        foreach ($registros as $r){
        $acu = $acu.'<div class="col-md-4 dozoom text-center pt-2">
                        <div class="tarjeta">
                            <div class="col-md-12 embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="'.$r["v_url"].'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <h4 class="pt-4 pl-4 text-uppercase">'.$r["v_titulo"].'</h4>
                            <p>'.$r["v_descripcion"].'</p>
                        </div>
                    </div>';
        }
        return $acu;
    }
    
    public function notiComp($ide){
         $r = $this->conexion->obtenerNoticia($ide);
         return '<section class="row">
                <div class="col-md-12">
                    <h1 class="pt-4 text-uppercase"style="color: white; text-align: center">
                        '.$r["titulo"].'
                    </h1>
                    <p class=" text-uppercase"style="color: white; text-align: center">
                        '.$r["subtitulo"].'
                    </p>
                </div>
                <div class="infoNoticia pt-4" style="background-image: url(\''.$r["banner"].'\'); background-size: cover; background-position: center;"></div>
                <article class="textoNoticia">
                    <p style="margin: 30px;">'.$r["p1"].'</p>
                    <p style="margin: 30px;">'.$r["p2"].'</p>
                    <p style="margin: 30px;">'.$r["p3"].'</p>
                </article>
                <div class="mediosNoticia embed-responsive embed-responsive-16by9">
                    '.$r["media"].'
                </div>
            </section>';
    }

    public function noticiasSilder($ide){
         $r = $this->conexion->obtenerNoticiaSlider($ide);
         return '<section class="row">
                <div class="col-md-12">
                    <h1 class="pt-4 text-uppercase"style="color: white; text-align: center">
                        '.$r["titulo"].'
                    </h1>
                    <p class=" text-uppercase"style="color: white; text-align: center">
                        '.$r["subtitulo"].'
                    </p>
                </div>
                <div class="infoNoticia pt-4" style="background-image: url(\''.$r["banner"].'\'); background-size: cover; background-position: center;"></div>
                <article class="textoNoticia">
                    <p style="margin: 30px;">'.$r["p1"].'</p>
                    <p style="margin: 30px;">'.$r["p2"].'</p>
                    <p style="margin: 30px;">'.$r["p3"].'</p>
                </article>
                <div class="mediosNoticia embed-responsive embed-responsive-16by9">
                    '.$r["media"].'
                </div>
            </section>';
    }
    
    public function noticiasCompletasIndex($ide){
         $r = $this->conexion->obtenerNoticiasIndex($ide);
         return '<section class="row">
                <div class="col-md-12">
                    <h1 class="pt-4 text-uppercase"style="color: white; text-align: center">
                        '.$r["titulo"].'
                    </h1>
                    <p class=" text-uppercase"style="color: white; text-align: center">
                        '.$r["subtitulo"].'
                    </p>
                </div>
                <div class="infoNoticia pt-4" style="background-image: url(\''.$r["banner"].'\'); background-size: cover; background-position: center;"></div>
                <article class="textoNoticia">
                    <p style="margin: 30px;">'.$r["p1"].'</p>
                    <p style="margin: 30px;">'.$r["p2"].'</p>
                    <p style="margin: 30px;">'.$r["p3"].'</p>
                </article>
                <div class="mediosNoticia embed-responsive embed-responsive-16by9">
                    '.$r["media"].'
                </div>
            </section>';
    }
    
    public function ConsNews(){
        $new = $this->conexion->sectionNews();
    }
    
    public function mensaje($msj) {
        return '<script>alert("' . $msj . '")</script>';
    }

    public function procesarFormulario(){
        if( isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_POST["mensaje"])){
            if($this->conexion->insertarComentario($_POST["nombre"], $_POST["email"], $_POST["telefono"], $_POST["mensaje"])){
                return $this->mensaje("Gracias por tu comentario");
            }else{
                return $this->mensaje("Error en el sistema");
            }
        }
    }
}
