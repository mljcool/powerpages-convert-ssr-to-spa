<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/RFQ-list', function () {
    return view('rfq');
});


Route::get('/Purchase-order-workspace', function () {
    return view('po-list');
});


Route::get('/Vendor-information', function () {
    return view('vendor-information');
});
