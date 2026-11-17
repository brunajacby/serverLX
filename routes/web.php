<?php

use App\Http\Controllers\UtilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GiftController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UtilController::class, 'loadWelcome'])->name('welcome');

Route::get('/hello', function () {
    return '<h1>Hello</h1>';
});

Route::get('/hello/{message}', function ($message) {
    return '<h1>Hello '.$message.'</h1>';
});

// Rota de homepage
Route::get('/homepage', [UtilController::class, 'loadHomepage'])->name('home');

// Rota de users
Route::get('/users', [UserController::class, 'allUsers'])->name('users.all');

// Rota de adicionar users
Route::get('/users/add', [UserController::class, 'addUser'])->name('users.add');

// rota para guardar users
Route::post('/store-users', [UserController::class, 'storeUser'])->name('users.store');

//rota para ver /editar users
Route::get('/edit-users/{id}',[UserController::class, 'editUsers'] )->name('users.edit');

//rota de actualizar users
Route::put('/update-user', [UserController::class, 'updateUser'])->name('users.update');

// rota de apagar users
Route::get('/delete-users/{id}',[UserController::class, 'deleteUsers'] )->name('users.delete');

// Rota de tarefas
Route::get('/tasks', [TaskController::class, 'allTasks'])->name('tasks.all');

Route::get('/add-task',[TaskController::class, 'addTasks'] )->name('tasks.add');

Route::post('/store-/add-task', [TaskController::class, 'storeTasks'])->name('tasks.store');

//rota para ver /editar tarefas
Route::get('/edit-tasks/{id}',[TaskController::class, 'editTasks'] )->name('tasks.edit');

// rota de apagar tarefas
Route::get('/delete-tasks/{id}',[TaskController::class, 'deleteTasks'] )->name('tasks.delete');

// Rota de prendas
Route::get('/gifts', [GiftController::class, 'allGifts'])->name('gifts.all');

// Rota para abrir o formulário de adicionar prendas
Route::get('/add-gift', [GiftController::class, 'addGifts'])->name('gifts.add');

// rota para guardar prendas
Route::post('/store-gifts', [GiftController::class, 'storeGifts'])->name('gifts.store');

// rota para ver / editar prendas
Route::get('/edit-gifts/{id}', [GiftController::class, 'editGifts'])->name('gifts.edit');

// rota de actualizar prendas
Route::put('/update-gift', [GiftController::class, 'updateGift'])->name('gifts.update');

// rota de apagar prendas
Route::get('/delete-gifts/{id}', [GiftController::class, 'deleteGifts'])->name('gifts.delete');

// Rota de fallback
Route::fallback(function () {
    return view('utils.fallback');
});
