<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BrandMaster extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public $table = 'brand_masters';

    protected $fillable = [
        'brand_name',
        'brand_status'
    ];
}
