<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Fee extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = ['name','grade_id','classroom_id','amount','academic_year'];
    public $translatable = ['name'];

    public function grades() {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classrooms() {
        return $this->belongsTo(class_room::class, 'classroom_id');
    }
}
