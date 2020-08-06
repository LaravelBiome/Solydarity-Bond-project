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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/profile', function () {
    return view('user.index');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products' , 'ProductsController');

Route::get('/commandes' , 'CommandesController@index')->middleware('verified');
Route::get('/achats' , 'CommandesController@achats')->middleware('verified');
Route::get('/products/{id}/buy' , 'CommandesController@create')->middleware('verified');
Route::post('/products/{id}/buy' , 'CommandesController@store')->middleware('verified');

Route::get('/admin/users' , 'AdminController@Users');
Route::get('/admin/users/{id}' , 'AdminController@EditUser');
Route::delete('/admin/users/{id}' , 'AdminController@DestroyUser');
Route::put('/admin/users/{id}' , 'AdminController@UpdateUser');
Route::get('/admin/inscriptions' , 'AdminController@inscriptions');
Route::delete('/admin/inscriptions/{id}' , 'AdminController@deleteInscription');
Route::post('/admin/inscriptions/{id}' , 'AdminController@accepetInscription');

Route::get('/edit/profile/', 'ProfileController@edit')->name('profile.edit');
Route::post('/edit/profile/', 'ProfileController@update')->name('profile.update');


Route::post('/search/products' , 'ProductsController@search');

Route::get('/category/{name}' , 'ProductsController@ShowCategory');


Route::get('/edit/profile/email' , 'UserController@ResendEmail');

Route::get('/my_products' , 'ProductsController@MyProducts');
Route::post('/achats' , 'CommandesController@achatsItem');
