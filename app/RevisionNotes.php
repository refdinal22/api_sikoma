<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class RevisionNotes extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbm_revision_notes';
    protected $fillable = [
        'proposal_id', 'budget_notes', 'content_notes', 'du_date', 'status'
    ];

    public function proposal(){
    	return $this->belongsTo('App\Proposal');
    }
    
}
