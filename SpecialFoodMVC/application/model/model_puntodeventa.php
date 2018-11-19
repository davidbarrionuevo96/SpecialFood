<?php

class Model_PuntoDeVenta extends Model{
    public function guardar($numero , $idcomercio,$idusuariomodificacion,$idcalle){

        require('core/helpers/conexion.php');

        $sql1 = "select * from PuntoDeVenta where Numero='$numero'";

        $result = mysqli_query($conexion, $sql1);
        $row = mysqli_fetch_assoc($result);

        if (!($row['Numero'] == $numero)) {

            $sql = "INSERT INTO `PuntoDeVenta`
					(
					`Numero`,
					`IdComercio`,
					`IdCalle`,
					`BajaLogica`,
					`FechaModificacion`,
					`IdUsuarioModificacion`)
					VALUES
					(
					'$numero',
					'$idcomercio',
					'$idcalle',
					0,
					now(),
					'$idusuariomodificacion');";

            $result = mysqli_query($conexion, $sql);

            return 1;
        }
        else{
            return 0;
        }
    }
    public function eliminar($numero){
        require('core/helpers/conexion.php');

        $sql="UPDATE puntodeventa set BajaLogica=1 where Numero='$numero' ";

        $result = mysqli_query($conexion, $sql);

    }
}