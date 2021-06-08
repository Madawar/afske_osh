<?php

use App\Http\Controllers\IncidentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;

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




Route::get('/', function (Request $request) {
    $query = $request->query('edit', null);
    return view('form', ['query' => $query]);
});
Route::get('/browser', function () {
    $agent = new Agent();
    $browser = $agent->browser();
    return view('check_browser')->with(compact('browser'));
});
Route::get('/auto_login/{email}/{id}', function (Request $request, $email, $id) {
    $user = User::where('email', $email)->first();
    Auth::loginUsingId($user->id);
    if ($request->type == 'audit') {
        return redirect('/audit/' . $id . '/review');
    } else {
        return redirect('/incidents/' . $id);
    }
});

Route::get('/dashboard', function () {
    return redirect('/incidents');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
Route::resource('incidents', IncidentController::class)->middleware('auth');

Route::resource('department', DepartmentController::class)->middleware('auth');
Route::resource('report', ReportController::class)->middleware('auth');
Route::resource('checklist', ChecklistController::class)->middleware('auth');
Route::resource('insight', InsightController::class)->middleware('auth');
Route::resource('audit', AuditController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::get('/audit/{id}/review', [AuditController::class, 'review'])->name('audit.review');
Route::get('/audit_box/{id}/review', [AuditController::class, 'reviewBox'])->name('audit.review_box');
Route::get('/audit/{id}/assign', [AuditController::class, 'assign'])->name('audit.assign');
Route::get('/audit/{id}/close', [AuditController::class, 'close'])->name('audit.close');
Route::get('/audit/{id}/close_review', [AuditController::class, 'oshreview'])->name('audit.oshreview');
