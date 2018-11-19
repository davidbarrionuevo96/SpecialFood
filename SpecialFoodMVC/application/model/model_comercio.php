<?php

class Model_Comercio extends Model{
    public function guardar($nombre, $cuit, $idcomercio){

		require('core/helpers/conexion.php');

		if ($idcomercio == 0)
		{
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
		else{
			$sql = "UPDATE `Comercio`
					SET Nombre = '$nombre'
						,CUIT = '$cuit'
						,FechaModificacion = now()
						,IdUsuarioModificacion = 1
					WHERE IdComercio = $idcomercio;";

            $result = mysqli_query($conexion, $sql);
		}
    }

    public function delete($idDelete){
    	require('core/helpers/conexion.php');

            $sql = "UPDATE `Comercio`
					SET BajaLogica = 1
						,FechaModificacion = now()
						,IdUsuarioModificacion = 1
					WHERE IdComercio = $idDelete;";

            $result = mysqli_query($conexion, $sql);
    }

    public function getComercioById($idComercio){
		require('core/helpers/conexion.php');

        $sql = "SELECT 
					IdComercio
        			,Nombre
        			,CUIT
        		FROM 
					`Comercio`
				WHERE 
					BajaLogica = 0
					AND IdComercio = $idComercio;";

        $result = mysqli_query($conexion, $sql);

        $rows = mysqli_fetch_assoc($result);

        if(isset($rows))
        {
            $data["IdComercio"] = $rows['IdComercio'];
			$data["Nombre"] = $rows['Nombre'];
			$data["CUIT"] = $rows['CUIT'];

            return $data;
        }
    }
}