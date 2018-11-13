<?php

class Model_Comercio extends Model{
    public function guardar($nombre,$cuit){

		require('core/helpers/conexion.php');

		$sql1 = "select * from Comercio where Nombre='$nombre'";
       
        $result = mysqli_query($conexion, $sql1);
        $row = mysqli_fetch_assoc($result);

        if (!($row['Nombre'] == $nombre)) {

            $sql = "INSERT INTO `comercio`
					(
					`Nombre`,
					`CUIT`,
					`BajaLogica`,
					`FechaModificacion`,
					`IdUsuarioModificacion`)
					VALUES
					(
					'$nombre',
					'$cuit',
					0,
					now(),
					1);";

            $result = mysqli_query($conexion, $sql);

			return 1;
        }
        else{
        	return 0;
        }
    }
}