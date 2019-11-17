<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Competition extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbm_competitions';

    protected $fillable = [
        'name', 'institute','location', 'competition_level_id',
        'year', 'regist_closedate', 'regist_opendate', 'event_startdate',
        'event_enddate',
    ];

    public Function proposal(){
        return $this->hasMany('App\Proposal');
    }
    
}
