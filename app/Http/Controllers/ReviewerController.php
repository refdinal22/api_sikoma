<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Team;
use App\Proposal;
use App\Student;
use App\RevisionNotes;
use Carbon\Carbon;

class ReviewerController extends Controller
{
    public function review(){
        
    }

    public function onGoingProposals(){
    	$proposals = Proposal::where('status', '=', "PENDING")    	
    	->with('competition')
    	->with('organization')->get();
        
        $data = $proposals->toArray();
        
        $index = 0;

        foreach ($proposals as $pr) {
            $listTeam = $pr->Team;
            $indexTeam = 0;
            $leaderName;

            foreach ($listTeam as $team) {
                $leaderName[$indexTeam] = Student::find($team->leader_id)->name;
                $indexTeam++;
            }
            
            $data[$index]['team'] = $leaderName;
            $index++;
        }
        
        return $data;
    }

    public function revisionProposals(){
    	$proposals = Proposal::where('status', '=', "REVISION")     
        ->with('competition')
        ->with('organization')
        ->with('revision')
        ->get();

        $data = $proposals->toArray();
        
        $index = 0;

        foreach ($proposals as $pr) {
            $listTeam = $pr->Team;
            $indexTeam = 0;
            $leaderName;

            foreach ($listTeam as $team) {
                $leaderName[$indexTeam] = Student::find($team->leader_id)->name;
                $indexTeam++;
            }
            
            $data[$index]['team'] = $leaderName;
            $index++;
        }
        



    	return $data;
    }

    public function ReviewProposal(Request $request){
    	$idProposal = $request->input('proposal');
    	//update proposal
    	$proposal = Proposal::find($idProposal);

		$proposal->status = $request->input('status');	

		if($request->input('status') == "REJECTED"){
			$proposal->accountability_report = 1;	
		}	
        if($request->input('status') == "WAITFUND"){
            $proposal->realisazion_budget = $request->input('dana');
            $proposal->budget_source = $request->input('sumber');
        }
		        
		$proposal->save();

		//add revision note
		if($request->input('status') == "REVISION"){
			$note = new RevisionNotes;
			$note->proposal_id = $idProposal;
			$note->budget_notes = $request->input('rab');
			$note->content_notes = $request->input('konten');
			$note->status = 0;

			$note->save();
		}

		return response()->json([
            'succes' => true,
            'id_note' => $note->id,
        ], 200); 

    }
}
