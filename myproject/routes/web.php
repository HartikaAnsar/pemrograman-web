<?php

use Illuminate\Support\Facades\Route; 
Route::get('/', function () { 
return view('welcome'); 
}); 
Route::get('/index', function () { 
return view('index'); 
}); 
Route::get('/menu', function () { 
return view('menu'); 
}); 
Route::get('/kontak', function () { 
return view('kontak'); 
}); 