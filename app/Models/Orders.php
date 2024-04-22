<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory;
    use HasFactory, SoftDeletes;
    public $fillable = [
        'customer_id' ,
        'service_id' ,
        'order_date' ,
        'order_status' ,
        'quantity' ,
        'unit_price' ,
        'total_amount' ,
        'payment_method' ,
        'special_instructions' ,
        'added_by' ,
        'added_by' ,
        'updated_by' ,

    ];
}
