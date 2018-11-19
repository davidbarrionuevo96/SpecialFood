<?php

class Controller_puntodeventa extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function puntodeventamanager(){
        $this->view->generate('puntodeventamanager.php', 'template_view.php');
    }

    function puntodeventalist(){

        $this->view->generate('puntodeventalist.php', 'template_view.php');

    }

    function guardar(){

        $numero = $_POST['puntodeventa_numero'];
        $idcalle = $_POST['puntodeventa_idcalle'];
        $idusuariomodificacion=$_POST['puntodeventa_idusuariomodificacion'];
        $idcomercio = $_POST['puntodeventa_idcomercio'];


        if (empty($numero) || empty($idcomercio) || empty($idcalle) || empty($idusuariomodificacion)) {

            echo "<p class='labelform editado'>Complete todos los datos para guardar</p>";

        } else {

            $this->model->guardar($numero , $idcomercio,$idusuariomodificacion,$idcalle);
        }
    }
    function eliminar(){
        $idpuntodeventa=$_GET['idpuntodeventa'];
        $this->model->eliminar($idpuntodeventa);

    }
}
