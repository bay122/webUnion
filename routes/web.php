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

/*
|--------------------------------------------------------------------------
| Frontend
|--------------------------------------------------------------------------|
*/

// Home
Route::name('home')->get('/', 'Front\UCController@index');
Route::name('home')->get('/home', 'Front\UCController@index');
//Route::name('home')->get('/home', 'Front\PostController@index');

// Contact
Route::resource('contacts', 'Front\ContactController', ['only' => ['create', 'store']]);

// Información sobre la iglesia
Route::prefix('informacion')->namespace('Front')->group(function () {
    Route::name('nosotros')->get('/nosotros', 'UCController@nosotros', ['as' => 'site.nosotros']);
    Route::name('declaracionDeFe')->get('/declaracion_de_fe', 'UCController@declaracionDeFe', ['as' => 'site.declaracion_de_fe']);
    Route::name('ministerios')->get('/ministerios', 'UCController@ministerios', ['as' => 'site.ministerios']);
});

// Authentification - login / registro
Auth::routes();


/*
|--------------------------------------------------------------------------
| Backend
|--------------------------------------------------------------------------|
*/

Route::prefix('admin')->namespace('Back')->group(function () {

    Route::middleware('redac')->group(function () {

        Route::name('admin')->get('/', 'AdminController@index');
        
        /*
        // Posts
        Route::name('posts.seen')->put('posts/seen/{post}', 'PostController@updateSeen')->middleware('can:manage,post');
        Route::name('posts.active')->put('posts/active/{post}/{status?}', 'PostController@updateActive')->middleware('can:manage,post');
        Route::resource('posts', 'PostController');

        // Notifications
        Route::name('notifications.index')->get('notifications/{user}', 'NotificationController@index');
        Route::name('notifications.update')->put('notifications/{notification}', 'NotificationController@update');

        // Medias
        Route::view('medias', 'back.medias')->name('medias.index');
        */
       
        // Video Home       
         Route::resource('videos', 'ConfiguracionController', ['only' => [
            'index','update'
        ]]);

    });

    Route::middleware('admin')->group(function () {

        // Users
        Route::name('users.seen')->put('users/seen/{user}', 'UserController@updateSeen');
        Route::name('users.valid')->put('users/valid/{user}', 'UserController@updateValid');
        Route::resource('users', 'UserController', ['only' => [
            'index', 'edit', 'update', 'destroy'
        ]]);

        // Categories
        Route::resource('categories', 'CategoryController', ['except' => 'show']);

        // Video Home       
         Route::resource('videos', 'ConfiguracionController', ['only' => [
            'index','update'
        ]]);
        
        // Contacts
        Route::name('contacts.seen')->put('contacts/seen/{contact}', 'ContactController@updateSeen');
        Route::resource('contacts', 'ContactController', ['only' => [
            'index', 'destroy'
        ]]);

        // Comments
        Route::name('comments.seen')->put('comments/seen/{comment}', 'CommentController@updateSeen');
        Route::resource('comments', 'CommentController', ['only' => [
            'index', 'destroy'
        ]]);

        // Settings
        Route::name('settings.edit')->get('settings', 'AdminController@settingsEdit');
        Route::name('settings.update')->put('settings', 'AdminController@settingsUpdate');

    });

    Route::middleware('tripulante')->group(function () {

        Route::name('admin')->get('/', 'AdminController@index');

        // Video Home       
         Route::resource('videos', 'ConfiguracionController', ['only' => [
            'index','update'
        ]]);

    });

});
