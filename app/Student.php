<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Student extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbm_students';
    protected $fillable = [
        'nim', 'user_id', 'name', 'year', 'study_programme_id', 'email'
    ];
    
}