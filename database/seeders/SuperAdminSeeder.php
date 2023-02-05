<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        

        $super_admin_csv = fopen(base_path("database/data/super_admin_master.csv"), "r");
        while(($data = fgetcsv($super_admin_csv, 2000, ",")) != FALSE) {
            //$password = Hash::make($data['2']);
            $super_admin = ['name' => $data['0'], 'email' => $data['1'], 'password' => $data['2'],];
            $super_admin = User::create($super_admin);
            $super_admin->assignRole('super admin');
        }

    }
}