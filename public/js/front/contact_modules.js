var contact_modules=(function(){
    
    /*-- Ingresa un comentario si se valida correctamente --*/
    function contact(){
        
        $("#contact_form_button").click(function(event){
        
            event.preventDefault();
            
            ajaxCall.ajax_call_form("#contact_form","POST",success_function,error_function);
            
        });
    }
    
    function success_function(data){
        
        validation.clean_inputs();
                    
        swal(data.title,data.message,'success');
        
    }
    
    function error_function(data){
        
        swal(data.title,validation.errors_stringify(data.message),'error');

    }
    
    return {
        
        contact:contact
        
    }
    
}());