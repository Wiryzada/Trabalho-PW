<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsRolesSeeder extends Seeder
{
    protected $roles =
        [
            [
                'title' => 'Administrador',
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Estudante',
                'name' => 'student',
                'guard_name' => 'web'
            ]
        ];

    protected $permissions =
        [
            [
                'title' => 'Criar Pedido',
                'name' => 'create_order',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Reprovar Pedido',
                'name' => 'reject_order',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Aprovar Pedido',
                'name' => 'approve_order',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Listar Pedidos',
                'name' => 'list_order',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Criar Instituição',
                'name' => 'create_institution',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Editar Instituição',
                'name' => 'edit_institution',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Deletar Instituição',
                'name' => 'delete_institution',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Listar Instituições',
                'name' => 'list_institution',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Criar Curso',
                'name' => 'create_course',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Editar Curso',
                'name' => 'edit_course',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Deletar Curso',
                'name' => 'delete_course',
                'guard_name' => 'web'
            ],
            [
                'title' => 'Listar Cursos',
                'name' => 'list_course',
                'guard_name' => 'web'
            ]
        ];
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Role::insert($this->roles);
        Permission::insert($this->permissions);

        $admin = Role::whereName('admin')->first();
        $admin->givePermissionTo(collect($this->permissions)->except([0])->pluck('name')->toArray());

        $student = Role::whereName('student')->first();
        $student->givePermissionTo(collect($this->permissions)->only([0])->pluck('name')->toArray());

        $adminUser = User::where('name', 'admin')->first();
        $adminUser->assignRole('admin');
    }
}
