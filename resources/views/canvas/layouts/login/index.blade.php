<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8">
	 	@yield('title')

	 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8">
		<meta content="" name="Doctor, nurse and clinic/hospital search engine with medical diary"/>
		<meta content="" name="Lean Karlo Corpuz"/>
	
	 	<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<link href="{{ asset('packages/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('packages/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('packages/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('packages/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>

		<link href="{{ asset('packages/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END GLOBAL MANDATORY STYLES -->
	
		@yield('head')
	
		<!-- BEGIN THEME STYLES -->
		<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
		<link href="{{ asset('css/admin/components/components-md.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('css/admin/components/plugins-md.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('css/admin/layout.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
	
	</head>
	<!-- END HEAD -->
	<body class="page-md login">

		<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		<div class="menu-toggler sidebar-toggler">
		</div>
		<!-- END SIDEBAR TOGGLER BUTTON -->

		<div class="logo">
			<a href="/">
				<h1 class="title-logo" style="font-size: 82px;">{{ Config::get('app.name') }}</h1>
			</a>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN LOGIN -->
		<div class="content">
			@yield('content')
		</div>
		<div class="copyright">
			 2015 © Teknolohiya Philippines
		</div>
		<!-- END LOGIN -->

		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

		<!-- BEGIN CORE PLUGINS -->
		<![endif]-->
		<script src="{{ asset('packages/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/jquery-migrate.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/jquery.blockui.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/jquery.cokie.min.js') }}" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<script src="{{ asset('js/admin/canvas.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/admin/layout.js') }}" type="text/javascript"></script>

		<script>
		jQuery(document).ready(function() {    
		   Canvas.init(); // init Medzoc core componets
		   Layout.init(); // init layout
		});
		</script>

		@yield('buttom_scripts')

		<!-- END JAVASCRIPTS -->

	</body>
<!-- END BODY -->
</html>