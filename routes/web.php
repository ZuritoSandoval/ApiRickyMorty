<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\Apicontroller;

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

Route::get('/',[Apicontroller::class, 'index'])->name('inicio');

Route::get('personajes/{id}',[Apicontroller::class, 'personajes'])->name('personajes');
