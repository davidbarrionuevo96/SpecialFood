$( document ).ready(function() {
    $( "#perfil" ).change(function() {
        if ($( "#perfil option:selected" ).text == "1"){ 
            $("#cuit").hide(); 
            $("#cuil").show(); 
            $("#cuil").attr("placeholder","CUIL"); 
            $("#cuil").attr("required", "false");            
        }

        if ($( "#perfil option:selected" ).text() == "2"){
            $("#cuil").show(); 
            $("#cuil").attr("placeholder","CUIL*"); 
            $("#cuil").attr("required", "true");
            $("#cuit").hide();            
        }

        if ($( "#perfil option:selected" ).text() == "3"){
            $("#cuit").show();
            $("#cuit").attr("required", "true");
            $("#cuil").hide(); 
        }
    });
    
    $("#perfil").submit(function(){
        return validar();    
    });
    
    function validar (){
        var regexemail = /^[0-9a-zA-Z._.-]+\@[0-9a-zA-Z._.-]+\.[0-9a-zA-Z]+$/;
        var regexnumero = /^[0-9]{8}$/;
        var regexcuilcuit = /^[0-9]{2}-[0-9]{8}-[0-9]$/;
        var error=0;
        var mensajeError="";
        $(".error").removeClass("error")

        if($("#nombre").val().length < 4 || $("#nombre").val().length > 20){
            mensajeError += "El campo nombre es obligatorio (Entre 4 y 20 caracteres)";
            error++;
            $("#nombre").addClass("error");
        }

        if($("#apellido").val().length > 20){
            mensajeError += "El campo nombre es obligatorio (No puede tener mas de 20 caracteres)";
            error++;
            $("#apellido").addClass("error");
        }

        if($("#password").val() != $("#password_confirmation").val()){
            mensajeError += "Las contraseñas no son iguales";
            error++;
            $("#password").addClass("error");
        }
        
        if(!$("#username").val().match(regexemail)){
            error++;
            mensajeError+="No es un email valido";
            $("#username").addClass("error");
        };

        if($("#calle").val().length > 20){
            mensajeError += "El campo nombre es obligatorio";
            error++;
            $("#calle").addClass("error");
        }
        
        if(!$("#numero").val().match(regexnumero)){
            error++;
            mensajeError+="Solo se aceptan numeros";
            $("#numero").addClass("error");
        };

        if ($('#perfil').val().trim() === '2') {
            if(!$("#cuil").val().match(regexcuilcuit)){
                error++;
                mensajeError+="El cuil ingresado no es válido";
                $("#cuil").addClass("error");
            };
        }

        if ($('#perfil').val().trim() === '3') {
            if(!$("#cuit").val().match(regexcuilcuit)){
                error++;
                mensajeError+="El cuit ingresado no es válido";
                $("#cuit").addClass("error");
            };
        }
        
        if(error>0){
            $("#mensaje").text(mensajeError);
            return false;
        } else{
            return true;  
        }
    };
});
