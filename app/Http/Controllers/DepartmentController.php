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

    public function addDepartment(Request $request){
        $name = $request->input('name');      

        $dpt = new Department;    

        $dpt->name = $name;        
        
        $dpt->save();

        return response()->json([
            'succes' => true,   
            'cmpt' => $dpt->name,            
        ], 200);    

    }

    public function deleteDepartment(Request $request){
        $id = $request->input('id');      
        $dpt = Department::find($id);
        $dpt->delete();

        return response()->json([
            'succes' => true,               
        ], 200);    
    }

    public function updateDepartment(Request $request){
        $id = $request->input('id');      
        $dpt = Department::find($id);
        
        $dpt->name = $request->input('name');      
        $dpt->save();

        return response()->json([
            'succes' => true,               
        ], 200);        
    }
}
