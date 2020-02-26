<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\users;
use App\Http\Traits\TraitFile;

class WebServicesController extends Controller {
    use TraitFile;

    public function ret_data() {
        $data = $this->getdata()->toJson(JSON_PRETTY_PRINT);
        return response($data, 200);
    }

    public function adduser() {
        return view('ajaxview');
    }

    public function store(Request $request) {
        $ans = $this->validation($request);
        $validator = $ans[0];
        $err = $ans[1];

        if ($validator->fails()) {
            return response()->json([
                "status" => 0,
                "error" => $err
            ], 200);
        }
 
        $temp = $this->addentry($request);

        return response()->json([
            "status" => 1,
            "msg" => "'" . $temp['name'] . "' is created with email '" . $temp['email'] . "' and pincode '" . $temp['pincode'] . "'"
        ], 200);
    }

}
