<?php

class Controller_Cobranza extends Controller{

    function cobranzascomercio(){
        $this->view->generate('cobranzascomercio.php', 'template_view.php');
    }

    function cobranzasdelivery(){
        $this->view->generate('cobranzasdelivery.php', 'template_view.php');
    }
}
