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
		<title>SpecialFood - Iniciar Sesión</title>

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
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-4 col-md-offset-4 espacio">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title letra-blanca">Iniciar sesión</h3>
                                    <br/>
                                </div>
                                <div class="panel-body">
                                    <form role="form" action="/login/iniciar_sesion" method="post">
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Contraseña">
                                        </div>
                                            <input type="submit" value="Iniciar Sesión" class="btn btn-info btn-block">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </body>
    <footer class="footer-area">
        <?php 
            include ('footer.php');
        ?>
	</footer>
<div class="footer-bottom-wrap">
    <div class="container">
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-8 col-mdcol-sm-6 -6 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> | <a href="index.html" >SpecialFood</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                <ul class="col-lg-4 col-mdcol-sm-6 -6 social-icons text-right">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i></a></li>           
                </ul>
            </div>                      
        </div>
    </div>
</footer>
</html>
