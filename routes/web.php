<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Models\Post;

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

    $posts = Post::all();

    return view('index', ['posts' => $posts]);
});

Route::get('/rss', function () {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,'https://feeds.simplecast.com/54nAGcIl');
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $xml = curl_exec($ch);
    curl_close($ch);
    
    $return_data = new SimpleXmlElement($xml, LIBXML_NOCDATA);
    
    foreach($return_data->channel->item as $item) {
        print_r($item);
    }
});

Auth::routes();

Route::resource('posts', PostController::class);
Route::resource('users', UserController::class);
Route::resource('comments', CommentController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/posts/csvupload', [App\Http\Controllers\PostController::class, 'csvupload'])->name('csvupload');