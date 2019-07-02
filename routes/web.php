<?php
use App\Http\Controllers\AdminPostsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('post/{id}', ['as'=>'home.post','uses'=>'AdminPostsController@post']);




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'admin'], function () {
    

    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/category', 'AdminCategoriesConrtoller');
    
    Route::resource('admin/comments', 'CommentController');
    Route::resource('admin/comments/replies', 'CommentReplyController');
    
    
    
    Route::get('admin/media',['as'=>'media.index' ,'uses'=>'AdminMediaController@index']);
    Route::get('admin/media/upload',['as'=>'admin.media.upload','uses'=>'AdminMediaController@upload']);
    Route::post('admin/media/upload',['as'=>'admin.media.upload','uses'=>'AdminMediaController@save']);
    Route::delete('admin/media/delete', ['as'=>'admin.media.delete','uses'=>'AdminMediaController@destroy']);

    Route::get('/admin', function () {
        return view('admin.index');
    });

});

Route::group(['middleware' => 'auth'], function () {

    
    Route::post('comment/reply', 'CommentReplyController@store');
    
});



