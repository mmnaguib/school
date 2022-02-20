<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Translatable\HasTranslations;
class Student extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded=[];

    public function genders() {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
    public function grades() {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classrooms() {
        return $this->belongsTo(class_room::class, 'classroom_id');
    }
    public function sections() {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function parents() {
        return $this->belongsTo(Parents::class, 'parent_id');
    }

    public function nationalities() {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }
    public function bloods() {
        return $this->belongsTo(BloodType::class, 'blood_id');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
