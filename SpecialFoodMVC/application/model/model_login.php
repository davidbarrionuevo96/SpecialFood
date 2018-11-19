<?php

class Model_Login extends Model{

	public function ValidarUsuario($email,$password){

		include ('core/helpers/conexion.php');

		$result = mysqli_query($conexion, "SELECT Email, Password, Nombre, IdPerfil, IdEstadoAprobacionUsuario FROM Usuario WHERE Email = '$email'");
	
		$row = mysqli_fetch_assoc($result);

		if( $row['Password'] == sha1($password)){
			return $row;			
		}else{
			return null;
		}
	}
}