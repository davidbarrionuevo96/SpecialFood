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
  <title>SpecialFood - Carrito de Compras</title>

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

      <body>  
      <section class="banner-area">   
                  <div class="container">
                      <div class="row justify-content-center">
                          <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-4 col-md-offset-4 espacio">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h3 class="panel-title letra-blanca">Sus Pedidos</h3>
                                      <br/>
                                  </div>
                                  <div class="panel-body">

                                      <table class="table">
                                        <thead class="thead-light">
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Total</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                          <?php

                                          $row = 0;

                                          if($data != NULL){
                                          foreach ($data as $element){

                                              $row ++;
                                                echo
                                                  "<tr>".
                                                    "<th scope='row'>".$row."</th>".
                                                    "<td>".$element['Descripcion']."</td>".
                                                    "<td>".$element['PrecioUnitario']."</td>".
                                                    "<td>".$element['Cantidad']."</td>".
                                                    "<td>".$element['CostoTotal']."</td>".
                                                  "</tr>";
                                            }
                                        }
                                        ?>
                                        </tbody>
                                      </table>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          <footer class="footer-area">
             <?php
             include 'footer.php';
             ?>
          </footer>
    </body>
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
</html>
