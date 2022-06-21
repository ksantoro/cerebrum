<?php

use App\Http\Controllers\ExampleController;
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

Route::get('/example', [ExampleController::class, 'index'])
    ->name('example.index');

Route::get('/example/{example}', [ExampleController::class, 'show'])
    ->name('example.show');

Route::post('/example', [ExampleController::class, 'create'])
    ->name('example.create');

Route::put('/example/{example}', [ExampleController::class, 'update'])
    ->name('example.update');

Route::get('/addnumbers', [ExampleController::class, 'addNumbers'])
    ->name('example.addNumbers');

Route::post('/addnumbers', [ExampleController::class, 'processNumbers'])
    ->name('example.processNumbers');
