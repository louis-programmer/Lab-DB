<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello, Laravel is working!';
});

Route::get('/pizzas', function () {
    return view('pizzas');
});


# added
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

# ADDED####

# Login
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth'); // <-- only logged-in users can see this
*/


#Logout

use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');



##### Login Addition

#use App\Http\Controllers\AuthController;

Route::get('/login',[AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout']);

#use Illuminate\Support\Facades\Auth;

/*
Route::get('/dashboard', function () {

    if(!Auth::check()){
        return redirect('/login');
    }

    return "Welcome to the dashboard";

});
*/


/*
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return "Welcome " . Auth::user()->name . " | <a href='/logout'>Logout</a>";
    });

});

*/


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        
        return view('dashboard');
    });

});

Route::get('/login',[AuthController::class,'showLogin'])->name('login');

#####


Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware('auth'); // only logged-in users