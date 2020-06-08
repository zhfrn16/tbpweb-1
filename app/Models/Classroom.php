<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    public function classlecturer()
    {
        return $this->hasMany(ClassLecturer::class, 'classroom_id', 'id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }
}
