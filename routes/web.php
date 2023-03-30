<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KeuanganController;

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


Auth::routes();

// Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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
], function () {
    Route::get('/article', [AuthorController::class, 'index'])->name('index');
    Route::get('/article/{id}/show', [AuthorController::class, 'show'])->name('show');
    Route::get('/article/{id}/edit', [AuthorController::class, 'edit'])->name('edit');
    Route::get('/article/create', [AuthorController::class, 'create'])->name('create');
    Route::post('/article/store', [AuthorController::class, 'store'])->name('store');
    Route::patch('/article', [AuthorController::class, 'update'])->name('update');
    Route::post('/article/{id}/submit', [AuthorController::class, 'submit'])->name('submit');
    Route::delete('/article/{id}/delete', [AuthorController::class, 'destroy'])->name('destroy');
    Route::delete('/article/{id}/setdraft', [AuthorController::class, 'setdraft'])->name('setdraft');

    // revision
    Route::get('/article/{id}/revised-result', [AuthorController::class, 'revised_result'])->name('revised_result');

    // add author
    Route::get('/{id}/show', [AuthorController::class, 'author_show'])->name('detail');
    Route::get('/{id}/add', [AuthorController::class, 'author_add'])->name('add');
    Route::post('/store', [AuthorController::class, 'author_store'])->name('add.store');
    Route::get('/{id}/edit', [AuthorController::class, 'author_edit'])->name('ubah');
    Route::put('/update', [AuthorController::class, 'author_update'])->name('ubah.update');
    Route::delete('/{id}/delete', [AuthorController::class, 'author_delete'])->name('ubah.delete');

    // add manuscript
    Route::get('/manuscript/{id}/create', [AuthorController::class, 'manuscript'])->name('manuscript.create');
    Route::get('/manuscript/{id}/revised', [AuthorController::class, 'manuscript_revised'])->name('manuscript.revised');
    Route::post('/manuscript/store', [AuthorController::class, 'manuscript_store'])->name('manuscript.store');
    Route::post('/manuscript/store-revised', [AuthorController::class, 'manuscript_store_revised'])->name('manuscript.store.revised');
    Route::delete('manuscript/{id}/delete', [AuthorController::class, 'manuscript_delete'])->name('manuscript.delete');

    Route::get('/article/pembayaran', [AuthorController::class, 'article_pembayaran'])->name('pembayaran');
    Route::get('/pembayaran/{id}/create', [AuthorController::class, 'pembayaran'])->name('pembayaran.create');
    Route::post('/pembayaran/store', [AuthorController::class, 'pembayaran_store'])->name('pembayaran.store');

    // AJAX
    Route::get('/ajax/getDataScope/{id}', [AuthorController::class, 'getDataScope']);
});

Route::group([
    'middleware' => 'role:admin',
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/registered-user', [AdminController::class, 'registered_user'])->name('registered.user');
    Route::get('/article', [AdminController::class, 'article'])->name('article');
    Route::get('/download/{file}', [AdminController::class, 'download'])->name('download');
});

Route::group([
    'middleware' => 'role:keuangan',
    'prefix' => 'keuangan',
    'as' => 'keuangan.'
], function () {
    Route::get('/pembayaran', [KeuanganController::class, 'pembayaran'])->name('pembayaran');
    Route::post('/pembayaran/{id}/approved', [KeuanganController::class, 'approved'])->name('approved_payment');
});

Route::group([
    'middleware' => 'role:editor',
    'prefix' => 'editor',
    'as' => 'editor.'
], function () {
    Route::get('/reviewer', [EditorController::class, 'index'])->name('index');
    Route::get('/article', [EditorController::class, 'article_list'])->name('article');
    Route::get('/article/{id}/show', [EditorController::class, 'show'])->name('show');
    Route::get('/article/{article_id}/{action}', [EditorController::class, 'article_detail'])->name('article_detail');
    Route::post('/blind-manuscript/store', [EditorController::class, 'blind_manuscript_store'])->name('blind_manuscript.store');
    Route::post('/blind-manuscript/edit', [EditorController::class, 'blind_manuscript_edit'])->name('blind_manuscript.edit');

    //kelola reviewer
    Route::get('/reviewer/create', [EditorController::class, 'create'])->name('create');
    Route::post('/reviewer/store', [EditorController::class, 'store'])->name('store');
    Route::get('/reviewer/{id}/edit', [EditorController::class, 'edit'])->name('edit');
    Route::patch('/reviewer', [EditorController::class, 'update'])->name('update');
    Route::delete('/reviewer/{id}/delete', [EditorController::class, 'destroy'])->name('destroy');
});

Route::group([
    'middleware' => 'role:reviewer',
    'prefix' => 'reviewer',
    'as' => 'reviewer.'
], function () {
    Route::get('/article', [ReviewController::class, 'index'])->name('index');
    Route::get('/article/{id}/show', [ReviewController::class, 'show'])->name('show');

    Route::post('/article/{id}/approved', [ReviewController::class, 'approved'])->name('approved');
    Route::post('/article/{id}/rejected', [ReviewController::class, 'rejected'])->name('rejected');
    Route::post('/article/{id}/revise-approved', [ReviewController::class, 'revise_to_approved'])->name('revise_to_approved');
    Route::post('/article/{id}/revise-rejected', [ReviewController::class, 'revise_to_rejected'])->name('revise_to_rejected');
    Route::get('/article/{id}/revised-form', [ReviewController::class, 'revised_form'])->name('revised_form');
    Route::get('/article/{id}/next-revised-form', [ReviewController::class, 'next_revised_form'])->name('next_revised_form');
    Route::post('/article/revised', [ReviewController::class, 'revised'])->name('revised');
    Route::post('/article/next-revised', [ReviewController::class, 'next_revision'])->name('next_revision');
    Route::get('/article/{id}/revised-result', [ReviewController::class, 'revised_result'])->name('revised_result');
});


// ubah password
Route::get('/password-change', [UserController::class, 'ubah_password'])->name('password.change');
Route::post('/password-change/update', [UserController::class, 'ubah_password_update'])->name('password.change.update');
