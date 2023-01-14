<?php

use App\Http\Controllers\Backend\AnswerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\QuestionController;
use App\Http\Controllers\Backend\QuizzeController;
use App\Http\Controllers\Backend\TypeController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->middleware('auth')->group(function (){
   Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
   Route::prefix('quiz')->group(function (){
      Route::get('index', [QuizzeController::class, 'index'])->name('quiz');
      Route::get('create', [QuizzeController::class, 'create'])->name('create_quiz');
      Route::post('store', [QuizzeController::class, 'store'])->name('store_quiz');
      Route::post('update/{id}', [QuizzeController::class, 'update'])->name('update_quiz');
      Route::get('edit/{id}', [QuizzeController::class, 'edit'])->name('edit_quiz');
      Route::post('delete/{id}', [QuizzeController::class, 'destroy'])->name('delete_quiz');

   });


    Route::prefix('type')->group(function (){
        Route::get('index', [TypeController::class, 'index'])->name('type');
        Route::get('create', [TypeController::class, 'create'])->name('create_type');
        Route::post('store', [TypeController::class, 'store'])->name('store_type');
        Route::post('update/{id}', [TypeController::class, 'update'])->name('update_type');
        Route::get('edit/{id}', [TypeController::class, 'edit'])->name('edit_type');
        Route::get('delete/{id}', [TypeController::class, 'destroy'])->name('delete_type');
    });


    Route::prefix('question')->group(function (){
        Route::get('index', [QuestionController::class, 'index'])->name('question');
        Route::get('create', [QuestionController::class, 'create'])->name('create_question');
        Route::post('store', [QuestionController::class, 'store'])->name('store_question');
        Route::post('update/{id}', [QuestionController::class, 'update'])->name('update_question');
        Route::get('edit/{id}', [QuestionController::class, 'edit'])->name('edit_question');
        Route::post('delete/{id}', [QuestionController::class, 'destroy'])->name('delete_question');
    });

    Route::prefix('answer')->group(function (){
        Route::get('index', [AnswerController::class, 'index'])->name('answer');
        Route::get('create', [AnswerController::class, 'create'])->name('create_answer');
        Route::post('store', [AnswerController::class, 'store'])->name('store_answer');
        Route::post('update/{id}', [AnswerController::class, 'update'])->name('update_answer');
        Route::get('edit/{id}', [AnswerController::class, 'edit'])->name('edit_answer');
        Route::get('delete/{id}', [AnswerController::class, 'destroy'])->name('delete_answer');
    });

    Route::prefix('setting')->group(function (){
        Route::get('index', [SettingController::class, 'index'])->name('setting');
        Route::post('update/{id}', [SettingController::class, 'update'])->name('update_setting');
    });


    Route::get('page/{id}', [HomeController::class, 'pages'])->name('pages');

});

require __DIR__.'/auth.php';
