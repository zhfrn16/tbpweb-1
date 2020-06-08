<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $guarded =[];

    public function proposal()
    {
        return $this->belongsTo(InternshipProposal::class, 'internship_proposal_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'seminar_room_id', 'id');
    }

    // public function logbooks()
    // {
    //     return $this->hasMany(InternshipLogbooks::class,'internship_id','id');
    // }
    
    // public function audience()
    // {
    //     return $this->belongTo(InternshipAudience::class,'internship_id','id');
    // }

}



