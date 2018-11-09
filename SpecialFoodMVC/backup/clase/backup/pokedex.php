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
      <?php 
      /*$usuario = $_POST['txUsuario'];
      $password = $_POST['txPassword'];*/

      //if ($usuario == "usuario1" && $password=="123123")
      //{
          //setcookie("username", $usuario, 0, "/");
      /*if (isset($_POST['chkRecordarme']))
          $_SESSION["usuarioSession"] = $usuario;
      else
          session_destroy();*/

          //setcookie("username",'',time()-3600);

      //header("Location: http://localhost/consultapokedex.php");

      //}

      

      //foreach ($_POST as $param_name => $param_val) {
      //    echo "Param: $param_name; Value: $param_val<br />\n";
      //}

/*
        echo "Texto: ".$_POST['txTexto']."<br/>";
        echo "Sexo: ".$_POST['sexo']."<br/>";
        echo "cboOpciones: ".$_POST['cboOpciones']."<br/>";
        echo "Password: ".$_POST['txPassword']."<br/>";
        if (isset($_POST['chkAcepto']))
          echo "Acepto: ".$_POST['chkAcepto']."<br/>";
        else
          echo "Acepto: off<br/>";
        echo "TextArea: ".$_POST['txaTextoGrande']."<br/>";

*/


      /*  
          $pokemons = array("pikachu" => array("tipo" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRce6T0YjJL1TrOA5tAgT9O-lPITwKlObr3RwunE8Rp7I9AfKwI", "ataque" => "Impact Trueno", "imagen" => "https://www.geekno.com/wp-content/uploads/2016/08/pikachu.jpeg"), 
                            "charizard" => array("tipo" => "https://images.vexels.com/media/users/3/137391/isolated/preview/5853be1fe267b18fa22abcf71ea40d5e-contorno-de-dibujos-animados-fuego-anaranjado-by-vexels.png", "ataque" => "Mar Llamas", "imagen" => "https://vignette.wikia.nocookie.net/sonicpokemon/images/b/bf/Charizard_AG_anime.png/revision/latest?cb=20130714192025"));

          $pokemons["bulbasaur"] = array("tipo" => "https://vignette.wikia.nocookie.net/hydrangea/images/7/7a/Tipo_Planta.png/revision/latest?cb=20161218030458&path-prefix=es", "ataque" => "Espesura", "imagen" => "https://www.geekno.com/wp-content/uploads/2016/08/bulbasaur.jpeg");

          ksort($pokemons);

          if (isset($_GET['whoisthatpokemon']))
          {
              $nombreGet = strtolower($_GET["whoisthatpokemon"]);

              if ($nombreGet != "")
              {
                 echo "<div class='row'>";
                 echo " <div class='col-sm-4'></div>";
                 echo " <div class='col-sm-4'>";
                 echo "    <div class='panel panel-danger'>";
                 echo "      <div class='panel-heading'><b>Pokedex</b></div>";
                 echo "    <div class='panel-body'>";

                 if(array_key_exists($nombreGet, $pokemons))
                 {
                     echo "<p><b>Nombre:</b> ".strtoupper($nombreGet)."</p>";
                     echo "<p><b>Ataque:</b> ".$pokemons[$nombreGet]["ataque"]."</p>";
                     echo "<p><b>Tipo:</b> "."<img width='30px;' src='".$pokemons[$nombreGet]["tipo"]."' />"."</p>";
                     echo "<p><img width='150px;' src='".$pokemons[$nombreGet]["imagen"]."' />"."</p>";
                 }
                 else
                 {
                     echo "Pokemon no encontrado";
                 }

                 echo "    </div>";
                 echo "    </div>";
                 echo " </div>";
                 echo " <div class='col-sm-4'></div>";
                 echo "</div>";
              }
              else
              {
                  mostrarTodos($pokemons);
              }
          }
          else
          {
            mostrarTodos($pokemons);
          }

          function mostrarTodos($pokemons){
            foreach ($pokemons as $nombre => $pokemon) {
                echo "<div class='row'>";
                echo "  <div class='col-sm-4'></div>";
                echo "  <div class='col-sm-4'>";
                echo "    <div class='panel panel-danger'>";
                echo "      <div class='panel-heading'><b>Pokedex</b></div>";
                echo "      <div class='panel-body'>";
                echo "        <p><b>Nombre:</b> ".strtoupper($nombre)."</p>";
                echo "        <p><b>Ataque:</b> ".$pokemon["ataque"]."</p>";
                echo "        <p><b>Tipo:</b> "."<img width='30px;' src='".$pokemon["tipo"]."' />"."</p>";
                echo "        <p><img width='150px;' src='".$pokemon["imagen"]."' />"."</p>";
                echo "      </div>";
                echo "    </div>";
                echo "  </div>";
                echo " <div class='col-sm-4'></div>";
                echo "</div>";
            }  
          }
        */
      ?>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
  


