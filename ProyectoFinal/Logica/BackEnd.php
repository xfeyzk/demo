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
class BackEnd {

    //put your code here
    private $conexion;
    private $dominio;

    public function __construct() {
        $this->conexion = new Conexion();
        $this->dominio = "http://localhost:804/Proyectos/ProyectoFinal/imagenes/";
    }

    public function mensaje($msj) {
        return "<script>alert('" . $msj . "')</script>";
    }

    public function autenticar() {
        if (isset($_POST["usuario"]) && isset($_POST["password"])) {
            $user = $_POST["usuario"];
            $password = md5($_POST["password"]);
            $user = $this->conexion->consultarUsuario($user, $password);
            if (isset($user)) {
                $_SESSION["usuario"] = $user;
            }
        }
    }

    public function siAutenticado() {
        if (isset($_SESSION["usuario"])) {
            return true;
        } else {
            return false;
        }
    }

    public function redireccionar($url) {
        header("Location: " . $url);
    }

    public function salir() {
        if ($_GET["salir"]) {
            session_destroy();
            $this->redireccionar('login.php');
        }
    }

    public function subirNoticia() {
        if (isset($_POST["titulo"]) && isset($_POST["subtitulo"]) && isset($_POST["banner"]) && isset($_POST["circulo"]) && isset($_POST["p1"]) && isset($_POST["p2"]) && isset($_POST["p3"]) && isset($_POST["media"])) {
            if ($_POST["titulo"] <> "" && $_POST["subtitulo"] <> "" && $_POST["banner"] <> "" && $_POST["circulo"] <> "" && $_POST["p1"] <> "" && $_POST["p2"] <> "" && $_POST["p3"] <> "" && $_POST["media"] <> "") {
                if ($this->conexion->agregarNoticia($_POST["titulo"], $_POST["subtitulo"], $_POST["banner"], $_POST["circulo"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["media"])) {
                    return $this->mensaje("Noticia Agregada");
                    $this->redireccionar("addNew.php");
                } else {
                    echo $this->mensaje("Error al subir Noticia");
                }
            } else {
                echo $this->mensaje("Completa todos los campos");
            }
        }
    }
    
    public function subirNoticiaIndex() {
        if (isset($_POST["titul"]) && isset($_POST["subtitul"]) && isset($_POST["banne"]) && isset($_POST["circul"]) && isset($_POST["pa1"]) && isset($_POST["pa2"]) && isset($_POST["pa3"]) && isset($_POST["medi"])) {
            if ($_POST["titul"] <> "" && $_POST["subtitul"] <> "" && $_POST["banne"] <> "" && $_POST["circul"] <> "" && $_POST["pa1"] <> "" && $_POST["pa2"] <> "" && $_POST["pa3"] <> "" && $_POST["medi"] <> "") {
                if ($this->conexion->agregarNoticiaIndex($_POST["titul"], $_POST["subtitul"], $_POST["banne"], $_POST["circul"], $_POST["pa1"], $_POST["pa2"], $_POST["pa3"], $_POST["medi"])) {
                    return $this->mensaje("Noticia Agregada");
                    $this->redireccionar("addNewIndex.php");
                } else {
                    echo $this->mensaje("Error al subir Noticia");
                }
            } else {
                echo $this->mensaje("Completa todos los campos");
            }
        }
    }

    public function consultarNoticia() {
        if (isset($_GET["ide"])) {
            $noticia = $this->conexion->noticiaIndividual($_GET["ide"]);
            return $noticia;
        } else {
            $this->redireccionar('indexPanel.php');
        }
    }
    
    public function consultarNoticiaIndex() {
        if (isset($_GET["ide"])) {
            $noticia = $this->conexion->noticiaIndividualIndex($_GET["ide"]);
            return $noticia;
        } else {
            $this->redireccionar('indexPanel.php');
        }
    }

    public function mostrarNoticias() {
        $registros = $this->conexion->sectionNews(100);
        $acu = "";
        foreach ($registros as $r) {
            $acu = $acu . '<tbody>
                                <tr>
                                    <td>' . $r["id"] . '</td>
                                    <td><img style="width: 180px; height: auto" src="'.$r["banner"].'"></td>
                                    <td>' . $r["titulo"] . '</td>
                                    <td>' . $r["subtitulo"] . '</td>
                                    <td><a href="../admin/editNew.php?ide=' . $r["id"] . '"><i class="far fa-edit"></i></a></td>
                                    <td><a href="../admin/deleteNew.php?ide=' . $r["id"] . '"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                         </tbody>';
        }
        return $acu;
    }
    
    public function mostrarNoticiasIndx() {
        $registros = $this->conexion->consultarindexnoticias(100);
        $acu = "";
        foreach ($registros as $r) {
            $acu = $acu . '<tbody>
                                <tr>
                                    <td>' . $r["id"] . '</td>
                                    <td><img style="width: 180px; height: auto" src="'.$r["banner"].'"></td>
                                    <td>' . $r["titulo"] . '</td>
                                    <td>' . $r["subtitulo"] . '</td>
                                    <td><a href="../admin/editNewIndex.php?ide=' . $r["id"] . '"><i class="far fa-edit"></i></a></td>
                                    <td><a href="../admin/deleteNewIndex.php?ide=' . $r["id"] . '"><i class="far fa-trash-alt"></i></a></td>
                                </tr>
                         </tbody>';
        }
        return $acu;
    }

    public function modificarNoticia() {
        if (isset($_POST["titulo"]) && isset($_POST["subtitulo"]) && isset($_POST["banner"]) && isset($_POST["circulo"]) && isset($_POST["p1"]) && isset($_POST["p2"]) && isset($_POST["p3"]) && isset($_POST["media"]) && isset($_POST["id"])) {
            if ($_POST["titulo"] <> "" && $_POST["subtitulo"] <> "" && $_POST["banner"] <> "" && $_POST["circulo"] <> "" && $_POST["p1"] <> "" && $_POST["p2"] <> "" && $_POST["p3"] <> "" && $_POST["media"] <> "") {
                if ($this->conexion->modificarNew($_POST["id"],$_POST["titulo"], $_POST["subtitulo"], $_POST["banner"], $_POST["circulo"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["media"])) {
                    echo $this->mensaje("Noticia Modificada");
                    $this->redireccionar("indexPanel.php");
                } else {
                    echo $this->mensaje("Error al subir Noticia");
                }
            } else {
                echo $this->mensaje("Completa todos los campos");
            }
        }
    }
    
    public function modificarNoticiaIndex() {
        if (isset($_POST["titulo"]) && isset($_POST["subtitulo"]) && isset($_POST["banner"]) && isset($_POST["circulo"]) && isset($_POST["p1"]) && isset($_POST["p2"]) && isset($_POST["p3"]) && isset($_POST["media"]) && isset($_POST["id"])) {
            if ($_POST["titulo"] <> "" && $_POST["subtitulo"] <> "" && $_POST["banner"] <> "" && $_POST["circulo"] <> "" && $_POST["p1"] <> "" && $_POST["p2"] <> "" && $_POST["p3"] <> "" && $_POST["media"] <> "") {
                if ($this->conexion->modificarNewIndex($_POST["id"],$_POST["titulo"], $_POST["subtitulo"], $_POST["banner"], $_POST["circulo"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["media"])) {
                    echo $this->mensaje("Noticia Modificada");
                    $this->redireccionar("indexPanel.php");
                } else {
                    echo $this->mensaje("Error al subir Noticia");
                }
            } else {
                echo $this->mensaje("Completa todos los campos");
            }
        }
    }
    
    public function deleteNoticia(){
        if(isset($_POST["id"])){
            if($this->conexion->eliminarNoticia($_POST["id"])){
                echo $this->mensaje("Noticia Eliminada");
                $this->redireccionar("indexPanel.php");
            }
        }
    }

    public function addUsuario(){
        if (isset($_POST["nombre"]) && isset($_POST["apaterno"]) && isset($_POST["amaterno"]) && isset($_POST["usuario"]) && isset($_FILES["foto"]) && isset($_POST["password"]) && isset($_POST["descripcion"])){
            if ($_POST["nombre"] <> "" && $_POST["apaterno"] <> "" && $_POST["amaterno"] <> "" && $_POST["usuario"] <> "" && $_POST["password"] <> "" && $_POST["descripcion"] <> ""){
                if ($_FILES["foto"]["name"] <> ""){
                    if (copy($_FILES["foto"]["tmp_name"], "../imagenes/" . $_FILES["foto"]["name"])){
                        if($this->conexion->agregarUsuario($_POST["nombre"], $_POST["apaterno"], $_POST["amaterno"], $_POST["usuario"], $_POST["password"], $this->dominio.$_FILES["foto"]["name"], $_POST["descripcion"])){
                            $this->redireccionar("addUser.php");
                        }
                    }else{
                        echo $this->mensaje("Error al Registrar");
                    }
                } else{
                    echo $this->mensaje("Foto obligatoria");
                }
            }else{
                 echo $this->mensaje("Completa todos los campos");
            }
        }else {
            
        }
    }


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function addNew() {
        if (isset($_POST["titulo"]) && isset($_POST["subtitulo"]) && isset($_FILES["banner"]) && isset($_FILES["circulo"]) && isset($_POST["p1"]) && isset($_POST["p2"]) && isset($_POST["p3"]) && isset($_POST["media"])) {
            if ($_POST["titulo"] <> "" && $_POST["subtitulo"] <> "" && $_FILES["banner"] <> "" && $_FILES["circulo"] <> "" && $_POST["p1"] <> "" && $_POST["p2"] <> "" && $_POST["p3"] <> "" && $_POST["media"] <> "") {
                if ($_FILES["banner"]["name"] <> "" && $_FILES["circulo"]["name"] <> "") {
                    copy($_FILES["banner"]["tmp_name"], "../images/" . $_FILES["banner"]["name"]);
                    copy($_FILES["circulo"]["tmp_name"], "../images/" . $_FILES["circulo"]["name"]);
                    if ($this->conexion->agregarNoticia($_POST["titulo"], $_POST["subtitulo"], $this->dominio . $_FILES["banner"]["name"], $this->dominio . $_FILES["circulo"]["name"], $_POST["p1"], $_POST["p2"], $_POST["p3"], $_POST["media"])) {
                        $this->redireccionar("indexPanel.php");
                    } else {
                        return $this->mensaje("Error");
                    }
                } else {
                    return $this->mensaje("Error");
                }
            } else {
                return $this->mensaje("Completa todos los campos");
            }
        }
    }

}
