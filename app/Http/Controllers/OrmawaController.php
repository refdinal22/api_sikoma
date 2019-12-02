<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Team;
use App\Proposal;
use App\Organization;
use App\RevisionNotes;
use App\Student;
use Carbon\Carbon;

class OrmawaController extends Controller
{
    public function proposal(Request $request){

        $this->validate($request, [
            'proposal' => 'required',            
        ]); 

        //Membuat Objek Proposal
        $proposal = new Proposal;

        $proposal->competition_id = $request->input('competition');
        $proposal->organization_id = $request->input('organization');
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
        $id = $request->input('id');
        $data = Proposal::where('organization_id', '=', $id)
        ->Where(function($q) use ($id) { 
            $q->where('status', '=', "PENDING")
            ->orWhere('status', '=', "REVISION")
            ->orWhere('status', '=', "WAITFUND")
            ->orWhere('status', '=', "DISBURSEDFUND")
            ->orWhere('status', '=', "WAITREPORT"); 
        })
        ->with('competition')->get();

        $proposal = $data->toArray();
        $index = 0;

        foreach ($data as $pr) {
            $listTeam = $pr->Team;
            $indexTeam = 0;
            $leaderName ;

            foreach ($listTeam as $team) {
                $leaderName[$indexTeam] = Student::find($team->leader_id)->name;
                $indexTeam++;
            }
            $proposal[$index]['revision'] = $pr->revision;
            $proposal[$index]['team'] = $leaderName;
            $index++;
        }

        return $proposal;        
        // return $nim;
        // $team = Team::where('leader_id', '=', $nim)
        // ->WhereHas('proposal', function($q) use ($nim) { 
        //     $q->where('status', '=', "PENDING")
        //     ->orWhere('status', '=', "REVISION")
        //     ->orWhere('status', '=', "WAITFUND")
        //     ->orWhere('status', '=', "DISBURSEDFUND")
        //     ->orWhere('status', '=', "WAITREPORT"); 
        // })
        // ->orWhere(function($q) use ($nim) { 
        //     $q->where('member1_id', '=', $nim)
        //     ->orWhere('member2_id', '=', $nim)
        //     ->orWhere('member3_id', '=', $nim)
        //     ->orWhere('member4_id', '=', $nim); 
        // })
        // ->WhereHas('proposal', function($q) use ($nim) { 
        //     $q->where('status', '=', "PENDING")
        //     ->orWhere('status', '=', "REVISION")
        //     ->orWhere('status', '=', "WAITFUND")
        //     ->orWhere('status', '=', "DISBURSEDFUND")
        //     ->orWhere('status', '=', "WAITREPORT"); 
        // })        
        // ->with('proposal')
        // ->get();
        
        // $data = $team->toArray();

        // $index = 0;
        // foreach ($team as $t) {
        //     $data[$index]['revision'] = $t->proposal->revision;
        //     $data[$index]['competition'] = $t->proposal->competition;
        //     $index++;
        // }

        return $data;        
    }

    public function finishedProposal(Request $request){        
        $id = $request->input('id');

        $data = Proposal::where('organization_id', '=', $id)
        ->Where(function($q) use ($id) { 
            $q->where('status', '=', "REJECTED")
            ->orWhere('status', '=', "DONE");
        })
        ->with('competition')
        ->select('tbr_proposals.*', \DB::raw('(SELECT year FROM tbm_competitions WHERE tbr_proposals.competition_id = tbm_competitions.id ) as sort'))
        ->orderBy('sort')
        ->get();

        $proposal = $data->toArray();
        $index = 0;

        foreach ($data as $pr) {
            $listTeam = $pr->Team;
            $indexTeam = 0;
            $leaderName ;

            foreach ($listTeam as $team) {
                $leaderName[$indexTeam] = Student::find($team->leader_id)->name;
                $indexTeam++;
            }

            $proposal[$index]['team'] = $leaderName;
            $index++;
        }

        return $proposal;        
    }

    public function getReport(Request $request){
         $department = $request->input('department');        

          $proposal = Proposal::where('organization_id', '=', $department)
          ->where('accountability_report', '=', 0)->get();

          // return $proposal;
          if($proposal->count() > 2 ){
            return response()->json([
                'status' => 0,                
            ], 200); 
          }
          else{
            return response()->json([
                'status' => 1,                
            ], 200);
          }   
    }

    public function Dashboard(Request $request){
        $id = $request->input('id');        

        $proposalDone = Proposal::where('organization_id', '=', $id)
        ->where('status', '=', "DONE")        
        ->count();

        $proposalRevision = Proposal::where('organization_id', '=', $id)
        ->where('status', '=', "REVISION")
        ->count();

        $proposalDisbursed = Proposal::where('organization_id', '=', $id)
        ->where('status', '=', "DISBURSEDFUND")
        ->count();

        $proposalWaitReport = Proposal::where('organization_id', '=', $id)
        ->where('status', '=', "WAITREPORT")
        ->count();


        // $tim = Team::where('leader_id', '=', $nim)
        // ->WhereHas('proposal', function($q) use ($nim) { 
        //     $q->where('status', '=', "DISBURSEDFUND");            
        // })        
        // ->orWhere(function($q) use ($nim) { 
        //     $q->where('member1_id', '=', $nim)
        //     ->orWhere('member2_id', '=', $nim)
        //     ->orWhere('member3_id', '=', $nim)
        //     ->orWhere('member4_id', '=', $nim); 
        // })
        // ->WhereHas('proposal', function($q) use ($nim) { 
        //     $q->where('status', '=', "DISBURSEDFUND");            
        // })                        
        // ->count();

         return response()->json([
                'done' => $proposalDone,                
                'revision' => $proposalRevision,
                'disbursed' => $proposalDisbursed,
                'waitreport' => $proposalWaitReport,                            
            ], 200);
    }

    public function getProposal(Request $request){
        $idprop = $request->input('id');

        
        $proposal = Proposal::find($idprop);
        $competition = $proposal->competition;
        $dpt = $proposal->department;
        
        return $proposal;
    }

    public function updateRevision(Request $request){
        $idProposal = $request->input('id');
        //update proposal
        $proposal = Proposal::find($idProposal)->revision; 
        $revisi = sizeof($proposal);

        $revision = RevisionNotes::find($proposal[$revisi-1]->id);

        $revision->status = 1;

        $revision->save();

        return response()->json([
            'message' => 'sukses',                
                
        ], 200);
    }
    public function getAll(){
        $ormawa = Organization::all();

        return $ormawa;
    }

    public function addOrmawa(Request $request){
        $name = $request->input('name');      
        $acr = $request->input('acr');

        $email = strtolower($acr)."@polban.ac.id";
        $password = "123456"; 

        try {
            $user = new User;

            $user->email = $email;         
            $user->password = Hash::make($password);
            $user->role = 1;
            $user->save();            
            
        } catch (\Exception $e) {            
            return response()->json(['message' => 'User Registration Failed!'], 409);
        }      

        $dpt = new Organization;    

        $dpt->name = $name;        
        $dpt->acronym = $acr; 
        $dpt->user_id = $user->id; 
        
        $dpt->save();

        return response()->json([
            'succes' => true,   
            'cmpt' => $dpt->name,            
        ], 200);    

    }

    public function deleteOrmawa(Request $request){
        $id = $request->input('id');      
        $org = Organization::find($id);

        $user_id = $org->user_id;
        $org->delete();

        $user = User::find($user_id);
        $user->delete();

        return response()->json([
            'succes' => true,               
        ], 200);    
    }

    public function updateOrmawa(Request $request){
        $id = $request->input('id');      
        $dpt = Organization::find($id);
        
        $dpt->name = $request->input('name');      
        $dpt->acronym = $request->input('acr');
        $dpt->save();

        return response()->json([
            'succes' => true,               
        ], 200);        
    }

}

