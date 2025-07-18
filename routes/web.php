<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Models\Task;

/* Basic resource routes
Route::prefix('api')->group(function () {
    Route::resource('tasks', TaskController::class); 
    Route::resource('employees', EmployeeController::class);
    Route::patch('/tasks/{id}/complete', [TaskController::class, 'markComplete']); // Belirli bir görevi tamamlandı olarak işaretleme
    Route::get('/employees/{id}/tasks', [EmployeeController::class, 'getTasks']);  // Belirli bir çalışana ait görevleri listeleme
});
*/
Route::get('/', function () {
   return 'Hoşgeldiniz!';
});

Route::prefix('api')->group(function () {
    //Employees
    Route::get('/employees', [EmployeeController::class, 'index']);              // Tüm çalışanlar
    Route::post('/employees', [EmployeeController::class, 'store']);            // Yeni çalışan oluştur
    Route::get('/employees/{id}', [EmployeeController::class, 'show']);         // Belirli çalışanı getir
    Route::put('/employees/{id}', [EmployeeController::class, 'update']);       // Çalışan bilgilerini güncelle
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);   // Çalışanı sil
    // Bir çalışanın görevlerini getir
    Route::get('/employees/{id}/tasks', [EmployeeController::class, 'getTasks']);

    //Tasks
    Route::get('/tasks', [TaskController::class, 'index']);              // Tüm görevler
    Route::post('/tasks', [TaskController::class, 'store']);             // Yeni görev oluştur
    Route::get('/tasks/{id}', [TaskController::class, 'show']);          // Belirli görevi getir
    Route::put('/tasks/{id}', [TaskController::class, 'update']);        // Görevi güncelle
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);    // Görevi sil
    // Görevi tamamlama
    Route::patch('/tasks/{id}/complete', [TaskController::class, 'markComplete']);
});

Route::get('/get-token', function () {
    return view('token');
});
//Postman test için örnek CSRF token : NPnc1fXBMJz3QNfaXvdb3lszfWHOdjNuZfeiILij