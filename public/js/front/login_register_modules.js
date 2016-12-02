var login_register_modules=(function(){
    
    function login_form_link(){
        
        $('#login_form_link').click(function(){
            
            show_hide_form("#login_form","#register_form");
            
        });
    }
    
    function register_form_link(){
        
        $('#register_form_link').click(function() {
            
            show_hide_form("#register_form","#login_form");
            
        });
    }
    
    function login_register_links()
    {
        login_form_link();
        
        register_form_link(); 
    }
    
    function register(){
        
        $("#register_button").click(function(){
            
            ajaxCall.ajax_call_form("#register_form","POST",success_register_function,error_function);
  
        });
    }
    
    function login_errors(){
        
        var errors_container=$("#errors_container");
        
        if(errors_container.html()!==undefined)
        {
            swal("Error de validacion",errors_container.html(),"error");
        }
    }
    
    /*-- Funcion que se ejecuta si la llamada ajax fue exitosa al registrarse --*/
    function success_register_function(data){
        
        swal("Registro ingresado correctamente",data.message,"success");
        
        validation.clean_inputs();

    }
    
    /*-- Funcion que se ejecuta si la llamada ajax fue erronea --*/
    function error_function(data){
        
        swal("Error al validar",validation.errors_stringify(data.message),"error");
    }
    
    //////////////////////////////////
    
    function show_hide_form(form_show,form_hide)
    {
        var link="_link";
        
        $(form_show).delay(100).fadeIn(100);
        $(form_hide).fadeOut(100);
        $(form_hide+link).removeClass('active');
        $(form_show+link).addClass('active');
        
    }
    
    return{
        
        login_register_links:login_register_links,
        
        register:register,
        
        login_errors:login_errors

    }
    
}());