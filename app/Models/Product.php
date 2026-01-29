<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
     use HasFactory;
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
