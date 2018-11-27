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
  <title>SpecialFood</title>

  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="/css/linearicons.css">
			<link rel="stylesheet" href="/css/font-awesome.min.css">
			<link rel="stylesheet" href="/css/bootstrap.css">
			<link rel="stylesheet" href="/css/magnific-popup.css">
			<link rel="stylesheet" href="/css/nice-select.css">
			<link rel="stylesheet" href="/css/animate.min.css">
			<link rel="stylesheet" href="/css/owl.carousel.css">
			<link rel="stylesheet" href="/css/main.css">
			<link rel="stylesheet" href="/css/custom.css">

      <link href='/css/jquery-ui.css' rel="stylesheet" type="text/css" />
      <link href='/css/ui.jqgrid.css' rel="stylesheet" type="text/css" />

      <script src='/js/jquery.js' type="text/javascript"></script>
      <script src='/js/jquery-1.11.1.min.js' type="text/javascript"></script>
      <script src='/js/jquery-ui.js' type="text/javascript"></script>

      <script src='/js/grid.locale-es.js' type="text/javascript"></script>
      <script src='/js/jquery.jqGrid.min.js' type="text/javascript"></script>

      <script>

          function Edit(id) {
              window.location.assign("/Comercio/comerciomanager?id=" + id);
          };

         
     </script>
 </head>
 <body>	
    <header id="header" class="absolute">
     <div class="container iniciar_sesion2">
        <div class="row">			
            <nav id="nav-menu">
                <ul class="nav-menu ">
                    <li class="volver"><a href="/"> << Volver</a></li>
                </ul>
            </nav>				      		  
        </div>
        </div>
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div id="logo">
                     <a href="/"><img src="/img/logo.png" alt="" title="" /></a>
                 </div>
             </div>			  					
         </div>
     </div>     
 </header><!-- #header -->			

 <!-- start banner Area -->
 <section class="banner-area">		
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-4 col-md-offset-4 espacio">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title letra-blanca">Informes</h2>
                    </div>
                    <div class="panel-body">
                      <br/>
                          <div class="row" id="containerGrid">
                             <div class="col-md-12">
                                <button class="newbutton" onclick="window.location.assign('/usuario/usuariolist'); return false;">Listado de Usuarios</button>
                                <button class="newbutton" onclick="window.location.assign('/informes/rankings'); return false;">Ranking de Deliverys / Comercios / Clientes</button>
                            </div>            
                          </div>
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
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->
<script src="/js/validar-formulario.js"></script>           
</body>
</html>