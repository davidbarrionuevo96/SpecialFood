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
        header("Location: http://localhost/");
    }

    function iniciar_sesion(){ 
        	// data sent from form login.html 
        $email = $_POST['email']; 
        $password = $_POST['password'];

        if($email != "" && $password != ""){         
            $row = $this->model->ValidarUsuario($email,  $password);

            if( $row != null){
                $_SESSION['loggedin'] = true;
                $_SESSION['IdUsuario'] = $row['IdUsuario'];
                $_SESSION['nombre'] = $row['Nombre'];
                $_SESSION['IdPerfil'] = $row['IdPerfil'];
                $_SESSION['IdEstadoAprobacionUsuario'] = $row['IdEstadoAprobacionUsuario'];
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;
                
                if($row['IdPerfil'] == 2 || $row['IdPerfil'] == 3){

                    if($row['IdEstadoAprobacionUsuario'] == 1 ){
                        $_SESSION['estadoAprobacion1'] = false;
                        header("Location: http://localhost/login/login");
                    }else if ($row['IdEstadoAprobacionUsuario'] == 3 ){
                        $_SESSION['estadoAprobacion3'] = false;
                        header("Location: http://localhost/login/login");
                    } else{
                        header("Location: http://localhost/");  
                    }
                }else{
                    header("Location: http://localhost/");
                }
            }
            else { 
                $_SESSION['loggedin'] = false;
                header("Location: http://localhost/login/login");		
            }	 
        }else{
            header("Location: http://localhost/login/login");
        }
    }
}

