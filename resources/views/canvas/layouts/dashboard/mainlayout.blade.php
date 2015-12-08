<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
	<!-- BEGIN HEAD -->
	<head>
		<meta charset="utf-8">
		@yield('title')
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport"/>
		<meta content="" name="Your online management system. Made for small businesses, bloggers and for profile website. Can be easily expand and integrate to other system."/>
		<meta content="" name="Lean Karlo Corpuz"/>
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		
	 	<!-- BEGIN GLOBAL MANDATORY STYLES -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<link href="{{ asset('packages/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
		<link href="{{ asset('packages/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('packages/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('packages/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('packages/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('packages/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END GLOBAL MANDATORY STYLES -->
	
		@yield('head')
	
		<!-- BEGIN THEME STYLES -->
		<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
		<link href="{{ asset('css/admin/components/components-md.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('css/admin/components/plugins-md.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('css/admin/layout.css') }}" rel="stylesheet" type="text/css"/>
		<link href="{{ asset('css/admin/themes/navyblue.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
		<link href="{{ asset('css/admin/custom.css') }}" rel="stylesheet" type="text/css"/>
		<!-- END THEME STYLES -->
		
		<link rel="shortcut icon" href="favicon.ico"/>
	</head>
	<!-- END HEAD -->
	<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-fixed page-sidebar-closed-hide-logo">
		<!-- BEGIN HEADER -->
		<div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">
			<!-- BEGIN HEADER INNER -->
			<div class="page-header-inner">
				<!-- BEGIN LOGO -->
				<div class="page-logo">
					<a href="{{URL::to('/canvas')}}">
						<h1 class="title" style="color: #fff;">{{ Config::get('app.name') }}</h1>
					</a>
					<div class="menu-toggler sidebar-toggler">
						<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
					</div>
				</div>
				<!-- END LOGO -->

				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
				</a>

				<!-- BEGIN PAGE TOP -->
				<div class="page-top">
					<!-- BEGIN HEADER SEARCH BOX -->
					<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
					<form class="search-form" action="extra_search.html" method="GET">
						<div class="input-group">
							<input type="text" class="form-control input-sm" placeholder="Search..." name="query">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END HEADER SEARCH BOX -->
					<!-- BEGIN TOP NAVIGATION MENU -->
					<div class="top-menu">
						<ul class="nav navbar-nav pull-right">
							 {{-- BEGIN USER LOGIN DROPDOWN  --}}
							{{-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte  --}}
							<li class="dropdown dropdown-user dropdown-dark">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<span class="username username-hide-on-mobile">
								{{ Auth::user()->email }}  </span>
								<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
								{{-- <img alt="" class="img-circle" src="../../assets/admin/layout4/img/avatar9.jpg"/> --}}
								</a>
								<ul class="dropdown-menu dropdown-menu-default">
									<li>
										<a href="extra_profile.html">
										<i class="icon-user"></i> My Profile </a>
									</li>
									
									
									<li>
										<a data-toggle="modal" href="#changePassword">
										<i class="icon-lock"></i> Change Password </a>
									</li>

									<li class="divider"></li>

									<li>
										<a href="{{ URL::to('auth/logout') }}">
										<i class="icon-key"></i> Log Out </a>
									</li>
								</ul>
							</li>
							<!-- END USER LOGIN DROPDOWN -->
						</ul>
					</div>
					<!-- END TOP NAVIGATION MENU -->
				</div>
				<!-- END PAGE TOP -->
			</div>
			<!-- END HEADER INNER -->
		</div>
		<!-- END HEADER -->
		<div class="clearfix">
		</div>
		
		<!-- BEGIN CONTAINER -->
		<div class="page-container">
		@include('canvas.module_main_menu.main_menu')
			<div class="page-content-wrapper">
				<div class="page-content">
					@yield('content')
				</div>
			</div>
			{{-- ALERT MODALS --}}
			<div class="modal fade in" id="messageAlert" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Alert!</h4>
						</div>
						<div class="modal-body modal-alert-message">
							 
						</div>
						<div class="modal-footer modal-alert-actions">
							
						</div>
					</div>
				</div>
			</div>

			<div class="modal fade bs-modal-lg in" id="changePassword" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">

						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									<i class="icon-user"></i>Change Password Form
								</div>
							</div>
							<div class="portlet-body form">
								{!! Form::open(array('action' => 'Auth\PasswordController@update' ,'class'=>'form-horizontal form-change-password', 'id' => 'form-change-password', 'method'=>'post','files'=> 'true')) !!}
									<div class="form-body">
										{{-- Old Password --}}
										<div class="form-group form-md-line-input">
											<label class="col-md-3 control-label">Old Password</label>
											<div class="col-md-6">
												<input type="password" class="form-control" name="OldPassword" id="OldPassword" placeholder="Enter text">
											</div>
										</div>
										{{-- New Password --}}
										<div class="form-group form-md-line-input">
											<label class="col-md-3 control-label">New Password</label>
											<div class="col-md-6">
												<input type="password" class="form-control" name="NewPassword" id="NewPassword" placeholder="Enter text">
											</div>
										</div>
										{{-- Confirm Password --}}
										<div class="form-group form-md-line-input">
											<label class="col-md-3 control-label">Confirm Password</label>
											<div class="col-md-6">
												<input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword" placeholder="Enter text">
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<button type="submit" class="btn green">Add</button>
												<a class=" btn default" data-dismiss="modal">Cancel</a>
											</div>
										</div>
									</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- BEGIN FOOTER -->
			<div class="page-footer">
				<div class="page-footer-inner">
					 2015 &copy; {{ Config::get('app.name') }}  by Teknolohiya.
				</div>
				<div class="page-footer-tools">
					<span class="go-top">
					<i class="fa fa-angle-up"></i>
					</span>
				</div>
			</div>
			<!-- END FOOTER -->

		<!-- END CONTAINER -->
		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

		<!-- BEGIN CORE PLUGINS -->
		<![endif]-->
		<script src="{{ asset('packages/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/jquery-migrate.min.js') }}" type="text/javascript"></script>
		<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
		<script src="{{ asset('packages/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/jquery.blockui.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/jquery.cokie.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('packages/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<script src="{{ asset('js/admin/canvas.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/admin/layout.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
		    $.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });
		</script>
		<script>
		jQuery(document).ready(function() {   
			Canvas.initModules();
		   	Canvas.init(); // init Teknolohiya core componets
		   	Layout.init(); // init layout
		});
		</script>

		@yield('buttom_scripts')
		<!-- END JAVASCRIPTS -->

	</body>
<!-- END BODY -->
</html>