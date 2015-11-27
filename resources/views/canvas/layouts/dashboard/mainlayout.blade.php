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
							<li class="separator hide">
							</li>
							<!-- BEGIN NOTIFICATION DROPDOWN -->
							<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
							<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<i class="icon-bell"></i>
								<span class="badge badge-success">
								7 </span>
								</a>
								<ul class="dropdown-menu">
									<li class="external">
										<h3><span class="bold">12 pending</span> notifications</h3>
										<a href="extra_profile.html">view all</a>
									</li>
									<li>
										<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
											<li>
												<a href="javascript:;">
												<span class="time">just now</span>
												<span class="details">
												<span class="label label-sm label-icon label-success">
												<i class="fa fa-plus"></i>
												</span>
												New user registered. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">3 mins</span>
												<span class="details">
												<span class="label label-sm label-icon label-danger">
												<i class="fa fa-bolt"></i>
												</span>
												Server #12 overloaded. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">10 mins</span>
												<span class="details">
												<span class="label label-sm label-icon label-warning">
												<i class="fa fa-bell-o"></i>
												</span>
												Server #2 not responding. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">14 hrs</span>
												<span class="details">
												<span class="label label-sm label-icon label-info">
												<i class="fa fa-bullhorn"></i>
												</span>
												Application error. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">2 days</span>
												<span class="details">
												<span class="label label-sm label-icon label-danger">
												<i class="fa fa-bolt"></i>
												</span>
												Database overloaded 68%. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">3 days</span>
												<span class="details">
												<span class="label label-sm label-icon label-danger">
												<i class="fa fa-bolt"></i>
												</span>
												A user IP blocked. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">4 days</span>
												<span class="details">
												<span class="label label-sm label-icon label-warning">
												<i class="fa fa-bell-o"></i>
												</span>
												Storage Server #4 not responding dfdfdfd. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">5 days</span>
												<span class="details">
												<span class="label label-sm label-icon label-info">
												<i class="fa fa-bullhorn"></i>
												</span>
												System Error. </span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="time">9 days</span>
												<span class="details">
												<span class="label label-sm label-icon label-danger">
												<i class="fa fa-bolt"></i>
												</span>
												Storage server failed. </span>
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<!-- END NOTIFICATION DROPDOWN -->
							<li class="separator hide">
							</li>
							<!-- BEGIN INBOX DROPDOWN -->
							<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
							<li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<i class="icon-envelope-open"></i>
								<span class="badge badge-danger">
								4 </span>
								</a>
								<ul class="dropdown-menu">
									<li class="external">
										<h3>You have <span class="bold">7 New</span> Messages</h3>
										<a href="inbox.html">view all</a>
									</li>
									<li>
										<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
											<li>
												<a href="inbox.html?a=view">
												<span class="photo">
												{{-- <img src="../../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt=""> --}}
												</span>
												<span class="subject">
												<span class="from">
												Lisa Wong </span>
												<span class="time">Just Now </span>
												</span>
												<span class="message">
												Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
												</a>
											</li>
											<li>
												<a href="inbox.html?a=view">
												<span class="photo">
												{{-- <img src="../../assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt=""> --}}
												</span>
												<span class="subject">
												<span class="from">
												Richard Doe </span>
												<span class="time">16 mins </span>
												</span>
												<span class="message">
												Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
												</a>
											</li>
											<li>
												<a href="inbox.html?a=view">
												<span class="photo">
												{{-- <img src="../../assets/admin/layout3/img/avatar1.jpg" class="img-circle" alt=""> --}}
												</span>
												<span class="subject">
												<span class="from">
												Bob Nilson </span>
												<span class="time">2 hrs </span>
												</span>
												<span class="message">
												Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
												</a>
											</li>
											<li>
												<a href="inbox.html?a=view">
												<span class="photo">
												{{-- <img src="../../assets/admin/layout3/img/avatar2.jpg" class="img-circle" alt=""> --}}
												</span>
												<span class="subject">
												<span class="from">
												Lisa Wong </span>
												<span class="time">40 mins </span>
												</span>
												<span class="message">
												Vivamus sed auctor 40% nibh congue nibh... </span>
												</a>
											</li>
											<li>
												<a href="inbox.html?a=view">
												<span class="photo">
												{{-- <img src="../../assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt=""> --}}
												</span>
												<span class="subject">
												<span class="from">
												Richard Doe </span>
												<span class="time">46 mins </span>
												</span>
												<span class="message">
												Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<!-- END INBOX DROPDOWN -->
							<li class="separator hide">
							</li>
							<!-- BEGIN TODO DROPDOWN -->
							<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
							<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
								<i class="icon-calendar"></i>
								<span class="badge badge-primary">
								3 </span>
								</a>
								<ul class="dropdown-menu extended tasks">
									<li class="external">
										<h3>You have <span class="bold">12 pending</span> tasks</h3>
										<a href="page_todo.html">view all</a>
									</li>
									<li>
										<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
											<li>
												<a href="javascript:;">
												<span class="task">
												<span class="desc">New release v1.2 </span>
												<span class="percent">30%</span>
												</span>
												<span class="progress">
												<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
												</span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="task">
												<span class="desc">Application deployment</span>
												<span class="percent">65%</span>
												</span>
												<span class="progress">
												<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
												</span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="task">
												<span class="desc">Mobile app release</span>
												<span class="percent">98%</span>
												</span>
												<span class="progress">
												<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
												</span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="task">
												<span class="desc">Database migration</span>
												<span class="percent">10%</span>
												</span>
												<span class="progress">
												<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
												</span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="task">
												<span class="desc">Web server upgrade</span>
												<span class="percent">58%</span>
												</span>
												<span class="progress">
												<span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
												</span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="task">
												<span class="desc">Mobile development</span>
												<span class="percent">85%</span>
												</span>
												<span class="progress">
												<span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
												</span>
												</a>
											</li>
											<li>
												<a href="javascript:;">
												<span class="task">
												<span class="desc">New UI release</span>
												<span class="percent">38%</span>
												</span>
												<span class="progress progress-striped">
												<span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
												</span>
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
							<!-- END TODO DROPDOWN -->
							<!-- BEGIN USER LOGIN DROPDOWN -->
							<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
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
										<a href="page_calendar.html">
										<i class="icon-calendar"></i> My Calendar </a>
									</li>
									<li>
										<a href="inbox.html">
										<i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
										3 </span>
										</a>
									</li>
									<li>
										<a href="page_todo.html">
										<i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
										7 </span>
										</a>
									</li>
									<li class="divider">
									</li>
									<li>
										<a href="extra_lock.html">
										<i class="icon-lock"></i> Lock Screen </a>
									</li>
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
			<div class="modal fade bs-modal-sm" id="messageAlert" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm">
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