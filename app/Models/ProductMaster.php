<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMaster extends Model
{
    use HasFactory;
    protected $table = 'product_master';

    protected $fillable = [
        'product_name',
        'product_desc',
        'product_status',
    ];

    public function categories()
    {
        return $this->hasOne(CategoryMaster::class, 'cat_id', 'category_id');
    }

    public function brands()
    {
        return $this->hasOne(BrandMaster::class, 'brand_id', 'brand_id');
    }
}
