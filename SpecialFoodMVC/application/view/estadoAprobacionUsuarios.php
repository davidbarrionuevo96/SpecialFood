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
			<!--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">-->
	</head>
    <body>	
        <header id="header" class="absolute">
			<div class="container iniciar_sesion">
                <div class="row">			
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li><a href="/">Volver</a></li>
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
            <br><br><br><br><br><br><br><br><br><br>
            
                        <?php

                        foreach ($data as $element){
                            echo "<b class='letra-blanca11'>"." ".$element['Nombre']."</b>".
                            "<b class='letra-blanca11'>"." ".$element['Apellido']."</b>".
                            "<b class='letra-blanca11'>"." ".$element['CUIL']."</b>".
                            "<b class='letra-blanca11'>"." ".$element['CUIT']."</b>"."<br>".
                            "<a href='/aprobacionUsuario/Aceptar?id=".$element['IdUsuario']."'>"."<button class='primary-btn10'>"."Aceptar"."</button>"."</a>"."     ".
                            "<a href='/aprobacionUsuario/Rechazar?id=".$element['IdUsuario']."'>"."<button class='primary-btn10'>"."Rechazar"."</button>"."</a>"."<br>"."<br>";
                        }
                        ?>

            <br><br><br><br><br><br><br><br><br><br>
        </section>
    </body>
    <footer class="footer-area">
        <?php 
            include ('footer.php');
        ?>
    </footer>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/js/validar-formulario.js" type=""></script>
</html>
