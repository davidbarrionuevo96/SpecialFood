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
        $this->model->tomar($idpedido);
        $this->view->generate('pedidolist.php', 'template_view.php');
    }
}
