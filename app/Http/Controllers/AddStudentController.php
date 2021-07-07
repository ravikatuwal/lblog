<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddStudent;
use App\Classes;
use App\Sections;
use Illuminate\Support\Facades\DB;

class AddStudentController extends Controller
{

    //not needed/ not called

    public function addnew() {
     
        $classes = Classes::all();
        $sections = Sections::all();
        return view('addstudent',compact('classes','sections'));

    }



    public function storenew(Request $request) {
        $this->validate ($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'class'=>'required',
            'section'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);

        $student = new AddStudent;
        $student->first_name=$request->firstname;
        $student->last_name=$request->lastname;
        $student->student_class=$request->class;
        $student->student_section=$request->section;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        $add_students = DB::table('add_students')->get();
        return redirect('/')->with('successMsg','Student Record Successfully Recorded');
        
        
    }
}
