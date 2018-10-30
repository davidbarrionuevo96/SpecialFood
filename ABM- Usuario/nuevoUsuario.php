<?php
	include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="recursos/css/style.css">
    <title>Nuevo Cliente</title>
</head>
<body>
    <main>
        <section>
         <article>
             <form name="form" method="post">

                <label class="labelform" for="nombre">Nombre:</label>
                <input class="inputform" type="text" id="nombre" name="nombre" value="">
				<br>
				<br>
                <label class="labelform" for="apellido">Apellido:</label>
                <input class="inputform" type="text" id="apellido" name="apellido" value="">
				<br>
				<br>				
                <label class="labelform" for="calle">Calle:</label>
                <input class="inputform" type="text" id="calle" name="calle" value="">
				<br>
				<br>
                <label class="labelform" for="numero">Numero:</label>
                <input class="inputform" type="text" id="numero" name="numero" value="">
				<br>
				<br>
                <label class="labelform" for="username">UserName:</label>
                <input class="inputform" type="text" id="username" name="username" value="">
				<br>
				<br>
                <label class="labelform" for="password">Contraseña:</label>
                <input class="inputform" type="text" id="password" name="password" value="">
				<br>
				<br>
                <label class="labelform" for="cuil">CUIL:</label>
                <input class="inputform" type="text" id="cuil" name="cuil" value="">
				<br>
				<br>
                <select class="selectform" name="perfil" id="perfil">
                    <option value="1">Comercio</option>
                    <option value="2">Cliente</option>
                    <option value="3">Delivery</option>
                </select>
                
                <input class="nvoboton" src="" name="cerrar" type="submit" value="Atras">
                <input class="nvoboton" type="submit" name="enviar" value="Guardar">
                <div class="clear"></div>
            </div>
        </form>
    </article>
</section>
</main>

<?php
if(isset($_POST["enviar"])){

    $nombre=$_POST['nombre'];
    $nombre=ucfirst($nombre);

    $apellido=$_POST['apellido'];
    $apellido=ucfirst($apellido);

    $calle=$_POST['calle'];
    $calle=ucfirst($calle);

    $numero=$_POST['numero'];

	$username=$_POST['username'];
	$password=$_POST['password'];

    $cuil=$_POST['cuil'];

    $perfil=$_POST['perfil'];

    if(empty($nombre) ||empty($apellido) ||empty($calle) ||empty($username) ||empty($password) ||empty($cuil) ){
        
       echo "<p class='labelform editado'>Complete todos los datos para guardar</p>";

   }else{
    $sqlSelect="SELECT * FROM usuario WHERE username = '$username'";
    
    $results = mysqli_query($conexion, $sqlSelect);
    $row = mysqli_fetch_assoc($results);

    if(!($row['UserName'] == $username)){
        
        $sqlInsert="INSERT INTO Usuario (Nombre, Apellido, Calle, Numero, UserName, Password, Cuil, IdPerfil, IdEstadoAprobacionUsuario) 
        VALUES('".$nombre."','".$apellido."','".$calle."',".$numero.",".$username.",".$password.",".$cuil.",".$perfil.",1);";         
        
        $result=mysqli_query($conexion,$sqlInsert);

        echo "<p class='labelform editado'>Guardado Correctamente</p>";
        
    }
    else{
        echo "<p class='labelform editado'>El UserName Ingresado ya Existe</p>";
    }
}            
}
if(isset($_POST["cerrar"])){
    header('location:ATRAS.php');
}

?>
</body>
</html>
