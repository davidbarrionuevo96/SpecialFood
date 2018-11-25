<?php

class Controller_registro extends Controller{

    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function cargarPantalla(){
        $this->view->generate('registrarse.php', 'template_view.php');
    }
    
    function cargarPantalla2(){
        $idUsuario = $_GET['id'];
        
        $data = $this->model->getUsuarioById($idUsuario);

        $this->view->generate('registrarsemanager.php', 'template_view.php', $data);
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
            $this->view->generate('iniciar_sesion.php', 'template_view.php');
            
        }else{
            echo "El email ingresado ya existe.";
            $this->view->generate('registrarse.php', 'template_view.php');
        }
    }


    function modificar_registro(){

        $idUsuario=$_POST['Usuario_id'];
       
        $nombre=$_POST['nombre'];
        $nombre=ucfirst($nombre);

        $apellido=$_POST['apellido'];
        $apellido=ucfirst($apellido);

        $calle=$_POST['calle'];

        $numero=$_POST['numero'];

        //$password=$_POST['password'];

        $this->model->modificar_usuario($idUsuario, $nombre, $apellido,/* $password,*/ $calle, $numero);
        $this->view->generate('main_view.php', 'template_view.php');
    }
}
