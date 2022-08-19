<?php

use App\Http\Controllers\PageController;
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

Route::get('/{page}', [PageController::class, 'show'])->name('page.show');
Route::get('/success/{source}', [PageController::class, 'formSuccess'])->name('form.success');
Route::post('/submit', [PageController::class, 'sendToHubspot']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/app/pages', App\Http\Livewire\Page\Index::class)->name('admin.page.index');
    Route::get('/app/pages/create', App\Http\Livewire\Page\Create::class)->name('admin.page.create');
    Route::get('/app/pages/{page}/edit', App\Http\Livewire\Page\Edit::class)->name('admin.page.edit');

    Route::get('/app/pages/template', function() {
        return view('layouts.landing.template');
    })->name('admin.page.template');
});
