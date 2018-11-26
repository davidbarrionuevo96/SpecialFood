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

	public function getListPedidos($idUsuario){
	    
    	include ('core/helpers/conexion.php');	

		$pedidos = array();

	    $product_query = "SELECT p.IdPedido,
	    						 pi.IdPedidoItem,
	    						 mci.Descripcion, 
	    						 pi.PrecioUnitario, 
	    						 pi.Cantidad , 
	    						 (pi.Cantidad * pi.PrecioUnitario) 'CostoTotal'  
						FROM Pedido p
						INNER JOIN PedidoItem pi ON p.IdPedido = pi.IdPedido AND pi.bajalogica = 0
						LEFT JOIN menucomercioitem mci ON mci.IdMenuComercioItem = pi.IdMenuComercioItem AND mci.bajalogica = 0
						WHERE p.IdEstadoPedido = 1 AND p.bajalogica = 0 AND p.IdCliente = ".$idUsuario."" ;
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
							LEFT JOIN menucomercio mc	ON mc.IdMenuComercio = mci.IdMenuComercio AND mc.BajaLogica = 0 
							LEFT JOIN puntodeventa pv	ON pv.IdComercio = mc.IdComercio AND pv.BajaLogica = 0 
						WHERE mci.BajaLogica = 0 AND mci.Idmenucomercioitem = ".$idProducto."" ;
		$run_query = mysqli_query($conexion,$product_query);

		
		while($rows=mysqli_fetch_assoc($run_query))
		{
			$item[] = $rows;
		}	

		return $item;
	}

	public function getPedidoByCliente($idCliente){
	    
    	include ('core/helpers/conexion.php');	

		$item = array();

	    $product_query = "	 SELECT  ped.IdPedido 'IdPedido',
								     ped.FechaPedido,
								     ped.CostoEntrega,
								     ped.TiempoEstimadoEntrega,
								     ped.IdCliente,
								     ped.IdPuntoDeVenta,
								     ped.IdEstadoPedido,
								     ped.BajaLogica,
								     ped.FechaModificacion,
								     ped.IdUsuarioModificacion
								FROM pedido ped
								WHERE ped.BajaLogica = 0 AND ped.IdEstadoPedido = 1 AND ped.IdCliente = ".$idCliente."" ;
								
		$run_query = mysqli_query($conexion,$product_query);
		
		if($run_query == true){

			$rows=mysqli_fetch_assoc($run_query);

			if(isset($rows)){
				
				$item[] = $rows;

				return $item[0]['IdPedido'];
			}
			else{

				return 0;
			}
		}
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
                        `IdCliente`,
                        `IdPuntoDeVenta`,
                        `IdEstadoPedido`,
                        `bajalogica`,
                        `fechamodificacion`,
                        `idusuariomodificacion`)
                    VALUES
                    (
                        now(),
                        $costoEntrega,
                        $tiempoEstimado,
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

	public function elimitarItemDePedido($idPedido, $idItem){
	    
    	include ('core/helpers/conexion.php');	
    	
	     $sqlUpdate = "	UPDATE `specialfooddb`.`pedidoitem`
						SET
						`BajaLogica` = 1,
						`FechaModificacion` = now(),
						`IdUsuarioModificacion` = 1
						WHERE `IdPedidoItem` = $idItem AND `IdPedido` = $idPedido;
						";

        $result=mysqli_query($conexion,$sqlUpdate);
	}

	public function confirmarPedido($idPedido){
	    
    	include ('core/helpers/conexion.php');	
    	
	     $sqlUpdate = "	UPDATE `specialfooddb`.`pedido`
						SET
						`IdEstadoPedido` = 2,
						`FechaModificacion` = now(),
						`IdUsuarioModificacion` = 1
						WHERE `IdPedido` = $idPedido AND `BajaLogica` = 0;
						";

        $result=mysqli_query($conexion,$sqlUpdate);
	}

	public function cancelarPedido($idPedido){
	    
    	include ('core/helpers/conexion.php');	
    	
	     $sqlUpdate = "	UPDATE `specialfooddb`.`pedido`
						SET
						`BajaLogica` = 1,
						`FechaModificacion` = now(),
						`IdUsuarioModificacion` = 1
						WHERE `IdPedido` = $idPedido AND `BajaLogica` = 0;
						";

        $result=mysqli_query($conexion,$sqlUpdate);
	}
}