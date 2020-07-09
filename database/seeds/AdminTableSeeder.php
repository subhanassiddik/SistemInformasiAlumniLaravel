<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seederr
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
            'password'  => bcrypt('secret')
        ]);
    }
}
