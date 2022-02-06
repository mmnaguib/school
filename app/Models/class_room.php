<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;
class class_room extends Model
{
    use HasFactory;

    use HasTranslations;
    protected $fillable = ['classroom_name','grade_id'];
    public $translatable  = ['classroom_name'];

    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
}
