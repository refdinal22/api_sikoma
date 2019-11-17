<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Lecturer extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbm_lecturers';
    protected $fillable = [
        'nip', 'name', 'user_id', 'department_id'
    ];


    public function user(){
    	return $this->belongsTo('App\User');
    }
    
}