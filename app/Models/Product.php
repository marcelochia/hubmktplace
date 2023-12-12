<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $title
 * @property string $status
 * @property float $price
 * @property null|float $promotional_price
 * @property null|\DateTime $promotion_starts_on
 * @property null|\DateTime $promotion_ends_on
 * @property int $quantity
 */
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
