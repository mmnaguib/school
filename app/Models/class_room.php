<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_room extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function grade(){
        return $this->belongsTo(Grade::class);
    }
}
