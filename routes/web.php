<?php

use App\User;
use App\Mail\NewUserRegistred;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('user-email', function(){
    $user = User::find(8); 
    return new NewUserRegistred( $user);
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('confirm/{token}','EmailConfirmationController@confirm')->name('email_confirmation');