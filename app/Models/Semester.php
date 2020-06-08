<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    //
    public function classroom()
    {
        return $this->hasMany(Classroom::class, 'semester_id', 'id');
    }
    public function student_semester()
    {
        return $this->hasMany(StudentSemester::class, 'semester_id', 'id');
    }
}
