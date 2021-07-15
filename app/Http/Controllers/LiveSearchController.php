<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Classes;
use App\Sections;
use DB;

class LiveSearchController extends Controller
{
    public function index(){
        $students = Student::paginate(5,['*'],'students');
        $sections=Sections::all();
        $classes=Classes::all();
        return view('welcome', compact('students', 'sections', 'classes'));
    }

    public function action(Request $request){
        $students=Student::where('first_name', 'like', '%' . $request->get('query') . '%')
                        ->orWhere('last_name', 'like', '%' . $request->get('query') . '%')
                        ->orWhere('email', 'like', '%' . $request->get('query') . '%')
                        ->orWhere('phone', 'like', '%' . $request->get('query') . '%')
                        ->orWhere('class_id', 'like', '%' . $request->get('query') . '%')
                        ->orWhere('section_id', 'like', '%' . $request->get('query') . '%')
                        ->get();

    return json_encode( $students);


    }


}








    //     if($request->ajax()){
    //         $query=$request->get('query');
    //         if($query !=''){
    //                 $data =DB::table('students')
    //                         ->where('first_name','like','%'.$query.'%')
    //                         ->orWhere('last_name','like','%'.$query.'%')
    //                         ->orWhere('class_id','like','%'.$query.'%')
    //                         ->orWhere('section_id','like','%'.$query.'%')
    //                         ->orWhere('email','like','%'.$query.'%')
    //                         ->orWhere('phone','like','%'.$query.'%')
    //                         ->orderBy('id','desc')
    //                         ->get();
    //         }
    //         else
    //         {
    //             $data = DB::table('students')
    //                     ->orderBy('id','desc')
    //                     ->get();
    //         }
    //         $total_row=$data->count();
    //         if ($total_row>0){
    //             foreach($data as $row){
    //                 $output .= '
    //                     <tr>
    //                         <td> ' .$row->first_name.' </td>
    //                         <td> ' .$row->last_name.' </td>
    //                         <td> ' .$row->class_id.' </td>
    //                         <td> ' .$row->section_id.' </td>
    //                         <td> ' .$row->email.' </td>
    //                         <td> ' .$row->phone.' </td>
    //                     </tr>

    //                 ';
    //             }
    //         }
    //         else
    //         {
    //             $output='
    //             <tr>
    //             <td align="center" colspan="8">No Data Found</td>
    //             </tr>
    //             ';
    //         }
    //         $data = array(
    //             'table_data'        =>$output,
    //             'total_data'        =>$total_data
    //         );

    //         echo json_encode($data);

    //     }

    // }

