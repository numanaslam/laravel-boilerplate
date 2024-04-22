<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funds extends Model
{
    use HasFactory;

    use HasFactory, SoftDeletes;
    public $fillable = [
        'user_id' ,
        'amount' ,
        'transaction_date' ,
        'payment_method' ,
        'image' ,
        'status' ,
        'added_by' ,
        'added_by' ,
        'updated_by' ,

    ];
}
