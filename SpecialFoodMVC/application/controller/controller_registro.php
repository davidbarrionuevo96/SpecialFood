<?php

class Controller_registro extends Controller{

    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function nuevoregistro(){
       

            $nombre=$_POST['nombre'];
            $nombre=ucfirst($nombre);

            $apellido=$_POST['apellido'];
            $apellido=ucfirst($apellido);

            $calle=$_POST['calle'];
            $calle=ucfirst($calle);

            $numero=$_POST['numero'];

            $email=$_POST['email'];
            $password=$_POST['password'];

            /*if(isset($_POST['cuil'])){
                $cuil=$_POST['cuil'];
            }  
            else{
                $cuil=$_POST['cuit'];
            }*/

            $cuil=$_POST['cuil'];
            $cuit=$_POST['cuit'];

            $perfil=$_POST['perfil'];

                
            $usuarioCorrecto = $this->model->validar_usuario($email);

            if($usuarioCorrecto == true)            
            {
                //echo "aca";
                $this->model->guardar_usuario($nombre, $apellido, $password, $email, $cuil, $cuit, $calle, $numero, $perfil);
                
            }else{
                echo "El email ingresado ya existe.";
            }
        }
    }
