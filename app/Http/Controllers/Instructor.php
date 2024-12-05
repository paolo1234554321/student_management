<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class Instructor extends Controller
{
    public function addSubjects(){
        return Inertia::render('instructor/AddSubjects');
    }
}
