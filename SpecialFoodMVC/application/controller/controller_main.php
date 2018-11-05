<?php

class Controller_Main extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

	function iniciarsesion(){
        $this->view->generate('iniciar_sesion.php', 'template_view.php');
    }    
}