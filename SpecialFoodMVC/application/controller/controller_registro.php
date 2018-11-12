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

            $username=$_POST['username'];
            $password=$_POST['password'];

            if(isset($_POST['cuil'])){
                $cuil=$_POST['cuil'];
            }  
            else{
                $cuit=$_POST['cuit'];
            }

            $perfil=$_POST['perfil'];

            $validacion = true;
/*
            if(!empty($cuil)){
                if(empty($nombre) ||empty($apellido) ||empty($calle) ||empty($password) ||empty($cuil)){
                    echo "<p class='labelform editado'>Complete todos los datos para guardar</p>";
                }                
            }
            else if(!empty($cuit)){
                if(empty($nombre) ||empty($apellido) ||empty($calle) ||empty($password) ||empty($cuit)){
                    echo "<p class='labelform editado'>Complete todos los datos para guardar</p>";
                } 
            }
            else{
                echo "true";
                $validacion = true;
            }*/

            if($validacion == true){
                
                $usuarioCorrecto = $this->model->validar_usuario($username);

                if($usuarioCorrecto == true)            
                {
                    echo "aca";
                    $this->model->guardar_usuario($nombre, $apellido, $calle, $numero, $username, $password, $cuil, $perfil);
                    
                }else{
                    echo "el usuario ingresado ya existe.";
                }
            }
            
        }
    }
