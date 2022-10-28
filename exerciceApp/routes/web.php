<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\TestController;

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
    event(new \App\Events\Accueil());
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/translate', function (Request $request){
    //dd($request['locale']);
    App::setLocale($request['locale']);
    return view('dashboard');
})->middleware(['auth'])->name('translate');

require __DIR__.'/auth.php';


Route::get('/time', [TestController::class, 'test'])->name('time');

Route::get('/test', function () {
    return view('test');
});
