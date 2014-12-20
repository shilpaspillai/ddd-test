@extends('admin.admin_layout')
@section('sidebar')
@section('article')  
{{ Form::open(array('class'=>'navbar-form','name'=>'searchuser','novalidate'=>'')) }}

<div class="input-group add-on">
    {{form::text('searchterm',Input::old('searchterm',''),array('id'=>'searchterm','placeholder' => 'Search'))}}
    <button class="btn btn-sm btn-default" type="submit" id='search-name'><i class="glyphicon glyphicon-search"></i></button>
    {{Form::close()}}
</div>
<div id="name-search-box" style="overflow:scroll;"></div>
@stop
<div class="col-md-12">
    <div class="col-md-12">
        <div class="table-contents">
            <div class="col-md-6 col-md-offset-3"><h2> User List</h2></div>
            <div class="col-md-6 col-md-offset-3"> 
                {{ Form::open(array('name'=>'listuser','novalidate'=>'')) }}
                <script>
                    $(document).ready(function() {
                        $("[name=report]").click(function() {
                            var id = $(this).attr('data-id');
                            $.ajax({
                                url: '<?php echo URL::to('admin/user/report') ?>/' + id,
                                type: 'GET',
                                success: function(data)
                                {
                                    $("#myModal").html(data);
                                    $("#myModal").modal('show');
                                }
                            });
                        });
                    });
                </script>
                <?php
                $message = Session::get('message');
                if ($message)
                    echo "<div class=\"alert-success\">" . $message . "</div>";
                ?></div>
            <table  class="table table-striped"><tr><th width="400">List</th><th width="400">Update</th><th width="300">Manage</th></tr>
                <?php
                if (isset($users)) {
                    foreach ($users as $row) {
                        ?>
                        <tr>
                            <td>{{$row -> username}}</td>
                            <td>{{$row -> email}} </td>
                            <td> 
                                <button type="button" id="report" name="report" class="btn btn-info btn-sm" data-id="<?php echo $row->id; ?>"> <span class="glyphicon glyphicon-file"></span>&nbsp;Report</button>&nbsp;
                                <a href="{{URL::to('admin/user/edit')}}/<?php echo $row->id; ?>"><button type="button"  class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</button></a>&nbsp;
                                <a href="{{URL::to('admin/user/delete')}}/<?php echo $row->id; ?>"><button type="button" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-remove"></span>&nbsp;Delete</button></a>&nbsp;
                            </td> 
                        </tr>
                        <?php
                    }
                }
                ?>
            </table> 
            <div class="col-md-12">
                <?php
                $pages = ceil($count / 5);
                for ($i = 1; $i <= $pages; $i++) {
                    echo '<a href="' . URL::to('admin/list/users') . '?page=' . $i . '">' . $i . '</a>&nbsp;';
                }
                ?>
            </div>
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            </div>
            {{form::close();}}
        </div>
    </div>
    @stop

































    @stop
