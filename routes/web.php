<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\ScheduleController;
use SimpleSoftwareIO\QrCode\Facade\QrCode;

Route::get('/', function() {
    return Inertia::render('Landing');
});

Route::get('/about', function() {
    return Inertia::render('About');
});

Route::get('/schedule', function() {
    return Inertia::render('Schedule');
});

Route::get('/qrcode', function() {
    return QrCode::generate('Valid Ticket Entry!');
});

Route::get('/scanner', function() {
    return Inertia::render('Scanner');
});


Route::get('/bookings/create', [AttendeeController::class, 'create'])->name('bookings.create');

Route::get('/complete', [AttendeeController::class, 'index']);
Route::get('/attendees', [AttendeeController::class, 'index']);
Route::get('/schedule', [ScheduleController::class, 'index']);
Route::resource('attendees', AttendeeController::class);

Route::get('/complete/csv-all', [AttendeeController::class, 'generateCSV']);
Route::post('/import-csv', [AttendeeController::class, 'importCSV'])->name('attendees.import');
Route::get('/complete/pdf', [AttendeeController::class, 'pdf']);

require __DIR__.'/auth.php';
