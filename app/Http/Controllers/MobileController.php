<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MobileController extends Controller
{
    public function save(Request $request)
    {
        $otp = mt_rand(1000,9999);
        $user = User::where('mobile_no', $request->mobile_no)->first();
        if(empty($user)){
            $img = \DefaultProfileImage::create($request->name, 100, '#666666', '#FFF');
            $fileName = uniqid() . '.png';
            $path = file_put_contents($fileName, $img->encode());
            $newUser = User::create([
                'name' => $request->name,
                'mobile_no' => $request->mobile_no,
                'otp' => $otp,
                'status' => 0,
                'avatar' => $fileName,
            ]);
        }
        else{
            $newUser = User::where('mobile_no', $request->mobile_no)->update(["name" => $request->name, "status" => 0, "otp" => $otp]);
        }
        $message = "Dear+Customer,+"."%0ause+OTP+".$otp."+to+login+your+Resale99+account.+do+not+share+your+OTP+with+others.+"."%0aRegards,+Resale99.com";
        // dd($message);
                    
        $number = $request->mobile_no;
    
        $this->sendSms($message,$number);
        $output = '';
        $output .= '<input type="hidden" name="hidden_no" id="hidden_no" value="'.$number.'">'. 
                    '<input type="hidden" name="hidden_name" id="hidden_name" value="'.$request->name.'">';
        return response()->json(['success'=>'Got Simple Ajax Request.', 'mobile_no' => $output]);
    }

    public function sendSms($message,$number)
    {
        $url = 'http://sms.bulksmsind.in/sendSMS?username=resale99&message='.$message.'&sendername=PRSALE&smstype=TRANS&numbers='.$number.'&apikey=fb483325-87dc-4b51-9b61-ac7ed036df71&peid=1201162789069396037&templateid=1207162825793956851';
        $ch = curl_init();  
        
    
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch,CURLOPT_HEADER, false);
    
        $output=curl_exec($ch);
    
        curl_close($ch);
    
        return $output;
    }

    public function otpSave(Request $request)
    {
        $lang = $request->lang;
        $foundjquery = "Not found";
        if(in_array('jQuery',$lang)){
            $foundjquery = "found";
        }
        // Converting the array to comma separated string
        $lang = implode("",$lang);
        // return $lang;
        $otp = $lang;
        $name= $request->name;
        $mobile_no = $request->mobile_no;
        $user = User::where('mobile_no', $mobile_no)
                ->where('name', $name)
                ->where('otp', $otp)->first();
        $checkOtp = User::where('otp', $otp)->first();
        if(empty($checkOtp))
        {
            return response()->json(['info'=>'Invalid OTP']);
        }
        if($user->status == 1)
        {
            return response()->json(['error'=>'Got Simple Ajax Request.']);
        }
        else{
            $newuser = User::where('mobile_no', $mobile_no)
                ->where('name', $name)
                ->where('otp', $otp)->update(['status' => 1]);
                Auth::login($user);
                return response()->json(['success'=>'Got Simple Ajax Request.']);
        }
    }
}
