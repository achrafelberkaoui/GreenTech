<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $filable = ['name'];
    public function products (): HasMany 
    {
            return $this->hasMany(products::class);
    }
}
