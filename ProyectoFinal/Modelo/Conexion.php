<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author xfeyz
 */
class Conexion {
    //put your code here
    private $user = "root";
    private $password = "";
    private $bd = "contacto";
    protected $conexion;

    function __construct() {
        $this->conexion = new PDO('mysql:host=localhost:33006;dbname=' . $this->bd, $this->user, $this->password);
        $this->conexion->exec("set character set utf8");
    }

    public function cerrarConexion() {
        $this->conexion = NULL;
    }
    
    public function consultarindexnoticias($cantidad=3){
        $cantidad=(int)$cantidad;
        $sentencia = $this->conexion->prepare("select * from indexnews order by id desc limit ".$cantidad);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        
    }
    
    public function slider($cantidad=3){
        $cantidad=(int)$cantidad;
        $sentencia = $this->conexion->prepare("select * from slider order by slider_id asc limit ".$cantidad);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function sectionNews($cantidad=3){
        $cantidad=(int)$cantidad;
        $sentencia = $this->conexion->prepare("select * from noticiascomp order by id desc limit ".$cantidad);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
     public function sectionVideos($cantidad=3){
        $cantidad=(int)$cantidad;
        $sentencia = $this->conexion->prepare("select * from vdestacados order by v_id asc limit ".$cantidad);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insertarComentario($name,$mail,$phone,$msj){
        $sentencia = $this->conexion->prepare("insert into comentarios(nombre,email,telefono,mensaje) values(?,?,?,?)");
        $sentencia->bindParam(1, $name);
        $sentencia->bindParam(2, $mail);
        $sentencia->bindParam(3, $phone);
        $sentencia->bindParam(4, $msj);
        return $sentencia->execute();
    }
    
    public function consultarUsuario($usuario,$password) {
        $sentecia = $this->conexion->prepare("select * from admin where usuario=? and password=?");
        $sentecia->bindParam(1, $usuario);
        $sentecia->bindParam(2, $password);
        $sentecia->execute();
        foreach ($sentecia->fetchAll(PDO::FETCH_ASSOC) as $persona){
            return $persona;
        }
    }
    
    public function obtenerNoticia($ide){
        $sentecia = $this->conexion->prepare("select * from noticiascomp where id=?");
        $sentecia->bindParam(1, $ide);
        $sentecia->execute();
        foreach ($sentecia->fetchAll(PDO::FETCH_ASSOC) as $noticia){
            return $noticia;
        }
    }
    
    public function obtenerNoticiaSlider($ide){
        $sentecia = $this->conexion->prepare("select * from slidernoticias where id=?");
        $sentecia->bindParam(1, $ide);
        $sentecia->execute();
        foreach ($sentecia->fetchAll(PDO::FETCH_ASSOC) as $noticia){
            return $noticia;
        }
    }
    
    public function obtenerNoticiasIndex($ide){
        $sentecia = $this->conexion->prepare("select * from indexnews where id=?");
        $sentecia->bindParam(1, $ide);
        $sentecia->execute();
        foreach ($sentecia->fetchAll(PDO::FETCH_ASSOC) as $noticia){
            return $noticia;
        }
    }
    
    public function agregarNoticia($titulo, $subtitulo,$banner, $circulo, $p1, $p2, $p3, $media) {
        $sentencia = $this->conexion->prepare("INSERT INTO noticiascomp (titulo,subtitulo,banner,imagen,p1,p2,p3,media) VALUES(?,?,?,?,?,?,?,?)");
        $sentencia->bindParam(1, $titulo);
        $sentencia->bindParam(2, $subtitulo);
        $sentencia->bindParam(3, $banner);
        $sentencia->bindParam(4, $circulo);
        $sentencia->bindParam(5, $p1);
        $sentencia->bindParam(6, $p2);
        $sentencia->bindParam(7, $p3);
        $sentencia->bindParam(8, $media);
        return $sentencia->execute();
    }
    
    public function agregarNoticiaIndex($title, $sub,$bann, $cir, $pa1, $pa2, $pa3, $medios) {
        $sentencia = $this->conexion->prepare("INSERT INTO indexnews (titulo,subtitulo,banner,foto,p1,p2,p3,media) VALUES(?,?,?,?,?,?,?,?)");
        $sentencia->bindParam(1, $title);
        $sentencia->bindParam(2, $sub);
        $sentencia->bindParam(3, $bann);
        $sentencia->bindParam(4, $cir);
        $sentencia->bindParam(5, $pa1);
        $sentencia->bindParam(6, $pa2);
        $sentencia->bindParam(7, $pa3);
        $sentencia->bindParam(8, $medios);
        return $sentencia->execute();
    }
    
    public function modificarNew($ide,$titulo, $subtitulo,$banner, $circulo, $p1, $p2, $p3, $media) {
        $sentencia = $this->conexion->prepare("UPDATE noticiascomp SET titulo=?,subtitulo=?,banner=?,imagen=?,p1=?,p2=?,p3=?,media=? WHERE id=?");
        $sentencia->bindParam(1, $titulo);
        $sentencia->bindParam(2, $subtitulo);
        $sentencia->bindParam(3, $banner);
        $sentencia->bindParam(4, $circulo);
        $sentencia->bindParam(5, $p1);
        $sentencia->bindParam(6, $p2);
        $sentencia->bindParam(7, $p3);
        $sentencia->bindParam(8, $media);
        $sentencia->bindParam(9, $ide);
        return $sentencia->execute();
    }
    
    public function modificarNewIndex($ide,$titulo, $subtitulo,$banner, $circulo, $p1, $p2, $p3, $media) {
        $sentencia = $this->conexion->prepare("UPDATE indexnews SET titulo=?,subtitulo=?,banner=?,foto=?,p1=?,p2=?,p3=?,media=? WHERE id=?");
        $sentencia->bindParam(1, $titulo);
        $sentencia->bindParam(2, $subtitulo);
        $sentencia->bindParam(3, $banner);
        $sentencia->bindParam(4, $circulo);
        $sentencia->bindParam(5, $p1);
        $sentencia->bindParam(6, $p2);
        $sentencia->bindParam(7, $p3);
        $sentencia->bindParam(8, $media);
        $sentencia->bindParam(9, $ide);
        return $sentencia->execute();
    }
    
    public function eliminarNoticia($ide){
        $sentencia = $this->conexion->prepare("DELETE FROM noticiascomp WHERE id=?");
        $sentencia->bindParam(1, $ide);
        return $sentencia->execute();
    }
    
    public function eliminarNoticiaIndex($ide){
        $sentencia = $this->conexion->prepare("DELETE FROM indexnews WHERE id=?");
        $sentencia->bindParam(1, $ide);
        return $sentencia->execute();
    }
    
    public function noticiaIndividual($ide){
        $sentecia = $this->conexion->prepare("select * from noticiascomp where id=?");
        $sentecia->bindParam(1, $ide);
        $sentecia->execute();
        foreach ($sentecia->fetchAll(PDO::FETCH_ASSOC) as $noticia){
            return $noticia;
        }
    }
    
    public function noticiaIndividualIndex($ide){
        $sentecia = $this->conexion->prepare("select * from indexnews where id=?");
        $sentecia->bindParam(1, $ide);
        $sentecia->execute();
        foreach ($sentecia->fetchAll(PDO::FETCH_ASSOC) as $noticia){
            return $noticia;
        }
    }
    
    public function agregarUsuario($nombre, $apaterno,$amaterno, $usuario, $password, $foto, $descripcion) {
        $sentencia = $this->conexion->prepare("INSERT INTO admin(nombre,apaterno,amaterno,foto,descripcion,usuario,password) VALUES(?,?,?,?,?,?,?)");
        $sentencia->bindParam(1, $nombre);
        $sentencia->bindParam(2, $apaterno);
        $sentencia->bindParam(3, $amaterno);
        $sentencia->bindParam(4, $foto);
        $sentencia->bindParam(5, $descripcion);
        $sentencia->bindParam(6, $usuario);
        $sentencia->bindParam(7, $password);
        return $sentencia->execute();
    }
}
