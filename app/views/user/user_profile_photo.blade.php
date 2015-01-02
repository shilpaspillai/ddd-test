
@section('article')
      {{Form::open(array('name'=>'profile_picture','route'=>'set_user_profile_picture','novalidate'=>'','files'=>true))}}
      <div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
    <img data-src="holder.js/100%x100%" alt="...">
  </div>
  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
<!--  <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new" type="button">Select image</span><span class="fileinput-exists">Change</span><input type="file" name=""></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>-->

      <div class="form-group">
                {{Form::label("upload Your profile picture here::",'')}}
                {{Form::file('image');}}
       </div>
  </div>
@end
