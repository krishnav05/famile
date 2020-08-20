<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Profile;

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
  $id = $_POST['profileId'];
  
  file_put_contents('prescriptions/'.$id.'/'.$name,$realImage);
  echo "OK";
    });
    Route::post('profile',function(){
    	$new = Profile::where('user_id',$_POST['profileid'])->get();
return response()
            ->json($new);
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

    Route::post('sendotp',function(){
    	return response()->json(['status'=>'success']);
    });

    Route::post('verifyotp',function(){
    	return response()->json(['status'=>'success']);
    });

    Route::post('addprofile',function(){
        $new = new Profile;
        $new->user_id = $_POST['profileid'];
        $new->name = $_POST['firstname'].' '.$_POST['lastname'];
        $new->age = $_POST['age'];
        $new->blood_group = $_POST['blood'];
        $new->height = $_POST['height'];
        $new->weight = $_POST['weight'];
        $new->occupation = $_POST['occupation'];
        $new->save();

        return response()->json(['status'=>'success']);
    });

    Route::post('getmembers',function(){
    	$new = Profile::where('user_id',$_POST['profileid'])->get();
    	return response()->json($new);
    });
});