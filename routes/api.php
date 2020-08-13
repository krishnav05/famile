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
                    ['id'=>'1','name'=>'krishna'],
                    ['id'=>'2','name'=>'ravi'],
                    ['id'=>'3','name'=>'aman'],
                    ['id'=>'4','name'=>'krishna'],
                ]
              ]
            );
    });
});