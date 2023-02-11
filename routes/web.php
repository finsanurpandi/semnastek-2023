<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;

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
    return view('landing_page');
})->name('landing_page');



Route::view('/unsur', 'author.page')->name('notus');

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::middleware('participants')->group(function () {
    Route::get('/participant', [ParticipantController::class, 'index'])->name('participant');
    Route::post('/participant/artikel', [ParticipantController::class, 'upload'])->name('participant.upload');
    Route::get('/participant/unduh/{article_file}', [ParticipantController::class, 'unduh'])->name('participant.unduh');
});

Route::group([
    'middleware' => 'role:author',
    'prefix' => 'author',
    'as' => 'author.'
], function(){
    Route::get('/article', [AuthorController::class, 'index'])->name('index');
    Route::get('/article/{id}/show', [AuthorController::class, 'show'])->name('show');
    Route::get('/article/{id}/edit', [AuthorController::class, 'edit'])->name('edit');
    Route::get('/article/create', [AuthorController::class, 'create'])->name('create');
    Route::post('/article/store', [AuthorController::class, 'store'])->name('store');
    Route::patch('/article', [AuthorController::class, 'update'])->name('update');
    Route::post('/article/{id}/submit', [AuthorController::class, 'submit'])->name('submit');
    Route::delete('/article/{id}/delete', [AuthorController::class, 'destroy'])->name('destroy');

    // add author
    Route::get('/{id}/show', [AuthorController::class, 'author_show'])->name('detail');
    Route::get('/{id}/add', [AuthorController::class, 'author_add'])->name('add');
    Route::post('/store', [AuthorController::class, 'author_store'])->name('add.store');
    Route::get('/{id}/edit', [AuthorController::class, 'author_edit'])->name('ubah');
    Route::put('/update', [AuthorController::class, 'author_update'])->name('ubah.update');
    Route::delete('/{id}/delete', [AuthorController::class, 'author_delete'])->name('ubah.delete');

    // add manuscript
    Route::get('/manuscript/{id}/create', [AuthorController::class, 'manuscript'])->name('manuscript.create');
    Route::post('/manuscript/store', [AuthorController::class, 'manuscript_store'])->name('manuscript.store');
    Route::delete('manuscript/{id}/delete', [AuthorController::class, 'manuscript_delete'])->name('manuscript.delete');

    // ubah password
    Route::get('/password-change', [AuthorController::class, 'ubah_password'])->name('password.change');
    Route::post('/password-change/update', [AuthorController::class, 'ubah_password_update'])->name('password.change.update');

    // AJAX
    Route::get('/ajax/getDataScope/{id}', [AuthorController::class, 'getDataScope']);

});
Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
