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
/* CANVAS ROUTES */
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

				Route::get('/edit&id={id}', function () {
					return view('canvas/articles/edit');
				});

				Route::get('/manage', function () {
					return view('canvas/articles/manage');
				});
	
				Route::post('/create', 'Canvas\ArticleController@create');

				Route::post('/update', 'Canvas\ArticleController@update');

				Route::get('/delete&id={id}',
				array('uses'=>'Canvas\ArticleController@delete'));

				Route::get('/unpublish&id={id}',
				array('uses'=>'Canvas\ArticleController@deActivate'));

				Route::get('/publish&id={id}',
				array('uses'=>'Canvas\ArticleController@activate'));

				Route::get('/types/showall', 'Canvas\ArticleController@getArticleTypes');

				Route::get('/myarticles','Canvas\ArticleController@getMyArticles');

				Route::get('/getall','Canvas\ArticleController@getAllArticles');

				Route::get('/get&id={id}',
				array('uses'=>'Canvas\ArticleController@getArticle'));
			});
		/** END Article Module **/

		/** Project Module **/
			Route::group(array('prefix'=>'projects'), function(){
				Route::get('/manage', function () {
			    	return view('canvas/projects/manage');
				});

				Route::get('/new', function () {
			    	return view('canvas/projects/new');
				});

				Route::get('/show&id={id}', function () {
			    	return view('canvas/projects/show');
				});

				Route::get('/edit&id={id}', function () {
					return view('canvas/projects/edit');
				});
	
				Route::post('/create', 'Canvas\ProjectController@create');

				Route::post('/update', 'Canvas\ProjectController@update');

				Route::get('/delete&id={id}',
				array('uses'=>'Canvas\ProjectController@delete'));

				Route::get('/unpublish&id={id}',
				array('uses'=>'Canvas\ProjectController@deActivate'));

				Route::get('/publish&id={id}',
				array('uses'=>'Canvas\ProjectController@activate'));

				Route::get('/types/showall', 'Canvas\ProjectController@getProjectTypes');

				Route::get('/getAllProjects','Canvas\ProjectController@getAllProjects');

				Route::get('/get&id={id}','Canvas\ProjectController@getProject');
			});
		/** END Project Module **/

		/** Pages Module **/
			Route::group(array('prefix'=>'pages'), function(){
				
				/** Promos **/
					Route::group(array('prefix'=>'promos'), function(){
					
						Route::get('/', function () {
							return view('canvas/pages/promomanagement');
						});
	
						Route::get('/getall','Canvas\PromosController@getAll');
	
						Route::post('/insert', 'Canvas\PromosController@create');
	
						Route::get('/delete&id={id}',
						array('uses'=>'Canvas\PromosController@delete'));
		
						Route::get('/unpublish&id={id}',
						array('uses'=>'Canvas\PromosController@deActivate'));
		
						Route::get('/publish&id={id}',
						array('uses'=>'Canvas\PromosController@activate'));
						
					});
				/** END Promos **/

				/** Slider **/
					Route::group(array('prefix'=>'slider'), function(){
					
						Route::get('/', function () {
							return view('canvas/pages/slider');
						});
	
						Route::get('/getall','Canvas\SliderController@getAll');
	
						Route::post('/insert', 'Canvas\SliderController@create');
	
						Route::get('/delete&id={id}',
						array('uses'=>'Canvas\SliderController@delete'));
		
						Route::get('/unpublish&id={id}',
						array('uses'=>'Canvas\SliderController@deActivate'));
		
						Route::get('/publish&id={id}',
						array('uses'=>'Canvas\SliderController@activate'));
						
					});
				/** END Slider **/

				/** Contact **/
					Route::group(array('prefix'=>'contact'), function(){
					
						Route::get('/', function () {
							return view('canvas/pages/contact');
						});
	
						Route::get('/getall','Canvas\ContactController@getAll');
	
						Route::get('/get&id={id}',
						array('uses'=>'Canvas\ContactController@getContact'));
	
						Route::post('/insert', 'Canvas\ContactController@create');
	
						Route::post('/update', 'Canvas\ContactController@update');
	
						Route::get('/delete&id={id}',
						array('uses'=>'Canvas\ContactController@delete'));
		
						Route::get('/unpublish&id={id}',
						array('uses'=>'Canvas\ContactController@deActivate'));
		
						Route::get('/publish&id={id}',
						array('uses'=>'Canvas\ContactController@activate'));
						
					});
				/** END Promos **/
				
			});
		/** END Pages Module **/

		/** Product Module **/
			Route::group(array('prefix'=>'products'), function(){
				
				Route::get('/manage', function () {
			    	return view('canvas/products/manage');
				});

				Route::get('/getall','Canvas\ProductController@ShowAll');

				Route::post('/create', 'Canvas\ProductController@Create');

				Route::get('/get&id={id}','Canvas\ProductController@GetProduct');

				Route::group(array('prefix'=>'category'), function(){

					Route::get('/get&id={id}','Canvas\ProductController@GetProductCategory');

					Route::get('/getall','Canvas\ProductController@LoadCategorySelection');

					Route::get('/delete&id={id}','Canvas\ProductController@DeleteProductCategory');

					Route::get('/add&id={id}&product_id={product_id}','Canvas\ProductController@AddProductCategory');

					Route::get('/create_new&name={name}','Canvas\ProductController@CreateNewCategory');

				});



			});
		/** END Product Module **/

	});
	/* END MODULES ROUTES */

/* CANVAS ROUTES END */

/** Web App Route **/

	// login
		Route::get('/', function () {
		    return view('app/home/index');
		});
	
	/** Image Module **/
		Route::group(array('prefix'=>'images'), function(){
	
			Route::get('/show', 'Canvas\ImageController@showAll');
	
		});
	/** END Image Module **/
	/** Article Module **/
		Route::group(array('prefix'=>'articles'), function(){
			// Route::get('/types/showall', 'App\ArticleController@getArticleTypes');
			// Route::get('/myarticles','App\ArticleController@getMyArticles');
			Route::get('/getall','App\ArticleController@getAllArticles');
		});
	/** END Article Module **/
	/** Project Module **/
		// Route::group(array('prefix'=>'projects'), function(){
			// Route::get('/types/showall', 'Canvas\ProjectController@getProjectTypes');
			// Route::get('/getAllProjects','Canvas\ProjectController@getAllProjects');
			// Route::get('/get&id={id}','Canvas\ProjectController@getProject');
		// });
	/** END Project Module **/

/** END Web App Route **/