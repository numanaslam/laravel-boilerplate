<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;
    public $fillable = [
        'title' ,
        'category_id' ,
        'link' ,
        'start_time' ,
        'speed_per_day' ,
        'average_time' ,
        'refill' ,
        'description' ,
        'price' ,
        'status' ,
        'added_by' ,
        'added_by' ,
        'updated_by' ,

    ];
}
