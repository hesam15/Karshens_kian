<?php

namespace App\Models;

use App\Services\Permissions\Traits\HasPermission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasPermission;

    protected $fillable = ['name', 'persian_name'];
}
