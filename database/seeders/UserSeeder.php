<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt(12345678),
            'status' => 'active',
            'position' => 'admin',
        ]);
    }
}
