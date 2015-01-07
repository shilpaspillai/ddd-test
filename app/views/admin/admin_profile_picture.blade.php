@section('profile_picture')
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
                    $message=Session::get('message');
                    if(isset($message)) echo "<div class=\"alert-success\">" .$message."</div>";
                    ?>
                {{Form::close()}}
        </div> </div>
  @stop

