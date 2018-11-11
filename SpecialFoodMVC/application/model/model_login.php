<?php

class Model_Login extends Model{

	public function validar_usuario($username,$password){

		include ('core/helpers/conexion.php');

		$sql = "SELECT * FROM Usuario WHERE Username = '$username' AND Password = '$password'";

		$results = mysqli_query($conexion, $sql);
   		
		if($results){
			$row = mysqli_fetch_assoc($results);
			return true;
		}else{
			return false;
		}
	}

	public function iniciar_sesion($username,$password){

			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

			echo "Bienvenido! " . $username;
	}
}