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

    function verCarritoDeCompra(){
        $cliente = $_SESSION['IdUsuario'];

        $pedidos = $this->model->getListPedidos($cliente);

        $this->view->generate('carritoDeCompra.php', 'template_view.php',$pedidos);
    }

    function irACarrito(){

    	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

    		if(isset($_SESSION['IdUsuario'])){
    			$cliente = $_SESSION['IdUsuario'];
    			$idProducto = $_GET['IdProducto'];
    			$cantidad = $_GET['Cantidad'];

    			$producto = $this->model->getItem($idProducto);

                $pedidoEnCurso = $this->model->getPedidoByCliente($cliente);

                    if($pedidoEnCurso != 0){

                        $this->model->CrearPedidoItem($producto, $cantidad);

                        $usuario = $_SESSION['IdUsuario'];

                        $_SESSION['IdPedido'] = $pedidoEnCurso;

                        $pedidosPendientes = $this->model->getListPedidos($usuario);

                        $this->view->generate('carritoDeCompra.php', 'template_view.php',$pedidosPendientes);

                    }else{

                        $tiempoEstimado = 10;
                        $costoDeEntrega = 10.0;

                        $this->model->CrearPedido($producto, $tiempoEstimado, $cliente, $costoDeEntrega);

                        $this->model->CrearPedidoItem($producto, $cantidad);

                        $usuario = $_SESSION['IdUsuario'];

                        $_SESSION['IdPedido'] = $this->model->getPedidoByCliente($cliente);

                        $pedidosPendientes = $this->model->getListPedidos($usuario);

                        $this->view->generate('carritoDeCompra.php', 'template_view.php',$pedidosPendientes);
                    }
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

    function confirmarPedido(){

        if (isset($_SESSION['IdPedido'])) {

        $IdPedido = $_SESSION['IdPedido'];
        
        $this->model->confirmarPedido($IdPedido);

        unset($_SESSION['IdPedido']);  

        header("Location: http://localhost/pedido/pedidolist");

        }
        else{
            header("Location: http://localhost");
        }
    }

    function cancelarPedido(){

        if (isset($_SESSION['IdPedido'])) {

            $IdPedido = $_SESSION['IdPedido'];

            $this->model->cancelarPedido($IdPedido);

            unset($_SESSION['IdPedido']);  

            
            header("Location: http://localhost");
        }else{
            header("Location: http://localhost");
        }
    }

    function eliminarItem(){

        if (isset($_SESSION['IdPedido'])) {
            
            $IdPedido = $_SESSION['IdPedido'];
            $IdItem = $_GET['item'];
            $usuario = $_SESSION['IdUsuario'];

            $this->model->elimitarItemDePedido($IdPedido, $IdItem);

            $pedidosPendientes = $this->model->getListPedidos($usuario);

            if(count($pedidosPendientes) >= 1){

                $this->view->generate('carritoDeCompra.php', 'template_view.php', $pedidosPendientes);

            }else{

                $IdPedido = $_SESSION['IdPedido'];

                $this->model->cancelarPedido($IdPedido);

                $this->listarProductos();
            }          
        }
            
    }
    
}