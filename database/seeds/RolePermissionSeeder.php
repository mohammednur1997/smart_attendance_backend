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
                 "group_name"=> "employee",
                 "permissions"=>[
                     //employee permission
                     'employee.create',
                     'employee.view',
                     'employee.approve',
                     'employee.edit',
                     'employee.delete',
                 ]
             ],
             [
                 "group_name"=> "salary",
                 "permissions"=>[
                     //salary permission
                     'salary.create',
                     'salary.view',
                     'salary.approve',
                     'salary.edit',
                     'salary.delete',
                 ]
             ],
             [
                 "group_name"=> "attendance",
                 "permissions"=>[
                     //attendance permission
                     'attendance.create',
                     'attendance.view',
                     'attendance.approve',
                     'attendance.edit',
                     'attendance.delete',
                 ]
             ],

             [
                 "group_name"=> "vacation",
                 "permissions"=>[
                     //vacation permission
                     'vacation.view',
                     'vacation.approve',
                 ]
             ],
             [
                 "group_name"=> "notification",
                 "permissions"=>[
                     //notification permission
                     'notification.create',
                     'notification.view',
                     'notification.edit',
                     'notification.delete',
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
                     'role.update',
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
