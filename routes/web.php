<?php


use App\Http\Controllers\ContactNoteController;
use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', WelcomeController::class);

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
Route::resource('/company', CompanyController::class);
Route::resources([
  '/tags' => TagController::class,
  '/tasks' => TaskController::class
]);
Route::resource('/activities', ActivityController::class)->except([
  'index', 'show'
]);
Route::resource('/contacts.notes', ContactNoteController::class)->shallow();
Route::resource('/activities', ActivityController::class)->parameters([
  'activities' => 'active'
]);