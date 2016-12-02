var ajaxCall=(function(){
    
    /*-- Realiza una llamada ajax tomando url y data de un formulario --*/
    function ajax_call_form(selector,call_type,success_function,error_function){
        
        var formulario=$(selector);
            
        var ajaxCall=$.ajax({url:formulario.attr("action"),type:call_type,data:formulario.serialize(),dataType:"json"});

        ajaxCall.done(function(data){

            if(data.state){

                success_function(data);

            }else{

                error_function(data);   
            }

        });
        
        ajaxCall.fail(function(){swal("Error","Error al procesar la solicitud","error");});
        
    }
    
    return{
        
        ajax_call_form:ajax_call_form
        
    }
    
}());