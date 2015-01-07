@extends('user.user_layout')
@section('forget_password')
<script>
     $(document).ready(function() {
        $('.form-group > .label').each(function() {
            $(this).hide();
        });
        
          $error_count=0;
        var form_obj = new form();
         $("#email").change(function() {
                console.log('data from here');
                    var form_obj = new form();
                    $error_count=0;
            $("[name=email]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_email_error"), 'please enter the email', form_obj.show_error);
                form_obj.is_valid_email(this, $("#alert_email_error"), 'please enter a valid email', form_obj.show_error);
            });
            
                console.log($error_count);
            if (form_obj.is_valid() || $error_count>0) {
                event.preventDefault();
            }
            
            
            $.ajax({
                url: '<?php echo URL::route('search_user_email'); ?>',
                type: 'GET',
                data: 'cemail=' + $("#email").val(),
                success: function(data)
                {
                   var response = $.parseJSON(data);
                    if (response.status)
                    {
                        $("#alert_messages").html(response.password_reset_link).show();
                    }
                    else {
                        $("#alert_messages").html(response.password_reset_link).hide();
                    }
                }
            });
        });
     });
</script>
</head>
<body>
    <div class ='password_reset_section'>
        <div class='col-md-6 col-md-offset-2'>
            <h2>Password Reset</h2>
           {{ Form::open(array('name'=>'password_resetpage','novalidate'=>''))}}
             <div class="form-group"> 
                {{Form::label('email','Email')}}
                {{Form::email("email",Input::old('email',''),array('class'=>'form-control','placeholder'=>'Enter the email','id'=>'email'))}}
                        <span id="alert_email_error" class="label label-danger" style="display:none; background-color: red;"> </span>
                      {{Form::button("submit",array('class'=>'btn btn-success btn-sm','type'=>'button','name'=>'save','id'=>'save'))}}
             </div>
        <span id="alert_messages"  style="display:none; float:left;"> </span>
           {{Form::close()}}
        </div>
    </div>
</body>
@stop
