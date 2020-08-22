<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Profile;
use App\GroupDocument;
use App\Documents;

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
    	// $name = $_POST['userfilename'];
  $realImage = base64_decode($image);
  $id = $_POST['profileId'];

  $newgroup = new GroupDocument;
  $newgroup->profile_id = $_POST['profileId'];
  $newgroup->total_docs = '1';
  $newgroup->user_id = '1';
  $newgroup->save();

  $newdocument = new Documents;
  $newdocument->profile_id = $_POST['profileId'];
  $newdocument->document = $_POST['name'];
  $newdocument->document_group = $newgroup->id;
  $newdocument->save();

  
  file_put_contents('prescriptions/'.$id.'/'.$name,$realImage);
  // echo "OK";
  return response()
            ->json(['status'=>'success']);
    });
    Route::post('profile',function(){
    	$new = Profile::where('user_id',$_POST['profileid'])->get();
return response()
            ->json($new);
    });
    Route::post('profiledetail',function(){
    	$new = Profile::where('id',$_POST['memberid'])->get();
return response()
            ->json($new);
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

        $path = public_path().'/prescriptions/' . $new->id;
File::makeDirectory($path, $mode = 0777, true, true);

        return response()->json(['status'=>'success']);
    });

    Route::post('editprofile',function(){

    	Profile::where('id',$_POST['editid'])->update(['name'=>$_POST['name'],'age'=>$_POST['age'],'blood_group'=>$_POST['blood'],'height'=>$_POST['height'],'weight'=>$_POST['weight'],'occupation'=>$_POST['occupation'],'email'=>$_POST['email'],'phone'=>$_POST['mobile'],'city'=>$_POST['city'],'state'=>$_POST['state'],'address'=>$_POST['address']]);

    	if($_POST['photo'] !== ''){
    		$image = $_POST['image'];
    		$realImage = base64_decode($image);
    		$name = 'avatar';
    		$id = $_POST['editid'];
    		file_put_contents('prescriptions/'.$id.'/'.$name,$realImage);
    		Profile::where('id',$_POST['editid'])->update(['image'=>'avatar']);
    	}
    	else{
    		Profile::where('id',$_POST['editid'])->update(['image'=>'default']);
    	}


    	return response()->json(['status'=>'success']);
    });

    Route::post('getmembers',function(){
    	$new = Profile::where('user_id',$_POST['profileid'])->get();
    	return response()->json($new);
    });

    Route::post('gettimelineinfo',function(){
    	$new = GroupDocument::where('user_id',$_POST['profileid'])->get();
    	// if($new->first())
    	// {
    	// 	return response()->json($new);
    	// }
    	// else	
    		return response()->json($new);
    });
});