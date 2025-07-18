<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    // Tüm çalışanları listeler.
    public function index()
    {
        return response()->json(Employee::all());
    }

    // Yeni çalışan kaydı oluşturur. İstekten gelen veriler önceden doğrulanmıştır.
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::create($request->validated());
        return response()->json($employee, 201); // başarılı
    }

    //  Belirtilen id'ye sahip çalışanı getir.
    public function show($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        return response()->json($employee);
    }

    // Çalışan bilgilerini günceller.
    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            // Eğer çalışan bulunamazsa 404 hatası döner.
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $employee->update($request->validated());
        return response()->json($employee);
    }

    // Belirtilen çalışanı siler.
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $employee->delete();
        return response()->json(['message' => 'Employee deleted successfully']);
    }

    // Çalışana ait görevleri getirir.
    public function getTasks($id)
    {
        $employee = Employee::with('tasks')->find($id);

        if (!$employee) {
            // Eğer çalışan bulunamazsa 404 hatası döner.
            return response()->json(['error' => 'Employee not found'], 404);
        }

        return response()->json($employee->tasks);
    }
}
