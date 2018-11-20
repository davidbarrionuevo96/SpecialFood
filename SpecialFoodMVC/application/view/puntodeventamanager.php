<?php
require('core/helpers/conexion.php');
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
    <title>SpecialFood</title>

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

            document.forms["frmPuntoDeVenta"].submit();
        }
    }

    function IsValid() {
        HideDivMessageP();

        var field;
//$numero , $idcomercio,$idPuntoDeVenta,$idcalle
        field = $("#puntodeventa_numero").val();
        if (field.length == 0) {
            $("#lblErrorP").text("Debe ingresar el numero del punto de venta.");
            ShowDivMessageP();
            return false;
        }

        field = $("#puntodeventa_idcomercio").val();
        if (field.length == 0) {
            $("#lblErrorP").text("Debe ingresar el id del comercio.");
            ShowDivMessageP();
            return false;
        }
        field = $("#puntodeventa_idcalle").val();
        if (field.length == 0) {
            $("#lblErrorP").text("Debe ingresar el id de la calle.");
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
                        <h2 class="panel-title letra-blanca">Datos del Punto de Venta</h2>
                    </div>
                    <div id="divMessagesP" style="display: none;">
                        <p align="left">
                        <div class="alert alert-danger" style="text-align: left;">
                            <label id="lblErrorP" style="font-size: 12px; color: firebrick; font-weight: bold; margin-left: 5px;"></label>
                        </div>
                        </p>
                    </div>
                    <div class="panel-body">
                        <form action="/puntodeventa/guardar" method="post" id="frmPuntoDeVenta" name="frmPuntoDeVenta">
                            <br/>
                            <input type="text" style="display: none;" name="puntodeventa_id" id="puntodeventa_id" value="<?php echo $data['IdPuntoDeVenta']; ?>" />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="puntodeventa_numero" id="puntodeventa_numero" value="<?php echo $data['Numero']; ?>" class="form-control input-sm" placeholder="Numero*">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <select class="form-control" name="puntodeventa_idcomercio" id="puntodeventa_idcomercio">
                                            <?php $datoscomercio=$conexion->query("select * from Comercio");
                                            while($com = mysqli_fetch_array($datoscomercio)) {?>

                                                <option value="<?php echo $com['IdComercio']; ?>"><?php echo $com['Nombre']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <select class="form-control" name="puntodeventa_idcalle" id="puntodeventa_idcalle">
                                            <?php $datoscalle=$conexion->query("select * from Calle");
                                            while($calles = mysqli_fetch_array($datoscalle)) {?>

                                            <option value="<?php echo $calles['IdCalle']; ?>"><?php echo $calles['Descripcion']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="button" value="Volver" onclick="window.location.assign('/PuntoDeVenta/PuntoDeVentaList');" class="btn btn-info btn-block">
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="button" onclick="PostForm(); return false;" value="Guardar" class=" btn btn-info btn-block">
                                </div>
                            </div>
                        </form>
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
<script
    src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="/js/validar-formulario.js"></script>
</body>
</html>