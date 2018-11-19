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

        $encryptedPassword = sha1($password);

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
                        '$encryptedPassword',
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

        $result=mysqli_query($conexion,$sqlInsert);

        if(isset($result)){
            echo "<p class='labelform editado'>Guardado Correctamente</p>";
        }       
        else{
            echo "<p class='labelform editado'>El Usuario Ingresado ya Existe</p>";
        }
	}
}