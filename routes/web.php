<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Schedules;
use App\Http\Livewire\Questions;
use App\Http\Livewire\Welcome;

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

Route::get('/', Welcome::class);
Route::get('schedules', Schedules::class)->name('schedules');
Route::get('questions', Questions::class)->name('questions');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
