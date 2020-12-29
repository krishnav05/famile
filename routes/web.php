<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Profile;
use App\GroupDocument;
use App\Documents;
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

Route::get('/home', 'HomeController@index')->name('home');

//show documents to doctor url
Route::get('/docview/{id}/{subid}/{sharecode}', function ($id,$subid,$sharecode) {
	$user = User::where('id',$id)->where('sharecode',$sharecode)->first();

	if($user)
	{	
		$profiles = Profile::where('user_id',$id)->where('id',$subid)->get();
		$documents = Documents::get();
		return view('docViewFiles',['profiles'=>$profiles,'documents'=>$documents]);
	}
	else
	{
		return view('docsPageExpired');
	}
});

Route::get('/docview/{id}/{subid}/{sharecode}/preshistory',function($id,$subid,$sharecode){
	$user = User::where('id',$id)->where('sharecode',$sharecode)->first();

	if($user)
	{	
		$profiles = Profile::where('user_id',$id)->where('id',$subid)->get();
		$documents = Documents::get();
		return view('prescriptionHistory');
	}
	else
	{
		return view('docsPageExpired');
	}
});