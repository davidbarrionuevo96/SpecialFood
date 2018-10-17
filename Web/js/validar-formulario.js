$( document ).ready(function() {
    $( "#campos-usuario" ).change(function() {
        if ($( "#campos-usuario option:selected" ).text() == "Cliente"){ 
            $("#cuil").show(); 
            $("#cuil").attr("placeholder","CUIL"); 
            $("#cuil").attr("required", "false");
            $("#cuit").hide(); 
        }

        if ($( "#campos-usuario option:selected" ).text() == "Comercio"){
            $("#cuil").show(); 
            $("#cuil").attr("placeholder","CUIL*"); 
            $("#cuil").attr("required", "true");
            $("#cuit").hide();            
        }

        if ($( "#campos-usuario option:selected" ).text() == "Repartidor"){
            $("#cuit").show();
            $("#cuit").attr("required", "true");
            $("#cuil").hide(); 
        }
	});
});
