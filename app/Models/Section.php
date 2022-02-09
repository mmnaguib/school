<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;
class Section extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable  = ['section_name', 'grade_id','class_id','status'];
    public $translatable  = ['section_name'];

    public function classes() {
        return $this->belongsTo('App\models\class_room', 'class_id');
    }
}
