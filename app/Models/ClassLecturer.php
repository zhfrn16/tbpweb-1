<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassLecturer extends Model
{
    //
    public function lecturer()
    {
    return $this->belongsTo(Lecturer::class, 'lecturer_id', 'id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    }
}


