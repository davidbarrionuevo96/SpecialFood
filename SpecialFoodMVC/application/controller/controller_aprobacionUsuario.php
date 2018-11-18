<?php

class Controller_aprobacionUsuario extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function ListarAprobacionUsuarios(){

        $data = $this->model->getListAprobacionUsuario();
        $this->view->generate('estadoAprobacionUsuarios.php', 'template_view.php', $data);
    }

    function Aceptar(){
        $id = $_GET["id"];
        $data = $this->model->Aceptar($id);
        $this->view->generate('estadoAprobacionUsuarios.php', 'template_view.php', $data);
    }

    function Rechazar(){
        $id = $_GET["id"];
        $data = $this->model->Rechazar($id);
        $this->view->generate('estadoAprobacionUsuarios.php', 'template_view.php', $data);
    }

}
