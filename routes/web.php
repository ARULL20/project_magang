<?php

use Illuminate\Support\Facades\Route;


use App\Filament\Pages\Register;

Route::get('/admin/register', Register::class)
    ->name('filament.admin.pages.register');

Route::get('/', function () {
    return view('welcome');
});
