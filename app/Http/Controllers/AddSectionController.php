<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Sections;

class AddSectionController extends Controller
{

    public function index(){

        $classes = Classes::paginate(5,['*'],'classes');
        return view('addsection',compact('classes'));
        
    }
    public function addsection(Request $request){
        $this->validate ($request,[
            'sectionid'=>'required',
            'sectionname'=>'required'
        ]);

        $section = new Sections;
        $section ->section_id=$request->sectionid;
        $section ->section_name=$request->sectionname;
        $section ->save();
        return redirect('/addsection')->with('successMsg','Section Successfully Recorded');
    }
}
