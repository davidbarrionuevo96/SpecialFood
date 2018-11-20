<?php

class Controller_puntodeventa extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function puntodeventamanager(){
        $idPuntoDeVenta = $_GET['id'];

        if ($idPuntoDeVenta == 0)
        {
            $this->view->generate('puntodeventamanager.php', 'template_view.php');
        }
        else
        {
            $data = $this->model->getPuntoDeVentaById($idPuntoDeVenta);

            $this->view->generate('puntodeventamanager.php', 'template_view.php', $data);
        }
    }

    function puntodeventalist(){

        $this->view->generate('puntodeventalist.php', 'template_view.php');

    }

    function guardar(){
        $idPuntoDeVenta = $_POST['puntodeventa_id'];
        $numero = $_POST['puntodeventa_numero'];
        $idcalle = $_POST['puntodeventa_idcalle'];
        $idcomercio = $_POST['puntodeventa_idcomercio'];


        if (empty($numero) || empty($idcomercio) || empty($idcalle)) {

            echo "<p class='labelform editado'>Complete todos los datos para guardar</p>";

        } else {
            $this->model->guardar($numero , $idcomercio,$idPuntoDeVenta,$idcalle);

            $this->view->generate('puntodeventalist.php', 'template_view.php');

        }
    }
    function eliminar(){

        $idDelete = $_GET['id'];

        $this->model->delete($idDelete);

        $this->view->generate('puntodeventalist.php', 'template_view.php');

    }
}
