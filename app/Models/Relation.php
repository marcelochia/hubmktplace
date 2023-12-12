<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property int $offer_id
 * @property int $product_id
 */
class Relation extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'product_id',
    ];
}
