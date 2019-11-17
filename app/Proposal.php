<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbr_proposals';
    protected $fillable = [
        'competition_id', 'department_id', 'reviewer_id', 'summary', 'status', 'accountability_report', 'draft_budget', 'realization_budget', 'proposal', 'budget_source'
    ];

    public Function Team(){
    	return $this->hasMany('App\Team');
    }

    public function competition(){
    	return $this->belongsTo('App\Competition');
    }

    public Function revision(){
    	return $this->hasMany('App\RevisionNotes');
    }

    public function department(){
    	return $this->belongsTo('App\Department');
    }

}
