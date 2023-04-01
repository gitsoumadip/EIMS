<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMaster extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'totalstock';


    public function categories()
    {
        return $this->hasOne(CategoryMaster::class, 'cat_id', 'category_id');
    }
    public function brands()
    {
        return $this->hasOne(BrandMaster::class, 'brand_id', 'brand_id');
    }
    public function item()
    {
        return $this->hasOne(ProductMaster::class, 'product_id', 'item_id');
    }

    public function modelNumber()
    {
        return $this->hasOne(ModelMaster::class, 'id', 'model_no_id');
    }
}
