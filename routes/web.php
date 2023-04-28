<?php

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
    $methods = ['index', 'edit', 'update', 'create', 'store',];
    Route::resource('contacts', ContactsController::class)
        ->only($methods)
        ->except(['show'])
        ->names('book.admin.contacts');
});

//Роуты к авторизации
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
