<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternshipAgency extends Model
{
    public function proposal()
    {
        return $this->hasMany(InternshipAgency::class, 'agency_id','id');
    }
}
