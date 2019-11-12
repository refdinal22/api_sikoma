<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Department extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'tbm_department';

    protected $fillable = [
        'name'
    ];
    
}
