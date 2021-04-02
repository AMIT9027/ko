<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
    return view('front');
});
Route::get('login', function(){
    if(session()->has('Login_ID'))
    {
        return redirect('profile');
    }
    return view('login');
});
Route::post('login', [LoginController::class,'GetData']);
/*<---------- coonecting login with register----------->*/
Route::view('Register','Register');
Route::post('Register',[RegisterController::class,'getData']);

Route::get('profile',function()
{
    if(session()->has('Login_ID'))
    {
        return view('profile');
    }
    else
    {
       return redirect('login');
    }
});

Route::get('logout',function(){
    if(session()->has('Login_ID'))
    {
        session()->pull('Login_ID');
    }
    return redirect('login');
});
