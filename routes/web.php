<?php
use Illuminate\Support\Facades\Route;

// Root route - redirect to WiFi QR generator
Route::get('/', function () {
    try {
        return view('index');
    } catch (Exception $e) {
        return response('<h1>WiFi QR Generator</h1><p>Loading...</p><script>setTimeout(() => location.reload(), 2000);</script>', 200);
    }
});

Route::get('/home', function () {
    try {
        return view('index');
    } catch (Exception $e) {
        return response('<h1>WiFi QR Generator</h1><p>Loading...</p><script>setTimeout(() => location.reload(), 2000);</script>', 200);
    }
});

Route::get('/qr-generator', function () {
    try {
        return view('index');
    } catch (Exception $e) {
        return response('<h1>WiFi QR Generator</h1><p>Loading...</p><script>setTimeout(() => location.reload(), 2000);</script>', 200);
    }
});


