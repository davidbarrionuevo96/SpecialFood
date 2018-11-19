<?php

class Controller_pedido extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function pedidomanager(){
        $this->view->generate('pedidomanager.php', 'template_view.php');
    }

    function pedidolist(){
        $this->view->generate('pedidolist.php', 'template_view.php');

    }

    function guardar(){

        $tiempoestimadoentrega = $_POST['pedido_tiempoestimadoentrega'];
        $idcomercio=$_POST['pedido_idcomercio'];
        $idcliente=$_POST['pedido_idcliente'];
        $idpuntodeventa=$_POST['pedido_idpuntodeventa'];
        $idusuariomodificacion=$_POST['pedido_idusuariomodificacion'];
        $costoentrega = $_POST['pedido_costoentrega'];


        if (empty($tiempoestimadoentrega) || empty($costoentrega) || empty($idcomercio) || empty($idpuntodeventa) || empty($idusuariomodificacion) || empty($idpuntodeventa)) {

            echo "<p class='labelform editado'>Complete todos los datos para guardar</p>";

        } else {

            $this->model->guardar($tiempoestimadoentrega , $costoentrega,$idcomercio,$idcliente,$idpuntodeventa,$idusuariomodificacion);
        }
    }
    function eliminar(){
        $idpedido=$_GET['idpedido'];
        $this->model->eliminar($idpedido);

    }
}
