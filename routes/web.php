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

Route::get('/', function () {
	$config['center'] = 'National Film School, IADT, Dublin';
	$config['zoom'] = '16'; //1-20
	$config['map_height'] = '500px';
	$config['map_width'] = '1000px';
	//$config['scroll_wheel'] = false;


	GMaps::initialize($config);

	//add a marker
	$marker['position'] = 'National Film School, IADT, Dublin';
	$marker['infowindow_content'] = 'IADT Carpark';

	GMaps::add_marker($marker);

	$circle = array();
	$circle['center'] = '53.2795371, -6.1497848,162a';
	$circle['radius'] = '100';
	GMaps::add_circle($circle);


	//Create the map
	$map = GMaps::create_map();



    return view('welcome')->with('map', $map);
});

Route::get('/stillo', function () {
	$config['center'] = 'Stillorgan, Dublin';
	$config['zoom'] = '18'; //1-20
	$config['map_height'] = '500px';
	$config['map_width'] = '1000px';
	//$config['scroll_wheel'] = false;


	GMaps::initialize($config);

	//add a marker
	$marker['position'] = 'Stillorgan, Dublin';
	$marker['infowindow_content'] = 'IADT Carpark';

	GMaps::add_marker($marker);

	//Create the map
	$map = GMaps::create_map();



    return view('welcome')->with('map', $map);
});

Route::get('/dd', function () {
	$config['center'] = 'Dundrum, Dublin';
	$config['zoom'] = '18'; //1-20
	$config['map_height'] = '500px';
	$config['map_width'] = '1000px';
	//$config['scroll_wheel'] = false;


	GMaps::initialize($config);

	//Create the map
	$map = GMaps::create_map();



    return view('welcome')->with('map', $map);
});

Route::get('/bl', function () {
	$config['center'] = 'Blackrock, Dublin';
	$config['zoom'] = '18'; //1-20
	$config['map_height'] = '500px';
	$config['map_width'] = '1000px';
	//$config['scroll_wheel'] = false;


	GMaps::initialize($config);

	//Create the map
	$map = GMaps::create_map();



    return view('welcome')->with('map', $map);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('cars', 'CarController');
Route::resource('parks', 'ParkController');
Route::resource('cars', 'CarController');
Route::resource('payments', 'PaymentController');
Route::resource('cards', 'CardController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/storeCar', 'PaymentController@store');

// STRIPE ROUTING

Route::get('/pay', function () {
    return view('pay');
});

