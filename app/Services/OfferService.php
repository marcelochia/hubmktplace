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

    public function updatePrice(int $offerId, float $price): void
    {
        $offer = $this->getOffer($offerId);

        $offer->changePrice($price);

        $this->offerRepository->update($offer);
    }

    public function updateSalePrice(int $offerId, ?float $salePrice): void
    {
        $offer = $this->getOffer($offerId);

        $offer->changeSalePrice($salePrice);

        $this->offerRepository->update($offer);
    }

    public function updateSaleDates(int $offerId, ?\DateTime $startDate, ?\DateTime $endDate): void
    {
        $offer = $this->getOffer($offerId);

        $offer->changeSaleDates($startDate, $endDate);

        $this->offerRepository->update($offer);
    }

    public function updateStock(int $offerId, int $stock): void
    {
        $offer = $this->getOffer($offerId);

        $offer->changeStock($stock);

        $this->offerRepository->update($offer);
    }

    public function updateOfferStatusFromProductStatus($offerId, ProductStatusEnum $status): void
    {
        $offer = $this->getOffer($offerId);

        $status = $this->mapProductStatusToOfferStatus($status);

        $offer->changeStatus($status->value);

        $this->offerRepository->update($offer);
    }

    private function mapProductStatusToOfferStatus(ProductStatusEnum $productStatus): OfferStatusEnum
    {
        if ($productStatus === ProductStatusEnum::INACTIVE) {
            return OfferStatusEnum::PAUSED;
        }

        return OfferStatusEnum::ACTIVE;
    }
}
