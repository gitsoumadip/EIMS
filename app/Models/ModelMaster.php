<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ModelMaster extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $table = 'model_master';

    // protected $fillable = [
    //     'model_name',
    //     'model_slug',
    //     'model_status',
    // ];
}
