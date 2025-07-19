<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;


Route::get('/', function () {
   return 'Hoşgeldiniz!';
});

//Postman CSRF token alıyoruz.
Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
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


