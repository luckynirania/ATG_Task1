<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\users;
use App\Http\Traits\TraitFile;

class ATGController extends Controller {
    use TraitFile;
    
    public function adduser() {
        return view('adduser');
    }

    public function home() {
        $data = $this->getdata();
        return view('welcome',compact('data'));
    }

    public function store(Request $request){
        $ans = $this->validation($request);
        $validator = $ans[0];

        if ($validator->fails()) {
            return redirect('/adduser')
                ->withErrors($validator)
                ->withInput();
        }

        $temp = $this->addentry($request);

        return redirect()->route('home')->with('success', ''.$temp['name'].' Added Successfully');   
 
    }


}
