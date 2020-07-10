<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'name'  => 'admin',
            'email' => 'admin@admin.com',
            'password'  => bcrypt('password')
        ]);
    }
}
