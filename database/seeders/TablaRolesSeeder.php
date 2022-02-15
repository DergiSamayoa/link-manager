<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class TablaRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador', 
            'email' => 'admin@correo.com',
            'password' => Hash::make('123123123')
        ]);

        Role::create([
            'name' => 'Administrador'
        ]);
        
    }
}
