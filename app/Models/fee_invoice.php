<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fee_invoice extends Model
{
    use HasFactory;

    public function grades() {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classrooms() {
        return $this->belongsTo(class_room::class, 'classroom_id');
    }
    public function sections() {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function students() {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function fees() {
        return $this->belongsTo(Fee::class, 'fee_id');
    }
}
