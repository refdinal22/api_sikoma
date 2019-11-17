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

class AdminController extends Controller
{
   public function newProposal(Request $request){
        $proposals = Proposal::where('status', '=', "PENDING")      
        ->with('competition')
        ->with('department')->get();
        
        $data = $proposals->toArray();
        
        $index = 0;
        foreach ($proposals as $p) {
             $idstudent = $p->Team->first()->leader_id;

            $data[$index]['profile'] = Student::where('nim', $idstudent)->first();
            $index++;
        }
        return $data;
    }

    public function revisionProposal(Request $request){
        $proposals = Proposal::where('status', '=', "REVISION")      
        ->with('competition')
        ->with('department')
        ->with('revision')->get();
        
        $data = $proposals->toArray();
        
        $index = 0;
        foreach ($proposals as $p) {
             $idstudent = $p->Team->first()->leader_id;

            $data[$index]['profile'] = Student::where('nim', $idstudent)->first();
            $index++;
        }
        return $data;
    }

    public function finishedProposal(Request $request){
     $proposals = Proposal::where('status', '=', "DONE")      
        ->with('competition')
        ->with('department')
        ->with('revision')->get();
        
        $data = $proposals->toArray();
        
        $index = 0;
        foreach ($proposals as $p) {
             $idstudent = $p->Team->first()->leader_id;

            $data[$index]['profile'] = Student::where('nim', $idstudent)->first();
            $index++;
        }
        return $data;
    
    }


    public function rejectedProposal(Request $request){
     $proposals = Proposal::where('status', '=', "REJECTED")      
        ->with('competition')
        ->with('department')
        ->with('revision')->get();
        
        $data = $proposals->toArray();
        
        $index = 0;
        foreach ($proposals as $p) {
             $idstudent = $p->Team->first()->leader_id;

            $data[$index]['profile'] = Student::where('nim', $idstudent)->first();
            $index++;
        }
        return $data;
    
    }

    public function reportedProposal(Request $request){
     $proposals = Proposal::where('status', '=', "WAITREPORT")      
        ->with('competition')
        ->with('department')
        ->with('revision')->get();
        
        $data = $proposals->toArray();
        
        $index = 0;
        foreach ($proposals as $p) {
             $idstudent = $p->Team->first()->leader_id;

            $data[$index]['profile'] = Student::where('nim', $idstudent)->first();
            $index++;
        }
        return $data;
    }

    public function updateReport(Request $request){
        $idProposal = $request->input('id');
        //update proposal
        $proposal = Proposal::find($idProposal); 
        $proposal->status = "DONE";
        $proposal->accountability_report = 1;
        $proposal->save();
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

    public function deadlineProposal(Request $request){
        $idProposal = $request->input('proposal');
        //update proposal
        $proposal = Proposal::find($idProposal)->revision; 
        $revisi = sizeof($proposal);

        $revision = RevisionNotes::find($proposal[$revisi-1]->id);

        $revision->due_date = $request->input('deadline');

        $revision->save();

        return response()->json([
                'message' => 'sukses',                
                
            ], 200);

    }
    public function fundProposal(){
        $proposals = Proposal::where('status', '=', "WAITFUND")      
        ->orWhere('status', '=', "DISBURSEDFUND")
        ->with('competition')
        ->with('department')
        ->with('revision')->get();
        
        $data = $proposals->toArray();
        
        $index = 0;
        foreach ($proposals as $p) {
             $idstudent = $p->Team->first()->leader_id;

            $data[$index]['profile'] = Student::where('nim', $idstudent)->first();
            $index++;
        }
        return $data;
    }

    public function updateFund(Request $request){
        $idProposal = $request->input('id');
        //update proposal
        $proposal = Proposal::find($idProposal); 
        $proposal->status = "DISBURSEDFUND";
        $proposal->accountability_report = 0;
        $proposal->save();
    }

    public function updateDisFund(Request $request){
        $idProposal = $request->input('id');
        //update proposal
        $proposal = Proposal::find($idProposal); 
        $proposal->status = "WAITREPORT";
        $proposal->accountability_report = 0;
        $proposal->save();
    }
}
