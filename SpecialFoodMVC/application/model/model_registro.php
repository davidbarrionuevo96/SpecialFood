<?php

class Model_Registro extends Model{

	public function validar_usuario($email){

		include ('core/helpers/conexion.php');

		$sql = "SELECT * FROM Usuario WHERE email = '$email'";

        $results = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($results);

		if(!(isset($row))){
			return true;
		}else{
			return false;
		}
	}

    public function guardar_usuario($nombre, $apellido, $password, $email, $cuil, $cuit, $calle, $numero, $perfil){

        include ('core/helpers/conexion.php');

        //$sqlInsert="INSERT INTO Usuario (Nombre, Apellido, Password, Email, Cuil, Calle, Numero,  IdPerfil, IdEstadoAprobacionUsuario) 
        //VALUES('".$nombre."','".$apellido."',".$password.", ".$email.",".$cuil.",'".$calle."',".$numero.",".$perfil.",1);";

        $sqlInsert = "INSERT INTO `Usuario`
                    (
                        `Nombre`,
                        `Apellido`,
                        `Password`,
                        `Email`,
                        `Cuil`,
                        `Cuit`,
                        `IdCalle`,
                        `Numero`,
                        `IdPerfil`,
                        `IdEstadoAprobacionUsuario`,
                        `bajalogica`,
                        `fechamodificacion`,
                        `idusuariomodificacion`)
                    VALUES
                    (
                        '$nombre',
                        '$apellido',
                        '$password',
                        '$email',
                        '$cuil',
                        '$cuit',
                        1,
                        '$numero',
                        '$perfil',
                        1,
                        0,
                        now(),
                        1);";

        //echo $sqlInsert;

        $result=mysqli_query($conexion,$sqlInsert);

        if(isset($result)){
            
        ?>
            <script>
                alert("Guardado Correctamente")
            </script>
        <?PHP
        }       
        else{
            echo "<p class='labelform editado'>El Email Ingresado ya Existe</p>";
        }
    }
    
    public function getUsuarioById($idUsuario){
		require('core/helpers/conexion.php');

        $sql = "SELECT 
					IdUsuario
        			,Nombre
                    ,Apellido
                    ,Password
                    ,Email
                    ,CUIL
        			,CUIT
                    ,IdCalle
                    ,Numero
        		FROM 
					`Usuario`
				WHERE 
					BajaLogica = 0
					AND IdUsuario = $idUsuario;";

        $result = mysqli_query($conexion, $sql);

        $rows = mysqli_fetch_assoc($result);

        if(isset($rows))
        {
            $data["IdUsuario"] = $rows['IdUsuario'];
            $data["Nombre"] = $rows['Nombre'];
            $data["Apellido"] = $rows['Apellido'];
            $data["Password"] = $rows['Password'];
            $data["Email"] = $rows['Email'];
            $data["CUIL"] = $rows['CUIL'];
            $data["CUIT"] = $rows['CUIT'];
            $data["IdCalle"] = $rows['IdCalle'];
            $data["Numero"] = $rows['Numero'];

            return $data;
        }
    }

    public function modificar_usuario($idUsuario, $nombre, $apellido, $password, $calle, $numero){

        require('core/helpers/conexion.php');

        $sql = "UPDATE `Usuario`
                SET 
                    Nombre = '$nombre'
                    ,Apellido = '$apellido'
                    ,Password = '$password'
                    ,IdCalle = '$calle'
                    ,Numero = '$numero'
                    ,FechaModificacion = now()
					,IdUsuarioModificacion = 1
                WHERE IdUsuario = $idUsuario;";
        
        $result = mysqli_query($conexion,$sql);
        
    }
}