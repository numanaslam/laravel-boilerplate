<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Roles extends SpatieRole
{
    use HasFactory;
    protected $guard_name = 'web';


    protected $fillable = [
        'name', 'guard_name'
    ];

    // public function users()
    // {
    //     return $this->belongsToMany(User::class);
    // }

    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }
}

