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
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt("123456"),
            'tipo_usuario' => 1
        ]))->save();

        (new \App\User([
            'name' => 'Cliente',
            'email' => 'cliente@cliente.com',
            'password' => bcrypt("123456"),
            'vendedor_id' => 1,
            'tipo_usuario' => 2
        ]))->save();
    }
}
