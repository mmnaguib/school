<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable = ['name', 'notes'];
    public $translatable  = ['name', 'notes'];

    public function Sections() {
        return $this->hasMany(Section::class, 'grade_id');
    }
}
