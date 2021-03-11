<?php


namespace App\Traits;


use App\Models\Role;

trait RolesTrait
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public function hasRole(... $roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('roleName', $role)) {
                return true;
            }
        }
        return false;
    }
}
