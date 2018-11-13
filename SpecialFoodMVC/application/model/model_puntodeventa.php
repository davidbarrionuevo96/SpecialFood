<?php

class Model_PuntoDeVenta extends Model{
    public function guardar($numero,$idcomercio,$idcalle,$idusuariomodificacion){

		$host_db = "localhost:3306";
		$user_db = "root";
		$pass_db = "";
		$db_name = "SpecialFoodDB";
		$tbl_name = "usuario";

		$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

		if ($conexion->connect_error) {
		die("La conexion falló: " . $conexion->connect_error);
		}

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
					$idusuario);";

            $result = mysqli_query($conexion, $sql);

			return 1;
        }
        else{
        	return 0;
        }
    }
    public function eliminar($numero){

		$host_db = "localhost:3306";
		$user_db = "root";
		$pass_db = "";
		$db_name = "SpecialFoodDB";
		$tbl_name = "usuario";

		$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

		if ($conexion->connect_error) {
		die("La conexion falló: " . $conexion->connect_error);
		}

        $sql2 = "update PuntoDeVenta set BajaLogica='1' where Numero='$numero'";
       
        $result = mysqli_query($conexion, $sql2);

    }
}