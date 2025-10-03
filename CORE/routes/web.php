<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/RFQ-list', function () {
    return view('rfq');
});
