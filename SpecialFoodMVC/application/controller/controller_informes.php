<?php

class Controller_Informes extends Controller{
    
    function informeslist(){
        $this->view->generate('informeslist.php', 'template_view.php');
    }

    function rankings(){
        $this->view->generate('rankings.php', 'template_view.php');
    }    
}
