<?php

Route::view('/', 'home');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('home')->with('status', session('status'));
    }
    return redirect()->route('home');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('place/{place}', 'HomeController@show')->name('place');

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Places
    Route::delete('places/destroy', 'PlacesController@massDestroy')->name('places.massDestroy');
    Route::post('places/media', 'PlacesController@storeMedia')->name('places.storeMedia');
    Route::resource('places', 'PlacesController');
});
    
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
 });
