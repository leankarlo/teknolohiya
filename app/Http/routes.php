<?php

/*
|--------------------------------------------------------------------------
| CANVAS Routes
|--------------------------------------------------------------------------
|
| 1. Do not touch main canvas routes
| 2. You can add routes for your module but do not touch Main Routes
| 3. Create seperate repo if you want to edit main canvas routes
|	Main Canvas Routes :
|	- dashboard
|	- login
|	- users
|
*/

	/* MAIN ROUTES */

	// login
	Route::get('/login', function () {
	    return view('canvas/login/index');
	});

	// Authenticate User
	Route::post('auth/login', 'Auth\AuthController@create');

	Route::get('auth/logout', 'Auth\AuthController@destroy');
	
	/* END MAIN ROUTES */
	
	//***************************************************

	/* MODULES ROUTES*/
	Route::group(array('middleware' => 'auth','prefix'=>'canvas'), function(){
		
		/** Main Canvas **/
			Route::get('/', function () {
			    return view('canvas/dashboard/index');
			});
			// get modules
	
			// only display module that is allowed to the current user
			Route::get('module/getAll', 'Canvas\ModuleController@getUserModules');

		/** END Main Canvas **/

		/** User Module **/
			Route::group(array('prefix'=>'users'), function(){
				Route::get('/create', function () {
			    	return view('canvas/users/create');
				});

				Route::get('/management', function () {
			    	return view('canvas/users/manage');
				});

				Route::get('/edit&id={id}', function () {
					return view('canvas/users/edit');
				});

				Route::get('/get&id={id}',
				array('uses'=>'Canvas\UserController@getUser'));

				Route::post('/update',
				array('uses'=>'Canvas\UserController@update'));

				Route::post('/changepassword',
				array('uses'=>'Auth\PasswordController@update'));

				Route::post('/insert', 'Canvas\UserController@create');

				Route::get('/show', 'Canvas\UserController@showAll');

				Route::get('/delete&id={id}',
				array('uses'=>'Canvas\UserController@delete'));

				Route::get('/deactivate&id={id}',
				array('uses'=>'Canvas\UserController@deActivate'));

				Route::get('/activate&id={id}',
				array('uses'=>'Canvas\UserController@activate'));

				Route::post('/validate/email',
				array('uses'=>'Canvas\UserController@validateEmail'));

				Route::post('/validate/password', 'Auth\PasswordController@validatePassword');
				
			});
		/** END User Module **/

		/** Image Module **/
			Route::group(array('prefix'=>'images'), function(){
				
				Route::get('/upload', function () {
			    	return view('canvas/images/upload');
				});

				Route::get('/manage', function () {
			    	return view('canvas/images/manage');
				});
	
				Route::post('/uploadimage', 'Canvas\ImageController@uploadImages');

				Route::get('/show', 'Canvas\ImageController@showAll');

				Route::get('/delete&id={id}',
				array('uses'=>'Canvas\ImageController@deleteImage'));

			});
		/** END Image Module **/

		/** Article Module **/
			Route::group(array('prefix'=>'articles'), function(){
				
				Route::get('/', function () {
			    	return view('canvas/articles/myarticles');
				});

				Route::get('/manage', function () {
			    	return view('canvas/articles/manage');
				});

				Route::get('/new', function () {
			    	return view('canvas/articles/new');
				});

				Route::get('/show&id={id}', function () {
			    	return view('canvas/articles/show');
				});
	
				Route::post('/update', 'Canvas\ImageController@update');

				Route::get('/showall', 'Canvas\ImageController@showAll');

				Route::get('/publish&id={id}',
				array('uses'=>'Canvas\ImageController@publish'));

				Route::get('/unpublish&id={id}',
				array('uses'=>'Canvas\ImageController@unpublish'));

			});
		/** END Article Module **/

	});
	/* END MODULES ROUTES */

/* CANVAS ROUTES END */