<?php

use Illuminate\Support\Facades\Route;


Route::name('login')->group(function()
{
    Route::get('/login',
            ['App\Http\Controllers\Auth\LoginController', 'login']);
    Route::post('/login',
            ['App\Http\Controllers\Auth\LoginController', 'authenticate']);
});

Route::name('logout')->get('/logout',
        ['App\Http\Controllers\Auth\LoginController', 'logout']);


Route::group(['middleware' => 'auth'], function()
{
    Route::get('/', function()
    {
        return view('profile/visi_misi');
    });
});
