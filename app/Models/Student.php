<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Student extends Model
{
    use HasFactory;

    // Add governorate_id to the fillable array
    protected $fillable = [
        'name',
        'email',
        'phone',
        'gander', // Consider correcting to 'gender'
        'seatnum',
        'dateofbirth',
        'nationalid',
        'address',
        'grade',
        'student_photo',
        'national_img',
        'governorate_id',
        'programrequirement_id',
        'finaldesire_id',
        'user_id'  // Add this line
    ];

    // Define relationship with Facility (faculity)
    public function faculity()
    {
        return $this->belongsToMany(Facility::class, 'student_faculity');
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with ProgramRequirement
    public function programrequirement()
    {
        return $this->belongsTo(ProgramRequirement::class, 'programrequirement_id');
    }

    // Relationship with Governorate
    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id');
    }
    public function final()
    {
        return $this->belongsTo(Facility::class, 'finaldesire_id');
    }
}
