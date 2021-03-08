<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Documents;
use App\GroupDocument;
use App\ConvertedPrescription;
use App\ConvertedPrescriptionMed;

class ProfileController extends Controller
{
    public function getUsers()
    {	$users = User::all();
    	return view('admin.users',['users'=>$users]);
    }

    public function getUserProfiles($id)
    {	
    	$profiles = Profile::where('user_id',$id)->get();
    	return view('admin.user_details',['profiles'=>$profiles]);
    }

    public function getDocList($id)
    {	
    	$documents = GroupDocument::where('profile_id',$id)->get();
    	return view('admin.doc_list',['documents'=>$documents]);
    }

    public function getTotalDocs($id)
    {
        $documents = Documents::where('document_group',$id)->get();
        return view('admin.doclists',['documents'=>$documents]);
    }

    public function getDocument($id)
    {
    	$docname = Documents::where('id',$id)->value('document');
    	$profileid = Documents::where('id',$id)->value('profile_id');
        $id = $id;

        $doc_group_id = Documents::where('id',$id)->value('document_group');
        $doclist = Documents::where('document_group',$doc_group_id)->get();

        $prev = null;
        $next = null;
        $check = 0;
        foreach ($doclist as $key) {
            # code...
            if($key->id != $id && $check == 0)
            {
                $prev = $key->id;
            }
            if($key->id == $id)
            {   
                $check = 1;
                continue;
            }
            if($check == 1)
            {
                $next = $key->id;
            }
        }

        $details = ConvertedPrescription::where('doc_id',$id)->get();
        $meddetails = ConvertedPrescriptionMed::where('doc_id',$id)->get();
    	return view('admin.document',['docname'=>$docname,'profileid'=>$profileid,'id'=>$id,'details'=>$details,'meddetails'=>$meddetails,'doclist'=>$doclist,'prev'=>$prev,'next'=>$next]);
    }

    public function superadmin()
    {   
        $users = Profile::all();
        $documents = Documents::all();
        foreach ($documents as $key) {
            # code...
            $check = ConvertedPrescription::where('doc_id',$key->id)->first();
            if($check)
            {
                $key['completed'] = 1;
            }
            else
            {
                $key['completed'] = 0;
            }
        }
        return view('admin.superadmin',['documents'=>$documents,'users'=>$users]);
    }

    public function update(Request $request)
    {   
        $check = ConvertedPrescription::where('doc_id',$request->doc_id)->first();
        $profile_id_value = Documents::where('id',$request->doc_id)->value('profile_id');

        if($check)
        {
            ConvertedPrescription::where('doc_id',$request->doc_id)->update(['patient_name'=>$request->pname,'profile_id'=>$profile_id_value,'patient_age'=>$request->page,'patient_gender'=>$request->pgender,'doctor_name'=>$request->dname,'doctor_qualifications'=>$request->dqual,'height'=>$request->height,'weight'=>$request->weight,'temperature'=>$request->temp,'symptoms'=>$request->symptoms,'diagnosis'=>$request->diagnosis,'hospital'=>$request->hospital,'consultation_date'=>$request->cdate,'follow_up_date'=>$request->fdate,'suggestion'=>$request->suggestion,'healthtip'=>$request->tip]);
        }
        else
        {
            $new = new ConvertedPrescription;
            $new->doc_id = $request->doc_id;
            $new->profile_id = $request->profile_id_value;
            $new->patient_name = $request->pname;
            $new->patient_age = $request->page;
            $new->patient_gender = $request->pgender;
            $new->doctor_name = $request->dname;
            $new->doctor_qualifications = $request->dqual;
            $new->height = $request->height;
            $new->weight = $request->weight;
            $new->temperature = $request->temp;
            $new->symptoms = $request->symptoms;
            $new->diagnosis = $request->diagnosis;
            $new->hospital = $request->hospital;
            $new->consultation_date = $request->cdate;
            $new->follow_up_date = $request->fdate;
            $new->suggestion = $request->suggestion;
            $new->healthtip = $request->tip;
            $new->save();
        }

        ConvertedPrescriptionMed::where('doc_id',$request->doc_id)->delete();

        if(isset($request->title))
        {
            foreach ($request->title as $key => $value) {
            $new = new ConvertedPrescriptionMed;
            $new->doc_id = $request->doc_id;
            $new->name = $value;
            $new->frequency = $request->frequency[$key];
            $new->duration = $request->duration[$key];
            $new->notes = $request->notes[$key];
            $new->save();
        }
        }
        

        return redirect()->back();
       
    }

    public function sendmessage(Request $request)
    {   

        $firebaseToken = User::where('phone',$request->phone)->pluck('ftoken')->all();
          
        $SERVER_API_KEY = 'AAAAnUKQWgE:APA91bHXecUqSJKOkk-uqGd4aKEWqj-uiOQrj-LgHXjL7oMc9QmRweUpKOxRXenUIcSWCFMRUK24aVvVyj-5nKrG-xAeDBNg2ZgURruk-g5576qkuHg-wE0-t8AA5tCEOvRlBgzp6JmQ';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => "Dear User",
                "body" => $request->pushnotification, 
                "image" => 'https://app.famile.care/assets/img/famile.png',  
            ],
            "apns" => [
                "payload" => [
                    "aps" => [
                        "mutable-content" => 1
                    ]
                ],
                "fcm_options" => [
                    "image" => "https://app.famile.care/assets/img/famile.png",
                ]
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);

        return redirect()->back();
    }
}
