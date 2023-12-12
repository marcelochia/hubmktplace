<?php

namespace App\Helpers;

use App\Enums\OfferStatusEnum;
use App\Enums\ProductStatusEnum;

class ProductHelper
{
    public static function statusIsUpdatedInOffer(string $productStatus, string $offerStatus): bool
    {
        if ($offerStatus === $productStatus) {
            return true;
        }

        if ($offerStatus === OfferStatusEnum::PAUSED->value && $productStatus === ProductStatusEnum::INACTIVE->value) {
            return true;
        }

        return false;
    }
}
