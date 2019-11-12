<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Department;

class DepartmentController extends Controller
{
    public function getAll(){
        $dpt = Department::all();

        return $dpt;
    }
}
