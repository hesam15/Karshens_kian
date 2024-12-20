<?php
namespace App\Services\Permissions\Traits;


use App\Models\Role;
use App\Models\Permissions;

use function Psl\Dict\flatten;

trait HasPermission{
    public function permissions(){
        return $this->belongsToMany(Permissions::class);
    }


    public function givePermissionsToRole(Role $role,...$permissions){
        $role->permissions()->syncWithoutDetaching(flatten($permissions));
    }

    public function withdrawPermisionTo(...$permissions){
        $permissions = $this->getAllPermissions($permissions);

        if($permissions->isEmpty()) return $this;

        $this->permissions()->detach($permissions);
    }

    public function refreshPermissions(...$permissions){
        $permissions = $this->getAllPermissions($permissions);

        $this->permissions()->sync($permissions);

        return $this;
    }

    protected function getAllPermissions($permissions){
        return $this->permissions()->whereIn('permissions_id', collect($permissions)->flatten()->toArray())->get();
    }

    public function hasPermission(Permissions $permissions){
        return $this->hasPermissionThroughRole($permissions) || $this->hasPermission($permissions);
    }

    protected function hasPermissionThroughRole(Permissions $permissions){
        foreach($permissions->roles as $role){
            if($this->roles->contains($role)) return true;
        }
        return false;
    }
}