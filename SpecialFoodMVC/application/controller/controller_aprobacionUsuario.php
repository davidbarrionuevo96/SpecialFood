<?php

class Controller_aprobacionUsuario extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function ListarAprobacionUsuarios(){

        $data = $this->model->getListAprobacionUsuario();
        $this->view->generate('aprobar_usuarios_list.php', 'template_view.php', $data);
    }

    function Aceptar(){
        $id = $_GET["id"];
        $idcomercio = $_GET["IdComercio"];

        $data = $this->model->Aceptar($id, $idcomercio);

        $msgError = "";

        if($data != null){
            $this->view->generate('aprobar_usuarios_list.php', 'template_view.php', $data,$msgError);
        }
        else{
            $msgError = "Limite de usuarios permitidos por Comercio";
            $this->view->generate('aprobar_usuarios_list.php', 'template_view.php', $data,$msgError);
        }
    }

    function Rechazar(){
        $id = $_GET["id"];
        $data = $this->model->Rechazar($id);
        $this->view->generate('aprobar_usuarios_list.php', 'template_view.php', $data);
    }

}
