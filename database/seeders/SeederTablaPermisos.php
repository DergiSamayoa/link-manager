<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            // table Roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            // table Blogs
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog',
            // menú
            'menu-usuario',
            'menu-rol',
            'menu-blog',
            'menu-dashboard',
        ];

        foreach($permisos as $permiso){
            Permission::create(['name' => $permiso]);
        }
    }
}
