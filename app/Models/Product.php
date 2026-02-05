<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        return $this->belongsTo(Category::class);
    } 

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    } 
}
