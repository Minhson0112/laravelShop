<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'userId' => 'admin',
            'password' => Hash::make('mountain123'), // Băm mật khẩu
        ]);
    }
}
