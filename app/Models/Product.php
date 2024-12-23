<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_name', 'price', 'details', 'image_link', 'status', 'category_id'];

    public function category()
    {
/**
 * Get the user associated with the Product
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */    
    return $this->hasOne(Category::class);
    }
    
}
