<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SProgram extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbm_study_programme';

    protected $fillable = [
        'name', 'department_id'
    ];

    public function department(){
    	return $this->belongsTo('App\Department');
    }
    
}
