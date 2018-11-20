<?php

class Model_PuntoDeVenta extends Model{
    public function guardar($numero , $idcomercio,$idPuntoDeVenta,$idcalle){

        require('core/helpers/conexion.php');

        if ($idPuntoDeVenta == 0)
        {
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
					1);";
					
                $result = mysqli_query($conexion, $sql);

                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            $sql = "UPDATE `PuntoDeVenta`
					SET Numero = '$numero'
						,IdComercio = '$idcomercio'
						,IdCalle='$idcalle'
						,FechaModificacion = now()
						,IdUsuarioModificacion = 1
					WHERE IdPuntoDeVenta = $idPuntoDeVenta;";

            $result = mysqli_query($conexion, $sql);
        }
    }

    public function delete($idDelete){
        require('core/helpers/conexion.php');

        $sql = "UPDATE `PuntoDeVenta`
					SET BajaLogica = 1
						,FechaModificacion = now()
						,IdUsuarioModificacion = 1
					WHERE IdPuntoDeVenta = $idDelete;";

        $result = mysqli_query($conexion, $sql);
    }

    public function getPuntoDeVentaById($idPuntoDeVenta){
        require('core/helpers/conexion.php');

        $sql = "SELECT 
			p.IdPuntoDeVenta
        		,p.Numero
                    	,com.Nombre Comercio
        		,com.IdComercio IdComercio
                    	,ca.Descripcion Calle
        		,ca.IdCalle IdCalle
        	FROM 
			PuntoDeVenta p
                	LEFT JOIN Comercio com ON com.IdComercio = p.IdComercio AND com.BajaLogica = 0
                	LEFT JOIN Calle ca ON ca.IdCalle = p.IdCalle AND ca.BajaLogica = 0
		WHERE 
			p.BajaLogica = 0
			AND p.IdPuntoDeVenta = $idPuntoDeVenta;";

        $result = mysqli_query($conexion, $sql);

        $rows = mysqli_fetch_assoc($result);

        if(isset($rows))
        {
            $data["IdPuntoDeVenta"] = $rows['IdPuntoDeVenta'];
            $data["Numero"] = $rows['Numero'];
            $data["IdComercio"] = $rows['IdComercio'];
            $data["IdCalle"] = $rows['IdCalle'];
            $data["Comercio"] =$rows['Comercio'];
            $data["Calle"]=$rows['Calle'];

            return $data;
        }
    }
}