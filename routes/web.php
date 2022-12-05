<?php

use Illuminate\Support\Facades\Route;

// Controllers

use App\Http\Controllers\ContactController;

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
  return view('welcome');
});

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

Route::get('/contacts/create', function() {
  return view('contacts.create');
})->name('contacts.create');

Route::get('/contacts/{id}', function($id) {
  $contacts = getContacts();
  abort_if(!isset($contacts[$id]), 404);
  $contact = $contacts[$id];
  return view('contacts.show')->with('contact', $contact);
})->name('contacts.show');