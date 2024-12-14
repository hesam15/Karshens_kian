<?php

namespace App\Models;

use App\Services\Permisions\Traits\HasPermision;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasPermision;

    protected $fillable = ['name', 'persian_name'];
}
