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

    public function deleteSubject($id){
        $sub = SubjectModel::all();
        $subject = SubjectModel::find($id);
        $subject->delete($id);

        // return Inertia::render('instructor/ViewSubjects', [
        //     'subjects' => $sub
        // ]);

        return redirect()->route('view.subjects');

    }

    public function editSubjects(Request $request, $id) {
        // Fetch the subject by ID
        $subject = SubjectModel::find($id);
    
        // Check if the subject exists
        if (!$subject) {
            return back()->with('error', 'Subject not found.');
        }
    
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        // Update the subject with the new name
        $subject->update([
            'subject_name' => $request->name,
        ]);
    
        // Redirect back with a success message
        return back()->with('success', 'Subject updated successfully.');
    }
    
    
}
