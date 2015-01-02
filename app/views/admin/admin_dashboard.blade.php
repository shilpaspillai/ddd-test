@extends('admin.admin_layout')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome <small>admin</small>
                </h1>
                                
<div class="row">
                <div class="col-md-6">
                   {{Form::open(array('name'=>'profile_picture','route'=>'set_user_profile_picture','novalidate'=>'','files'=>true))}}
              
                        <?php if(isset($data) && $data){
                              echo "<div class=\"profile_picture_section\">
                        <img src=".URL::to('/assets/upload/')."/".$data;
                              echo ">";
                              echo "</div>";
                        }else{?>
            
                        
                       <?php 
                        echo "<div class=\"profile_picture_section\"> <span class=\"glyphicon glyphicon-user\" style=\"font-size:150px;\"></span></div>";}
                        ?>
               
                 <div class="profile_picture_upload_section">
                 {{Form::label("Change Your profile picture::",'')}}
                {{Form::file('image')}}
                {{Form::button("Upload",array('class'=>'btn btn-success','type'=>'submit'))}}
                 </div>  
     
                    <?php  
                    $message = Session::get('message');
                    if(isset($message)) echo "<div class=\"alert-success\">" .$message."</div>";
                    ?>
              {{Form::close()}}
        </div> </div>
 
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </li>

                </ol>
            </div>
       
                </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="panel panel-primary">
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
        </div>
        <div class="col-lg-3 col-md-6">

        </div>
        <div class="col-lg-3 col-md-6">
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
        </div>
    </div>
</div>
@stop