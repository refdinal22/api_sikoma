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

    public function getProposal(Request $request){

        $nim = $request->input('nim');
        // return $nim;
        $team = Team::where('leader_id', 'LIKE', '%' . $nim .'%')
        ->orWhere('member1_id', 'LIKE', '%' . $nim .'%')
        ->orWhere('member2_id', 'LIKE', '%' . $nim .'%')
        ->orWhere('member3_id', 'LIKE', '%' . $nim .'%')
        ->orWhere('member4_id', 'LIKE', '%' . $nim .'%')
        ->get();

        // return $team[0]->proposal_id;

        $proposal = Proposal::find($team[0]->proposal_id);

        return $proposal;
        // Team::where(function ($query) {
        //     $query->where('leader_id', 'LIKE', '%'.$nim.'%')
        //     ->orWhere('member1_id', 'LIKE', '%'.$nim.'%');})->get();
            // ->orWhere('member2_id', 'LIKE', '%'.$nim.'%')
            // ->orWhere('member3_id', 'LIKE', '%'.$nim.'%')
            // ->orWhere('member4_id', 'LIKE', '%'.$nim.'%');});
        // })->where(function ($query) {
        //     $query->where('member2_id', 'LIKE', '%'.$nim.'%')
        //     ->orWhere('member3_id', 'LIKE', '%'.$nim.'%');
        // });

        // Team::where('leader_id', 'LIKE', '%'.$nim.'%')        
        // ->orWhereHas('memeber1_id', function($q) use ($keyword) { 
        //     $q->where('memeber1_id', 'LIKE', '%' . $keyword . '%'); 
        // })
        // ->orWhereHas('memeber1_id', function($q) use ($keyword) { 
        //     $q->where('cuisineName', 'LIKE', '%' . $keyword . '%'); 
        // })
        // ->orWhereHas('memeber1_id', function($q) use ($keyword) { 
        //     $q->where('cuisineName', 'LIKE', '%' . $keyword . '%'); 
        // })
        // ->orWhereHas('memeber1_id', function($q) use ($keyword) { 
        //     $q->where('cuisineName', 'LIKE', '%' . $keyword . '%'); 
        // })
        
        // ->get();



    }
}
