<?php
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
    <title>Pokedex</title>
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <main>
       <br/>
       <div class='row'>
        <div class='col-sm-4'></div>
         <div class='col-sm-4'>
           <div class='panel panel-danger'>
              <div class='panel-heading'><b>Búsqueda de Pokedex</b></div>
              <div class='panel-body'>
                <form id="frmConsulta" method="get" action="pokedex.php">
                  <label for="whoisthatpokemon">Pokemon a buscar:</label>
				  <input type="text" id="whoisthatpokemon" name="whoisthatpokemon" />
                  <br/><br/>
                  <button type="submit" style="float: right;">Consultar</button>
				  <?php if (!isset($_SESSION["idUsuarioSession"])): ?>
						<button onclick="document.getElementById('frmConsulta').action='login.php'" type="submit" style="float: right;">Login</button>
				  <?php else: ?>
						<button onclick="document.getElementById('frmConsulta').action='logout.php'" type="submit" style="float: right;">Logout</button>
				  <?php endif; ?>
                </form>
              </div>
          </div>
         </div>
        <div class='col-sm-4'></div>
       </div>
    </div>
    </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
