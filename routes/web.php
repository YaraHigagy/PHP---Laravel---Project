<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function(){
//     return 'hello world';  //it worked well
// });

//calling home method from the controller (blogControoler) when calling the uri ('/home')
//index is showing all resourse
Route::get('/posts', [postController::class, 'index']) -> name(name: 'posts.index')->middleware('auth');  //i can neglect the argument's name and it will work well

//create is getting data from user
Route::get('/posts/create', [postController::class, 'create']) -> name(name: 'posts.create')->middleware('auth');  //it's a shortcut for the create page's path, it's usefull if i changed the path, i will not need to change it in every ancor link in the other pages

//Store action to store data from user to database
Route::post('/posts', [postController::class, 'store']) -> name(name: 'posts.store')->middleware('auth'); 

//The below is a dynamic rout and if must be at the bottom of static routs
//because anchor links and href testing every route from top to bottom to check 
//for the correct route, and dynamic routs can be read as the href (the tracker see 
//that its route path name can fit in the dynamic parameter well)
//show is showing one resourse
Route::group(['middleware' => ['auth']], function(){
  Route::get('/posts/{post}', [postController::class, 'show']) -> name(name: 'posts.show');
  Route::get('/posts/{post}/edit', [postController::class, 'edit']) -> name(name: 'posts.edit');
});

// Route::delete('/posts/{post}', [postController::class, 'destroy']) -> name(name: 'posts.destroy');  //it is wrong as a logic and as syntax because it has the same route path name as show and it leads to show page
Route::put('/posts/{post}', [postController::class, 'update']) -> name(name: 'posts.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
