<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\Admin;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create(
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123123123'),
                'api_key' => str_random(60),
                'phone' => '0123456789',
                'organization_id' => 1,
            ]
        );
        Admin::factory()->count(10)->create();
    }
}


