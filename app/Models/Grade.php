<?php

namespace grade;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model 
{

    protected $table = 'Grades';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}