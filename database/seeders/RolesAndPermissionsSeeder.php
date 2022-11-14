<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = array();
        $roles = array();
        $roles_permissions = array();
        $role_models = array();

        $roles_csv = fopen(base_path("database/data/roles_master.csv"), "r");
        while(($data = fgetcsv($roles_csv, 2000, ",")) != FALSE) {
            $role = array('name' => $data[0]);
            array_push($roles, $role);
        }

        $permissions_csv = fopen(base_path("database/data/permissions_master.csv"), "r");
        while(($data = fgetcsv($permissions_csv, 2000, ",")) != FALSE) {
            array_push($permissions, $data['0']);
        }

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        foreach($roles as $role) {
            $role_name = $role['name'];
            $role_model = Role::create(['name' => Str::lower($role_name)]);
            array_push($role_models, $role_model);
        }

        foreach($permissions as $permission) {
            Permission::create(['name' => Str::lower($permission)]);           
        }

        

        $rolesPermissionsCsv = fopen(base_path("database/data/roles_permissions_master.csv"), "r");
        while(($data = fgetcsv($rolesPermissionsCsv, 2000, ",")) != FALSE) {
            foreach($role_models as $role) {
                $role_name = $role->name;
                if($role_name == Str::lower($data['0'])) {
                    $role_permissions =  explode('|', $data['1']);
                    $role_permissions = array_map(function($permission){
                        return Str::lower($permission);
                    }, $role_permissions);
                    $role->givePermissionTo($role_permissions);
                }
            }
        }



        
        // $role->givePermissionTo('edit articles');

        // // or may be done by chaining
        // $role = Role::create(['name' => 'moderator'])
        //     ->givePermissionTo(['publish articles', 'unpublish articles']);

        // $role = Role::create(['name' => 'super-admin']);
        // $role->givePermissionTo(Permission::all());
    }
}