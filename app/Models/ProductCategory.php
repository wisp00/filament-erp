<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    protected $fillable =[
        'name',
        'model',
        'description',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'product_category_id'); 
    }
}
