<?php

$conn=mysqli_connect("127.0.0.1", "root", "fiesta2011", "pokemons-gonzalez-diego");

if ($conn->connect_error) {
	die("La conexion falló: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pokedex con BBDD</title>
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <main>
      <br/>
      <?php   
          
          if (isset($_GET['whoisthatpokemon']))
          {
              $buscado = strtolower($_GET["whoisthatpokemon"]);
			  $buscado= ucfirst($buscado);
				
              if ($buscado != "")
              {
					$sql = "SELECT 
								p.Id Id,
								p.Nombre,
								p.Ataque,
								p.Imagen,
								t.Imagen ImagenTipo
							FROM 
								pokemon p
								LEFT JOIN tipo t ON t.Id = p.IdTipo
							WHERE 
								p.Nombre ='".$buscado."'";

					$result=mysqli_query($conn, $sql);
					$cantResultados = mysqli_num_rows($result);
				               

                 if($rows = mysqli_fetch_assoc($result))
				 {
					 echo "	<div class='row'>";
					 echo "		<div class='col-sm-4'></div>";
					 echo " 	<div class='col-sm-4'>";
					 echo "    		<div class='panel panel-danger'>";
					 echo "      		<div class='panel-heading'><b>Pokedex</b></div>";
					 echo "    			<div class='panel-body'>";
                     echo "					<p><b>Nombre:</b> ".strtoupper($rows['Nombre'])."</p>";
                     echo "					<p><b>Ataque:</b> ".$rows['Ataque']."</p>";
                     echo "					<p><b>Tipo:</b> "."<img width='30px;' src='".$rows['ImagenTipo']."' />"."</p>";
                     echo "					<p><img width='150px;' src='".$rows['Imagen']."' />"."</p>";
					 echo "    			</div>";
					 echo "    		</div>";
					 echo " 	</div>";
					 echo " 	<div class='col-sm-4'></div>";
					 echo "</div>";					 
                 }
                 else
                 {
					 echo "	<div class='row'>";
					 echo "		<div class='col-sm-4'></div>";
					 echo " 	<div class='col-sm-4'>";
					 echo "    		<div class='panel panel-danger'>";
					 echo "    			<div class='panel-body'>";
                     echo "					<p>Pokemon no encontrado</p>";
					 echo "    			</div>";
					 echo "    		</div>";
					 echo " 	</div>";
					 echo " 	<div class='col-sm-4'></div>";
					 echo "</div>";		
					 mostrarTodos();
                 }
              }
              else
              {
                  mostrarTodos();
              }
          }
          else
          {
            mostrarTodos();
          }

          function mostrarTodos(){
			$conn=mysqli_connect("127.0.0.1", "root", "fiesta2011", "pokemons-gonzalez-diego");
			  
            $sql = "SELECT 
						p.Id Id,
						p.Nombre,
						p.Ataque,
						p.Imagen,
						t.Imagen ImagenTipo
					FROM 
						pokemon p
						LEFT JOIN tipo t ON t.Id = p.IdTipo";
					
			$result=mysqli_query($conn, $sql);
			$cantResultados = mysqli_num_rows($result);
			
			while($rows=mysqli_fetch_assoc($result))
			{
                echo "	<div class='row'>";
				 echo "		<div class='col-sm-4'></div>";
				 echo " 	<div class='col-sm-4'>";
				 echo "    		<div class='panel panel-danger'>";
				 echo "      		<div class='panel-heading'><b>Pokedex</b></div>";
				 echo "    			<div class='panel-body'>";
				 echo "					<p><b>Nombre:</b> ".strtoupper($rows['Nombre'])."</p>";
				 echo "					<p><b>Ataque:</b> ".$rows['Ataque']."</p>";
				 echo "					<p><b>Tipo:</b> "."<img width='30px;' src='".$rows['ImagenTipo']."' />"."</p>";
				 echo "					<p><img width='150px;' src='".$rows['Imagen']."' />"."</p>";
				 echo "    			</div>";
				 echo "    		</div>";
				 echo " 	</div>";
				 echo " 	<div class='col-sm-4'></div>";
				 echo "</div>";			
			}
          }
      ?>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="recursos/js/bootstrap.min.js"></script>
  </body>
</html>
  


