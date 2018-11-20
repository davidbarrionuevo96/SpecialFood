<?php
require('../../core/helpers/conexion.php');
?>

<?php

$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction

if(!$sidx) $sidx =1;

$result = mysqli_query($conexion, "SELECT COUNT(*) AS count FROM PuntoDeVenta");
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
$SQL = $SQL . "      p.IdPuntoDeVenta ";
$SQL = $SQL . "      ,p.Numero NumeroPunto";
$SQL = $SQL . "     ,c.Nombre  Comercio";
$SQL = $SQL . "     ,ca.Descripcion NombreCalle";
$SQL = $SQL . "     ,cli.Numero NumeroCalle ";
$SQL = $SQL . "FROM ";
$SQL = $SQL . "     PuntoDeVenta p ";
$SQL = $SQL . "     LEFT JOIN Comercio c ON c.IdComercio = p.IdComercio AND c.BajaLogica = 0 ";
$SQL = $SQL . "     LEFT JOIN Calle ca ON ca.IdCalle = p.IdCalle AND ca.BajaLogica = 0 ";
$SQL = $SQL . "     LEFT JOIN Usuario cli ON cli.IdCalle = p.IdCalle AND cli.BajaLogica = 0 ";
$SQL = $SQL . "WHERE ";
$SQL = $SQL . "     p.BajaLogica = 0 ";
$SQL = $SQL . "ORDER BY ";
$SQL = $SQL . "     $sidx $sord LIMIT $start , $limit";




$result = mysqli_query($conexion, $SQL ) or die("Couldn t execute query.".mysql_error());

$response = new stdClass();

$response->page = $page;

$response->total = "$total_pages";

$response->records = $count;

$i=0;

while($row=mysqli_fetch_assoc($result))
{   $response->rows[$i]['IdPuntoDeVenta']=$row['IdPuntoDeVenta'];
    $response->rows[$i]['NumeroPunto']=$row['NumeroPunto'];
    $response->rows[$i]['NumeroCalle']=$row['NumeroCalle'];
    $response->rows[$i]['NombreCalle']=$row['NombreCalle'];
    $response->rows[$i]['Comercio']=$row['Comercio'];
    //$response->rows[$i]['cell']=array($row['idcomercio'],$row['nombre'],$row['cuit']);

    //$response->rows[$i]="{ 'idcomercio': '".$row['idcomercio']."', 'nombre' : '".$row['nombre']."', 'cuit': '".$row['cuit']."'}";

    $i++;
}

echo json_encode($response);

?>