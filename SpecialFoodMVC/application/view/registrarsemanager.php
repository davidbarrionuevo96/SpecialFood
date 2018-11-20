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
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-4 col-md-offset-4 espacio">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title letra-blanca">Datos del Usuario</h3>
                                <br/>
                            </div>
                            <div class="panel-body">
                                <form action="/registro/modificar_registro" name="form" id="form" method="POST">
                                    <div class="row"> 
                                        <div class="col-xs-6 col-sm-6 col-md-6" style="display: none;">
                                            <select class="form-control" id="perfil" name="perfil">
                                                <option value="1">Cliente</option>
                                                <option value="2">Repartidor</option>                                                
                                                <option value="3">Comercio</option>
                                            </select>
                                        </div>       
                                    </div>
									<br/>
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                        <input type="text" style="display: none;" name="Usuario_id" id="Usuario_id" value="<?php echo $data['IdUsuario']; ?>" />
                                            <div class="form-group">
                                                <input type="text" name="nombre" id="nombre" value="<?php echo $data['Nombre']; ?>" class="form-control input-sm" placeholder="Nombre*">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="apellido" id="apellido" value="<?php echo $data['Apellido']; ?>" class="form-control input-sm" placeholder="Apellido*"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="password" name="password" id="password"  value="<?php echo $data['Password']; ?>" class="form-control input-sm" placeholder="Contrase�a*">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="password" name="password_confirmation"  value="<?php echo $data['Password']; ?>" id="password_confirmation" class="form-control input-sm" placeholder="Repetir contrase�a*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="display: none;">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email*">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="cuil" id="cuil" class="form-control input-sm" placeholder="CUIL">
                                                <input type="text" name="cuit" id="cuit" class="form-control input-sm" placeholder="CUIT*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="calle" id="calle" value="<?php echo $data['IdCalle']; ?>" class="form-control input-sm" placeholder="Calle*">
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="numero" id="numero" value="<?php echo $data['Numero']; ?>" class="form-control input-sm" placeholder="Numero*">
                                            </div>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email">
                                    </div>
                                    -->                                            
                                    <div class="row">
                            <div class="col-md-12">
                              <input type="button" value="Volver" onclick="window.location.assign('/');" class="btn btn-info btn-block">
                            </div>
                          </div>
                          <br/>
                          <div class="row">
                            <div class="col-md-12">
                            <input type="submit" value="Guardar" class="btn btn-info btn-block">
                            </div>
                          </div>

                                    <div id="mensaje"></div>
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
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="/js/validar-modificar_usuario.js" type=""></script>
</html>