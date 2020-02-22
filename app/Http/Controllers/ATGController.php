<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\users;

class ATGController extends Controller
{
    //
    public function adduser() {
        return view('adduser');
    }

    public function home() {

        $data = users::all();

        return view('welcome',compact('data'));
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:user_info'],
    //         'pincode' => ['required', 'string', 'min:6', 'max:6' ],
    //     ]);
    // }

    public function store(Request $request){

        $this->validate(
            $request, [
                'name' => ['required', 'string', 'max:255','unique:user_info'],
                'email' => ['regex:/^.+@.+\..+$/i', 'max:255', 'unique:user_info'],
                'pincode' => ['required', 'string', 'digits:6', 'unique:user_info' ]
            ]
        );


 
        $user = new users();
 
        $user->name = request('name');
        $user->email = request('email');
        $user->pincode = request('pincode');

        $temp = $user->name;
 
        $user->save();

        return redirect()->route('home')->with('success', ''.$temp.' Added Successfully');   
 
    }


}
