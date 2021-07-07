<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Sections;

class AddSectionController extends Controller
{

    public function index(){

        $classes = Classes::all();
        return view('addsection',compact('classes',$classes));
        
    }
    public function addsection(Request $request){

        
        $this->validate ($request,[
            'sectionclass'=>'required',
            'sectionid'=>'required',
            'sectionname'=>'required'
        ]);

        $section = new Sections;
        $section ->section_class=$request->sectionclass;
        $section ->section_id=$request->sectionid;
        $section ->section_name=$request->sectionname;
        $section ->save();
        return redirect('/addsection')->with('successMsg','Section Successfully Recorded');
    }
}
