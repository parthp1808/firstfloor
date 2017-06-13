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
use Illuminate\Http\Request;

Route::get('/', 'PropertyController@home');

Auth::routes();

Route::get('/my-profile', 'UserController@show');
Route::get('/edit-profile', 'UserController@edit');
Route::get('/create-listing', 'PropertyController@create')->middleware('auth');
Route::post('/edit-profile', 'UserController@update');
Route::post('/create-listing', 'PropertyController@store');
Route::get('/properties', 'PropertyController@index');
Route::get('/dashboard', 'UserController@dashboard')->middleware('auth');
Route::post('/upload-profile','UserController@uploadProfile');
Route::get('properties/{property}', 'PropertyController@show');
Route::get('/properties/{property}/edit','PropertyController@edit');
Route::post('/properties/{property}/edit','PropertyController@update');

// Route::post('/search', function(Request $req) {

// 	// $json = file_get_contents( str_replace(' ', '%20','http://open.mapquestapi.com/geocoding/v1/address?key=JtTPJdU1rCNfmx8OW4NatCxHRz2CPrxn&location='.$req->location));
// 	// $jsonArr = json_decode($json);
// 	// $lat = $jsonArr->results[0]->locations[0]->latLng->lat;
// 	// $lon = $jsonArr->results[0]->locations[0]->latLng->lng;
// 	// dd($jsonArr);
// 	// dd($lat.' '.$lon);
// 	dd(getLat($req->location));


// });
Route::post('/savesearch','PropertyController@savesearch');
Route::post('bookmark/{id}','PropertyController@bookmark');
Route::delete('bookmark/{id}','PropertyController@deletebookmark');
Route::post('/search','PropertyController@search');
Route::get('/search','PropertyController@search');
Route::delete('savesearch/{id}',function($id){
    $search = App\UserSearch::destroy($id);

    return Response::json($search);
});