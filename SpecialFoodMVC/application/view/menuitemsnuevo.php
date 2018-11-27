
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
<script>
            function PostForm() {
                if (IsValid()) {
                    $("#lblErrorP").text("");

                    document.forms["frmmenuitem"].submit();
                }
            }

            function IsValid() {
                HideDivMessageP();

                var field;
                var regexemail = /^[0-9a-zA-Z._.-]+\@[0-9a-zA-Z._.-]+\.[0-9a-zA-Z]+$/;
                var regexnumero = /^[0-9]+$/;
                var regexcuilcuit = /^[0-9]{2}-[0-9]{8}-[0-9]$/;

                field = $("#Producto_nombre").val();
                if (field.length == 0) {
                    $("#lblErrorP").text("Debe ingresar el nombre.");
                    ShowDivMessageP();
                    return false;
                }

                field = $("#Producto_precio").val();
                if (field.length == 0) {
                    $("#lblErrorP").text("Debe ingresar el precio.");
                    ShowDivMessageP();
                    return false;
                }

                return true;
            }

            function ShowDivMessageP() {
                scroll(0, 0);
                $("#divMessagesP").show("slow", function () { });
            }

            function HideDivMessageP() {
                $("#divMessagesP").hide();
            }
            </script>
 <!-- start banner Area -->
 <section class="banner-area">		
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-4 col-md-offset-4 espacio">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title letra-blanca">Ingrese los datos</h2>
                        
                    </div>
                    <div id="divMessagesP" style="display: none;">
                                <p align="left">
                                    <div class="alert alert-danger" style="text-align: left;">
                                        <label id="lblErrorP" style="font-size: 12px; color: firebrick; font-weight: bold; margin-left: 5px;"></label>
                                    </div>
                                </p>
                            </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="/menuitems/guardar" name="frmmenuitem" id="frmmenuitem" enctype="multipart/form-data">
                        <br>
                        <h3 class="letra-blanca">Producto</h3>
                        <br>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                <input type="text" name="Producto_nombre" id="Producto_nombre" class="form-control input-sm" placeholder="Nombre*">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="number" name="Producto_precio" id="Producto_precio" class="form-control input-sm" placeholder="Precio*">
                                </div>
                            </div>    
                                                   
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="input-group mb-3">
                                  <div class="custom-file">
                                    <input type="file" name="imagen"  class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" maxlength="150">
                                    <label class="custom-file-label" for="inputGroupFile01">Imagen</label>
                                  </div>
                                </div>                              
                            </div>                        
                        </div>
                        <input type="text" name="idMenu" style="visibility: hidden" class="form-control input-sm"  value = '<?php echo $_GET['id']; ?>'><input type="submit" onclick="PostForm(); return false;" value="Guardar" class=" btn btn-info btn-block">

                    </form>
                </div>

            </div>
       
        </div>
    </div>
</div>
<div class="auxiliar1"></div>
</section>
<footer class="footer-area">
   <?php
      include 'footer.php';
    ?>
</footer>
<script
src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="/js/validar-formulario.js"></script>           
</body>
</html>
