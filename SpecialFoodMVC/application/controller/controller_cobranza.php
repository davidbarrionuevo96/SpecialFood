<?php

class Controller_Cobranza extends Controller{

    function cobranzascomercio(){
        $this->view->generate('cobranzascomercio.php', 'template_view.php');
    }

    function cobranzasdelivery(){
        $this->view->generate('cobranzasdelivery.php', 'template_view.php');
    }

    function liquidaciondelivery(){
       $this->model->liquidardeliverys();

       $this->view->generate('cobranzasdelivery.php', 'template_view.php');
    }

    function liquidacioncomercio(){
       $this->model->liquidarcomercios();

       $this->view->generate('cobranzascomercio.php', 'template_view.php');
    }

    function liquidacionescomercio(){
        $this->view->generate('liquidacionescomercio.php', 'template_view.php');
    }

    function liquidacionesdelivery(){
        $this->view->generate('liquidacionesdelivery.php', 'template_view.php');
    }
}
