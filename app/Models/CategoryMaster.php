<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CategoryMaster extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public $table = 'category_masters';

    protected $fillable = [
        'cat_name',
        'cat_slug',
        'cat_status',
    ];
}