<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123123123),
            'phone' => '09761545726'
        ]);
        $user = User::create([
            'name' => 'Han Win Maung',
            'email' => 'han@gmail.com',
            'password' => bcrypt(123123123),
            'phone' => '09761545726'
        ]);
    }
}
