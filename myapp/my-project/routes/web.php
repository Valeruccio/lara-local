<?php

use App\Http\Controllers\ContactsPageController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Cамокопание
//Подключение созданного контроллера
Route::get('/my', [MyPageController::class, 'show']);
//Роут на создание записи
Route::get('/my/create', [MyPageController::class, 'create']);
//Роут на обновление записи
Route::get('/my/update', [MyPageController::class, 'update']);
//Роут на удаление записи
Route::get('/my/delete', [MyPageController::class, 'delete']);
//Роут на восстановление записи
Route::get('/my/restore', [MyPageController::class, 'restore']);
//Первый или создать
Route::get('/my/first_or_create', [MyPageController::class, 'firstOrCreate']);
//Обновить или создать
Route::get('/my/update_or_create', [MyPageController::class, 'updateOrCreate']);

Route::get('/contacts', [ContactsPageController::class, 'show']);

//Авторизация
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
