<?php

session_start();

require('../../core/helpers/conexion.php');
?>

<?php

$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction

if(!$sidx) $sidx =1;

$result = mysqli_query($conexion, "SELECT COUNT(*) AS count FROM MenuComercio ");
$row = mysqli_fetch_assoc($result);
$count = $row['count'];

if( $count >0 )
{
    $total_pages = ceil($count/$limit);
}
else
{
    $total_pages = 0;
}

if ($page > $total_pages)
    $page=$total_pages;

$start = $limit*$page - $limit; // do not put $limit*($page - 1)

$IdUsuario = $_SESSION['IdUsuario'];

$SQL = "SELECT idMenuComercio, Descripcion ,idComercio FROM MenuComercio WHERE BajaLogica = 0  AND idComercio= '$IdUsuario'  ORDER BY $sidx $sord LIMIT $start , $limit";

$result = mysqli_query($conexion, $SQL ) or die("Couldn t execute query.".mysql_error());

$response = new stdClass();

$response->page = $page;

$response->total = "$total_pages";

$response->records = $count;

$i=0;

while($row=mysqli_fetch_assoc($result))
{
    $response->rows[$i]['idMenuComercio']=$row['idMenuComercio'];
    $response->rows[$i]['Descripcion']=$row['Descripcion'];
    $response->rows[$i]['idComercio']=$row['idComercio'];
    //$response->rows[$i]['cell']=array($row['idcomercio'],$row['nombre'],$row['cuit']);

    //$response->rows[$i]="{ 'idcomercio': '".$row['idcomercio']."', 'nombre' : '".$row['nombre']."', 'cuit': '".$row['cuit']."'}";

    $i++;
}

echo json_encode($response);

?>