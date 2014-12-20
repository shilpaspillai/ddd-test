<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>Worthy | login</title>
		<meta name="description" content="Worthy a Bootstrap-based, Responsive HTML5 Template">
		<meta name="author" content="htmlcoder.me">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
                        <script src="<?php echo URL::to('resources/jquery.min.js');?>"></script> 
            <script src="<?php echo URL::to('resources/newjavascript.js');?>"></script> 

    <link href="<?php echo URL::to('resources/css/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?php echo URL::to('resources/style.css');?>" rel="stylesheet">
		<link rel="shortcut icon" href="<?php echo URL::to('resources/worthy/images/favicon.ico');?>">

		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
             
           
		<!-- Bootstrap core CSS -->
		<link href="<?php echo URL::to('resources/worthy/bootstrap/css/bootstrap.css');?>" rel="stylesheet">

		<!-- Font Awesome CSS -->
		<link href="<?php echo URL::to('resources/worthy/fonts/font-awesome/css/font-awesome.css');?>" rel="stylesheet">

		<!-- Plugins -->
		<link href="<?php echo URL::to('resources/worthy/css/animations.css');?>" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="<?php echo URL::to('resources/worthy/css/style.css');?>" rel="stylesheet">

		<!-- Custom css --> 
		<link href="<?php echo URL::to('resources/worthy/css/custom.css');?>" rel="stylesheet">
                <script>
                    var bgimgurl='<?php echo URL::to('resources/worthy/images/banner.jpg');?>';
                    </script>
	</head>

	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>


		<!-- banner start -->
		<!-- ================ -->
		<div id="banner" class="banner">
                   
			<div class="banner-image"></div>
			<div class="banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 object-non-visible" data-animation-effect="fadeIn">
							<h1 class="text-center">LogIn <span>Here</span></h1>
                                                        
						</div>
                                             @yield('article')
					</div>
                             
				</div>
			</div>
             
                </div>
         
		<!-- banner end -->

		<!-- JavaScript files placed at the end of the document so the pages load faster
		================================================== -->
		<!-- Jquery and Bootstap core js files -->
		<script type="text/javascript" src="<?php echo URL::to('resources/worthy/plugins/jquery.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo URL::to('resources/worthy/bootstrap/js/bootstrap.min.js');?>"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="<?php echo URL::to('resources/worthy/plugins/modernizr.js');?>"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="<?php echo URL::to('resources/worthy/plugins/isotope/isotope.pkgd.min.js');?>"></script>
		
		<!-- Backstretch javascript -->
		<script type="text/javascript" src="<?php echo URL::to('resources/worthy/plugins/jquery.backstretch.min.js');?>"></script>

		<!-- Appear javascript -->
		<script type="text/javascript" src="<?php echo URL::to('resources/worthy/plugins/jquery.appear.js');?>"></script>

		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="<?php echo URL::to('resources/worthy/js/template.js');?>"></script>

		<!-- Custom Scripts -->
		<script type="text/javascript" src="<?php echo URL::to('resources/worthy/js/custom.js');?>"></script>

	</body>
</html>
