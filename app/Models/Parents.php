<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Parents extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guard = [];
    public $translatable  = ['father_name','father_job','mother_name','mother_job'];
}
