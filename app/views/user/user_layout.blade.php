
<!doctype html>
<html>
    <head>
    <meta c<!harset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
            <script src="<?php echo URL::to('resources/jquery.min.js');?>"></script> 
            <script src="<?php echo URL::to('resources/newjavascript.js');?>"></script> 

    <link href="<?php echo URL::to('resources/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo URL::to('resources/style.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URL::to('resources/sb-template/css/sb-admin.css');?>" rel="stylesheet">

    <!-- Morris Charts CSS -->

    <!-- Custom Fonts -->
    <link href="<?php echo URL::to('resources/sb-template/font-awesome-4.1.0/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
  
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL::to('resources/js/bootstrap.min.js');?>"></script>
@yield('content')
@yield('forget_password')
@yield('password_update')
        </div>
</body>

</html>





