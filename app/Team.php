<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Team extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbm_teams';
    protected $fillable = [
        'leader_id', 'member1_id', 'member2_id', 'member3_id', 'member4_id', 'mentor_id', 'proposal_id', 'ranking', 'competition_cat'
    ];
    
}
