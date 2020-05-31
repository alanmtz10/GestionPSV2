<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        (new \App\User([
            'name' => 'Alan',
            'email' => 'admin@admin.com',
            'password' => bcrypt("123456"),
            'tipo_usuario' => 1
        ]))->save();
    }
}
