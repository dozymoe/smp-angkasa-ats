<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain(env('MANAGER_DOMAIN'))->group(base_path('routes/web_manage.php'));

Route::name('Home')->get('/', function()
{
    return view('welcome');
});

Route::name('Ppdb')->get('/ppdb', function()
{
    return view('ppdb');
});

Route::name('VisiMisi')->get('/profil/visi-misi', function()
{
    return view('profile/visi_misi');
});
