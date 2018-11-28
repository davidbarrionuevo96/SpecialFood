<?php
require('../../core/helpers/conexion.php');
?>

<?php

$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
//$idPerfil = $_GET['idPerfil']; // id_perfil_user
//$idUsuario = $_GET['idUsuario']; // id_perfil_user
if(!$sidx) $sidx =1;

$result = mysqli_query($conexion, "SELECT COUNT(*) AS count FROM Pedido");
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

if( $count >0 )
{
    $total_pages = ceil($count/$limit);
}
// admin 1, comercio 2, delivery 3
else
{
    $total_pages = 0;
}

if ($page > $total_pages)
    $page=$total_pages;

$start = $limit*$page - $limit; // do not put $limit*($page - 1)

$SQL = "";
$SQL = $SQL . "SELECT ";
$SQL = $SQL . "     p.IdPedido NroPedido ";
$SQL = $SQL . "     ,p.FechaPedido FechaPedido  ";
$SQL = $SQL . "     ,CONCAT('(', cli.IdUsuario, ') ', c.Nombre) Comercio  ";
$SQL = $SQL . "     ,CONCAT('(', p.IdPuntoDeVenta, ') ', ca.Descripcion, ' ', pv.Numero, ' ', bc.Descripcion) PuntoVenta ";
$SQL = $SQL . "     ,CONCAT('(', cli.IdUsuario, ') ', cli.Nombre, ' ', cli.Apellido) Cliente ";
$SQL = $SQL . "     ,CONCAT(cau.Descripcion, ' ', cli.Numero, ' ', bu.Descripcion) DireccionCliente ";
$SQL = $SQL . "	 ,(SELECT SUM(Cantidad * PrecioUnitario) FROM PedidoItem WHERE BajaLogica = 0 AND IdPedido = p.IdPedido) CostoTotal  ";
$SQL = $SQL . "     ,p.CostoEntrega  ";
$SQL = $SQL . "     ,CONCAT('(', p.IdDelivery, ') ', delivery.Nombre, ' ', delivery.Apellido) Delivery ";
$SQL = $SQL . "     ,penalidad.MontoPenalidad MontoPenalidad ";
$SQL = $SQL . "     ,CASE WHEN LiquidadoComercio IS NULL OR LiquidadoComercio = 0 THEN 'Sin Liquidar' ELSE 'Liquidado' END Liquidado ";
$SQL = $SQL . "FROM  ";
$SQL = $SQL . "     Pedido p  ";
$SQL = $SQL . "     LEFT JOIN PuntoDeVenta pv ON pv.IdPuntoDeVenta = p.IdPuntoDeVenta AND pv.BajaLogica = 0  ";
$SQL = $SQL . "     LEFT JOIN Comercio c ON c.IdComercio = pv.IdComercio AND c.BajaLogica = 0  ";
$SQL = $SQL . "     LEFT JOIN UsuarioComercio uc on uc.IdComercio=c.IdComercio AND uc.BajaLogica=0  ";
$SQL = $SQL . "     LEFT JOIN EstadoPedido est ON est.IdEstadoEntrega= p.IdEstadoPedido and est.BajaLogica = 0   ";
$SQL = $SQL . "     LEFT JOIN Calle ca ON ca.IdCalle = pv.IdCalle AND ca.BajaLogica = 0  ";
$SQL = $SQL . "     LEFT JOIN Barrio bc ON bc.IdBarrio = ca.IdBarrio AND bc.BajaLogica = 0  ";
$SQL = $SQL . "     LEFT JOIN Usuario cli ON cli.IdUsuario = p.IdCliente AND cli.BajaLogica = 0  ";
$SQL = $SQL . "     LEFT JOIN Calle cau ON cau.IdCalle = cli.IdCalle AND cau.BajaLogica = 0  ";
$SQL = $SQL . "     LEFT JOIN Barrio bu ON bu.IdBarrio = cau.IdBarrio AND bu.BajaLogica = 0  ";
$SQL = $SQL . "     LEFT JOIN Usuario delivery ON p.IdDelivery = delivery.IdUsuario ";
$SQL = $SQL . "     LEFT JOIN PenalidadDelivery penalidad ON p.IdPedido = penalidad.IdPedido  ";
$SQL = $SQL . "WHERE  ";
$SQL = $SQL . "     p.BajaLogica = 0  AND p.IdEstadoPedido = 4 AND LiquidadoComercio IS NULL OR LiquidadoComercio = 0 ";

//admin 1 , comercio 2, delivery 3, usuario 4
/*
 if ($idPerfil == 2){
    $SQL = $SQL . " AND uc.IdUsuario= '$idUsuario'";
}

if ($idPerfil == 3){
    $SQL = $SQL . " AND (p.IdDelivery='$idUsuario' OR p.IdEstadoPedido='2') ";
}

if ($idPerfil == 4){
    $SQL = $SQL . " AND p.IdCliente = '$idUsuario'";
}
*/

$SQL = $SQL . "ORDER BY ";
$SQL = $SQL . "     1 DESC LIMIT $start , $limit";

$result = mysqli_query($conexion, $SQL ) or die("Couldn t execute query.".mysql_error());

$response = new stdClass();

$response->page = $page;

$response->total = "$total_pages";

$response->records = $count;

$i=0;

while($row=mysqli_fetch_assoc($result))
{
    $response->rows[$i]['NroPedido']=$row['NroPedido'];
    $response->rows[$i]['FechaPedido']=$row['FechaPedido'];
    $response->rows[$i]['Comercio']=$row['Comercio'];
    $response->rows[$i]['PuntoVenta']=$row['PuntoVenta'];
    $response->rows[$i]['Cliente']=$row['Cliente'];
    $response->rows[$i]['DireccionCliente']=$row['DireccionCliente'];
    $response->rows[$i]['CostoTotal']=$row['CostoTotal'];
    $response->rows[$i]['CostoEntrega']=$row['CostoEntrega'];
    $response->rows[$i]['Delivery']=$row['Delivery'];
    $response->rows[$i]['MontoPenalidad']=$row['MontoPenalidad'];
    $response->rows[$i]['Liquidado']=$row['Liquidado'];

    $i++;
}

echo json_encode($response);

?>