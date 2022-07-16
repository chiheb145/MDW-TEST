<?php
namespace App\Http\Controllers;
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
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/scores', [HomeController::class, 'calculate_scores'])->name('scores');

Route::get('/referral_bonuses', [HomeController::class, 'calculate_referral_bonuses'])->name('referral_bonuses');
Route::get('/team_bonuses', [HomeController::class, 'calculate_team_bonuses'])->name('team_bonuses');

