@extends('user.user_layout')
@section('password_update')
<script>
     $(document).ready(function() {
        $('.form-group > .label').each(function() {
            $(this).hide();
        });
        
        var form_obj = new form();
        
        $("[name=usrpassword]").on('change', (function() {
            if ($("[name=confirm_password]").val() == '') {
            }
            else {
                form_obj.is_same_data($("[name=confirm_password]"), $("[name=usrpassword]"), $("#alert_confirm_password"), 'password mismatch', form_obj.show_error);
            }
        }));

        $("[name=confirm_password]").on('change', (function() {
            if ($("[name=usrpassword]").val() == '') {
            }
            else {
                form_obj.is_same_data($("[name=confirm_password]"), $("[name=usrpassword]"), $("#alert_confirm_password"), 'password mismatch', form_obj.show_error);
            }
        }
        ));
   $("form[name=password_update]").submit(function(){
         $('.form-group > .label').each(function() {
                $(this).hide();
            });
            var form_obj = new form();
          
                 $("[name=usrpassword]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_password"), 'please enter the password', form_obj.show_error);
              });

            $("[name=confirm_password]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_confirm_password"), 'please enter the password', form_obj.show_error);
                form_obj.is_same_data((this), $("[name=usrpassword]"), $("#alert_confirm_password"), 'password mismatch', form_obj.show_error);
            });
            
            if (form_obj.is_valid()) {
                event.preventDefault();
            }
   });
    });
</script>
</head>
<body>
    <div class ='password_reset_section'>
        <div class='col-md-6 col-md-offset-2'>
           {{ Form::open(array('name'=>'password_update','route'=>'process_password_reset','novalidate'=>''))}}
           <h2> Password Reset</h2>  
               <div class="form-group"> 
                    {{Form::label('password','password')}}
                    {{Form::password('usrpassword',array('class'=>'form-control','placeholder'=>'Enter the password','id'=>'usrpassword'))}}
                    <span id="alert_password" class="label label-danger" style="display:none; background-color: red;"></span>
                </div>
                <div class="form-group"> 
                    {{Form::label('confirm_password','Repeat')}}
                    {{Form::password('confirm_password',array('class'=>'form-control','placeholder'=>'Enter the password','id'=>'confirm_password'))}}
                    <span id="alert_confirm_password" class="label label-danger" style="display:none; background-color: red;"></span>
                </div>
            <div class='form-group'>
             {{Form::button("Save",array('class'=>'btn btn-success','type'=>'submit'))}}
            </div>
             <input type="hidden" name="token" value="<?php echo isset($token) ? $token:'';?>">
           {{Form::close()}}
        </div>
    </div>
</body>
@stop
