<?php

class Model_Login extends Model{

	public function validar_usuario($email,$password){


		include ('core/helpers/conexion.php');

		$sql = "SELECT * FROM Usuario WHERE email = '$email' AND Password = '$password'";

		$results = mysqli_query($conexion, $sql);

		$row = mysqli_fetch_assoc($results);

		if(($row['Email'] == $email) && ($row['Password'] == $password)){
			echo "Bienvenido! " . $row['Nombre'];
			return true;			
		}else{
			return false;
		}
	}

	public function iniciar_sesion($email,$password){

			$_SESSION['loggedin'] = true;
			$_SESSION['email'] = $email;
			$_SESSION['start'] = time();
			$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

			//echo "Bienvenido! " . $email;
	}
}