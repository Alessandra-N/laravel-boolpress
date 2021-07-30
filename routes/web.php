<?php

use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ArticleResource;

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

/* Route::get('/', function () {
    return view('guest.welcome');
}); */
Route::get('/', 'PageController@index')->name('welcome');
Route::get('about', 'PageController@about')->name('about');
Route::get('contacts', 'PageController@contacts')->name('contacts');
Route::post('contacts', 'PageController@sendForm')->name('contacts');

Route::get('contacts', 'ContactController@form')->name('contacts');
Route::post('contacts', 'ContactController@send')->name('contacts.send');



Route::get('articles/{article}', function (Article $article) {
    return new ArticleResource(Article::find($article));
});
Route::get('vue-articles', function () {
    return view('vue-articles');
});


Route::resource('articles', ArticleController::class)->only(['index', 'show']);

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@home')->name('home');
    Route::resource('articles', ArticleController::class);
});