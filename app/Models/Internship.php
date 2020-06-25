<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $guarded = [];
    protected $fillable = ['title','seminar_date','seminar_time','grade'];
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
    public function audience()
    {
        return $this->hasMany(InternshipAudience::class, 'internship_id', 'id');
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'advisor_id', 'id');
    }

    static $validation_rules = [
        'title' => 'required',
        'seminar_date' => 'required|date',
        'seminar_time' => 'required',
        'grade' => 'required|min:5|max:400',
    ];

   
}