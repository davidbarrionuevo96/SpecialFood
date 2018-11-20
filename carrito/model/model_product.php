<?php

class Model_Product extends Model{
    public function getList(){
        $productList[] = "Producto1";
        $productList[] = "Producto2";
        return $productList;
    }

    public function getProductosList(){
	    
    	include ('core/helpers/conexion.php');	

    	$limit = 9;
			if(isset($_POST["setPage"])){
				$pageno = $_POST["pageNumber"];
				$start = ($pageno * $limit) - $limit;
			}else{
				$start = 0;
			}	

		$productList = array();

	    $product_query = "SELECT * FROM menuComercioItem ";
		$run_query = mysqli_query($conexion,$product_query);

		if($run_query == true){

			while($rows=mysqli_fetch_assoc($run_query))
				{
					$productList[] = $rows;
				}

			return $productList;
		}

	}

	public function getListPedidos($idUsurio){
	    
    	include ('core/helpers/conexion.php');	

		$pedidos = array();

	    $product_query = "SELECT mci.Descripcion, 
	    						 pi.PrecioUnitario, 
	    						 pi.Cantidad , (pi.Cantidad*pi.PrecioUnitario) 'CostoTotal'  
						FROM PedidoItem pi
						LEFT JOIN Pedido p ON p.IdPedido = pi.IdPedido
						LEFT JOIN menucomercioitem mci ON mci.IdMenuComercioItem = pi.IdMenuComercioItem
						WHERE p.IdEstadoEntrega = 1 AND p.IdCliente = ".$idUsurio."";
		$run_query = mysqli_query($conexion,$product_query);
		
		while($rows=mysqli_fetch_assoc($run_query))
			{
				$pedidos[] = $rows;
			}

		return $pedidos;
	}

	public function getItem($idProducto){
	    
    	include ('core/helpers/conexion.php');	

		$item = array();

	    $product_query = "SELECT  	mci.IdMenuComercioItem 'IdMenuComercioItem' , 
									mci.Descripcion 'Descripcion' ,
							        mci.Precio 'Precio' , 
							        mci.IdMenuComercio 'IdMenuComercio' , 
									mc.IdComercio 'IdComercio' , 
							        pv.IdPuntoDeVenta 'IdPuntoDeVenta' 
						FROM menucomercioItem mci 
							LEFT JOIN menucomercio mc	ON mc.IdMenuComercio = mci.IdMenuComercio
							LEFT JOIN puntodeventa pv	ON pv.IdComercio = mc.IdComercio
						WHERE mci.Idmenucomercioitem = ".$idProducto."" ;
		$run_query = mysqli_query($conexion,$product_query);

		
		while($rows=mysqli_fetch_assoc($run_query))
		{
			$item[] = $rows;
		}	

		return $item;
	}


	public function CrearPedido($producto, $tiempoEstimado, $cliente, $costoEntrega){
	    
    	include ('core/helpers/conexion.php');	
    	$idComercio = $producto[0]['IdComercio'];
    	$puntoDeVenta = $producto[0]['IdPuntoDeVenta'];

	     $sqlInsert = "INSERT INTO `Pedido`
                    (
                        `FechaPedido`,
                        `CostoEntrega`,
                        `TiempoEstimadoEntrega`,
                        `IdComercio`,
                        `IdCliente`,
                        `IdPuntoDeVenta`,
                        `IdEstadoEntrega`,
                        `bajalogica`,
                        `fechamodificacion`,
                        `idusuariomodificacion`)
                    VALUES
                    (
                        now(),
                        $costoEntrega,
                        $tiempoEstimado,
                        $idComercio,
                        $cliente,
                        $puntoDeVenta,
                        1,
                        0,
                        now(),
                        1);";

        $result=mysqli_query($conexion,$sqlInsert);
	}

	public function CrearPedidoItem($producto, $cantidad){
	    
    	include ('core/helpers/conexion.php');	

    	$precio = $producto[0]['Precio'];
    	$idMenuComercioItem = $producto[0]['IdMenuComercioItem'];
    	
	     $sqlInsert = "INSERT INTO `PedidoItem`
                    (
                        `Cantidad`,
                        `PrecioUnitario`,
                        `IdPedido`,
                        `IdMenuComercioItem`,
                        `bajalogica`,
                        `fechamodificacion`,
                        `idusuariomodificacion`)
                    VALUES
                    (
                        $cantidad,
                        $precio,
                        (SELECT MAX(IdPedido)'IdPedido' FROM Pedido),
                        $idMenuComercioItem,
                        0,
                        now(),
                        1);";

        $result=mysqli_query($conexion,$sqlInsert);
	}
}