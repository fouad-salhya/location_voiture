<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
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


Auth::routes();

Route::get('/','HomeController@index')->name('home');

// admin 
Route::get('/dashbord', 'DashbordController@index')->name('dashbord');



// marques
Route::get('/dashbord/marque/create', 'MarqueController@create')->name('addmarque');
Route::post('/dashbord/marque/create', 'MarqueController@store')->name('createmarque');
Route::get('/dashbord/marque/all', 'MarqueController@index')->name('listemarque');
Route::delete('/marque/delete/{id}', 'MarqueController@destroy')->name('deletemarque');


// vehicules
Route::get('/dashbord/vehicule/create', 'VehiculeController@create')->name('addvehicule');
Route::post('/dashbord/vehicule/create', 'VehiculeController@store')->name('createvehicule');
Route::get('/vehicules/all', 'VehiculeController@index')->name('listevehicules');
Route::get('/vehicule/detail/{id}', 'VehiculeController@show')->name('detailvehicule');
Route::delete('/vehicule/delete/{id}', 'VehiculeController@destroy')->name('deletevehicule');
Route::get('/vehicule/edit/{id}', 'VehiculeController@edit')->name('editvehicule');
Route::put('/vehicule/edit/{id}', 'VehiculeController@update')->name('updatevehicule');

Route::get('/dashbord/vehicules', 'AdminDashbord@index')->name('vehicules');

Route::get('/vehicule/search', 'VehiculeController@searchVehicule')->name('search');


// reservation
Route::get('/reservation/create/{id}', 'ReservationController@create')->name('addreservation');
Route::post('/reservation/create/{id}', 'ReservationController@store')->name('createreservation');


// account
Route::get('/account', 'ProfileController@index')->name('account');
Route::get('/mesreservations', 'ReservationController@listReservationForUser')->name('mesreservations');
Route::delete('/dashbord/mesreservation/delete/{id}', 'ReservationController@delete')->name('destroyreservation');

// users
Route::get('/users/all', 'UserController@index')->name('listeusers');
Route::get('/user/inscrit/{id}', 'UserController@show')->name('inscrit');
// Route::patch('/user/update', 'UserController@update')->name('termine');
Route::post('/user/terminer', 'ProfileController@store')->name('termine');
// admin reservation

Route::get('/dashbord/reservations', 'ReservationController@index')->name('listereservations');
Route::patch('/dashbord/reservation/edit/{id}', 'ReservationController@update')->name('confirme');
Route::delete('/dashbord/reservation/delete/{id}', 'ReservationController@destroy')->name('deletereservation');
Route::get('/dashbord/reservations/accept', 'ReservationController@reservationsAccepte')->name('reservationaccept');
Route::get('/dashbord/reservation/{id}', 'ReservationController@show')->name('detail_reservation');

// Mail 
Route::get('/dashbord/reservations/confirmation', 'MailController@sendEmail')->name('confirmereservation');

//  Payment 

Route::post('/reservation/payment/{id}', 'PaymentController@store')->name('add_payment');

