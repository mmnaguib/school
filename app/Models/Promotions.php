<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function students() {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function gradesFrom() {
        return $this->belongsTo(Grade::class, 'from_grade');
    }
    public function classroomsFrom() {
        return $this->belongsTo(class_room::class, 'from_classroom');
    }
    public function sectionsFrom() {
        return $this->belongsTo(Section::class, 'from_section');
    }
    public function gradesTo() {
        return $this->belongsTo(Grade::class, 'to_grade');
    }
    public function classroomsTo() {
        return $this->belongsTo(class_room::class, 'to_classroom');
    }
    public function sectionsTo() {
        return $this->belongsTo(Section::class, 'to_section');
    }
}
