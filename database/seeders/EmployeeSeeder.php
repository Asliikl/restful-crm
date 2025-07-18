<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert([
            ['name' => 'Aslıhan İkiel', 'email' => 'aslihanikiel@gmail.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kerem Arca', 'email' => 'keremarca@gmail.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pelin Laleli', 'email' => 'pelinlaleli@gmail.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ayşe', 'email' => 'ayse@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ali', 'email' => 'ali@example.com', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
