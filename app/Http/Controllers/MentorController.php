<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Team;
use App\Proposal;
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
}
