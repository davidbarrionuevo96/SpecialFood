<?php

class Controller_pedido extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }


    function pedidolist(){
        $this->view->generate('pedidolist.php', 'template_view.php');

    }

    function tomar(){
        $idpedido=$_GET['id'];
        $idUsuario=$_GET['idUsuario'];
        $this->model->tomar($idpedido,$idUsuario);
        $this->view->generate('pedidolist.php', 'template_view.php');
    }

    function entregado(){
        $idpedido=$_GET['id'];
        
        $data = $this->model->entregado($idpedido);

        //var_dump($data['Penalizar']);
        if ((int)$data['Penalizar'] == 1)
            $this->model->crearPenalidad($idpedido);

        $this->view->generate('pedidolist.php', 'template_view.php');
    }
}
