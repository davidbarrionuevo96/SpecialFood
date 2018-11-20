<?php

class Controller_menuitems extends Controller{
    function index(){
        $this->view->generate('main_view.php', 'template_view.php');
    }

    function nuevo(){
        $this->view->generate('Menuitemsnuevo.php', 'template_view.php');
    }

    function guardar(){

        $producto=$_POST['Producto_nombre'];
        $producto= strtolower($producto);
        $producto= ucfirst($producto);

        $precio=$_POST['Producto_precio'];

        $imagen=$_POST['imagen'];
        $idMenu=$_POST['idMenu'];

        if (empty($producto) || empty($precio)|| empty($imagen)) {

            echo "<br>"."<div class='letraerror'>"."Campos vacios"."</div>";

        } else {

            $guardar = $this->model->guardar($producto , $precio, $imagen,$idMenu);


            if($guardar == true){
            	echo "<br>"."<div class='letraerror'>"."Guardado Correctamente"."</div>";
            }
            else{
            	echo "<br>"."<div class='letraerror'>"."Producto Existente"."</div>";
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


        $Descripcion=$_POST['Producto_nombre'];
        $Descripcion= strtolower($Descripcion);
        $Descripcion= ucfirst($Descripcion);
        $Precio=$_POST['Producto_precio'];
        $Imagen=$_POST['imagen'];
        $id=$_POST['idMenu'];

        if($Descripcion==null || $Precio==null ) {
            echo "<br>"."<div class='letraerror'>"."No se aceptan campos vacios"."</div>";
        }
        else{

            $data=$this->model->actualizar($Descripcion,$Precio,$Imagen,$id);
            $this->view->generate('listarmenu.php', 'template_view.php', $data);
        }

}
}