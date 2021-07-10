<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Classes;
use App\Sections;
use DB;

class StudentController extends Controller
{
    public function index() {
        $students = Student::paginate(5,['*'],'students');
        $classes = Classes::all();
        return view('welcome',compact('students','classes'));

    }


    public function addnew() {
     
        $classes = Classes::all();
        $sections = Sections::all();
        return view('addstudent',compact('classes','sections'));

    }

    public function storenew(Request $request) {
        $this->validate ($request,[
            'studentid'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'class'=>'required',
            'section'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);

        $student = new Student;
        $student->id=$request->studentid;
        $student->first_name=$request->firstname;
        $student->last_name=$request->lastname;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->class_id=$request->class;
        $student->section_id=$request->section;
        $student->save();
        $add_students = DB::table('students')->get();
        return redirect('/')->with('successMsg','Student Record Successfully Recorded');
        
        
    }



    public function edit($id){
        $student = Student::find($id);
        $classes=Classes::all();
        $sections=Sections::all();
        return view('edit',compact('student','classes','sections'));

    }

    public function update(Request $request,$id){
        $this->validate ($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'class'=>'required',
            'section'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);

        $student = Student::find($id);
        $student->first_name=$request->firstname;
        $student->last_name=$request->lastname;
        $student->class_id=$request->class;
        $student->section_id=$request->section;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        return redirect(route('home'))->with('successMsg','Student Record Successfully Updated');
    }

    public function delete($id){
        Student::find($id)->delete();
        return redirect(route('home'))->with('successMsg','Student Record Deleted Successfully');
    }
}
