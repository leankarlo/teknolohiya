@extends('canvas.layouts.login.index')

@section('title')
	<title>{{ Config::get('app.name') }} - Login</title>
@stop

@section('head')
	<!-- BEGIN PAGE STYLES -->
	<link href="{{ asset('css/admin/pages/login/login.css') }}" rel="stylesheet" type="text/css"/>
	<!-- END PAGE STYLES -->
@stop


@section('content')

	<!-- BEGIN LOGIN FORM -->
	{!! Form::open(array('action' => 'Auth\AuthController@create','class'=>'login-form', 'method'=>'post')) !!}
		<div class="form-title">
			<span class="form-title">Welcome </span>
			<span class="form-subtitle">Please login.</span>
		</div>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert">x</button>
			<span id="err">
			Enter any username and password. </span>
		</div>
		<?php 
		$result = Session::get('message');
		?>
		@if($result != '')
		<div class="alert alert-danger ">
			<button class="close" data-close="alert"></button>
			<span>
			{{ Session::get('message') }}</span>
		</div>
		@endif
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-primary btn-block uppercase">Login</button>
		</div>
		<div class="form-actions">
			<div class="pull-right forget-password-block">
				<a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
			</div>
		</div>
	{!! FORM::close() !!}
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="index.html" method="post">
		<div class="form-title">
			<span class="form-title">Forget Password ?</span>
			<span class="form-subtitle">Enter your e-mail to reset it.</span>
		</div>
		<div class="form-group">
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn btn-default">Back</button>
			<button type="submit" class="btn btn-primary uppercase pull-right">Submit</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->

@endsection


@section('buttom_scripts')

	<!-- BEGIN PAGE SCRIPTS -->
	<script src="{{ asset('packages/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/admin/pages/login/login.js') }}" type="text/javascript"></script>

	<script>
	jQuery(document).ready(function() {    
	   Login.init(); 
	});
	</script>

	<!-- END PAGE SCRIPTS -->

@stop