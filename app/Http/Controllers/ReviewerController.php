<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Team;
use App\Proposal;
use App\RevisionNotes;
use Carbon\Carbon;

class ReviewerController extends Controller
{
    public function review(){
        
    }

    public function onGoingProposals(){
    	$proposals = Proposal::where('status', '=', "PENDING")    	
    	->with('competition')
    	->with('department')->get();

    	return $proposals;
    }

    public function finishedProposals(){
    	$proposals = Proposal::where('status', '=', "ACCEPT")
    	->orWhere('status', '=', "REJECT")
    	->with('competition')->get();

    	return $proposals;
    }

    public function ReviewProposal(Request $request){
    	$idProposal = $request->input('proposal');
    	//update proposal
    	$proposal = Proposal::find($idProposal);
		$proposal->status = $request->input('status');	

		if($request->input('status') == "REJECTED"){
			$proposal->accountability_report = 1;	
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
