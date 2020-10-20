<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Profile;
use App\GroupDocument;
use App\Documents;
use App\User;
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
  $userid = $_POST['userId'];

  $newgroup = new GroupDocument;
  $newgroup->profile_id = $_POST['profileId'];
  $newgroup->total_docs = '1';
  $newgroup->user_id = $userid;
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

    Route::post('multiupload',function(){

    	$id = json_decode($_POST['id']);
    	$userid = json_decode($_POST['userid']);
    	$img = ['jpg', 'jpeg', 'png', 'bmp'];
    	$doc = ['zip', 'rar', 'pdf', 'doc', 'docx', 'xls','xlsx','ppt','pptx'];
    	$whitelistExt = array_merge($img, $doc);

    	$newgroup = new GroupDocument;
    	$newgroup->profile_id = $id;
    	$newgroup->total_docs = '1';
    	$newgroup->user_id = $userid;
    	$newgroup->save();
    	$futureupdate = $newgroup->id;
    	$temp = json_decode($_POST['attachment']);
    	$file = 0;
    	foreach ($temp as $key => $value)
    	{	$file++;
    		$fn = $value->fileName;
    		$ext = pathinfo($fn, PATHINFO_EXTENSION);
    		$f = base64_decode($value->encoded);
    		file_put_contents('prescriptions/'.$id.'/'.$fn, $f);

    		$newdocument = new Documents;
	    	$newdocument->profile_id = $id;
	    	$newdocument->document = $fn;
	    	$newdocument->document_group = $newgroup->id;
	    	$newdocument->save();

    	}
    	GroupDocument::where('id',$futureupdate)->update(['total_docs'=>$file]);
    	return response()
    	->json(['status'=>'OK']);
    });

    Route::post('profile',function(){
    	$new = Profile::where('user_id',$_POST['profileid'])->get();
return response()
            ->json($new);
    });
    Route::post('profiledetail',function(){
    	$new = Profile::where('id',$_POST['memberid'])->get();
        $documents = Documents::get();
        $id = $_POST['memberid'];
        $image_links = array();
        foreach ($documents as $doc) {
            if($doc->profile_id == $id)
            {
                $str = $doc->document;
                array_push($image_links, $str);
            }
        }
        foreach ($new as $key) {
                $key->image_links = $image_links;
        }
return response()
            ->json($new);
    });

    Route::post('sendotp',function(){
    	if(strlen($_POST['phone']) != 13)
    	{
    		return Response::json([
    'error' => 'error'
], 201); // Status code here
    	}

    	$check = User::where('phone',$_POST['phone'])->first();

    	if($check)
    	{
    		$otp = rand(1000,9999);
            User::where('phone',$_POST['phone'])->update(['otp'=>$otp]);
            //send message with otp here

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://2factor.in/API/V1/7f3c1f82-0d1b-11eb-9fa5-0200cd936042/SMS/".$_POST['phone']."/".$otp."/AUTOVERIFY",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_POSTFIELDS => "",
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              // echo $response;
                return response()->json(['status'=>'success']);
            }

            
    	}
    	else
    	{
    		$patient = new User;
    		$patient->phone = $_POST['phone'];
    		$patient->save();

    		$otp = rand(1000,9999);
            User::where('phone',$_POST['phone'])->update(['otp'=>$otp]);
            //send message with otp here

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://2factor.in/API/V1/7f3c1f82-0d1b-11eb-9fa5-0200cd936042/SMS/".$_POST['phone']."/".$otp."/AUTOVERIFY",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_POSTFIELDS => "",
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              // echo $response;
                return response()->json(['status'=>'success']);
            }
    		return response()->json(['status'=>'success']);
    	}

    	return response()->json(['status'=>'success']);
    });

    Route::post('verifyotp',function(){
    	$pin = $_POST['otp'];
        $user = User::where('phone',$_POST['phone'])->where('otp',$pin)->first();

        if($user)
        {	
            	User::where('phone',$_POST['phone'])->update(['otp'=>null]);
            	return response()->json(['status'=>'success','user'=>$user->id]);
          } 
          return Response::json([
    'error' => 'error'
], 201); // Status code here
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
    		$image = $_POST['photo'];
    		$realImage = base64_decode($image);
    		$name = 'avatar.jpg';
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
    	$new = GroupDocument::where('user_id',$_POST['profileid'])->orderBy('id', 'DESC')->get();
        $profile = Profile::where('user_id',$_POST['profileid'])->get();
        $documents = Documents::get();
        foreach ($new as $key) {
            foreach($profile as $pro){
                if($pro->id == $key->profile_id){
                    $newtime = strtotime($key->created_at);
                    $key->date = date('d M Y',$newtime);
                    $created_at = explode(' ',$key->created_at);
                    $key->time = $created_at[1];
                    $key->username = $pro->name;
                }
            }
            $image_links = array();
            $count =0;
            foreach ($documents as $doc) {
                # code...
                if($doc->document_group == $key->id)
                {   $str = $doc->document;
                      $key->first_image = $doc->document;
                      $count++;
                    array_push($image_links, $str);
                }
            }
            $count = $count - 1;
            if($count == 0)
            {
                $key->count = ' ';
            }
            else{
                $count = (string)$count;
            $countname = ' + '.$count;
            $key->count = $countname;
            }
            
            $key->image_links = $image_links;

        }
    		return response()->json($new);
    });

    Route::post('setlocation',function(){
        User::where('id',$_POST['profileid'])->update(['location'=>$_POST['location']]);

        return response()->json(['status'=>'success']);
    });
});