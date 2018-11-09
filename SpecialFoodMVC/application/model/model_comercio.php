<?php

class Model_Comercio extends Model{
    public function guardar($nombre,$cuit){

		$host_db = "localhost:3306";
		$user_db = "root";
		$pass_db = "fiesta2011";
		$db_name = "SpecialFoodDB";
		$tbl_name = "usuario";

		$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

		if ($conexion->connect_error) {
		die("La conexion falló: " . $conexion->connect_error);
		}

    	//if(isset($_POST["Guardar"])) {
		//echo(json_encode($_POST));
		
		//die();
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