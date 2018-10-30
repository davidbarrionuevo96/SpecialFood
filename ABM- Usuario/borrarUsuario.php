	<?php
    include 'conexion.php';
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>

		<?php
		if (isset($_GET["Id"]))
		{

			$idUsuario = $_GET["Id"];

			$sql = "DELETE FROM Usuario where IdUsuario = ".$idUsuario."";

			$result = mysqli_query($conexion, $sql);

			$rows = mysqli_fetch_assoc($result);

			echo "Usuario Eliminado";

			header('location:busquedaPokemon.php');
		
		} 
		?>
	</body>
	</html>