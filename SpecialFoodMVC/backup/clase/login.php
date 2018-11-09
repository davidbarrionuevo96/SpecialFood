<?php
  session_start();
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
       <div class='row'>
        <div class='col-sm-4'></div>
         <div class='col-sm-4'>
           <div class='panel panel-danger'>
              <div class='panel-heading'><b>Búsqueda en Pokedex</b></div>
              <div class='panel-body'>
                <form id="frmLogin" method="post" action="validatelogin.php">
                  <label for="txUsuario">Usuario:</label>
				  <input type="text" id="txUsuario" name="txUsuario" />
                  <br/><br/>
                  <label for="txPassword">Password:</label>
                  <input type="password" id="txPassword" name="txPassword" />
                  <br/><br/>
                  <input type="checkbox" name="chkRecordarme" id="chkRecordarme">Recordarme
                  <br/><br/>
                  <button type="submit" style="float: right;">Login</button>
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
    <script src="recursos/js/bootstrap.min.js"></script>
  </body>
</html>
