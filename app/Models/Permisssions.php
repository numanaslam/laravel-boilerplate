<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as BasePermission;

class Permisssions extends BasePermission
{
    use HasFactory;
    protected $guard_name = 'web';
}
