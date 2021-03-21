<?php

use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyectosController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('home.nosotros');
Route::get('/contacto', [HomeController::class, 'contacto'])->name('home.contacto');
Route::post('/contacto', [HomeController::class, 'sendEmail'])->name('contacto.sendEmail');
Route::get('/politicas-de-privacidad', [HomeController::class, 'privacidad'])->name('home.privacidad');
Route::get('/donativos', [HomeController::class, 'donativos'])->name('home.donativos');

Route::get('/proyectos', [ProyectosController::class, 'index'])->name('proyectos.index');
Route::get('/proyectos/comunidad', [ProyectosController::class, 'comunidad'])->name('proyectos.comunidad');
Route::get('/proyectos/medio-ambiente', [ProyectosController::class, 'ambiente'])->name('proyectos.ambiente');

Route::post('/donaciones', [DonationController::class, 'donacion'])->name('donaciones.donacion');
Route::get('/donaciones/confirmed', [DonationController::class, 'confirmed'])->name('donaciones.confirmed');
Route::get('/donaciones/cancelled', [DonationController::class, 'cancelled'])->name('donaciones.cancelled');
