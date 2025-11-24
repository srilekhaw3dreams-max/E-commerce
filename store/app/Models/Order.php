<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
Use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = ['user_id', 'address_id', 'total', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
