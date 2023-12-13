<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $reference
 * @property string $title
 * @property string $status
 * @property float $price
 * @property null|float $sale_price
 * @property null|\DateTime $sale_starts_on
 * @property null|\DateTime $sale_ends_on
 * @property int $stock
 */
class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'title',
        'status',
        'price',
        'sale_price',
        'sale_starts_on',
        'sale_ends_on',
        'stock',
    ];

    protected $casts = [
        'sale_starts_on' => 'datetime:Y-m-d H:i:s',
        'sale_ends_on' => 'datetime:Y-m-d H:i:s',
    ];
}
