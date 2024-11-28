<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;

// Главная страница
Route::get('/', function () {
    return view('welcome');
});

// Группа маршрутов для аутентифицированных пользователей
Route::middleware(['auth'])->group(function () {
    Route::resource('tickets', TicketController::class);
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Ресурсные маршруты для комментариев (доступны всем)
Route::resource('comments', CommentController::class)->only(['index', 'show']);

// Маршрут для домашней страницы
Route::get('/home', [HomeController::class, 'index'])->name('home');