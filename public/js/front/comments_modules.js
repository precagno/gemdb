var comments_modules=(function(){
    
    /*-- Ingresa un comentario si se valida correctamente --*/
    function comments_register(){
        
        $("#comment_form_button").click(function(event){
        
            event.preventDefault();
            
            ajaxCall.ajax_call_form("#comment_form","POST",success_function,error_function);
            
        });
    }
    
    function success_function(data){
        
        validation.clean_inputs();
                    
        swal(data.title,data.message,'success');
        
    }
    
    function error_function(data){
        
        swal(data.title,validation.errors_stringify(data.message),'error');

    }
    
    /*-- Muestra los comentarios ingresados --*/
    function load_comments(){
        
        $("#comments_container").fadeIn(1500);
        
    }
    
    /*---- Metodos auxiliares ----*/
    
    return{
        
        comments_register:comments_register,
        
        load_comments:load_comments
    }
    
}());