<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Tüm görevleri ilişkili çalışan bilgisiyle birlikte getirir.
    public function index()
    {
        $tasks = Task::with('employee')->get();
        return response()->json($tasks);
    }

    // Yeni bir görev oluşturur. İstekten gelen veriler önceden doğrulanmıştır.
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        return response()->json($task, 201); // başarılı
    }

    // Belirtilen id'ye sahip görevi ve çalışanını getirir.
    public function show($id)
    {
        $task = Task::with('employee')->find($id);
        if (!$task) {
            // Görev bulunamazsa 404 hatası döner.
            return response()->json(['error' => 'Task not found'], 404);
        }
        return response()->json($task);
    }

    // Görevi günceller.
    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            // Görev yoksa hata döner.
            return response()->json(['error' => 'Task not found'], 404);
        }
        $task->update($request->validated());
        return response()->json($task);
    }

    // Belirtilen görevi siler.
    public function destroy($id)
    {
        $task = Task::find($id);
        if (!$task) {
            // Silinecek görev yoksa hata döner.
            return response()->json(['error' => 'Task not found'], 404);
        }
        $task->delete();
        return response()->json(['message' => 'Task deleted successfully']);
    }

    // Görevin durumunu 'completed' olarak günceller.
    public function markComplete($id)
    {
        $task = Task::find($id);
        if (!$task) {
            // Eğer görev yoksa hata döner.
            return response()->json(['error' => 'Task not found'], 404);
        }
        // Görevin durumunu tamamlandı olarak günceller.
        $task->status = 'completed';
        $task->save();

        return response()->json($task);
    }
}
