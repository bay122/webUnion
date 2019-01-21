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

// Posts and comments
Route::prefix('posts')->namespace('Front')->group(function () {
    Route::name('posts.display')->get('{slug}', 'PostController@show');
    Route::name('posts.tag')->get('tag/{tag}', 'PostController@tag');
    Route::name('posts.search')->get('', 'PostController@search');
    Route::name('posts.comments.store')->post('{post}/comments', 'CommentController@store');
    Route::name('posts.comments.comments.store')->post('{post}/comments/{comment}/comments', 'CommentController@store');
    Route::name('posts.comments')->get('{post}/comments/{page}', 'CommentController@comments');
});

Route::resource('comments', 'Front\CommentController', [
    'only' => ['update', 'destroy'],
    'names' => ['destroy' => 'front.comments.destroy']
]);

Route::name('category')->get('category/{category}', 'Front\PostController@category');

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

        // Posts
        Route::name('posts.seen')->put('posts/seen/{post}', 'PostController@updateSeen')->middleware('can:manage,post');
        Route::name('posts.active')->put('posts/active/{post}/{status?}', 'PostController@updateActive')->middleware('can:manage,post');
        Route::resource('posts', 'PostController');

        // Notifications
        Route::name('notifications.index')->get('notifications/{user}', 'NotificationController@index');
        Route::name('notifications.update')->put('notifications/{notification}', 'NotificationController@update');

        // Medias
        Route::view('medias', 'back.medias')->name('medias.index');

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
        
         Route::resource('discipulado', 'GrupoFormacionController', ['only' => [
            'index', 'show', 'create', 'store', 'update', 'destroy'
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

        // Posts
        Route::name('posts.seen')->put('posts/seen/{post}', 'PostController@updateSeen')->middleware('can:manage,post');
        Route::name('posts.active')->put('posts/active/{post}/{status?}', 'PostController@updateActive')->middleware('can:manage,post');
        Route::resource('posts', 'PostController');

        // Notifications
        Route::name('notifications.index')->get('notifications/{user}', 'NotificationController@index');
        Route::name('notifications.update')->put('notifications/{notification}', 'NotificationController@update');

        // Medias
        Route::view('medias', 'back.medias')->name('medias.index');

        // Video Home       
         Route::resource('videos', 'ConfiguracionController', ['only' => [
            'index','update'
        ]]);

    });

});


/*
Docs: 
    https://laravel.com/docs/5.6/controllers#restful-partial-resource-routes
    https://laravel.com/docs/5.6/requests
    https://laravel.com/api/5.3/Illuminate/Http/Request.html

    Ejemplo de nueva ruta REST FULL:

    Route::resource('nombre', 'NombreController')->only([
        'index', 'show'
    ]);
    Route::resource('photos', 'PhotoController')->except([
        'create', 'store', 'update', 'destroy'
    ]);

    Metodos:
        - index: index de la pagina
        - show: ver un elemento en especifico
        - create: ver formulario de creación de un elemtno
        - sotre: guardar un nuevo elemento
        - update: actualizar un elemento existente
        - destroy: eliminar un elemento existente 
 */

/*
Route::group(['prefix' => 'comunion'], function(){
    Route::get('/', 'Front\PagesTestController@home');
    Route::get('/misiones', 'Front\PagesTestController@misiones', ['as' => 'site.misiones.articles']);
    Route::get('/contact', 'Front\PagesTestController@contact', ['as' => 'site.contact']);
    Route::get('/editorial', 'Front\PagesTestController@editorial', ['as' => 'site.editorial.articles']);
    Route::get('/notas', 'Front\PagesTestController@notas', ['as' => 'site.notas.articles']);
    Route::get('/ministerios', 'Front\PagesTestController@ministerios', ['as' => 'site.ministerios.articles']);
    Route::get('/misiones', 'Front\PagesTestController@misiones', ['as' => 'site.misiones.articles']);
    Route::get('/agenda', 'Front\PagesTestController@agenda', ['as' => 'site.agenda']);
    Route::get('/sociales', 'Front\PagesTestController@sociales', ['as' => 'site.sociales']);
    Route::get('/galeria', 'Front\PagesTestController@galery', ['as' => 'site.sociales.galery']);
    Route::get('/404', 'Front\PagesTestController@notFound', ['as' => 'admin']);
});
*/