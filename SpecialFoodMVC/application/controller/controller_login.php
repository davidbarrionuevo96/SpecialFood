<?php

class Controller_Login extends Controller{

    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function login(){
            $this->view->generate('iniciar_sesion.php', 'template_view.php');
    }

    function cerrarSesion(){
        session_destroy();
        //$this->view->generate('main_view.php', 'template_view.php');
        header("Location: http://localhost/main/index");
    }

    function iniciar_sesion(){ 
        	// data sent from form login.html 
        $email = $_POST['email']; 
        $password = $_POST['password'];

        if($email != "" && $password != ""){         
            $row = $this->model->ValidarUsuario($email,  $password);

            if( $row != null){
                $_SESSION['loggedin'] = true;
                $_SESSION['idPerfil'] = $row['IdPerfil'];
                $_SESSION['name'] = $row['Nombre'];
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
                
                header("Location: http://localhost/main/index");
            }
            else { 
                header("Location: http://localhost/login/login");		
            }	 
        }else{
            header("Location: http://localhost/login/login");
        }
    }
}

