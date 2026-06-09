<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/input-jadwal', function () {
    return view('input-jadwal');
});

Route::get('/pengurangan-hk', function () {
    return view('pengurangan-hk');
});
