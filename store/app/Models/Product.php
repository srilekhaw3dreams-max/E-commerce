<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
use HasFactory;


protected $fillable = [
'category_id',
'name',
'description',
'price',
'stock',
];


public function category()
{
return $this->belongsTo(Category::class);
}


public function tags()
{
return $this->belongsToMany(Tag::class);
}


// Example: orders relation would be defined similarly if orders exist
// public function orders() { return $this->belongsToMany(Order::class)->withPivot('quantity', 'price'); }
}
