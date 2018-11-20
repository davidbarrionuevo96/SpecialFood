<?php

class Controller_menu extends Controller{

    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function nuevoMenu(){
        $this->view->generate('menunuevo.php', 'template_view.php');
    }

    function guardar(){

            $comercio=$_POST['Comercio_nombre'];
            $comercio= strtolower($comercio);
            $comercio= ucfirst($comercio);


            if($comercio==null){
                echo "<br>"."<div class='letraerror'>"."No se aceptan campos vacios"."</div>";
            }
            else{
                $guardar = $this->model->guardar($comercio);

                $data = $this->model->getListMenu();
                
                $this->view->generate('listarmenu.php', 'template_view.php', $data);        
            }

    }

    function ListarMenu(){

        $data = $this->model->getListMenu();
        $this->view->generate('listarmenu.php', 'template_view.php', $data);
    }

    function verDetalle(){

            $id = $_GET["id"];
            $data = $this->model->getListMenuPorId($id);
            $this->view->generate('listarmenuitems.php', 'template_view.php', $data);
    }

    function Eliminar(){
        $id = $_GET["id"];
        $data = $this->model->getListParaEliminar($id);
        $this->view->generate('listarmenu.php', 'template_view.php', $data);
    }

    function Modificar (){
        $id = $_GET["id"];
        $data = $this->model->getListParaModificar($id);
        $this->view->generate('ModificarMenu.php', 'template_view.php', $data);
    }

    function actualizar(){

        $comercio=$_POST['Comercio_nombre'];
        $comercio= strtolower($comercio);
        $comercio= ucfirst($comercio);
        $id=$_POST['idMenu'];

        if($comercio==null){
            echo "<br>"."<div class='letraerror'>"."No se aceptan campos vacios"."</div>";
        }
        else{

        $data=$this->model->actualizar($comercio,$id);
        $this->view->generate('listarmenu.php', 'template_view.php', $data);
    }
    }


}

