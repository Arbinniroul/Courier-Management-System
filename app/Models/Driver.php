<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    //
    protected $fillable=[
        'user_id',
        'name',
        'phone',
        'vehicle_number',
        'vehicle_type',
        'status'
    ];
    protected $casts=[
        'status'=>'string'
    ];
    public function User(){
        return $this->belongsTo(User::class);

    }
    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }
    public function activeDeliveries(){
        return $this->hasOne(Delivery::class)->whereNotIn('status',['delivered','failed']);
    }
}
