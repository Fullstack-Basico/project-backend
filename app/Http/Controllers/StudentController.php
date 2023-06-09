<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    public function read(Request $request){

        $studentModel = new Student();

        if($request->query("id")){
            $student = $studentModel->find($request->query("id"));
        }else{
            $student = $studentModel->all();
        }

       return response()->json($student,Response::HTTP_OK);
    }
}
