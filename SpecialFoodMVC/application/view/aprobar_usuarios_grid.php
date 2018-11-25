<?php 
require('../../core/helpers/conexion.php');
?>

<?php

$page = $_GET['page']; // get the requested page 
$limit = $_GET['rows']; // get how many rows we want to have into the grid 
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort 
$sord = $_GET['sord']; // get the direction 

if(!$sidx) $sidx =1; 

$result = mysqli_query($conexion, "SELECT COUNT(*) AS count FROM Usuario "); 
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

$SQL = "SELECT IdUsuario, Nombre, Apellido ,CUIT, CUIL FROM Usuario 
        WHERE BajaLogica = 0 
        AND  IdEstadoAprobacionUsuario = 1
        AND (IdPerfil = 2 OR IdPerfil = 3)
        ORDER BY $sidx $sord LIMIT $start , $limit"; 

$result = mysqli_query($conexion, $SQL ) or die("Couldn t execute query.".mysql_error()); 

$response = new stdClass();

$response->page = $page; 

$response->total = "$total_pages"; 

$response->records = $count; 

$i=0; 

while($row=mysqli_fetch_assoc($result))
{ 
  $response->rows[$i]['IdUsuario']=$row['IdUsuario']; 
  $response->rows[$i]['Nombre']=$row['Nombre']; 
  $response->rows[$i]['Apellido']=$row['Apellido']; 
  $response->rows[$i]['CUIT']=$row['CUIT'];
  $response->rows[$i]['CUIL']=$row['CUIL'];
  //$response->rows[$i]['cell']=array($row['idcomercio'],$row['nombre'],$row['cuit']); 

  //$response->rows[$i]="{ 'idcomercio': '".$row['idcomercio']."', 'nombre' : '".$row['nombre']."', 'cuit': '".$row['cuit']."'}"; 

  $i++; 
} 

echo json_encode($response);

?>