<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class EventMaster extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $table = 'event';

    // protected $fillable = [
    //     'env_name',
    //     'env_slug',
    //     'env_status',
    // ];
}
