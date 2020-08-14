<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', '\App\Http\Controllers\Api\UsersController@login');
    Route::post('/register', 'UsersController@register');
    Route::get('/logout', 'UsersController@logout')->middleware('auth:api');
    Route::post('image',function(){
    	$image = $_POST['image'];
  $name = $_POST['name'];
  $realImage = base64_decode($image);
  
  file_put_contents($name,$realImage);
  echo "OK";
    });
    Route::post('profile',function(){
return response()
            ->json(
              [
                'state' => [
                    ['id'=>'1','name'=>'krishna','image'=>'https://cdn.iconscout.com/icon/free/png-512/avatar-370-456322.png'],
                    ['id'=>'2','name'=>'Sanket','image'=>'https://www.clipartmax.com/png/middle/248-2487966_matthew-man-avatar-icon-png.png'],
                    ['id'=>'3','name'=>'Richa','image'=>'https://f1.pngfuel.com/png/726/597/190/graphic-design-icon-customer-service-avatar-icon-design-call-centre-yellow-smile-forehead-png-clip-art.png'],
                    ['id'=>'4','name'=>'Akshaj','image'=>'https://cdn1.iconfinder.com/data/icons/avatars-1-5/136/84-512.png'],
                ]
              ]
            );
    });
    Route::post('profiledetail',function(){
return response()
            ->json(
              [
                'age' => '35',
                'blood' => 'O+',
                'height' => '5.8',
                'weight' => '75',
                'occupation' => 'Desk/IT',
                'email' => 'sanket@semiqolon',
                'mobile' => '9667555094',
                'state' => 'Uttar Pradesh',
                'city' => 'Noida',
                'address' => '7th Floor A-14, Eco Tower\nNear Amity University,Sector 125,\nNoida - 201301, Uttar Pradesh', 
              ]
            );
    });
});