<?php
require('../../core/helpers/conexion.php');
?>

<?php

$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction

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

$SQL = "SELECT fechapedido,costoentrega,tiempoestimadoentrega,fechamodificacion,idusuariomodificacion,idcomercio,idcliente FROM Pedido WHERE BajaLogica = 0 ORDER BY $sidx $sord LIMIT $start , $limit";



$result = mysqli_query($conexion, $SQL ) or die("Couldn t execute query.".mysql_error());

$response = new stdClass();

$response->page = $page;

$response->total = "$total_pages";

$response->records = $count;

$i=0;

while($row=mysqli_fetch_assoc($result))
{
    $response->rows[$i]['fechapedido']=$row['fechapedido'];
    $response->rows[$i]['costoentrega']=$row['costoentrega'];
    $response->rows[$i]['tiempoestimadoentrega']=$row['tiempoestimadoentrega'];
    $response->rows[$i]['fechamodificacion']=$row['fechamodificacion'];
    $response->rows[$i]['idusuariomodificacion']=$row['idusuariomodificacion'];
    $response->rows[$i]['idcomercio']=$row['idcomercio'];
    $response->rows[$i]['idcliente']=$row['idcliente'];
    //$response->rows[$i]['cell']=array($row['idcomercio'],$row['nombre'],$row['cuit']);

    //$response->rows[$i]="{ 'idcomercio': '".$row['idcomercio']."', 'nombre' : '".$row['nombre']."', 'cuit': '".$row['cuit']."'}";

    $i++;
}

echo json_encode($response);

?>