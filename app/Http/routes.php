<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});

//
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');


// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// Route to pdf export

// Registration Routes...
/*  Route::get('register', 'Auth\AuthController@getRegister');
  Route::post('register', 'Auth\AuthController@postRegister');
*/

Route::group(['middleware' => 'auth'],function(){

  Route::get('libros', ['as' => 'libros.index', 'uses' => 'LibrosController@index']);
  Route::post('librosDestroy', ['as' => 'libros.destroy', 'uses' => 'LibrosController@destroy']);  
  Route::get('librosCreate', ['as' => 'libros.create', 'uses' => 'LibrosController@create']);
  Route::post('librosStore', ['as' => 'libros.store', 'uses' => 'LibrosController@store']);
  Route::get('librosEdit/{id}', ['as' => 'libros.edit', 'uses' => 'LibrosController@edit']);
  Route::post('librosUpdate/{id}', ['as' => 'libros.update', 'uses' => 'LibrosController@update']); 
  Route::get('librosShow/{id}', ['as' => 'libros.show', 'uses' => 'LibrosController@show']);  

  Route::get('editoriales', ['as' => 'editoriales.index', 'uses' => 'EditorialesController@index']); 
  Route::get('editorialesCreate', ['as' => 'editoriales.create', 'uses' => 'EditorialesController@create']);  
  Route::post('editorialesDestroy', ['as' => 'editoriales.destroy', 'uses' => 'EditorialesController@destroy']);
  Route::post('editorialesStore', ['as' => 'editoriales.store', 'uses' => 'EditorialesController@store']);
  Route::get('editorialesEdit/{id}', ['as' => 'editoriales.edit', 'uses' => 'EditorialesController@edit']);
  Route::post('editorialesUpdate/{id}', ['as' => 'editoriales.update', 'uses' => 'EditorialesController@update']);
 
  Route::get('colecciones', ['as' => 'colecciones.index', 'uses' => 'ColeccionesController@index']);  
  Route::get('coleccionesCreate', ['as' => 'colecciones.create', 'uses' => 'ColeccionesController@create']);  
  Route::post('coleccionesDestroy', ['as' => 'colecciones.destroy', 'uses' =>'ColeccionesController@destroy']);  
  Route::post('coleccionesStore', ['as' => 'colecciones.store', 'uses' => 'ColeccionesController@store']);
  Route::get('coleccionesEdit/{id}', ['as' => 'colecciones.edit', 'uses' => 'ColeccionesController@edit']);
  Route::post('coleccionesUpdate/{id}', ['as' => 'colecciones.update', 'uses' => 'ColeccionesController@update']);

  Route::get('users', ['as' => 'users.index', 'uses' => 'UsersController@index']);  
  Route::get('usersCreate', ['as' => 'users.create', 'uses' => 'UsersController@create']);  
  Route::get('usersDestroy', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
  Route::post('usersStore', ['as' => 'users.store', 'uses' => 'UsersController@store']);
  Route::get('usersEdit', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);

  //Rutas para la generacion de QR y imprimir en un PDF

  Route::get('qrgen','QrcodeController@generate');
  Route::get('verqr/{data}','QrcodeController@verqr');

  Route::post('pdf', ['as' => 'qr.pdf', 'uses' => 'QrcodeController@generar_pdf']);
  Route::post('pdf_repeat', ['as' => 'qr.pdf_repeat', 'uses' => 'QrcodeController@generar_pdf_repeat']);
  
  Route::resource('prestamos', 'PrestamosController');

  Route::get('prestamos_form/{id}', ['as' => 'prestamos.form', 'uses' => 'PrestamosController@form_prestamo']);

  Route::post('prestamosDestroy', ['as' => 'prestamos.destroy', 'uses' =>'PrestamosController@destroy']); 

  Route::get('cargar_libros/{user}', ['as' => 'prestamos.cargar', 'uses' =>'PrestamosController@cargar_Libros']);  

  Route::post('confirmar_prestamo', ['as' => 'prestamos.confirmar', 'uses' => 'PrestamosController@confirmarPrestamo']);

  Route::get('prestamos-editar/{id}', ['as' => 'prestamos.edit', 'uses' => 'PrestamosController@edit']);
  Route::post('prestamos-update/{id}', ['as' => 'prestamos.update', 'uses' => 'PrestamosController@update']); 

  Route::get('prestamos-show/{id}', ['as' => 'prestamos.show', 'uses' => 'PrestamosController@show']);  
  
  Route::post('prestamos-devolver', ['as' => 'prestamos.devolver', 'uses' => 'PrestamosController@DevolverLibros']); 

  Route::get('/', function ()    {
    	return view('home');
  });
});


?>
