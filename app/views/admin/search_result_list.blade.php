@extends('admin.admin_layout')
@section('sidebar')
<div class="col-md-12">
    <div class="col-md-12">
        <div class="table-contents">
        <div class="col-md-6 col-md-offset-3"><h2> User List</h2></div>
         <div class="col-md-6 col-md-offset-3"> 
    
     {{ Form::open(array('name'=>'search_list','novalidate'=>'')) }}

        <?php  
            $message = Session::get('message');
            if($message) echo "<div class=\"alert-success\">" .$message."</div>";
            ?></div>
           <table  class="table table-striped"><tr><th width="400">List</th><th width="400">Update</th><th width="300">Manage</th></tr>
        <?php
        if(isset($user_name))
        {
        foreach($user_name as $row) 
        {?>
        <tr>
            <td>{{$row -> username}} </td>
            <td>{{$row -> email}} </td>
            <td> 
                <a href="{{URL::to('admin/user/edit')}}/<?php echo $row->id;?>"><button type="button"  class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-pencil"></span>Edit</button></a>
  <a href="{{URL::to('admin/user/delete')}}/<?php echo $row->id;?>"><button type="button" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-remove"></span>Delete</button></a>
        </td> </tr>
        <?php }}
        ?>
  </table> 
        {{form::close();}}
     </div>
 </div>
@stop
