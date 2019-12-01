<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\SProgram;

class SProgramController extends Controller
{
    public function getAll(){
        $sprogram = SProgram::with('department')->get();

        return $sprogram;
    }

    public function addProgram(Request $request){
        $name = $request->input('name');      
        $dpt_id = $request->input('dpt');      

        $dpt = new SProgram;    

        $dpt->name = $name;        
        $dpt->department_id = $dpt_id; 
        
        $dpt->save();

        return response()->json([
            'succes' => true,   
            'cmpt' => $dpt->name,            
        ], 200);    

    }

    public function deleteProgram(Request $request){
        $id = $request->input('id');      
        $prg = SProgram::find($id);
        $prg->delete();

        return response()->json([
            'succes' => true,               
        ], 200);    
    }

    public function updateProgram(Request $request){
        $id = $request->input('id');      
        $dpt = SProgram::find($id);
        
        $dpt->name = $request->input('name');      
        $dpt->department_id = $request->input('dpt');
        $dpt->save();

        return response()->json([
            'succes' => true,               
        ], 200);        
    }
}
