<?php

namespace App\Services;

use App\Entities\Offer;
use App\Enums\OfferStatusEnum;
use App\Enums\ProductStatusEnum;
use App\Exceptions\EntityNotFoundException;
use App\Intefaces\OfferRepository;

class OfferService
{
    public function __construct(private OfferRepository $offerRepository)
    {}

    /** @throws EntityNotFoundException quando o anúncio não for encontrado */
    public function getOffer(int $offerId): Offer
    {
        $offer = $this->offerRepository->get($offerId);

        if (is_null($offer)) {
            throw new EntityNotFoundException('Anúncio não encontrado');
        }

        return $offer;
    }

    public function updateOfferStatusFromProductStatus(Offer $offer, ProductStatusEnum $newStatus): void
    {
        $newStatus = $this->mapProductStatusToOfferStatus($newStatus);

        $offer->changeStatus($newStatus->value);

        $this->offerRepository->update($offer);
    }

    public static function statusIsUpdatedInOffer(string $offerStatus, string $productStatus): bool
    {
        if ($offerStatus === $productStatus) {
            return true;
        }

        if ($offerStatus === OfferStatusEnum::PAUSED->value && $productStatus === ProductStatusEnum::INACTIVE->value) {
            return true;
        }

        return false;
    }

    private function mapProductStatusToOfferStatus(ProductStatusEnum $productStatus): OfferStatusEnum
    {
        if ($productStatus === ProductStatusEnum::INACTIVE) {
            return OfferStatusEnum::PAUSED;
        }

        return OfferStatusEnum::ACTIVE;
    }
}
