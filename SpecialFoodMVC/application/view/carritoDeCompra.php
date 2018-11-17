<?php
include ('core/helpers/conexion.php');  

if(isset($SESSION['carrito'])){

  $productos[] = $SESSION['carrito'];
  $encontro = false;
  $numero = 0;


  for ($i=0; $i < count($productos); $i++) { 
    if ($productos[i]['Id'] == $_GET['id']) {
      $encontro= true;
      $numero = $i;
    }
  }

  if($encontro == true){
    $productos[$numero]['Cantidad'] = $productos[$numero]['Cantidad']+1;
    $_SESSION['carrito'] = $productos;
  }else{
    $descripcion = "";
    $precio = 0;

    $product_query = "SELECT * FROM menunegocioitem where idmenunegocioitem = ".$_GET['id']."";

    $run_query = mysqli_query($conexion,$product_query);

    while($rows=mysqli_fetch_assoc($run_query))
    {
      $descripcion =$rows['Descripcion'];
      $precio = $rows['Precio'];
      echo "string11";
    }

    $productoNuevo = array('Id' =>$_GET['id'] ,
      'Descripcion' => $descripcion,   
      'Precio' =>$precio,
      'Cantidad' => 1
    );

    array_push($productos, $productoNuevo);
    $_SESSION['carrito'] = $productos;
  }

}else{

  if (isset($_GET['id'])) {
    $descripcion = "";
    $precio = 0;

    $product_query = "SELECT * FROM menunegocioitem where idmenunegocioitem = ".$_GET['id']."";

    $run_query = mysqli_query($conexion,$product_query);

    while($rows=mysqli_fetch_assoc($run_query))
    {
      $descripcion =$rows['Descripcion'];
      $precio = $rows['Precio'];
      echo "string1";
    }

    $productos[] = array('Id' =>$_GET['id'] ,
      'Descripcion' => $descripcion,   
      'Precio' =>$precio,
      'Cantidad' => 1
    );

    $_SESSION['carrito'] = $productos;
    var_dump($_SESSION['carrito']);
  }
}

?>

<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/fav.png">
  <!-- Author Meta -->
  <meta name="author" content="colorlib">
  <!-- Meta Description -->
  <meta name="description" content="">
  <!-- Meta Keyword -->
  <meta name="keywords" content="">
  <!-- meta character set -->
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>SpecialFood - Registro</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
            <!--
            CSS
            ============================================= -->
            <link rel="stylesheet" href="/css/linearicons.css">
            <link rel="stylesheet" href="/css/font-awesome.min.css">
            <link rel="stylesheet" href="/css/bootstrap.css">
            <link rel="stylesheet" href="/css/magnific-popup.css">
            <link rel="stylesheet" href="/css/jquery-ui.css">               
            <link rel="stylesheet" href="/css/nice-select.css">                         
            <link rel="stylesheet" href="/css/animate.min.css">
            <link rel="stylesheet" href="/css/owl.carousel.css">                
            <link rel="stylesheet" href="/css/main.css">
            <link rel="stylesheet" href="/css/custom.css">

            <header id="header">
              <div class="header-top">
                <div class="container">
                  <div class="row justify-content-center">
                    <div id="logo">
                     <a href="index.html"><img src="../img/logo.png" alt="" title="" /></a>
                   </div>
                 </div>                             
               </div>
             </div>
             <div class="container main-menu">
              <div class="row align-items-center justify-content-center d-flex">      
                <nav id="nav-menu-container">
                  <ul class="nav-menu">
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="about.html">Nosotros</a></li>
                    <li><a href="menu.html">Menú</a></li>
                    <li><a href="contact.html">Contacto</a></li>

                    <li class="derecha"></li>
                    <li><button class="primary-btn1"><a href="iniciar-sesion.html">Iniciar sesión</a></li></button>
                    <li><button class="primary-btn1"><a href="registrarse.html">Registrarse</a></li></button>

                  </ul>
                </nav>                    
              </div>
            </div>
          </header><!-- #header -->
          <section class="banner-area1">   
            <div class="container">
              <div class="row fullscreen align-items-center justify-content-between ">

                <div class="cajag">

                  <div class="caja10">

                    <?php

                    $total = 0;

                    if(isset($SESSION['carrito'])){

                      $datos = $SESSION['carrito'];

                      for ($i=0; $i < count($datos); $i++) { 

                        echo "<div class='producto'>
                        <center>

                        <span> Producto: ".$datos[$i]['Descripcion']."</span><br>
                        <span> Precio:".$datos[$i]['Precio']."</span><br>
                        <span> Cantidad: <input type='text' value=".$datos[$i]['Cantidad']."</input></span><br>
                        <span> Total: ".$datos[$i]['Precio']*$datos[$i]['Cantidad']."</span><br>

                        </center>
                        </div>";

                        $total = ($datos[$i]['Precio']*$datos[$i]['Cantidad'])+ $total;
                      }

                    }else{
                      echo "<center><h4>El Carrito de compras está vacío</center></h4>";
                    }

                    echo "<center><h4>Total : ".$total."</center></h4>";

                    ?>


                  </div>
                </div>
              </div>
            </section>




            <footer class="footer-area">
             <?php
             include 'footer.php';
             ?>
           </footer>
           <script src="js/vendor/jquery-2.2.4.min.js"></script>
           <script src="js/popper.min.js"></script>
           <script src="js/vendor/bootstrap.min.js"></script>          
           <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>     
           <script src="js/jquery-ui.js"></script>                 
           <script src="js/easing.min.js"></script>            
           <script src="js/hoverIntent.js"></script>
           <script src="js/superfish.min.js"></script> 
           <script src="js/jquery.ajaxchimp.min.js"></script>
           <script src="js/jquery.magnific-popup.min.js"></script>                     
           <script src="js/jquery.nice-select.min.js"></script>                    
           <script src="js/owl.carousel.min.js"></script>          
           <script src="js/isotope.pkgd.min.js"></script>                              
           <script src="js/mail-script.js"></script>   
           <script src="js/main.js"></script>  
         </body>
         </html>
