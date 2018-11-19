<?php

class Controller_Comercio extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

	function comerciomanager(){
        $idComercio = $_GET['id'];

        if ($idComercio == 0)
        {
            $this->view->generate('comerciomanager.php', 'template_view.php');
        }
        else
        {
            $data = $this->model->getComercioById($idComercio);

            $this->view->generate('comerciomanager.php', 'template_view.php', $data);
        }
    }

    function comerciolist(){
        $this->view->generate('comerciolist.php', 'template_view.php');
    }

    function guardar(){
        $idComercio = $_POST['Comercio_id'];

        $nombre = $_POST['Comercio_nombre'];
        $nombre = ucfirst($nombre);

        $cuit = $_POST['Comercio_CUIT'];

        if (empty($nombre) || empty($cuit)) {

            echo "<p class='labelform editado'>Complete todos los datos para guardar</p>";

        } else {

           $this->model->guardar($nombre, $cuit, $idComercio);

           $this->view->generate('comerciolist.php', 'template_view.php');
        }
    }

    function eliminar(){
        $idDelete = $_GET['id'];

        $this->model->delete($idDelete);

        $this->view->generate('comerciolist.php', 'template_view.php');
    }
}
