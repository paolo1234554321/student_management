<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'id',
        'date_of_birth',
        'gender',
        'phone_number',
        'enrollment_status',
        'gpa',
        'grades_by_subject'
    ];
}
