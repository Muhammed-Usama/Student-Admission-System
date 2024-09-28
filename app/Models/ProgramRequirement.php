<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramRequirement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function faculity()
    {
        return $this->hasOne(Facility::class, 'programrequirement_id');
    }
    public function student()
    {
        return $this->hasOne(Student::class, 'programrequirement_id');
    }

}
