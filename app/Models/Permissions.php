<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['name', 'persian_name'];

    public function roles(){
        return $this->belongsToMany(Role::class, 'permissions_roles');
    }
}
