<?php

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

Route::get('/','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');


Route::group(['middlewareGroups' => ['auth','CekRole:manager_teknik']],function(){
    /*------------------------------Dashboard---------------------------------*/
    Route::get('/dashboard', 'UserController@home');
    /*----------------------------End--Dashboard-------------------------------*/
    /*------------------------------Pengguna----------------------------------*/
    Route::get('/pengguna','PenggunaController@pengguna');
    Route::get('/formpengguna','PenggunaController@showaddpengguna');
    Route::post('/pengguna/create','PenggunaController@addpengguna');
    Route::get('/editpengguna/{id}','PenggunaController@editpengguna');
    Route::put('/pengguna/update/{id}', 'PenggunaController@update');
    Route::get('/pengguna/delete/{id}', 'PenggunaController@deletepengguna');
    Route::get('/detailpenggunaan/{id}','PenggunaController@detail');
    Route::get('detail-pdf','PenggunaController@pdf');
    /*----------------------------End--Pengguna------------------------------*/

    /*------------------------------User----------------------------------*/
    Route::get('/user','UserController@user');
    Route::get('/formuser','UserController@showadduser');
    Route::post('/user/create','UserController@adduser');
    // Route::get('/formpengguna','UserController@addpengguna');
    Route::get('/edituser/{id}','UserController@edituser');
    Route::put('/user/update/{id}', 'UserController@update');
    Route::get('/user/delete/{id}', 'UserController@deleteuser');
    /*----------------------------End--User------------------------------*/

    /*------------------------------Analis----------------------------------*/
    Route::get('/analis','AnalisController@analis');
    Route::get('/formanalis','AnalisController@showaddanalis');
    Route::post('/analis/create','AnalisController@addanalis');
    // Route::get('/formanalis','AnalisController@addanalis');
    Route::get('/editanalis/{id}','AnalisController@editanalis');
    Route::put('/analis/update/{id}', 'AnalisController@update');
    Route::get('/analis/delete/{id}', 'AnalisController@deleteanalis');
    /*------------------------------End--Analis------------------------------*/


    /*--------------------------------Bahan-----------------------------------*/
    Route::get('/bahan','BahanController@bahan');
    Route::get('/bahan/formbahan','BahanController@showaddbahan');
    Route::post('/bahan/create','BahanController@addbahan');
    Route::get('/formbahan','BahanController@addbahan');
    Route::post('/bahan','BahanController@store');
    Route::get('/editbahan/{id}','BahanController@editbahan');
    Route::put('/bahan/update/{id}', 'BahanController@update');
    Route::get('/bahan/delete/{id}', 'BahanController@deletebahan');
    // Route::get('/bahanmasuk','BahanController@bahanmasuk');
    // Route::get('/bahanmasuk/{id}', 'BahanController@update');
    // Route::put('/bahanmasuk/create','BahanController@addbahanmasuk');
    Route::get('/bahanmasuk','BahanMasukController@showaddjumlah');
    Route::post('/bahanmasuk/create','BahanMasukController@addjumlah');
    /*------------------------------End--Bahan--------------------------------*/
});
    

Route::group(['middlewareGroups' => ['auth','CekRole:manager_teknik']],function(){
/*------------------------------Manager Teknik-----------------------------*/
    Route::get('/dashboardmanagerteknik',function () {
        return view('managerteknik.dashboard');
    })->middleware('auth:managerteknik');
    Route::get('/permohonanpengadaan','ManagerTeknikController@pengadaan');
    // Route::get('/dashboardmanagerteknik','ManagerTeknikCOntroller@dashboard');
/*----------------------------End--Manager Teknik---------------------------*/
});
/*------------------------------Profil-----------------------------*/

Route::group(['middleware' => ['auth','CekRole:admin,pengguna,analis,manager_teknik']],function(){

    
    Route::get('/profile', 'ProfilController@showedit')
        ->name('users.myprofil');
    Route::post('/profil/update', 'ProfilController@update');
    Route::get('/gantipass', 'UserController@gantipass');
    Route::post('/updatepass', 'UserController@updatepass');
});
/*----------------------------End--Profil---------------------------*/
Route::group(['middlewareGroups' => ['auth','CekRole:pengguna,analis']],function(){
/*------------------------------Logbook-----------------------------*/
    Route::get('/dashboard', 'UserController@home');
    Route::get('/logbook','LogbookController@showaddlog');
    Route::post('/logbook/create','LogbookController@addlog');
    // Route::resource('logbook', 'LogbookController');
    // Route::get('logbook/destroy/{id}', 'LogbookController@destroy');
});
/*----------------------------End--logbook---------------------------*/
Route::get('/403','ErrorController@error403');
