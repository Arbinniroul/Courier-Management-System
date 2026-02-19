<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable=[
        'order_number',
        'customer_id',
        'pickup_address',
        'delivery_address',
        'status',
        'description',
        'weight',
        'special_instructions',
        'scheduled_pickup',
        'scheduled_delivery'
    ];
    protected $casts=[
        'scheduled_pickup'=>'datetime',
        'scheduled_delivery'=>'datetime'];

    public function customer(){
        return $this->belongsTo(Customer::class);

    }
    public function delivery(){
        return $this->hasOne(Delivery::class);

    }
    public function generateOrderNumber(){
        return 'ORD-' . strtoupper(uniqid());
    }


}
