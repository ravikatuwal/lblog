<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddStudent;
use Illuminate\Support\Facades\DB;

class AddStudentController extends Controller
{

    public function index() {

        $add_students = AddStudent::paginate(5);
        return view('welcome',compact('add_students'));

    }

    public function addnew() {
        return view('addstudent');
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
        $student->class=$request->class;
        $student->section=$request->section;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        $add_students = DB::table('add_students')->get();
        return redirect(route('store.new',['add_students' => $add_students]))->with('successMsg','Student Record Successfully Recorded');
        
        
    }
}
