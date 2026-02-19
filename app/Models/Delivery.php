<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    //
    protected $fillable=[
        'order_id',
        'driver_id',
        'status',
       'picked_up_at',
        'delivered_at',
        'proof_of_delivery',
        'recipient_name'
    ];
    protected $casts=[
        'picked_up_at'=>'datetime',
        'delivered_at'=>'datetime',

    ];
    public function order(){
        return $this->belongsTo(Order::class);

    }
    public function driver(){
        return $this->belongsTo(Driver::class);
        
    }
}
