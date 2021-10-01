<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles ....
        $rolesuperadmin =  Role::create(['name' => 'superadmin']);
        $roleadmin =  Role::create(['name' => 'admin']);
        $roleeditor =  Role::create(['name' => 'editor']);
        $roleuser =  Role::create(['name' => 'user']);

        //create permission ...
         $permissions = [
             [
               "group_name"=> "dashboard",
               "permissions"=>[
                   "dashboard.view",
                   "dashboard.edit"
               ]
             ],

             [
                 "group_name"=> "project",
                 "permissions"=>[
                     //project permission
                     'project.create',
                     'project.view',
                     'project.approve',
                     'project.edit',
                     'project.delete',
                 ]
             ],

             [
                 "group_name"=> "admin",
                 "permissions"=>[
                     //admin permission
                     'admin.create',
                     'admin.view',
                     'admin.approve',
                     'admin.edit',
                     'admin.delete',
                 ]
             ],

             [
                 "group_name"=> "role",
                 "permissions"=>[
                     //role permission
                     'role.create',
                     'role.view',
                     'role.approve',
                     'role.edit',
                     'role.delete',
                 ]
             ],

             [
                 "group_name"=> "profile",
                 "permissions"=>[
                     //profile permission
                     'profile.view',
                     'profile.edit',
                 ]
             ],
         ];

        //Assign permission
        for ($i = 0; $i <  count((array)$permissions); $i++){
            $permissionGroup = $permissions[$i]["group_name"];
            for ($j = 0; $j <  count((array)$permissions[$i]["permissions"]); $j++){
                $permission = Permission::create(['name' => $permissions[$i]["permissions"][$j], "group_name"=> $permissionGroup]);
                $rolesuperadmin->givePermissionTo($permission);
                $permission->assignRole($rolesuperadmin);
            }

        }
    }
}
