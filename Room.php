<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    const VALIDATION_RULES = [
        'name' => 'required',
        'floor' => 'nullable|integer',
        'number' => 'nullable|integer'
    ];

    protected $table = 'rooms';
    protected $guarded = [];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
     public function internship()
    {
        return $this->hasMany(Internship::class);
    }   

}
