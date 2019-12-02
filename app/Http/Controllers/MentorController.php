<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Team;
use App\Proposal;
use App\Lecturer;
use Carbon\Carbon;

class MentorController extends Controller
{
   public function onGoingProposal(Request $request){
        $nidn = $request->input('nip');
        
        $team = Team::where('mentor_id', '=', $nidn)
        ->WhereHas('proposal', function($q) use ($nidn) { 
            $q->where('status', '=', "PENDING")
            ->orWhere('status', '=', "REVISION")
            ->orWhere('status', '=', "WAITFUND")
            ->orWhere('status', '=', "DISBURSEDFUND")
            ->orWhere('status', '=', "WAITREPORT"); 
        })        
        ->with('proposal')
        ->get();
        
        $data = $team->toArray();

        $index = 0;
        foreach ($team as $t) {
            $data[$index]['revision'] = $t->proposal->revision;
            $data[$index]['competition'] = $t->proposal->competition;
            $index++;
        }

        return $data;        
    }

    public function finishedProposal(Request $request){
     $nidn = $request->input('nip');
        
        $team = Team::where('mentor_id', '=', $nidn)
        ->WhereHas('proposal', function($q) use ($nidn) { 
            $q->where('status', '=', "DONE"); 
        })        
        ->with('proposal')
        ->get();
        
        $data = $team->toArray();

        $index = 0;
        foreach ($team as $t) {
            $data[$index]['revision'] = $t->proposal->revision;
            $data[$index]['competition'] = $t->proposal->competition;
            $index++;
        }

        return $data;        
    }

    public function Dashboard(Request $request){
        $nim = $request->input('nim');        

        $team = Team::where('leader_id', '=', $nim)
        ->WhereHas('proposal', function($q) use ($nim) { 
            $q->where('status', '=', "DONE");           
        })        
        ->orWhere(function($q) use ($nim) { 
            $q->where('member1_id', '=', $nim)
            ->orWhere('member2_id', '=', $nim)
            ->orWhere('member3_id', '=', $nim)
            ->orWhere('member4_id', '=', $nim); 
        })
        ->WhereHas('proposal', function($q) use ($nim) { 
            $q->where('status', '=', "DONE");            
        })                
        ->count();

        $tim = Team::where('leader_id', '=', $nim)
        ->WhereHas('proposal', function($q) use ($nim) { 
            $q->where('status', '=', "DISBURSEDFUND");            
        })        
        ->orWhere(function($q) use ($nim) { 
            $q->where('member1_id', '=', $nim)
            ->orWhere('member2_id', '=', $nim)
            ->orWhere('member3_id', '=', $nim)
            ->orWhere('member4_id', '=', $nim); 
        })
        ->WhereHas('proposal', function($q) use ($nim) { 
            $q->where('status', '=', "DISBURSEDFUND");            
        })                        
        ->count();

         return response()->json([
                'disbursed' => $tim,                
                'done' => $team,
            ], 200);
    }

    public function getAll(){
        $lecturer = Lecturer::with('department')->get();

        return $lecturer;
    }

    public function addMentor(Request $request){
        $nip = $request->input('nip');
        $name = $request->input('name');      
        $dpt = $request->input('dpt');

        $front_name = explode(" ",$name);        
        $email = strtolower($front_name[0])."@polban.ac.id";

        $password = "123456"; 

        try {
            $user = new User;

            $user->email = $email;         
            $user->password = Hash::make($password);
            $user->role = 2;
            $user->save();            
            
        } catch (\Exception $e) {            
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }      

        $lct = new Lecturer;    

        $lct->nip = $nip;
        $lct->name = $name;        
        $lct->department_id = $dpt; 
        $lct->user_id = $user->id; 
        
        $lct->save();

        return response()->json([
            'succes' => true,   
            'lct' => $lct->name,            
        ], 200);    

    }

    public function deleteMentor(Request $request){
        $id = $request->input('id');      
        $org = Lecturer::find($id);

        $user_id = $org->user_id;
        $org->delete();

        $user = User::find($user_id);
        $user->delete();

        return response()->json([
            'succes' => true,               
        ], 200);    
    }

    public function updateMentor(Request $request){
        $id = $request->input('id');      
        $dpt = Lecturer::find($id);
        
        $dpt->name = $request->input('name');      
        $dpt->nip = $request->input('nip');
        $dpt->department_id = $request->input('dpt');

        $dpt->save();

        return response()->json([
            'succes' => true,               
        ], 200);        
    }
}
