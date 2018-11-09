<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trabajo Practico 3</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <main>
       <br/>
       <div class='row'>
        <div class='col-sm-4'></div>
         <div class='col-sm-4'>
           <div class='panel panel-danger'>
              <div class='panel-heading'><b>Pokedex</b></div>
              <div class='panel-body'>
                <?php

                  echo "Galleta: ".$_COOKIE["galleta"];

                  setcookie("galleta", 1, time()-3600);
                ?>
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
