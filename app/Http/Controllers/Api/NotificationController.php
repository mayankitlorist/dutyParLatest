<?php


namespace App\Http\Controllers\Api;


use App\Models\LevelCategory;
use App\Models\Offices;
use App\Models\UserAttendance;
use App\Models\UserDetails;
use App\Models\UserLeaveDetails;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Response;



class NotificationController extends Controller
{
    public static function sendPushNotification($options=[]) {
        $url = "https://fcm.googleapis.com/fcm/send";
        $header = [
            'authorization: key=' .'AAAAdljZ-rA:APA91bGxde4ALolZVJ6mqiaUsstkK4KLg5ELogV_vrW3cL0ub8el-h4qZtyuxFqg8qUHKvwpPmVOrJmFsmLZOagmz8EWIDRElTnOtEeVBeVPxfWze04HWul4mwfafIHSgDa68Eql5LAv',
            'content-type: application/json'
        ];

        $postdata = '{
            "to" : "' .$options['firebase_token']. '",

            "data" : {
                "title":"' . $options['title'] . '",
                "user":"' . $options['username'] . '",
                "apply_date":"' . $options['attendance_date'] . '",
                "description" : "' . $options['reason'] . '",
              },
              "android": {
    "priority": "high"
  },
  "priority": 10
              
        }';
//dd($postdata);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
}
