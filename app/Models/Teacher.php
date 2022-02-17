<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Teacher extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded = [];
    public $translatable = ['name'];

    public function sections() {
        return $this->belongsToMany(Section::class, 'teacher_sections');
    }

    public function specializations() {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }
    public function genders() {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
