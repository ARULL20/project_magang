<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\Register;

// route bawaan untuk register admin
Route::get('/admin/register', Register::class)
    ->name('filament.admin.pages.register');

// route landing utama aplikasi
Route::get('/', function () {
    return view('landing');   // akan merender resources/views/landing.blade.php
})->name('landing');

// route bawaan welcome tetap bisa dipanggil kalau mau, misalnya pakai /welcome
Route::get('/welcome', function () {
    return view('welcome');
});
