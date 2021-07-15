<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Sections;

class AddClassController extends Controller
{

    public function index(){
        return view('addclass');
    }

    public function addclass(Request $request){

        $this->validate ($request,[
            'id'=>'required',
            'classname'=>'required',
            
        ]);

        $class = new Classes;
        $class->id=$request->id;
        $class->class_name=$request->classname;
        $class->save();
        return redirect('/addclass')->with('successMsg','Class Successfully Recorded');
    }

    
}