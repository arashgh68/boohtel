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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/clients', 'ClientController@index')->name('clients');
    Route::get('/clients/new', 'ClientController@newClient')->name('new_client');
    Route::post('/clients/new', 'ClientController@newClient')->name('create_client');
    Route::get('/clients/{client_id}', 'ClientController@show')->name('show_client');
    Route::post('/clients/{client_id}', 'ClientController@modify')->name('update_client');

    Route::get('/reservations/{client_id}', 'RoomController@checkAvailableRooms')->name('check_room');
    Route::post('/reservations/{client_id}', 'RoomController@checkAvailableRooms');

    Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationController@bookRoom')->name('book_room');


    Route::get('/upload', 'ContentController@upload')->name('upload');
    Route::post('/upload', 'ContentController@upload')->name('upload');

    
    Route::get('export','ClientController@export');
    
});

Route::get('/', 'ContentController@home')->name('home');


Route::get('/home', function () {
    $data = [];
    $data['version'] = '0.1.1';
    return view('welcome')->with($data);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
