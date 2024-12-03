<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $table = 'instructors';
    protected $fillable = [
        'id',
        'phone_number',
        'date_of_birth',
        'gender'
    ];
}
