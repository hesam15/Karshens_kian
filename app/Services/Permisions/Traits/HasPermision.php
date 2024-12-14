<?php
namespace App\Services\Permisions\Traits;

use App\Models\Permisions;

trait HasPermision{
    public function permisions(){
        return $this->belongsToMany(Permisions::class);
    }


    public function givePermisionTo(...$permisions){
        $permisions = $this->getAllPermisions($permisions);

        if($permisions->isEmpty()) return $this;

        $this->permisions()->syncWithoutDetaching($permisions);
    }

    public function withdrawPermisionTo(...$permisions){
        $permisions = $this->getAllPermisions($permisions);

        if($permisions->isEmpty()) return $this;

        $this->permisions()->detach($permisions);
    }

    public function refreshPermisions(...$permisions){
        $permisions = $this->getAllPermisions($permisions);

        $this->permisions()->sync($permisions);

        return $this;
    }

    protected function getAllPermisions($permisions){
        return $this->permisions()->whereIn('permision_id', $permisions)->get();
    }

    public function hasPermision(Permisions $permisions){
        return $this->hasPermisionThroughRole($permisions) || $this->hasPermision($permisions);
    }

    protected function hasPermisionThroughRole(Permisions $permisions){
        foreach($permisions->roles as $role){
            if($this->roles->contains($role)) return true;
        }
        return false;
    }
}