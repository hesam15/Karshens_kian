<?php
namespace App\Services\Permisions\Traits;

use App\Models\Role;
use Doctrine\Inflector\Rules\English\Rules;

trait HasRoles{
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    protected function getAllRoles(array $roles){
        return role::whereIn('name', $roles)->get();
    }

    public function assignRole(...$roles){
        $roles = $this->getAllRoles($roles);

        if($roles->isEmpty()) return $this;

        $this->roles()->syncWithoutDetaching($roles);

        return $this;
    }

    public function removeRole(...$roles){
        $roles = $this->getAllRoles($roles);

        if($roles->isEmpty()) return $this;

        $this->roles()->detach($roles);

        return $this;
    }

    public function refreshRoles($role){
        $this->roles()->sync($role);

        return $this;
    }

    public function hasRole(...$roles){
        foreach($roles as $role){
            if($this->roles->contains('name', $role)){
                return true;
            }
        }
        return false;
    }

}