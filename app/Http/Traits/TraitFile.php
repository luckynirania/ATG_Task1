<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

use App\users;

trait TraitFile {
    public function getdata() {
        $data = users::all();
        return $data;
    }

    public function addentry(Request $request) {
        $user = new users();
 
        $user->name = request('name');
        $user->email = request('email');
        $user->pincode = request('pincode');

        $user->save();

        // Log::custom("EMAIL SENT");
        Log::channel('custom')->info('EMAIL SENT');

        return $user;
    }

    public function validation(Request $request) {
        $validator = Validator::make(
            $request->all(), [
                'name' => ['required', 'string', 'max:255','unique:user_info'],
                'email' => ['required', 'regex:/^.+@.+\..+$/i', 'max:255', 'unique:user_info'],
                'pincode' => ['required', 'string', 'digits:6', 'unique:user_info' ]
            ]
        );

        $app = app();
        $err = $app->make('stdClass');
        
        if($validator->fails()) {
            $var = json_decode($validator->errors());

            if(isset($var->name)) $err->name = $var->name[0];
            if(isset($var->email)) $err->email = $var->email[0];
            if(isset($var->pincode)) $err->pincode = $var->pincode[0];

            // var_dump($err); 
        }

        return array($validator, $err);
    }
}

?>