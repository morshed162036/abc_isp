<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRecords = [
            ['id'=>1,'name'=>'super admin','type'=>'Super Admin','employee_id'=>0,'mobile'=>'1234567890','email'=>'superadmin@gmail.com','password'=>'$2a$12$2SaFWDDL.xN9Qr83byX9LOjela6kynvSQt24ql.40BORIFvA/JAwS','image'=>'','status'=>'Active','role'=>'Super Admin'],
            ['id'=>2,'name'=>'employee1','type'=>'Employee','employee_id'=>1,'mobile'=>'1234567890','email'=>'employee1@gmail.com','password'=>'$2a$12$TBfsW4YEyGDpCbOQ7eKs9umutADIdakk2OhuB8ITEOwuoxUvBExt2','image'=>'','status'=>'Active','role'=>'Engineer']
         ];
         admin::insert($adminRecords);
    }
}
