<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderBookController;

// Route of Home
Route::get('/', function () {
  return view('home');
});

// Route of Books
Route::controller(BookController::class)->group(function () {
  Route::get('/books', 'index')->name('books.index');
  Route::get('/books/create', 'create')->name('books.create');
  Route::post('/books', 'store')->name('books.store');
  Route::get('/books/{book}', 'show')->name('books.show');
  Route::get('/books/{book}/edit', 'edit')->name('books.edit');
  Route::put('/books/{book}', 'update')->name('books.update');
  Route::delete('/books/{book}', 'destroy')->name('books.destroy');
  // search
  Route::get('/bookSearch', 'search')->name('books.search');
});


Route::controller(OrderBookController::class)->group(function () {
  Route::get('/demand', 'index')->name('demand.index');
  Route::get('/demand/create/{order}', 'create')->name('demand.create');
  Route::put('/orders/{order}', 'updateStatus')->name('demand.update-status');
  Route::post('/demand', 'store')->name('demand.store');
  Route::delete('/demand/{order}', 'destroy')->name('demand.destroy');
  // search
  Route::get('/demandSearch', 'search')->name('demand.search');
});
