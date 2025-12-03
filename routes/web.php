<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConferenceController;

Route::get('/locale/{locale}', static function ($locale) {
    if(! in_array($locale, ['en', 'lt'])) {
        abort(400);
    }
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('locale.switch');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
   return redirect()->route('conferences.index');
});
Route::resource('conferences', ConferenceController::class);



