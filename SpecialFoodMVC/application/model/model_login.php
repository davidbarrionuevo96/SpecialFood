<?php

class Model_Login extends Model{

	public function ValidarUsuario($email,$password){

		include ('core/helpers/conexion.php');

		$result = mysqli_query($conexion, "SELECT Email, Password, Nombre, IdPerfil, IdEstadoAprobacionUsuario FROM Usuario WHERE Email = '$email'");
	
		$row = mysqli_fetch_assoc($result);

			// Variable $hash hold the password hash on database
		$hash = $row['Password'];
	
		//if (password_verify($_POST['password'], $hash)) {	
		if( $row['Password'] == $password){
			return $row;			
		}else{
			return null;
		}
	}
}