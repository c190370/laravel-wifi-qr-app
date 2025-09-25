<?php
use Illuminate\Support\Facades\Route;

// Root route - redirect to WiFi QR generator
Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('/qr-generator', function () {
    return view('index');
});


