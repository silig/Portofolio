<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['middleware' => 'auth', function () {
    return redirect(route('dashboard'));
}]);

Auth::routes();

Auth::routes(['verify' => true]); //verifikasi email
route::get('/konfirmasiemail/{email}/{token}', 'Auth\RegisterController@konfirmasi')->name('konfirmasiemail');

//reset password
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['prefix' => config('adminlte.dashboard_url'), 'middleware' => 'auth'], function () {
	
	Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
	
	Route::get('/profile', 'Auth\ProfileController@index');
	Route::group(['prefix' => 'profile'], function () {
		route::get('/form/{id}', 'Auth\ProfileController@form')->name('form-user');
		route::post('/update_datadiri/{id}', 'Auth\ProfileController@update_datadiri')->name('update-user');
		//pendidikan
		route::get('/form_pendidikan/{id}', 'Auth\ProfileController@form_pendidikan')->name('form-pendidikan');
		route::post('/update-pendidikan/{id}', 'Auth\ProfileController@pendidikan')->name('update_pendidikan');
		Route::get('/pendidikan/{id}/delete', 'Auth\ProfileController@del_pendidikan')->name('del_pendidikan');
		//sosmed
		route::post('/update_sosmed/{id}', 'Auth\ProfileController@sosmed')->name('update_sosmed');
		Route::get('/{id}/delete', 'Auth\ProfileController@del_sosmed')->name('del_sosmed');
		//pengalaman
		route::get('/form_pengalaman/{id}', 'Auth\ProfileController@form_pengalaman')->name('form-pengalaman');
		route::post('/update_pengalaman/{id}', 'Auth\ProfileController@pengalaman')->name('update_pengalaman');
		Route::get('/pengalaman/{id}/delete', 'Auth\ProfileController@del_pengalaman')->name('del_pengalaman');
		// //prestasi
		route::get('/form_prestasi/{id}', 'Auth\ProfileController@form_prestasi')->name('form-prestasi');
		route::post('/update_prestasi/{id}', 'Auth\ProfileController@prestasi')->name('update_prestasi');
		Route::get('/prestasi/{id}/delete', 'Auth\ProfileController@del_prestasi')->name('del_prestasi');
		// //hobi
		route::get('/form_hobi/{id}', 'Auth\ProfileController@form_hobi')->name('form-hobi');
		route::post('/update_hobi/{id}', 'Auth\ProfileController@hobi')->name('update_hobi');
		Route::get('/hobi/{id}/delete', 'Auth\ProfileController@del_hobi')->name('del_hobi');
		// //skill
		route::get('/form_skill/{id}', 'Auth\ProfileController@form_skill')->name('form-skill');
		route::post('/update_skill/{id}', 'Auth\ProfileController@skill')->name('update_skill');
		Route::get('/skill/{id}/delete', 'Auth\ProfileController@del_skill')->name('del_skill');
		//download to pdf
		route::get('/download/{id}', 'Auth\ProfileController@download')->name('download');
	});

	Route::any('/change-password', 'Auth\ProfileController@changePassword');

	Route::group(['prefix' => 'users'], function () {
		Route::get('/', 'Admin\UsersController@index')->middleware('can:view-users');
		Route::any('/create', 'Admin\UsersController@create')->middleware('can:create-users');
	    Route::any('/{id}/edit', 'Admin\UsersController@edit')->middleware('can:edit-users');
	    Route::get('/{id}/delete', 'Admin\UsersController@delete')->middleware('can:delete-users');
	});

	Route::group(['prefix' => 'roles'], function () {
		Route::get('/', 'Admin\RolesController@index')->middleware('can:view-roles');
		Route::any('/create', 'Admin\RolesController@create')->middleware('can:create-roles');
	    Route::any('/{id}/edit', 'Admin\RolesController@edit')->middleware('can:edit-roles');
	    Route::get('/{id}/delete', 'Admin\RolesController@delete')->middleware('can:delete-roles');
	});

	Route::group(['prefix' => 'permissions'], function () {
		Route::get('/', 'Admin\PermissionsController@index')->middleware('can:view-permissions');
		Route::any('/create', 'Admin\PermissionsController@create')->middleware('can:create-permissions');
	    Route::any('/{id}/edit', 'Admin\PermissionsController@edit')->middleware('can:edit-permissions');
	    Route::get('/{id}/delete', 'Admin\PermissionsController@delete')->middleware('can:delete-permissions');
	});

	Route::group(['prefix' => 'menus'], function () {
		Route::get('/', 'Admin\MenusController@index')->middleware('can:view-menus');
		Route::any('/create', 'Admin\MenusController@create')->middleware('can:create-menus');
	    Route::any('/{id}/edit', 'Admin\MenusController@edit')->middleware('can:edit-menus');
	    Route::get('/{id}/delete', 'Admin\MenusController@delete')->middleware('can:delete-menus');
	});

	Route::group(['prefix' => 'search'], function(){
		Route::get('/', 'Site\SearchController@index')->name('search');
		Route::any('/result', 'Site\SearchController@result')->name('result');
		
	});
});


Route::get('/autocomplete', 'Site\SearchController@autocomplete')->name('autocomplete');
