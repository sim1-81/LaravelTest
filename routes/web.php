<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisaGov;
use App\Http\Controllers\VisaGovBook;
use App\Http\Controllers\VisaGovContact;

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
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
        ], function () {
            Route::get(LaravelLocalization::transRoute('routes.home'), [VisaGov::class, 'index'])->name('home');
        });
Route::get('/books', [VisaGovBook::class, 'index'])->name('books');
Route::get('/contact', [VisaGovContact::class, 'index'])->name('contact');

// Mostra il form per creare un nuovo libro
Route::get('/books/create', [VisaGovBook::class, 'create'])->name('books.create');

// Salva un nuovo libro nel database
Route::post('/books', [VisaGovBook::class, 'store'])->name('books.store');
Route::post('/contact', [VisaGovContact::class, 'create'])->name('contact.create');

// Mostra i dettagli di un singolo libro
Route::get('/books/{id}', [VisaGovBook::class, 'show'])->name('books.show');

// Mostra il form per modificare un libro esistente
Route::get('/books/{id}/edit', [VisaGovBook::class, 'edit'])->name('books.edit');

// Aggiorna un libro nel database
Route::post('/books/{id}/update', [VisaGovBook::class, 'update'])->name('books.update');

// Elimina un libro dal database
Route::POST('/books/delete', [VisaGovBook::class, 'destroy'])->name('books.destroy');
