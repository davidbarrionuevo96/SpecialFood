<?php 
require('../../core/helpers/conexion.php');
?>

<?php

$chart = $_GET['chart']; // get the requested page 

switch ($chart) {
	case 'deliverys':
		getDeliveryArray();
		break;
	case 'comercio':
		getComercioArray();
		break;
	case 'cliente':
		getClienteArray();
		break;
	default:
		# code...
		break;
}

function getDeliveryArray(){
	require('../../core/helpers/conexion.php');

	$SQL = "SELECT CONCAT(u.Nombre, ', ', u.Apellido) nombreDelivery, COUNT(1) cantEntregas
			FROM usuario u
			    INNER JOIN pedido p ON p.IdDelivery = u.IdUsuario AND p.BajaLogica = 0
			WHERE
				p.IdEstadoPedido IN (2, 3, 4)
			GROUP BY
				u.IdUsuario"; 

	$result = mysqli_query($conexion, $SQL ) or die("Couldn t execute query.".mysql_error()); 

	$response = [];

	$i=0; 

	while($row=mysqli_fetch_assoc($result))
	{ 
		$item = [(string)$row['nombreDelivery'], (int)$row['cantEntregas']];

      	array_push($response, $item);

	  $i++; 
	} 

	echo json_encode($response);
}

function getComercioArray(){
	require('../../core/helpers/conexion.php');

	$SQL = "SELECT CONCAT(c.Nombre, ' (Pto. Vta. ', p.IdPuntoDeVenta, ')') puntoDeVenta, COUNT(1) cantPedidos
			FROM comercio c
				INNER JOIN puntodeventa pv ON c.IdComercio = pv.IdComercio AND pv.BajaLogica = 0
			    INNER JOIN pedido p ON p.IdPuntoDeVenta = pv.IdPuntoDeVenta AND p.BajaLogica = 0
			WHERE
				c.BajaLogica = 0	
				AND p.IdEstadoPedido = 2 
			GROUP BY
				p.IdPuntoDeVenta"; 

	$result = mysqli_query($conexion, $SQL ) or die("Couldn t execute query.".mysql_error()); 

	$response = [];

	$i=0; 

	while($row=mysqli_fetch_assoc($result))
	{ 
		$item = [(string)$row['puntoDeVenta'], (int)$row['cantPedidos']];

      	array_push($response, $item);

	  $i++; 
	} 

	echo json_encode($response);
}

function getClienteArray(){
	require('../../core/helpers/conexion.php');

	$SQL = "SELECT CONCAT(u.Nombre, ', ', u.Apellido) nombreCliente, COUNT(1) cantPedidos
			FROM usuario u
			    INNER JOIN pedido p ON p.IdCliente = u.IdUsuario AND p.BajaLogica = 0
			WHERE
				p.IdEstadoPedido IN (2, 3, 4)
			GROUP BY
				u.IdUsuario"; 

	$result = mysqli_query($conexion, $SQL ) or die("Couldn t execute query.".mysql_error()); 

	$response = [];

	$i=0; 

	while($row=mysqli_fetch_assoc($result))
	{ 
		$item = [(string)$row['nombreCliente'], (int)$row['cantPedidos']];

      	array_push($response, $item);

	  $i++; 
	} 

	echo json_encode($response);
}

?>