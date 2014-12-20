@extends('admin.admin_layout')
@section('sidebar')
    <script>
    $(document).ready(function() {
        $("#alert_confirm_password").hide();
        $("#alert_email").hide();
        $('.form-group > .label').each(function(){
            $(this).hide();
        });
        $error_count=0;
        var form_obj = new form();

        $("#email").change(function(){
            $.ajax({
                url: '<?php echo URL::route('check_email_exist'); ?>',
                type: 'GET',
                data: 'cemail=' + $("#email").val(),
                success: function(data)
                {
                    if (data != "valid")
                    { $("#alert_email").html(data).show();
                         $error_count++; }
                    else {
                        $("#alert_email").html(data).hide();
                    }
                }
            });
        });

        $("form[name=edituser]").submit(function() {
            console.log('data from form submit');
            $('.form-group > .label').each(function() {
                $(this).hide();
            });
  
            var form_obj = new form();
            $("input[name=first_name]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_first_name"), 'please enter the first name', form_obj.show_error);
                form_obj.is_only_characters(this,$("#alert_first_name"),'please enter characters only',form_obj.show_error);
            });

            $("[name=sur_name]").each(function(){
                form_obj.is_valid_field($(this).val(), $("#alert_sur_name"), 'please enter the sur name', form_obj.show_error);
                form_obj.is_same_name($(this).val(), $("input[name=first_name]").val(), $("#alert_sur_name"),'firstName and surname should be different',form_obj.show_error)
                form_obj.is_only_characters(this,$("#alert_sur_name"),'please enter characters only',form_obj.show_error);
            });

            $("[name=email]").each(function() {
                form_obj.is_valid_field($(this).val(), $("#alert_email"), 'please enter the email', form_obj.show_error);
                form_obj.is_valid_email(this, $("#alert_email"), 'please enter a valid email', form_obj.show_error);
            });

            console.log($error_count);
            if (form_obj.is_valid() || $error_count>0) {
                event.preventDefault();
            }
        });
    });
</script>
    <div class="row">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Edit </h4>
            </div>
            <div class="modal-body">
                    <?php  
                    $message = Session::get('message');
                    if(isset($message)) echo "<div class=\"alert-success\">" .$message."</div>";
                    ?>
                    <?php if(isset($data) ){?>
                    {{ Form::open(array('name'=>'edituser','route'=>array('update_user_data',$data->id),'novalidate'=>'')) }}
                    <div class="form-group"> 
                    {{Form::label('First Name',null,array('class'=>'label-control'));}}
                    {{ Form::text('first_name',$data->username,array('class'=>'form-control','id'=>'first_name'));}} 
                    <span id="alert_first_name" class="label label-danger" style="display:none; background-color: red;"></span>
                    </div>
                    <div class="form-group"> 
                    {{Form::label('Surname',null,array('class'=>'label-control'));}}
                    {{ Form::text('sur_name',$data->surname,array('class'=>'form-control','id'=>'sur_name'));}}
                    <span id="alert_sur_name" class="label label-danger" style="display:none; background-color: red;"></span>
                    </div>
                    <div class="form-group"> 
                    {{Form::label('email','Email')}}
                    {{Form::email('email',$data->email,array('class'=>'form-control','id'=>'email'))}}
                    <span id="alert_email" class="label label-danger" style="display:none; background-color: red;"></span>
                    </div>
                       </div>
                    <div class="modal-footer">
                    {{Form::button("UPDATE",array('class'=>'btn btn-success','type'=>'submit','name'=>'update'))}}<?php } ?>
                    </div></div></div></div>
@stop

