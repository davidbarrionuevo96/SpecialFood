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

      <style type="text/css">
          .myAltRowClass {
              background-color: #DCFFFF;
              background-image: none;
          }

          /* fix the size of the pager */
          input.ui-pg-input {
              width: auto;
          }
          /* fix the grid width */
          table {
              border-style: none;
              border-collapse: separate;
          }

          table td {
              border-style: none;
          }

          .ui-jqdialog-content table.group th {
              background-color: inherit;
          }

          .ui-autocomplete {
              /* for IE6 which not support max-height it can be width: 350px; */
              max-height: 300px;
              overflow-y: auto; /* prevent horizontal scrollbar */
              overflow-x: hidden; /* add padding to account for vertical scrollbar */
              padding-right: 20px;
          }
          /*.ui-autocomplete.ui-menu { opacity: 0.9; }*/
          .ui-autocomplete.ui-menu .ui-menu-item {
              font-size: 0.75em;
          }

          .ui-autocomplete.ui-menu a.ui-state-hover {
              border-color: Tomato;
          }

          .ui-resizable-handle {
              z-index: inherit !important;
          }
      </style>

      <script>
          try{
            $(document).ready(function() {
              jQuery("#listComercios").jqGrid({ 
                  datatype: "local", 
                  colNames:['Nro. Pedido', 'Fecha', 'Comercio', 'Punto Vta.', 'Cliente', 'Direccion', 'Importe', 'Costo Entrega', 'Delivery', 'MontoPenalidad'], 
                  colModel:[ 
                    { name:'NroPedido', index:'NroPedido', align:"center", hidden: true, sortable: false }, 
                    { name:'FechaPedido', index:'FechaPedido', sortable: false }, 
                    { name:'Comercio', index:'Comercio', sortable: false }, 
                    { name:'PuntoVenta', index:'PuntoVenta', sortable: false }, 
                    { name:'Cliente', index:'Cliente', sortable: false }, 
                    { name:'DireccionCliente', index:'DireccionCliente', sortable: false }, 
                    { name:'CostoTotal', index:'CostoTotal', sortable: false }, 
                    { name:'CostoEntrega', index:'CostoEntrega', sortable: false }, 
                    { name:'Delivery', index:'Delivery', sortable: false }, 
                    { name:'MontoPenalidad', index:'MontoPenalidad', sortable: false }
                  ], rowNum:10000, /*rowList:[10,20,30],*/ pager: '#pagerComercios', sortname: 'id', 
                  viewrecords: true, sortorder: "desc", caption:"Liquidación Comercios",
                  rows: []
                }); 

                jQuery("#listComercios").jqGrid('navGrid','#pagerComercios', { edit: false, add: false, del: false });  

                $.get("../../application/view/cobranzascomerciogrid.php?page=1&rows=10000&sidx=1&sord=asc", function(data){
                    $("#listComercios")[0].addJSONData(JSON.parse(data));

                    var ids = jQuery("#listComercios").jqGrid('getDataIDs');
                      for (var i = 0; i < ids.length; i++) {
                          var rowId = ids[i];

                          var idComercio = jQuery("#listComercios").jqGrid('getRowData')[i].idcomercio;

                          var checkOut = "<table><tr>";
                          /*
                          checkOut = checkOut + "<td title='Editar' class='ui-pg-button ui-corner-all ui-state-hover' style='border: 0px; cursor:pointer;'>";
                          checkOut = checkOut +"<span class='ui-icon ui-icon-pencil' onclick=\"Edit(" + idComercio + ");\"></span></td>";

                          checkOut = checkOut +
                              "<td title='Eliminar' class='ui-pg-button ui-corner-all ui-state-hover' style='border: 0px; cursor:pointer;'>" +
                              "<span class='ui-icon ui-icon-closethick' onclick=\"Delete(" + idComercio + ");\"></span></td>";
                          */
                          checkOut = checkOut + "</tr></table>";

                          jQuery("#listComercios").jqGrid('setRowData', rowId, { action: checkOut });

                          
                    }

                    $("#listComercios").setGridWidth($("#containerGrid").width());
                });
              }); 

              
          }
          catch(err){
            alert(err);
          }

          function Edit(id) {
              window.location.assign("/Comercio/comerciomanager?id=" + id);
          };

          function Delete(id) {
              var txt;
              var r = confirm("¿Seguro que desea eliminar?");
              if (r == true) {
                  window.location.assign("/Comercio/eliminar?id=" + id);
              }
          };

          $(window).bind('resize', function () {
              $("#listComercios").setGridWidth($("#containerGrid").width());
          }).trigger('resize');
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
                        <h2 class="panel-title letra-blanca">Liquidación a Comercios</h2>
                    </div>
                    <div class="panel-body">
                        <form action="/comercio/guardar" method="post">
                          <div class="row" id="containerGrid">
                             <div class="col-md-12">
                                <input class="newbutton" type="button" style="float: right;" onclick="window.location.assign('/cobranza/liquidacioncomercio')" value="Liquidar Pedidos" />
                                <br/><br/>
                                <table id="listComercios"></table>
                                <div id="pagerComercios"></div>
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
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->
<script src="/js/validar-formulario.js"></script>           
</body>
</html>