<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\Instructor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ControllerForDashboard extends Controller
{
    public function index(){
        $users = User::all();
            if (Auth::check() && Auth::user()->type === 'admin') { 
                return Inertia::render('admin/Dashboard', [
                'allUsers' => $users
            ]); 
            }
            else if (Auth::check() && Auth::user()->type === 'superadmin') { 
                return Inertia::render('superadmin/Dashboard', [
                'allUsers' => $users
            ]); 
            }
            else if (Auth::check() && Auth::user()->type === 'instructor') { 
                return Inertia::render('instructor/Dashboard', [
                'allUsers' => $users
            ]); 
            }
            else if (Auth::check() && Auth::user()->type === 'student') {
                $user = User::find(Auth::user()->id);
                $data2 = Student::find(Auth::user()->id);

                $data = [
                    'data1' => $user,
                    'data2' => $data2
                ];
                return Inertia::render('student/Dashboard', [
                    'id' => Auth::user()->id,
                    'user' => $data
                ]); 
            }
            $user = User::find(Auth::user()->id);
            return Inertia::render('Dashboard', [
                'user' => $user,
            ]);

           
    }
    public function addStudent(){
        return Inertia::render('bothAdminAndSuperAdmin/AddStudent');
    }
    public function addInstructor(){
        return Inertia::render('bothAdminAndSuperAdmin/AddInstructor');
    }
    public function addStudentPost(Request $request){
       $validate = $request->validate([
            "first_name" => "required|string:max:255",
            "middle_name" => "required|string:max:255",
            "last_name" => "required|string:max:255",
            "date_of_birth" => "required|date",
            "gender" => "required|string:max:255", 
            "phone_number" => "required|string:max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|string:max:255",
            "enrollment_status" => "required|string:max:255",
            "gpa" => "required|string:max:255",
            "student_year" => "required|string:max:255",
            "type" => "required|string:max:255"
        ]);

        $user = User::create([
            'name' => $validate['first_name'] . ' ' . $validate['last_name'] . ' ' . $validate['middle_name'],
            'email' => $validate['email'],
            'type' => 'student',
            'password' => Hash::make($validate['password']),
        ]);

        $student = Student::create([
            'id' => $user->id,
            'date_of_birth' => $validate['date_of_birth'],
            'gender' => $validate['gender'],
            'phone_number' => $validate['phone_number'],
            'enrollment_status' => $validate['enrollment_status'],
            'gpa' => $validate['gpa'],

        ]);
        
    }

    // For Instructor 
    public function addInstructorPost(Request $request){
        $validate = $request->validate([
             "first_name" => "required|string:max:255",
             "middle_name" => "required|string:max:255",
             "last_name" => "required|string:max:255",
             "date_of_birth" => "required|date",
             "gender" => "required|string:max:255", 
             "phone_number" => "required|string:max:255",
             "email" => "required|email|unique:users,email",
             "password" => "required|string:max:255",
             "type" => "required|string:max:255"
         ]);
         
         $instructor = User::create([
             'name' => $validate['first_name'] . ' ' . $validate['last_name'] . ' ' . $validate['middle_name'],
             'email' => $validate['email'],
             'type' => 'student',
             'password' => Hash::make($validate['password']),
         ]);
 
            Instructor::create([
             'id' => $instructor->id,
             'date_of_birth' => $validate['date_of_birth'],
             'gender' => $validate['gender'],
             'phone_number' => $validate['phone_number'],
 
         ]);
         
     }

    public function viewUsers($id){
        $user = User::find($id);
        return Inertia::render('bothAdminAndSuperAdmin/ViewUser', [
            'user' => $user
        ]);
    }

    public function updateUser(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);
        $user = User::find($id);
        $user->update($request->only('name', 'email'));
        return Inertia::render('bothAdminAndSuperAdmin/ViewUser', [
            'user' => $user
        ]);
    }

    // super admin 
    public function addAdmin(){
        return Inertia::render('superadmin/AddAdmin');
    }

    public function addAdminPost(Request $request){
        $validate = $request->validate([
             "first_name" => "required|string:max:255",
             "middle_name" => "required|string:max:255",
             "last_name" => "required|string:max:255",
             "date_of_birth" => "required|date",
             "gender" => "required|string:max:255", 
             "phone_number" => "required|string:max:255",
             "email" => "required|email|unique:users,email",
             "password" => "required|string:max:255",
             "type" => "required|string:max:255"
         ]);
         
         $admin = User::create([
             'name' => $validate['first_name'] . ' ' . $validate['last_name'] . ' ' . $validate['middle_name'],
             'email' => $validate['email'],
             'type' => 'admin',
             'password' => Hash::make($validate['password']),
         ]);
 
            AdminModel::create([
             'id' => $admin->id,
             'date_of_birth' => $validate['date_of_birth'],
             'gender' => $validate['gender'],
             'phone_number' => $validate['phone_number'],
 
         ]);
         
     }


}
