<?php

use App\Http\Controllers\WallController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CampaignController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

/* CUSTOM */
Route::get(
    '/plip/{truc?}',
    [WallController::class, 'plip']
)->middleware(['auth'])->name('plip');

Route::get(
    '/plop/{truc?}',
    function ($truc = null) {
        return 'plop';
    }
);

Route::get(
    '/wall',
    [WallController::class, 'index']
)->middleware(['auth'])->name('wall');

Route::post(
    '/wall',
    [WallController::class, 'post']
)->middleware(['auth'])->name('post');

Route::get(
    '/update/{post_id}',
    [WallController::class, 'update']
)->middleware(['auth'])->name('update');

Route::post(
    '/save',
    [WallController::class, 'save']
)->middleware(['auth'])->name('save');

Route::get(
    '/delete/{post_id}',
    [WallController::class, 'delete']
)->middleware(['auth'])->name('delete');


Route::get(
    '/films',
    [FilmController::class, 'index']
)->middleware(['auth'])->name('films');

Route::get(
    '/campagnes',
    [CampaignController::class, 'index']
)->middleware(['auth'])->name('campaigns');
