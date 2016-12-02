var validation=(function(){
    
    function errors_stringify(data){
        
        
        var errors_string="";
        
        if(typeof data==="object")
        {
            var arrayLength = data.length;
            
            for (var i = 0; i < arrayLength; i++)
            {
                errors_string+=data[i]+"\r\n";
            }
        }else
        {
            errors_string=data;
        }
        
        return errors_string;
        
    }
    
    /*-- Limpia los inputs --*/
    function clean_inputs(){
        
        $(".input_to_clean").each(function(){
            
            $(this).val("");
        });

    }
    
    return{
        
        errors_stringify:errors_stringify,
     
        clean_inputs:clean_inputs    
        
    }
    
}());