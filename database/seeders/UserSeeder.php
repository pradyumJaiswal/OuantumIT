<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       user::create([
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('password'),
       ]);
    }
}
