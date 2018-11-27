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

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">

        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChartDeliverys);
        google.charts.setOnLoadCallback(drawChartComercios);
        google.charts.setOnLoadCallback(drawChartUsuarios);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChartDeliverys() {

          $.get("../../application/view/ajaxCharts.php?chart=deliverys", function(dataAjax){
              
              // Create the data table.
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Topping');
              data.addColumn('number', 'Slices');
              data.addRows(JSON.parse(dataAjax));

              // Set chart options
              var options = {'title':'Ranking de Deliverys por cantidad de Entregas',
                             'width':400,
                             'height':300, 
                             is3D: true};

              // Instantiate and draw our chart, passing in some options.
              var chart = new google.visualization.PieChart(document.getElementById('chart_divDeliverys'));
              chart.draw(data, options);
            });
        }

        function drawChartComercios() {
            $.get("../../application/view/ajaxCharts.php?chart=comercio", function(dataAjax){
              
              // Create the data table.
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Topping');
              data.addColumn('number', 'Slices');
              data.addRows(JSON.parse(dataAjax));

              // Set chart options
              var options = {'title':'Ranking de Comercios por cantidad de Ventas',
                             'width':400,
                             'height':300, 
                             is3D: true};

              // Instantiate and draw our chart, passing in some options.
              var chart = new google.visualization.PieChart(document.getElementById('chart_divComercios'));
              chart.draw(data, options);
            });
        }

        function drawChartUsuarios() {
          $.get("../../application/view/ajaxCharts.php?chart=cliente", function(dataAjax){
              
              // Create the data table.
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Topping');
              data.addColumn('number', 'Slices');
              data.addRows(JSON.parse(dataAjax));

              // Set chart options
              var options = {'title':'Ranking de Clientes por cantidad de Pedidos',
                             'width':400,
                             'height':300, 
                             is3D: true};

              // Instantiate and draw our chart, passing in some options.
              var chart = new google.visualization.PieChart(document.getElementById('chart_divClientes'));
              chart.draw(data, options);
            });
        }
      </script>
 </head>
 <body>	
    <header id="header" class="absolute">
     <div class="container iniciar_sesion2">
        <div class="row">			
            <nav id="nav-menu">
                <ul class="nav-menu ">
                    <li class="volver"><a href="/informes/informeslist"> << Volver</a></li>
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
                          <div class="row">
                            <div class="col-md-12">
                                <div id="chart_divDeliverys"></div>
                            </div>   
                          </div>
                          <br/>
                          <div class="row">
                            <div class="col-md-12">
                                <div id="chart_divComercios"></div>
                            </div>  
                          </div>
                          <br/>
                          <div class="row">
                            <div class="col-md-12">
                                <div id="chart_divClientes"></div>
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