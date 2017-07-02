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
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test', function (){

   return  view('test');

});

Route::get('/isguest', function (){
    $isguest = Auth::guest();

    $userResponce = array();

    if ($isguest==true){
        $userResponce['status'] =  true;
        $userResponce['user'] =  'guest';


    }
    if ($isguest==false){
        $userResponce['status'] =  false;
        $userResponce['user'] =  Auth::user()->name;

    }

    return $userResponce;

});

Route::get('/logout', function (){

    Auth::logout();
    return view('welcome');

});

Route::get('/profile', 'HomeController@showUserProfile')->name('UserProfile');
Route::get('/getUserProfile', 'ProfileController@getProfileInformation')->name('UserProfile');

Route::post('/updateprofile', 'ProfileController@updateProfile')->name('UserProfile');

