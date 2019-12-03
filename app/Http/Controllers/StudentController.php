<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Student;

class StudentController extends Controller
{
    public function getAllStudent(){
        $student = Student::with('program')->get();
        
        return $student;
    }

    public function addStudent(Request $request){
        $nim = $request->input('nim');
        $name = $request->input('name');      
        $stdProgram = $request->input('program');
        
        $std = new Student;    

        $std->nim = $nim;
        $std->name = $name;        
        $std->study_programme_id = $stdProgram; 
        $std->email = $request->input('email');
        $std->year = $request->input('year');
        
        $std->save();

        return response()->json([
            'succes' => true,   
            'student' => $std->name,            
        ], 200);    

    }

    public function deleteStudent(Request $request){
        $id = $request->input('id');      
        $org = Student::find($id);     
        $org->delete();        

        return response()->json([
            'succes' => true,               
        ], 200);    
    }

    public function updateStudent(Request $request){
        $id = $request->input('id');      
        $std = Student::find($id);
        
        $nim = $request->input('nim');
        $name = $request->input('name');      
        $stdProgram = $request->input('program');
                
        $std->nim = $nim;
        $std->name = $name;        
        $std->study_programme_id = $stdProgram; 
        $std->email = $request->input('email');
        $std->year = $request->input('year');        

        $dpt->save();

        return response()->json([
            'succes' => true,               
        ], 200);        
    }
}
