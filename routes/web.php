<?php

use App\Http\Controllers\IncidentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InsightController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    return view('form');
});

Route::get('/auto_login/{email}/{id}', function ($email, $id) {
    $user = User::where('email',$email)->first();
    Auth::loginUsingId($user->id);
    return redirect('/incidents/'.$id);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
Route::resource('incidents', IncidentController::class)->middleware('auth');

Route::resource('department', DepartmentController::class)->middleware('auth');
Route::resource('insight', InsightController::class)->middleware('auth');
