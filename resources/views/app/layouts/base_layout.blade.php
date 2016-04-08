<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8"/>
		@yield('title')
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="" name="description"/>
		<meta content="" name="author"/>
		<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href='http://fonts.googleapis.com/css?family=Hind:400,500,300,600,700' rel='stylesheet' type='text/css'>
		<link href="{{ asset('packages/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('packages/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet">
		<link href="{{ asset('packages/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
		<!-- END GLOBAL MANDATORY STYLES -->
		<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
		<link href="{{ asset('packages/owl.carousel/assets/owl.carousel.css') }}" rel="stylesheet">
		<link href="{{ asset('packages/slider-revolution-slider/rs-plugin/css/settings.css') }}" rel="stylesheet">
		<link href="{{ asset('packages/cubeportfolio/cubeportfolio/css/cubeportfolio.min.css') }}" rel="stylesheet">
		<!-- END PAGE LEVEL PLUGIN STYLES -->
		<!-- BEGIN THEME STYLES -->
		<link href="{{ asset('css/app/layout.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('css/app/custom.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
		<link rel="shortcut icon" href="favicon.ico"/>

	</head>

	<body class="page-header-fixed">
		<!-- BEGIN MAIN LAYOUT -->
	<!-- Header BEGIN -->
    <header class="page-header">
        <nav class="navbar navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="toggle-icon">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </span>
                    </button>
                    <a class="navbar-brand" href="#intro">
                        <img class="logo-default" src="../../../../../images/app/logo_default.png" style="height: 40px; width: auto;" alt="Logo">
                        <img class="logo-scroll" src="../../../../../images/app/logo_scroll.png" style="height: 40px; width: auto;" alt="Logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <li class="page-scroll active">
                            <a href="#intro">Home</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#about">About</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#features">Skills</a>
                        </li>
                        <!-- <li class="page-scroll">
                            <a href="#team">Team</a>
                        </li> -->
                       <!--  <li class="page-scroll">
                            <a href="#clients">Clients</a>
                        </li>  -->                   
                        <!-- <li class="page-scroll">
                            <a href="#portfolio">Portfolio</a>
                        </li> -->
                        <li class="page-scroll">
                            <a href="#pricing">Pricing</a>
                        </li>
                        <li class="page-scroll">
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- End Navbar Collapse -->
            </div>
            <!--/container-->
        </nav>
    </header>
    <!-- Header END -->

    @yield('content')

    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<!--[if lt IE 9]>
	<script src="../../assets/global/plugins/respond.min.js"></script>
	<script src="../../assets/global/plugins/excanvas.min.js"></script> 
	<![endif]-->
	<script src="{{ asset('packages/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('packages/jquery-migrate.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('packages/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="{{ asset('packages/jquery.easing.js') }}" type="text/javascript"></script>
	<script src="{{ asset('packages/jquery.parallax.js') }}" type="text/javascript"></script>
	<script src="{{ asset('packages/smooth-scroll/smooth-scroll.js') }}" type="text/javascript"></script>
	<script src="{{ asset('packages/owl.carousel/owl.carousel.min.js') }}" type="text/javascript"></script>
	<!-- BEGIN Cubeportfolio -->
	<script src="{{ asset('packages/cubeportfolio/cubeportfolio/js/jquery.cubeportfolio.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/app/portfolio.js') }}" type="text/javascript"></script>
	<!-- END Cubeportfolio -->
	<!-- BEGIN RevolutionSlider -->  
	<script src="{{ asset('packages/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js') }}" type="text/javascript"></script> 
	<script src="{{ asset('packages/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/app/revo-ini.js') }}" type="text/javascript"></script>
	<!-- END RevolutionSlider -->
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="{{ asset('js/app/layout.js') }}" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
	<script>
	jQuery(document).ready(function() {    
	    Layout.init();
	    RevosliderInit.initRevoSlider();
	});
	</script>
	</body>
</html>