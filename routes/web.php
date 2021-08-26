<?php

use App\Http\Controllers\ContactController;
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


Route::get('/contactview', function(){
    $data=App\Models\contact::all();
    return view('contactview')->with('tabledata',$data);
});


Route::post('/addcontact', [ContactController::class,'addcontact']);


Route::get('/deletecontact/{id}',[ContactController::class,'deletecontact']);


Route::get('/updatecontactview/{id}',[ContactController::class,'updatecontactview']);


Route::post('/updatecontact',[ContactController::class,'updatecontact']);


