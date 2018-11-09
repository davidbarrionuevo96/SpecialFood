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
              <div class='panel-heading'><b>Formulario Test</b></div>
              <div class='panel-body'>
                <form id="frmConsulta" method="post" enctype="application/x-www-form-urlencoded" action="consultapokedex.php">
                  <label for="txUsuario">Usuario:</label>
        
                  <?php
                    if (!isset($_GET["paginaActual"]))
                    {
                      $paginaActual = 1;
                    }
                    else
                    {
                      $paginaActual = $_GET["paginaActual"];
                    } 

                    //if(isset($_COOKIE["username"])){
                    /*if(isset($_SESSION["usuarioSession"])){
                      $usernameCookie = $_SESSION["usuarioSession"];
                    }
                    else{
                      $usernameCookie = ""; 
                    }*/

                    $conn=mysqli_connect("127.0.0.1", "root", "fiesta2011", "pokemons-gonzalez-diego");

                    if ($paginaActual != 1)
                      $sql = 'select * from pais limit '.(string)($paginaActual*10).', 10';
                    else
                      $sql = 'select * from pais limit 1, 10';

                    $result=mysqli_query($conn, $sql);

                    echo "<br/>";

                    while($rows=mysqli_fetch_assoc($result))
                    {
                      echo $rows['codigoPais']."-".$rows['descripcionPais']."<br/>";
                    }
                    
                    //echo phpinfo();

                    //session_start(); //repetir en cada pagina para mantener la sesion viva.


                    //session_destroy();
                  ?>
                  
                  <?php
                  if ($paginaActual > 1)
                    echo "<a href='consultapokedex.php?paginaActual=".($paginaActual-1)."'>Anterior</a>";
                  ?>

                  <a href="consultapokedex.php?paginaActual=<?php echo $paginaActual+1?>">Siguiente</a>
                  
                  
                  <!--<input type="text" id="txUsuario" name="txUsuario" value="<?php echo htmlspecialchars($usernameCookie); ?>" />
                  <br/><br/>
                  <label for="txPassword">Password:</label>
                  <input type="password" id="txPassword" name="txPassword" />
                  <br/><br/>
                  <input type="checkbox" name="chkRecordarme" id="chkRecordarme">Recordarme
                  <br/><br/>-->
                  <!--<label for="txTexto">Texto:</label>
                  <input type="text" id="txTexto" name="txTexto" />
                  <br/><br/>
                  <label>Sexo:</label>
                  <input type="radio" id="rdSexoM" name="sexo" value="rdSexoM" checked />M
                  <input type="radio" id="rdSexoF" name="sexo" value="rdSexoF" />F
                  <br/><br/>
                  Combo:
                  <select id="cboOpciones" name="cboOpciones">
                    <option value="1">Opcion 1</option>
                    <option value="2">Opcion 2</option>
                  </select>
                  <br/><br/>
                  Password:<input type="password" id="txPassword" name="txPassword" />
                  <br/><br/>
                  <input type="checkbox" id="chkAcepto" name="chkAcepto" />Acepto los terminos y condiciones
                  <br/><br/>
                  <textarea id="txaTextoGrande" name="txaTextoGrande">Bla bla bla bla</textarea>-->
                  <br/><br/>
                  <button type="submit" style="float: right;">Consultar</button>
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
