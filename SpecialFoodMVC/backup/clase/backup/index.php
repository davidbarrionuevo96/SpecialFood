<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Trabajo Practico PB2</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <main>
      <div class="panel panel-danger">
      	<div class="panel-heading"><b>Pokedex</b>
  	  </div>
      <div class="panel-body">
      	<?php   
			
		$pokemons = Array("Pikachu" => Array("tipo" => "electrico", "genero" => "", "ataque" => "impact trueno"), 
						  "Charmander" => Array("tipo" => "fuego", "genero" => "generito", "ataque" => "llamarada"));

		$pokemons["bulbasaur"] = Array("tipo" => "planta", "genero" => "plantitas", "ataque" => "hojitas");

		//asort($pokemons); //ordena por valor
		ksort($pokemons); //ordena por clave

		foreach ($pokemons as $nombre => $pokemon) {
			 echo "<div class='row'>";
	         echo "<div class='col-sm-12' style='border-right: 1px solid black;'>";
	         echo $nombre."-".$pokemon["tipo"];
	         echo "	</div>";
	         echo "</div>";
		}
		?>
       
      </div>
    </div>
    </div>
    </main>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
	

