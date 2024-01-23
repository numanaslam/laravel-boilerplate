<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    protected $table = 'categories';
     use HasFactory, SoftDeletes;
     public $fillable = [


         'title' ,
         'details' ,
         'status' ,
         'added_by' ,
         'updated_by' ,
     ];
}
