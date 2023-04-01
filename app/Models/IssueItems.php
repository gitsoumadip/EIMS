<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueItems extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $table = 'invoices';

}
