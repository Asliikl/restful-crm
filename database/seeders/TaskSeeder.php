<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::insert([
            ['employee_id' => 1, 'title' => 'Rapor Hazırlama', 'status' => 'pending', 'created_at' => now(), 'updated_at' => now()],
            ['employee_id' => 2, 'title' => 'Sunum', 'status' => 'in_progress', 'created_at' => now(), 'updated_at' => now()],
            ['employee_id' => 3, 'title' => 'Veri Girişi', 'status' => 'completed', 'created_at' => now(), 'updated_at' => now()],
            ['employee_id' => 1, 'title' => 'Toplantı', 'status' => 'pending', 'created_at' => now(), 'updated_at' => now()],
            ['employee_id' => 4, 'title' => 'Web Sitesi Güncelleme', 'status' => 'in_progress', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
