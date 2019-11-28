<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Organization extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbm_organization';
    protected $fillable = [ 
        'user_id', 'name', 'acronym'
    ];


    public function user(){
    	return $this->belongsTo('App\User');
    }
    
}