<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\File;


Route::get('/create-symlink', function () {
    $targetFolder = public_path('images');
    $linkFolder = public_path('../../public_html/images');
    if (File::exists($linkFolder)) {
        File::delete($linkFolder);
    }
    File::link($targetFolder, $linkFolder);
    return 'Symlink has been created.';
});

Route::middleware([AuthMiddleware::class])->group(function () {
    // ...
    Route::get('/transaction', [TransactionController::class, 'transaction'])->name('transaction');
    Route::get('/transaction/create', [TransactionController::class, 'transactionCreate'])->name('transaction.create');
    Route::post('/transaction', [TransactionController::class, 'transactionStore'])->name('transaction.store');
    Route::delete('/transaction/{id}', [TransactionController::class, 'transactionDestroy'])->name('transaction.destroy');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware([GuestMiddleware::class])->group(function () {
    // ...
    Route::get('/', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'loginStore'])->name('login.store');
    Route::post('/register', [UserController::class, 'registerStore'])->name('register.store');
});


