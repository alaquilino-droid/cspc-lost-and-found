<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});
Route::get('/search', [ItemController::class, 'search'])->name('items.search');
Route::resource('items', ItemController::class);
Route::get('/items/{item}/matches', [ItemController::class, 'potentialMatches'])->name('items.matches');
Route::get('/my-reports', function() {
    $items = auth()->user()->items()->latest()->get();
    return view('items.myreports', compact('items'));
})->middleware('auth')->name('items.myreports');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');