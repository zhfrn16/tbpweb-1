<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(LecturerSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(StaffSeeder::class);
    }
}
