<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Gforce\StudentsModel;
use Illuminate\Http\Request;

class Student extends Controller
{
    

    public function index()
    {
         // This function get all data from database and send it list blade file

        $tableData = StudentsModel::orderBy('id', 'DESC')->get();

        return view('content.Student.allStudentView')->with('tableData',$tableData);
    }
    public function getSingleStudent($id)
    {
      // This function is get data from database on behalf of Requested Id and Redirect it Details Blade file

        $tableData = StudentsModel::where('id',$id)->get();
        return view('content.Student.singleStudetView')->with('student',$tableData);

    }


}
