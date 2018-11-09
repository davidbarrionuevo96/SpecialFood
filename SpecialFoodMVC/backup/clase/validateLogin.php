<?php
 $conn=mysqli_connect("127.0.0.1", "root", "fiesta2011", "pokemons-gonzalez-diego");
	
  session_start();

  //session_destroy();

  //$_SESSION["prueba"] = "hola";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trabajo Practico 3</title>
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <main>
       <br/>
	   <?php 
			$usuario = $_POST['txUsuario'];
			$password = $_POST['txPassword'];

			$sql = "SELECT 
						IdUsuario
					FROM 
						Usuario
					WHERE 
						Usuario ='".$usuario."'  
						AND Clave ='".$password."'";

			$result=mysqli_query($conn, $sql);
			$cantResultados = mysqli_num_rows($result);
			
			if($rows = mysqli_fetch_assoc($result))
		    {
				setcookie("idusuario", $rows['IdUsuario'], 0, "/");
				
				if (isset($_POST['chkRecordarme']))
					$_SESSION["idUsuarioSession"] = $rows['IdUsuario'];
				else
					session_destroy();
			}
            
			//setcookie("username",'',time()-3600);

			header("Location: http://localhost/index.php");
      ?>
	   
       <div class='row'>
        <div class='col-sm-4'></div>
         <div class='col-sm-4'>
           <div class='panel panel-danger'>
              <div class='panel-heading'><b>Búsqueda en Pokedex</b></div>
              <div class='panel-body'>
				Usuario o clave incorrectos.
              </div>
          </div>
         </div>
        <div class='col-sm-4'></div>
       </div>
    </div>
    </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="recursos/js/bootstrap.min.js"></script>
  </body>
</html>
