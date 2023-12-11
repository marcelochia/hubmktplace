<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'title',
        'status',
        'price',
        'promotional_price',
        'promotion_starts_on',
        'promotion_ends_on',
        'quantity',
    ];

    protected $casts = [
        'promotion_starts_on' => 'datetime:Y-m-d H:i:s',
        'promotion_ends_on' => 'datetime:Y-m-d H:i:s',
    ];
}
