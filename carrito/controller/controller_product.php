<?php

class Controller_Product extends Controller{

    function listProduct(){
        $data = $this->model->getList();
        $this->view->generate('product_list_view.php', 'template_view.php', $data);
    }

    function listarProductos(){
        $data = $this->model->getProductosList();
        $this->view->generate('seleccionProductos.php', 'template_view.php', $data);
    }

    function irACarrito(){

    	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

    		if(isset($_SESSION['IdUsuario'])){

    			$cliente = $_SESSION['IdUsuario'];
    			$idProducto = $_GET['IdProducto'];
    			$cantidad = $_GET['Cantidad'];

    			$producto = $this->model->getItem($idProducto);

    			$tiempoEstimado = 10;
    			$costoDeEntrega = 10.0;

    			$this->model->CrearPedido($producto, $tiempoEstimado, $cliente, $costoDeEntrega);

    			$this->model->CrearPedidoItem($producto, $cantidad);

    			$usuario = $_SESSION['IdUsuario'];
    			$pedidosPendientes = $this->model->getListPedidos($usuario);

    			$this->view->generate('carritoDeCompra.php', 'template_view.php',$pedidosPendientes);
	    	}
			else
			{
	    		header("Location: http://localhost/login/login");
	    	}
    	}
        else
            {
                header("Location: http://localhost/login/login");
            }
    }
}