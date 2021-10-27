<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubjectController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::group(['prefix' => 'subject', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/', [SubjectController::class, 'index'])->name('subject');
    Route::get('/regist', [SubjectController::class, 'regist'])->name('subject.regist');
    Route::get('/regist/{subjectId}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::get('/list', [SubjectController::class, 'list'])->name('subject.list');
    Route::get('/{subjectId}', [SubjectController::class, 'show'])->name('subject.show');
    Route::post('/', [SubjectController::class, 'create'])->name('subject.create');
    Route::delete('/{subjectId}', [SubjectController::class, 'destroy'])->name('subject.destroy');
    Route::patch('/{subjectId}', [SubjectController::class, 'update'])->name('subject.update');
});

Route::group(['prefix' => 'comment', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/{subjectId}', [CommentController::class, 'index'])->name('comment');
    Route::get('/{commentId}/edit', [CommentController::class, 'editForm'])->name('comment.edit');
    Route::post('/', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::patch('/', [CommentController::class, 'update'])->name('comment.update');
});
