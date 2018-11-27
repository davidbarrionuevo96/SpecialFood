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

    public function guardar_usuario($nombre, $apellido, $password, $email, $cuil, $cuit, $Idcalle, $numero, $perfil, $numcomercio){

        include ('core/helpers/conexion.php');

        $encryptedPassword = sha1($password);

        $sqlInsert = "INSERT INTO `Usuario`
                    (
                        `Nombre`,
                        `Apellido`,
                        `IdCalle`,
                        `Password`,
                        `Email`,
                        `Cuil`,
                        `Cuit`,
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
                        '$Idcalle',
                        '$encryptedPassword',
                        '$email',
                        '$cuil',
                        '$cuit',
                        '$numero',
                        '$perfil',
                        1,
                        0,
                        now(),
                        1);";

        $result=mysqli_query($conexion,$sqlInsert);

        $sqlInsert2 = "INSERT INTO `UsuarioComercio`
                    (
                        `IdComercio`,
                        `IdUsuario`,
                        `bajalogica`,
                        `fechamodificacion`,
                        `idusuariomodificacion`)
                    VALUES
                    (
                        '$numcomercio',
                        (SELECT MAX(IdUsuario)'IdUsuario' FROM Usuario),
                        0,
                        now(),
                        1);";

        $result2=mysqli_query($conexion,$sqlInsert2);
        

        if(isset($result)){
            
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

    public function modificar_usuario($idUsuario, $nombre, $apellido,/* $password,*/ $Idcalle, $numero){

        require('core/helpers/conexion.php');

        $sql = "UPDATE `Usuario`
                SET 
                    Nombre = '$nombre'
                    ,Apellido = '$apellido'
                    ,IdCalle = '$Idcalle'
                    ,Numero = '$numero'
                    ,FechaModificacion = now()
					,IdUsuarioModificacion = 1
                WHERE IdUsuario = $idUsuario;";
        
        $result = mysqli_query($conexion,$sql);
        
    }
}