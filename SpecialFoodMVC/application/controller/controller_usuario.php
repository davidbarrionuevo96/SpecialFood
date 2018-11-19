<?php

class Controller_usuario extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function usuariolist(){

        $this->view->generate('usuariolist.php', 'template_view.php');

    }

}
