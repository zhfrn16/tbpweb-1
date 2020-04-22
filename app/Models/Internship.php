<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    public function proposal()
    {
        return $this->belongsTo(InternshipProposal::class, 'internship_proposal_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
