<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Models\Post;
use App\Models\Rss;

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

    $posts = Post::orderBy('created_at', 'DESC')->paginate(10);

    return view('index', ['posts' => $posts]);
});

Route::get('/rss', function () {

    $feedReader = new Rss();

    $items = $feedReader->get();

    if (!empty($items)) {
        foreach($items as $item) {
            //check we don't already have this
            $posts = Post::where('title', $item->title)->get();

            if ($posts->isEmpty()) {
                $post = new Post([
                    'user_id' => 0,
                    'title' => $item->title,
                    'content' => $item->description
                ]);
        
                $post->save();
            }
        }
    }
});

Auth::routes();

Route::resource('posts', PostController::class);
Route::resource('users', UserController::class);
Route::resource('comments', CommentController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/posts/csvupload', [App\Http\Controllers\PostController::class, 'csvupload'])->name('csvupload');