<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Student;

class StudentController extends Controller
{
    public function getAllStudent(){
        $student = Student::all();
        
        return $student;
    }
}
