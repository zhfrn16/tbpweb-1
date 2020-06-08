<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class StudentSemester extends Model
{
    //
    protected $table = 'student_semesters';
    protected $guarded = [];
    
    //
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
