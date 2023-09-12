<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
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

Route::get('/', [HomeController::class, "index"])->name("home.index");
Route::get('/admin/dashboard', [AdminController::class, "index"])->name("admin.index");
Route::get('/dashboard/calendar', [CalendarController::class, "index"])->name("calendar.index");
// create event
Route::get('/admin/dashboard/create_event', [AdminController::class, "event_create_form"])->name("create_event.index");
Route::post('/admin/dashboard/create_event/store', [AdminController::class, "event_store"])->name("create_event.store");
//delete event
Route::delete('/calendar/event/delete/{id}', [CalendarController::class, 'destroy'])->name('calendar.delete');