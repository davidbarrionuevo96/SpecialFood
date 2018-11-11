<?php

class Controller_Login extends Controller{

    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function iniciar_sesion(){ 
        if(isset($_POST["username"]) && isset($_POST["password"]))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $usuarioCorrecto = $this->model->validar_usuario($username ,$password);

            if($usuarioCorrecto == true)            
            {
                 $this->model->iniciar_sesion($username , $password);

                $this->view->generate('main_view.php', 'template_view.php');
            }else{
                echo "Usuario o Contraseña incorrectos.";
            }
        }
    }
}

