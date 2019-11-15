<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Competition;

class CompetitionController extends Controller
{
    public function getAll(){
        $cmpt = Competition::all();

        return $cmpt;
    }

    public function addCompetition(Request $request){
    	$date = $request->input('estart');    	
    	$year = substr($date, 0, 4);

        $cmpt = new Competition;    

        $cmpt->name = $request->input('name');
        $cmpt->institute = $request->input('inst');
        $cmpt->location = $request->input('location');
        $cmpt->competition_level_id = $request->input('cmpt_level');
        $cmpt->year = $year;
        $cmpt->regist_closedate = $request->input('rclose');
        $cmpt->regist_opendate = $request->input('ropen');
        $cmpt->event_startdate = $request->input('estart');
        $cmpt->event_enddate = $request->input('eend');
        
        $cmpt->save();

        return response()->json([
            'succes' => true,   
            'cmpt' => $cmpt->year,            
        ], 200); 	

        
    }
}
