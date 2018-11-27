<?php

class Controller_menuitems extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function nuevo(){
        $this->view->generate('menuitemsnuevo.php', 'template_view.php');
    }

    function guardar(){
        $producto=$_POST['Producto_nombre'];
        $producto= strtolower($producto);
        $producto= ucfirst($producto);
        $idMenu=$_POST['idMenu'];
        $precio=$_POST['Producto_precio'];

        $nombre = $_FILES['imagen']['name'];

        $nombrer = strtolower($nombre);

        $cd=$_FILES['imagen']['tmp_name'];
        $ruta ="img/" .  $_FILES['imagen']['name'];
        $destino = "img/" . $nombrer;
        $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

        if (empty($producto) || empty($idMenu) || empty($precio) || empty($resultado)) {

            echo "<br>"."<div class='letraerror'>"."Campos vacios"."</div>";

        } else {

            $guardar = $this->model->guardar($producto , $precio, $destino,$idMenu);


            if($guardar == true){
                header("Location: http://localhost/Menu/ListarMenu");
            }
            else{
                header("Location: http://localhost/");
            }
        }
    }


    }

    function Eliminar(){
        $id = $_GET["id"];
        $data = $this->model->getListParaEliminar($id);
        $this->view->generate('listarmenu.php', 'template_view.php', $data);
    }

    function Modificar (){
        $id = $_GET["id"];
        $data = $this->model->getListParaModificar($id);
        $this->view->generate('ModificarMenuItems.php', 'template_view.php', $data);
    }

    function actualizar(){


        $producto=$_POST['Producto_nombre'];
        $producto= strtolower($producto);
        $producto= ucfirst($producto);
        $idMenu=$_POST['idMenu'];
        $precio=$_POST['Producto_precio'];

        $nombre = $_FILES['imagen']['name'];

        $nombrer = strtolower($nombre);

        $cd=$_FILES['imagen']['tmp_name'];
        $ruta ="img/" .  $_FILES['imagen']['name'];
        $destino = "img/" . $nombrer;
        $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

        if($producto==null || $precio==null ) {
            echo "<br>"."<div class='letraerror'>"."No se aceptan campos vacios"."</div>";
        }
        else{

            $data=$this->model->actualizar($producto , $precio, $destino,$idMenu);
            $this->view->generate('listarmenu.php', 'template_view.php', $data);
        }

}
