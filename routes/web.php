<?php

use App\Http\Controllers\Phonebook\Admin\ContactsController;
use App\Http\Controllers\Search\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Phonebook', 'prefix' => 'book'], function() {
    Route::resource('contacts', ContactsController::class)->names('book.contacts');
});

//Админка Телефонной книжки
$groupData = [
    'namesspace' => 'Book/Admin',
    'prefix'    => 'admin/book'
];

Route::group($groupData, function() {
    Route::resource('contacts', ContactsController::class)
        ->except(['show'])
        ->names('book.admin.contacts');

    Route::delete('book/admin/contacts/destroy',  [ContactsController::class, 'deleteAll'])->name('contacts.delete');

});

// Роуты к поиску
Route::get('/book/search/search', [ContactsController::class, 'search'])->name('web.search');


//Роуты к авторизации
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
