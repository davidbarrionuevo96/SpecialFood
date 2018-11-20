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

        if (empty($producto) || empty($precio)|| empty($imagen)) {

            echo "<br>"."<div class='letraerror'>"."El Precio es un capo numerico"."</div>";

        } else {

            $guardar = $this->model->guardar($producto , $precio, $imagen);

            if($guardar == true){
            	echo "<br>"."<div class='letraerror'>"."Guardado Correctamente"."</div>";
            }
            else{
            	echo "<br>"."<div class='letraerror'>"."Producto Existente"."</div>";
            }
        }
    }
}