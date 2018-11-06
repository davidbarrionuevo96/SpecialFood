<?php

class Controller_Comercio extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

	function nuevo(){
        $this->view->generate('comercionuevo.php', 'template_view.php');
    }

    function guardar(){
   
            $nombre = $_POST['Comercio_nombre'];
            $nombre = ucfirst($nombre);

            $cuit = $_POST['Comercio_CUIT'];


            if (empty($nombre) || empty($cuit)) {

                echo "<p class='labelform editado'>Complete todos los datos para guardar</p>";

            } else {

               $this->model->guardar($nombre , $cuit);
            }
        //}
    }
}
