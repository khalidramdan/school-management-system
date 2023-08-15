<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
class Grade extends Model 
{
    use HasTranslations;
    
    public $translatable = ['Name'];
    protected $table = 'Grades';
    protected $fillable = ['Name','Notes'];
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

}