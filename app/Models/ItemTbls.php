<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemTbls extends Model
{
    use HasFactory, SoftDeletes;
    // protected $guarded = [];
    protected $table = 'item_tbls';

    protected $fillable = [
        'item_name',
        'item_brand',
        'item_category',
        'item_sl_no',
        'item_model_no',
        'item_office_loc',
        'item_desc',
        'item_approx_price',
        'item_total_qty',
        'item_sale_qty',
        'item_status',
    ];

    public function categories()
    {
        return $this->hasMany(CategoryMaster::class, 'cat_id', 'category_id');
    }
    public function brands()
    {
        return $this->hasMany(BrandMaster::class, 'brand_id', 'brand_id');
    }
    public function products()
    {
        return $this->hasMany(ProductMaster::class, 'product_id', 'products_id');
    }
    public function storeloc()
    {
        return $this->hasMany(StoreMaster::class, 'store_id', 'stores_id');
    }
    public function modelNo()
    {
        return $this->hasMany(ModelMaster::class, 'mdl_id', 'models_id');
    }
}
