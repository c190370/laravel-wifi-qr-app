<?php
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    $user = [
        [
            'name' => 'Bittu',
            'email' => 'b2tamrakar@gmail.com',
            'age' => 25,
            'city' => 'New York'
        ],

        [
            'name' => 'Ravi',
            'email' => 'ravi@example.com',
            'age' => 30,
            'city' => 'Los Angeles',
        ]
    ];
    return view('index', ['land' => $user]);
});


