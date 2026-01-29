<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'produits';
    public $timestamps = false;
    protected $fillable = [
    'name', 
    'description',
    'price',
    'stock',
    'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(category::class);
    } 
}
