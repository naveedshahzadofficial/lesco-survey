<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ {
    AdminController,
    PermissionController,
    PostController,
    ProfileController,
    RemoveRoleFromUserController,
    RevokePermissionFromRoleController,
    RevokePermissionFromUserController,
    RoleController,
    UserController,
    SectionController,
    QuestionController,
    SurveyController,
};
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
    return Inertia::render('Auth/Register');
});



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/users', UserController::class);
Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);
Route::resource('/posts', PostController::class);
Route::resource('/sections', SectionController::class);
Route::delete('/questions/{question}/options/{option}', [QuestionController::class, 'destroyOption'])
    ->name('questions.options.destroy');

Route::resource('/questions', QuestionController::class);
Route::delete('/roles/{role}/permissions/{permission}', RevokePermissionFromRoleController::class)
    ->name('roles.permissions.destroy');
Route::delete('/users/{user}/permissions/{permission}', RevokePermissionFromUserController::class)
    ->name('users.permissions.destroy');
Route::delete('/users/{user}/roles/{role}', RemoveRoleFromUserController::class)
    ->name('users.roles.destroy');

Route::middleware('auth')->group(function () {

    Route::get('/survey', [SurveyController::class, 'index'])->name('survey');
    Route::post('/survey', [SurveyController::class, 'store'])->name('survey.store');
    Route::get('/thank-you', [SurveyController::class, 'thank_you'])->name('thank-you');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

require __DIR__.'/auth.php';
