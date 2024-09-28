<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =
        [
            'name',
            'availableno',
            'maxavailableno',
            'minratio',
            'faculityminratio',
            'programrequirement_id'
        ];
    public function student()
    {
        return $this->belongsToMany(Student::class, 'student_faculity');
    }

    public function programrequirement()
    {
        return $this->belongsTo(ProgramRequirement::class, 'programrequirement_id');
    }
    public function final()
    {
        return $this->hasOne(Student::class, 'finaldesire_id');
    }

}
