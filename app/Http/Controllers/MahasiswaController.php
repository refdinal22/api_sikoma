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
        
        //get Proposal file
        $comp_id = $request->input('competition');
        $file = $request->file('proposal');
        $proposal_folder = "proposals";
         
        $extension = $file->getClientOriginalExtension();
        $tanggal = Carbon::now()->format('dMY');
        $proposal_name = "Proposal".$comp_id.$tanggal.".".$extension;

        //Upload
        $file->move($proposal_folder, $proposal_name);

        //Membuat Objek Proposal
        $proposal = new Proposal;

        $proposal->competition_id = $request->input('competition');
        $proposal->department_id = $request->input('department');
        $proposal->draft_budget = $request->input('draftbudget');
        $proposal->summary = $request->input('summary');
        $proposal->proposal = $proposal_name;
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

        $team->save();

        return response()->json([
            'succes' => true,            
        ], 200); 
    }
}
