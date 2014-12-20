
@extends('login_layout')
@section('article')
  <script>
    $(document).ready(function() {
      
        $('.form-group > .label').each(function(){
            $(this).hide();
        });
        $error_count=0;
        var form_obj = new form();

        $("form[name=loginpage]").submit(function() {
            console.log('data from form submit');
            $('.form-group > .label').each(function() {
                $(this).hide();
            });
            var form_obj = new form();
      
            $("[name=email]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_email_error"), 'please enter the email', form_obj.show_error);
                form_obj.is_valid_email(this, $("#alert_email_error"), 'please enter a valid email', form_obj.show_error);
            });

            $("[name=password]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_password_error"), 'please enter the password', form_obj.show_error);
            });

         
             console.log($error_count);
            if (form_obj.is_valid() || $error_count>0) {
                event.preventDefault();
            }
        });
    });

</script>

 {{ Form::open(array('name'=>'loginpage','route'=>'login_processLogin','novalidate'=>''))}}
 <div class="row>">
     <div class='col-md-4 col-md-offset-4'>
 <div class="form-group">
        {{Form::label('email','Email')}}
        {{Form::email("email",Input::old('email',''),array('class'=>'form-control','id'=>'email'))}}
        <span id="alert_email_error" class="label label-danger" style="display:none; background-color: red;"> </span>
 </div>
  <div class="form-group">
        {{Form::label('Password','Password')}}
        {{Form::password('password',array('class'=>'form-control','id'=>'password'))}}
        <span id="alert_password_error" class="label label-danger" style="display:none; background-color: red;"></span>
  </div> <div> {{Form::button("Log In",array('class'=>'btn btn-success center-block','type'=>'submit'))}}</div>

  </div></div>
   {{Form::Close()}}
@stop


