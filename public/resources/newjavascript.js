 
        function form()
        {
            form_errors = 0;
        }
        form.prototype.is_valid_field = function(inputfield,error_field,error_message,callback) 
        {
          
          if(inputfield == '') 
            {
            form_errors++;
              console.log('from valid check');
            callback(inputfield,error_field,error_message);
            return false;
            }
            return true; 
        }
        
        form.prototype.is_valid_email=function(inputfield,error_field,error_message,callback)
        {
          
            var eml = $(inputfield).val();
            var em =/^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            
            if(!em.test(eml))
            {
            form_errors++;
            callback(inputfield,error_field,error_message);
            return false;
            }
            return true;
        } 
        
        form.prototype.is_same_data=function(c_password,password,error_field,error,callback)
        { 
   
            if($(c_password).val() != $(password).val()) 
            { 
            form_errors++;
            callback(c_password,error_field,error);
            return false;
            }
            $(error_field).hide().text(error); 
            return true;
        }
       
        form.prototype.is_valid=function()
        {
            console.log(form_errors);
            return(form_errors > 0);
        }
        
        form.prototype.show_error=function(inputfield,error_field,error_message)
        {
           $(inputfield).parent('div').addClass('has-error');
           $(error_field).show().text(error_message);
        }
        
        form.prototype.is_numeric=function(inputfield,error_field,error_message,callback)
        { 
            var field_value = $(inputfield).val();
            var expression =/[^0-9]*$/;
            
            if(!expression.test(field_value))
            {
            form_errors++;
            callback(inputfield,error_field,error_message);
            return false;
            }
            return true;
        }
        
         form.prototype.is_same_name=function(surname,fname,error_field,error,callback)
        { 
            if(surname == fname) 
            { 
            form_errors++;
            console.log('inside data');
            callback(surname,error_field,error);
            return false;
            }
            $(error_field).hide().text(error); 
            return true;
       }
       
        form.prototype.is_only_characters=function(inputfield,error_field,error,callback)
        {
            var fieldvalue = $(inputfield).val();
            var expression =/^[a-zA-Z ]*$/;
            if(!expression.test(fieldvalue))
            {
               form_errors++;
               callback(inputfield,error_field,error);
               return false;
            }
              return true;
        }
       
        form.prototype.is_valid_url=function(inputfield,error_field,error,callback)
        {
           var fieldvalue = $(inputfield).val();
           var expression = /\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/;
            if(!expression.test(fieldvalue))
            {
            form_errors++;
            callback(inputfield,error_field,error);
            return false;
            }
        return true;
        }
           
       
        
      

 



        
    

       
             
                
                        
                        
                        
    
               
                   
                   
