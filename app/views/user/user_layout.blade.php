
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

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
    <body>
  
@yield('content')
        </div>
   

  
</body>

</html>





