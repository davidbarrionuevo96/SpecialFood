<?php
    include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="recursos/css/style.css">
    <title>Editar</title>
</head>
<body>
<main>
        <?php
        if (isset($_GET["id"]))
        {

            $idUsuario = $_GET["id"];

            $sql = "SELECT 
                u.Nombre,
                u.Apellido,
                u.Calle,
                u.Numero,
                u.Password,
                u.Cuil
                FROM Usuario u
                WHERE u.idUsuario ='".$idUsuario."'";

            $result = mysqli_query($conexion, $sql);

            $rows = mysqli_fetch_assoc($result);

            if(isset($rows))
            {
                $nombre = $rows['Nombre'];
                $apellido = $rows['Apellido'];
                $calle = $rows['Calle'];
                $numero = $rows['Numero'];
                $password = $rows['Password'];
                $cuil = $rows['Cuil'];
            }
        } 
        ?>

        <section>
           <article>
               <form name="form" method="post">
                <label class="labelform" for="nombre">Nombre:</label>
                <input class="inputform" type="text" id="nombre" name="nombre" value='<?php echo $nombre; ?>'>
                <br>
                <br>
                <label class="labelform" for="apellido">Apellido:</label>
                <input class="inputform" type="text" id="apellido" name="apellido" value='<?php echo $apellido; ?>'>
                <br>
                <br>                
                <label class="labelform" for="calle">Calle:</label>
                <input class="inputform" type="text" id="calle" name="calle" value='<?php echo $calle; ?>'>
                <br>
                <br>
                <label class="labelform" for="numero">Numero:</label>
                <input class="inputform" type="text" id="numero" name="numero" value='<?php echo $numero; ?>'>
                <br>
                <br>
                <label class="labelform" for="password">Contraseña:</label>
                <input class="inputform" type="text" id="password" name="password" value='<?php echo $password; ?>'>
                <br>
                <br>
                <label class="labelform" for="cuil">CUIL:</label>
                <input class="inputform" type="text" id="cuil" name="cuil" value='<?php echo $cuil; ?>'>

                    <input class="nvoboton" src="adminindex.php" name="cerrar" type="submit" value="Cerrar">
                    <input class="nvoboton" type="submit" name="modificar" value="Guardar">
                    <div class="clear"></div>
                </form>
           </article>
        </section>
    </main>
    
    <?php
        if(isset($_POST["modificar"])){
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

            $sql2 = "UPDATE Usuario SET Nombre = '".$nombre."',Apellido ='".$apellido."',Calle=".$calle.",Numero=".$numero.",Password=".$password.",Cuil=".$cuil." WHERE idUsuario =".$idUsuario."";
            echo $sql2;

            $result=mysqli_query($conexion,$sql2);
            echo "<p class='labelform editado'>Editado Correctamente</p>";

        }
        if(isset($_POST["cerrar"])){
            header('location:ATRAS.php');
        }
    ?>
</body>
</html>
