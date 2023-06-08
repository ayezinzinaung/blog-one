<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Admin\Permission','permission_roles');
    }
}
