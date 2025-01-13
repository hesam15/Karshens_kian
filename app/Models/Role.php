<?php

namespace App\Models;

use App\Services\Permissions\Traits\HasPermission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasPermission;

    public $timestamps = false;

    protected $fillable = ['name', 'persian_name'];

    public function users(){
        return $this->belongsToMany(User::class, 'role');
    }

    public function permissions(){
        return $this->belongsToMany(Permissions::class, 'permissions_roles');
    }
}