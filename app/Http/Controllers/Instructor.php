<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Instructor extends Controller
{
    public function addSubjects(){
        return Inertia::render('instructor/AddSubjects');
    }
    public function addSubjectsPost(Request $request){
        $request->validate([
            'subject_name' => 'required|string|max:255'
        ]);
        SubjectModel::create([
            'subject_name' => $request->subject_name,
        ] );

    }
    public function viewSubjects(){
        $subjects = SubjectModel::all();
        return Inertia::render('instructor/ViewSubjects', [
            'subjects' => $subjects
        ]);
    }
}
