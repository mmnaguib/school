<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function class_room() {
        return $this->belongsTo(class_room::class, 'classroom_id');
    }
    public function section() {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function Sections() {
        return $this->hasMany(Section::class, 'grade_id');
    }
}
