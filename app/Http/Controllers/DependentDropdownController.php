<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Sections;


class DependentDropdownController extends Controller
{
    
    public function prodfunct()
    {

        $classes = Classes::all();
        $sections = Sections::all();
        return view('addstudent',compact('classes','sections'));

    }

    public function getSectionsByClassId($classId){
        $data=Sections::select('id','section_name')->where('class_id',$classId)->take(100)->get();
        return response()->json($data);
    }
    
    public function getSectionsForUpdate($classId){
        $data=Sections::select('section_id','section_name')->where('section_class',$classId)->take(100)->get();
        return response()->json($data);
    }


}
