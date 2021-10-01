<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','username','gender', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAllGroupName(){
        $permission_group = DB::table("permissions")->select("group_name")->groupBy("group_name")->get();
        return $permission_group;
    }

    public static function getPermissionByGroupName($groupName){
        $getPermissionGroup = DB::table("permissions")->where("group_name", $groupName)->get();
        return $getPermissionGroup;
    }

    public static function RoleHasPermission($Role, $permissions){
        $roleHasPermission = true;
        foreach ($permissions as $per){
            if (!$Role->hasPermissionTo($per->name)){
                $roleHasPermission = false;
                return $roleHasPermission;
            }
        }
        return $roleHasPermission;

    }

}
