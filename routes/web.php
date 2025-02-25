<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('beranda'); // Bukan 'components.layout', tapi 'home' yang extends layout
});
