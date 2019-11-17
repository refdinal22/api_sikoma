<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Team;
use App\Proposal;
use Carbon\Carbon;

class MahasiswaController extends Controller
{
    public function proposal(Request $request){

        $this->validate($request, [
            'proposal' => 'required',            
        ]); 

        //Membuat Objek Proposal
        $proposal = new Proposal;

        $proposal->competition_id = $request->input('competition');
        $proposal->department_id = $request->input('department');
        $proposal->draft_budget = $request->input('draftbudget');
        $proposal->summary = $request->input('summary');
        $proposal->proposal = $request->input('proposal');
        $proposal->status = "PENDING";

        $proposal->save();

        return response()->json([
            'succes' => true,
            'id_proposal' => $proposal->id,
        ], 200); 
        
    }

    public function team(Request $request){
        $team = new Team;    
        $team->leader_id = $request->input('leader');
        $team->member1_id = $request->input('member1');
        $team->member2_id = $request->input('member2');
        $team->member3_id = $request->input('member3');
        $team->member4_id = $request->input('member4');
        $team->mentor_id = $request->input('mentor');
        $team->proposal_id = $request->input('proposal');
        $team->competition_cat = $request->input('competition');
        // $team->competition_cat = "ICPC";
        $team->save();

        return response()->json([
            'succes' => true,                
        ], 200); 
    }

    public function onGoingProposal(Request $request){
        $nim = $request->input('nim');
        // return $nim;
        $team = Team::where('leader_id', '=', $nim)
        ->WhereHas('proposal', function($q) use ($nim) { 
            $q->where('status', '=', "PENDING")
            ->orWhere('status', '=', "REVISION")
            ->orWhere('status', '=', "WAITFUND")
            ->orWhere('status', '=', "DISBURSEDFUND")
            ->orWhere('status', '=', "WAITREPORT"); 
        })
        ->orWhere(function($q) use ($nim) { 
            $q->where('member1_id', '=', $nim)
            ->orWhere('member2_id', '=', $nim)
            ->orWhere('member3_id', '=', $nim)
            ->orWhere('member4_id', '=', $nim); 
        })
        ->WhereHas('proposal', function($q) use ($nim) { 
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
        $nim = $request->input('nim');        
        $team = Team::where('leader_id', '=', $nim)
        ->WhereHas('proposal', function($q) use ($nim) { 
            $q->where('status', '=', "REJECTED")
            ->orWhere('status', '=', "DONE")
            ->with('revision'); 
        })
        ->orWhere(function($q) use ($nim) { 
            $q->where('member1_id', '=', $nim)
            ->orWhere('member2_id', '=', $nim)
            ->orWhere('member3_id', '=', $nim)
            ->orWhere('member4_id', '=', $nim); 
        })
        ->WhereHas('proposal', function($q) use ($nim) { 
            $q->where('status', '=', "REJECTED")
            ->orWhere('status', '=', "DONE")
            ->with('revision'); 
        })        
        ->with('proposal')
        ->get();

        $data = $team->toArray();

        $index = 0;
        foreach ($team as $t) {
            $data[$index]['competition'] = $t->proposal->competition;
            $index++;
        }

        return $data;        
    }

    public function getReport(Request $request){
         $department = $request->input('department');        

          $proposal = Proposal::where('department_id', '=', $department)
          ->where('accountability_report', '=', 0)->get();

          // return $proposal;
          if($proposal->count() > 0 ){
            return response()->json([
                'status' => $proposal->first()->accountability_report,                
            ], 200); 
          }
          else{
            return response()->json([
                'status' => 1,                
            ], 200);
          }   
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
