<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{

/*$user = \App\Models\User::find(1);
$user->assignRole('administrador');*/
    public function run(): void
    {

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Criar roles
        $roles = [
            'administrador',
            'gestor',
            'tecnico_museu',
            'consulta_publica',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Criar permissões (adapta conforme os recursos reais)
        $permissions = [
            'ver artefactos', 'criar artefactos', 'editar artefactos', 'eliminar artefactos',
            'ver categorias', 'criar categorias', 'editar categorias', 'eliminar categorias',
            'exportar inventario',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Atribuir permissões por role
        Role::findByName('administrador')->givePermissionTo(Permission::all());

        Role::findByName('gestor')->givePermissionTo([
            'ver artefactos', 'criar artefactos', 'editar artefactos', 'ver categorias', 'exportar inventario',
        ]);

        Role::findByName('tecnico_museu')->givePermissionTo([
            'ver artefactos', 'ver categorias',
        ]);

        Role::findByName('consulta_publica')->givePermissionTo([
            'ver artefactos',
        ]);
    }


}



