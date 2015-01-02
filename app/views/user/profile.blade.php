
@extends('user.user_layout')
@section('content')
<script>
    $(document).ready(function() {

        $("#signin").click(function() {
            $.ajax({
                url: '<?php echo URL::route('get_signin_time'); ?>',
                success: function(data)
                {
                    if (data)
                    {
                        var response = data;
                        $("#display-signin").removeClass('hide').show();
                        $("#display-signout").removeClass('hide').hide();
                        $("#display-time").html(response).show();
                        $("#display-signout-content").removeClass('hide').hide();
                        $("#display-signin-content").show();
                        $("#display-signout").show(); 
                        $("#signin").hide();
                        $("#signout").show();
                        console.log('success');
                    }
                }
            });
        });

        $("#signout").click(function() {
            $.ajax({
                url: '<?php echo URL::route('get_signout_time'); ?>',
                success: function(data)
                {
                    if (data)
                    {
                        var response = data;
                        $("#display-signin").removeClass('hide');
                        $("#display-signout").removeClass('hide');
                        $("#signin").show();
                        $("#signout").hide();
                        $("#display-time").html(response).show();
                         $("#display-signin-content").removeClass('hide').hide();
                        $("#display-signout-content").show();
                        console.log('success from signout');
                    }
                }
            });
        });
    });
</script>
<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                <span class="pull-left">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong></strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                <span class="pull-left">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong></strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                <span class="pull-left">
                                    <img class="media-object" src="http://placehold.it/50x50" alt="">
                                </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong></strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-footer">
                        <a href="#">Read All New Messages</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">LOGOUT <span class="label label-default">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php $name = Session::get('firstname');
echo $name; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?php echo URL::route('signout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    
    
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome <small><?php $name = Session::get('firstname');
                        echo $name; ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i>
                            <div class="display-content" id="display-signin-content" style="display:none;color:black; font-size:21px;"> <p> <em>Welcome!!! your entry time:</em></p> </div>
                            <div class="display-signout-content" id="display-signout-content" style="display:none;color:black; font-size:21px;"> <p> <em>Thank you!!! your exit time:</em></p> </div>
                            <div class="display-time" id="display-time" style="display: none;background-color:green;color:black;">
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
                <div class="row">
                <div class='col-md-6'>
                {{Form::open(array('name'=>'profile_picture','route'=>'set_user_profile_picture','novalidate'=>'','files'=>true))}}
              
                        <?php if(isset($data) && $data){
                              echo "<div class=\"profile_picture_section\">
                        <img src=".URL::to('/assets/upload/')."/".$data;
                              echo ">";
                              echo "</div>";
                        }else{?>
            
                        
                       <?php 
                        echo "<div class=\"profile_picture_section\"> <span class=\"glyphicon glyphicon-user\" style=\"font-size:150px; padding-left:25px;\"></span></div>";}
                        ?>
               
                 <div class="profile_picture_upload_section">
                {{Form::label("Change Your profile picture::",'')}}
                {{Form::file('image')}}
                {{Form::button(" Upload",array('class'=>'btn btn-success btn-sm glyphicon glyphicon-upload','type'=>'submit'))}}
                       <?php   $uid =Session::get('id'); ?>
  <a href="{{URL::to('admin/user/profile_picture/delete')}}/<?php echo $uid; ?>"><button type="button"  class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;&nbsp;Delete</button></a>&nbsp;
                 </div>  
                    <?php  
                    $message = Session::get('message');
                    if(isset($message)) echo "<div class=\"alert-danger\">" .$message."</div>";
                    ?>
               {{Form::close()}}
       

                </div> 
                </div>
            </div>
        </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <div class="display-signin <?php if(isset($user_data)) {if ($user_data['status']) { ?>hide<?php }} ?>"  id="display-signin">
                        <button type="submit" id="signin"  class="btn btn-block btn-success"> Time in.</button>
                    </div>
                    <div class="display-signout <?php if(isset($user_data)){if(!$user_data['status']){?>hide<?php }}  ?>" id="display-signout">
                         <button type="submit" id="signout"  class="btn  btn-block btn-danger"> Time out.</button>
                    </div>
                </li>
            </ul>
        </div>
    
        @stop

