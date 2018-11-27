<?php

class Controller_menuitems extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function nuevo(){
        $this->view->generate('menuitemsnuevo.php', 'template_view.php');
    }

    function guardar(){

        $Desde=$_POST['Desde'];

        $Hasta=$_POST['Hasta'];

        $oferta=$_POST['Oferta'];

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


        $this->model->guardar($producto , $precio, $destino,$idMenu, $oferta, $Desde, $Hasta);
        header("Location: http://localhost/Menu/ListarMenu");


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

        $Desde=$_POST['Desde'];

        $Hasta=$_POST['Hasta'];

        $Oferta=$_POST['Oferta'];

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


        $data=$this->model->actualizar($producto , $precio, $destino,$idMenu,$Oferta,$Desde,$Hasta);
        $this->view->generate('listarmenu.php', 'template_view.php', $data);


}}
