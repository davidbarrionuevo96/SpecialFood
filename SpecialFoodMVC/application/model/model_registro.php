<?php

class Model_Registro extends Model{

	public function validar_usuario($username){

		include ('core/helpers/conexion.php');

		$sql = "SELECT * FROM Usuario WHERE Username = '$username'";

        $results = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($results);

		if(!($row['UserName'] == $username)){
			return true;
		}else{
			return false;
		}
	}

    public function guardar_usuario($nombre, $apellido, $calle, $numero, $username, $password, $cuil, $perfil){

        include ('core/helpers/conexion.php');

        $sqlInsert="INSERT INTO Usuario (Nombre, Apellido, Calle, Numero, UserName, Password, Cuil, IdPerfil, IdEstadoAprobacionUsuario) 
        VALUES('".$nombre."','".$apellido."','".$calle."',".$numero.",".$username.",".$password.",".$cuil.",".$perfil.",1);";

        echo $sqlInsert;

        $result=mysqli_query($conexion,$sqlInsert);

        if(isset($result)){
            echo "<p class='labelform editado'>Guardado Correctamente</p>";
        }       
        else{
            echo "<p class='labelform editado'>El UserName Ingresado ya Existe</p>";
        }
	}
}