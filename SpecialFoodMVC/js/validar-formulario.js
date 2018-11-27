$( document ).ready(function() {
    $( "#perfil" ).change(function() {
        if ($( "#perfil option:selected" ).val() == 2){ 
            $(".combocomercio").show();
            $("#cuil").show(); 
            $("#cuit").hide();
            $("#cuil").attr("placeholder","CUIT* xx-xxxxxxxx-x");
        }

        if ($( "#perfil option:selected" ).val() == 3){
            $(".combocomercio").hide();
            $("#cuil").show(); 
            $("#cuil").attr("placeholder","CUIL* xx-xxxxxxxx-x");
            $("#cuit").hide();            
        }

        if ($( "#perfil option:selected" ).val() == 4){
            $(".combocomercio").hide();
            $("#cuit").hide();
            $("#cuil").show();
            $("#cuil").attr("placeholder","CUIL xx-xxxxxxxx-x"); 
        }
    });
    
    $("#form").submit(function(){
        return validar();    
    });
    
    function validar (){
        
        var regexemail = /^[0-9a-zA-Z._.-]+\@[0-9a-zA-Z._.-]+\.[0-9a-zA-Z]+$/;
        var regexnumero = /^[0-9]+$/;
        var regexcuilcuit = /^[0-9]{2}-[0-9]{8}-[0-9]$/;
        var error=0;
        var mensajeError="";
        $(".error").removeClass("error")
        
        if($("#nombre").val().length < 4 || $("#nombre").val().length > 20){
            mensajeError += "El campo nombre es obligatorio (Entre 4 y 20 caracteres)<br/>";
            error++;
            $("#nombre").addClass("error");
        }
        if($("#apellido").val().length < 3 || $("#apellido").val().length > 20){
            mensajeError += "El campo apellido es obligatorio (Entre 3 y 20 caracteres)<br/>";
            error++;
            $("#apellido").addClass("error");
        }
        
        if($("#password").val() != $("#password_confirmation").val() || $("#password").val().length < 4){
            mensajeError += "Las contraseñas no son iguales o tienen menos de 4 caracteres<br/>";
            error++;
            $("#password").addClass("error");
        }
        
        if(!$("#email").val().match(regexemail)){
            error++;
            mensajeError+="No es un email válido<br/>";
            $("#username").addClass("error");
        };

        if($("#calle").val().length < 3 || $("#calle").val().length > 20){
            mensajeError += "El campo calle es obligatorio (Entre 3 y 20 caracteres)<br/>";
            error++;
            $("#calle").addClass("error");
        }
        
        if(!$("#numero").val().match(regexnumero)){
            error++;
            mensajeError+="Solo se aceptan numeros<br/>";
            $("#numero").addClass("error");
        };

        if ($( "#perfil option:selected" ).val() == 2) {
            if(!$("#cuil").val().match(regexcuilcuit)){
                error++;
                mensajeError+="El CUIL ingresado no es válido<br/>";
                $("#cuil").addClass("error");
            };
        }

        if ($( "#perfil option:selected" ).val() == 3) {
            if(!$("#cuit").val().match(regexcuilcuit)){
                error++;
                mensajeError+="El CUIT ingresado no es válido<br/>";
                $("#cuit").addClass("error");
            };
        }
        
        if(error>0){
            $("#mensaje").html(mensajeError);
            return false;
        } else{
            return true;  
        }
    };

    
});
