<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ControllerForDashboard;
use App\Http\Controllers\Instructor;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [ControllerForDashboard::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// Both admin and super admin can do 
Route::get('/add-student-route', [ControllerForDashboard::class, 'addStudent'])->name('add.addStudent');
Route::post('/add-student-post', [ControllerForDashboard::class, 'addStudentPost'])->name('add.addStudentPost');
Route::get('/add-instructor', [ControllerForDashboard::class, 'addInstructor'])->name('add.addInstructor');
Route::post('/add-instructor', [ControllerForDashboard::class, 'addInstructorPost'])->name('add.addInstructorPost');
Route::get('view-users/{id}', [ControllerForDashboard::class, 'viewUsers'])->name('viewUsers');
Route::get('view-users-as-super-admin/{id}', [ControllerForDashboard::class, 'viewUsersAsSuperAdmin'])->name('viewUsersAsSuperAdmin');
Route::put('update-user/{id}', [ControllerForDashboard::class, 'updateUser'])->name('user.update');
Route::delete('/delete-user/{id}', [ControllerForDashboard::class, 'deleteUser'])->name('deleteUser');

// superadmin 
Route::get('/add-admin', [ControllerForDashboard::class, 'addAdmin'])->name('add.addAdmin');
Route::post('/add-student', [ControllerForDashboard::class, 'addAdminPost'])->name('add.addAdminPost');



//instructor
Route::get('/add-subjects', [Instructor::class, 'addSubjects'])->name('add.addSubjects');
Route::post('/add-subjects', [Instructor::class, 'addSubjectsPost'])->name('subject.add');
Route::get('/view-subjects', [Instructor::class, 'viewSubjects'])->name('view.subjects');
Route::delete('/delete-subjects/{id}', [Instructor::class, 'deleteSubject'])->name('delete.subjects');
Route::put('/edit-subjects/{id}', [Instructor::class, 'editSubjects'])->name('edit.subjects');
// Route::post('/add-subjects', [Instructor::class, 'addSubjectsPost'])->name('subject.add');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
