
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

<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-4 col-md-offset-4 espacio">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="panel-title letra-blanca">Ingrese los datos</h2>

                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="/menuitems/actualizar">

                            <br>
                            <h3 class="letra-blanca">Producto</h3>
                            <br>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="Producto_nombre" id="Comercio_nombre" class="form-control input-sm" value='<?php

                                        foreach ($data as $element){
                                            echo $element['Descripcion'];
                                        }
                                        ?>'>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="Producto_precio" id="Comercio_CUIT" class="form-control input-sm" value='<?php

                                        foreach ($data as $element){
                                            echo $element['Precio'];
                                        }
                                        ?>'>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="imagen"  class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"value='<?php

                                            foreach ($data as $element){
                                                echo $element['Foto'];
                                            }
                                            ?>'>
                                            <label class="custom-file-label" for="inputGroupFile01">Agregar imagen</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="text" name="idMenu" style="visibility: hidden" class="form-control input-sm"  value = '<?php echo $_GET['id']; ?>'>
                            <input type="submit" name="guardar" class=" btn btn-info btn-block">
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
