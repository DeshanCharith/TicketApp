<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SendEmailController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/ticket/create', [TicketController::class, 'createTicket'])->name('ticket.create');
Route::get('/ticket/all', [TicketController::class, 'getTickets'])->name('ticket.all');
Route::get('/ticket/{id}/edit', [TicketController::class, 'editTicket'])->name('ticket.edit');
Route::post('/ticket/{id}/update', [TicketController::class, 'updateTicket'])->name('ticket.update');
Route::post('/ticket/search', [TicketController::class, 'searchTicket'])->name('ticket.search');
Route::get('/ticket/{id}/delete', [TicketController::class, 'deleteTicket'])->name('ticket.delete');

Route::get('/{id}/send-email', [SendEmailController::class, 'index'])->name('send-email');
Route::get('send-success', [SendEmailController::class, 'success'])->name('success');




