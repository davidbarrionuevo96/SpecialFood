<?php

class Controller_Comercio extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

	function nuevo(){
        $this->view->generate('puntodeventanuevo.php', 'template_view.php');
    }
    function guardar(){
   
        $numero = $_POST['pdv_numero'];
        $idcomercio = $_POST['pdv_idcomercio'];
        $idcalle = $_POST['pdv_idcalle'];
        $idusuario = $_POST['pdv_idusuario'];

        if (empty($numero) ||empty($idcomercio) || empty($idcalle) || empty($idusuario)) {

            echo "<p class='labelform editado'>Complete todos los datos para guardar</p>";

        } else {

           $this->model->guardar($numero , $fechamodificacion,$idusuario);
        }
    }
    function eliminar(){
        $numero=$_POST['pdv_numero'];
           $this->model->eliminar($numero);
        
    }
}
