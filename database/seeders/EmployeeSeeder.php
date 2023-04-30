<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employeeRecords = [
            ['id'=>1,'name'=>'employee1','mobile'=>'1234567890','email'=>'employee1@gmail.com','status'=>'Active','Role'=>'Engineer']
        ];
        Employee::insert($employeeRecords);
    }
}
