<?php

class Controller_Login extends Controller{

    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function iniciar_sesion(){ 
        if(isset($_POST["email"]) && isset($_POST["password"]))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuarioCorrecto = $this->model->validar_usuario($email ,$password);

            if($usuarioCorrecto == true)            
            {
                 $this->model->iniciar_sesion($email , $password);

                $this->view->generate('main_view.php', 'template_view.php');
            }else{
                echo "Usuario o Contraseña incorrectos.";
            }
        }
    }
}

