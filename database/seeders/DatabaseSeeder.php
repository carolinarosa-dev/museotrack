<?php
/*

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
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


        // Adicionar permissões de eventos
        $eventPermissions = [
            'ver eventos', 'criar eventos', 'editar eventos', 'eliminar eventos',
        ];

        foreach ($eventPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
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
            'ver eventos', 'criar eventos', 'editar eventos', 'eliminar eventos',
        ]);

        Role::findByName('tecnico_museu')->givePermissionTo([
            'ver artefactos', 'ver categorias', 'ver eventos',
        ]);

        Role::findByName('consulta_publica')->givePermissionTo([
            'ver artefactos', 'ver eventos',
        ]);

        // Criar utilizadores para testes

// Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('senha123'),
            ]
        );
        $admin->assignRole('administrador');

// Gestor
        $gestor = User::firstOrCreate(
            ['email' => 'gestor@teste.com'],
            [
                'name' => 'Gestor',
                'password' => Hash::make('123'),
            ]
        );
        $gestor->assignRole('gestor');

// Técnico Museu
        $tecnico = User::firstOrCreate(
            ['email' => 'tecnico@example.com'],
            [
                'name' => 'Técnico Museu',
                'password' => Hash::make('senha123'),
            ]
        );
        $tecnico->assignRole('tecnico_museu');

// Test User (opcional)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    }

}*/


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
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

        // Criar permissões
        $permissions = [
            'ver artefactos',
            'criar artefactos',
            'editar artefactos',
            'eliminar artefactos',
            'ver categorias',
            'criar categorias',
            'editar categorias',
            'eliminar categorias',
            'exportar inventario',
            'ver eventos',
            'criar eventos',
            'editar eventos',
            'eliminar eventos',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Atribuir permissões por role
        Role::findByName('administrador')->givePermissionTo(Permission::all());

        Role::findByName('gestor')->givePermissionTo([
            'ver artefactos',
            'criar artefactos',
            'editar artefactos',
            'ver categorias',
            'exportar inventario',
            'ver eventos',
            'criar eventos',
            'editar eventos',
            'eliminar eventos',
        ]);

        Role::findByName('tecnico_museu')->givePermissionTo([
            'ver artefactos',
            'ver categorias',
            'ver eventos',
        ]);

        Role::findByName('consulta_publica')->givePermissionTo([
            'ver artefactos',
            'ver eventos',
        ]);

        // Criar utilizadores
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('senha123'),
            ]
        );
        $admin->assignRole('administrador');

        $gestor = User::firstOrCreate(
            ['email' => 'gestor@example.com'],
            [
                'name' => 'Gestor',
                'password' => Hash::make('senha123'),
            ]
        );
        $gestor->assignRole('gestor');

        $tecnico = User::firstOrCreate(
            ['email' => 'tecnico@example.com'],
            [
                'name' => 'Técnico Museu',
                'password' => Hash::make('senha123'),
            ]
        );
        $tecnico->assignRole('tecnico_museu');

        // User de teste
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('senha123'),
        ]);
    }
}
