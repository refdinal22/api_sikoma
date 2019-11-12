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
}
