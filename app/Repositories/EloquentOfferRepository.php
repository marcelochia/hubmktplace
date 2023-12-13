<?php

namespace App\Repositories;

use App\Entities\Offer;
use App\Intefaces\OfferRepository;
use App\Models\Offer as OfferModel;
use Illuminate\Database\Eloquent\Model;

class EloquentOfferRepository implements OfferRepository
{
    private Model $model;

    public function __construct()
    {
        $this->model = new OfferModel();
    }

    public function get(int $id): ?Offer
    {
        /** @var OfferModel $registry */
        $registry = $this->model::find($id);

        if (is_null($registry)) {
            return null;
        }

        $offer = new Offer(
            reference: $registry->reference,
            title: $registry->title,
            status: $registry->status,
            price: $registry->price,
            salePrice: $registry->sale_price,
            saleStartsOn: $registry->sale_starts_on,
            saleEndsOn: $registry->sale_ends_on,
            stock: $registry->stock
        );
        $offer->setId($registry->id);

        return $offer;
    }

    public function update(Offer $offer): void
    {
        /** @var OfferModel $registry */
        $registry = $this->model::find($offer->id);

        $registry->reference = $offer->getReference();
        $registry->title = $offer->getTitle();
        $registry->status = $offer->getStatus();
        $registry->price = $offer->getPrice();
        $registry->sale_price = $offer->getSalePrice();
        $registry->sale_starts_on = $offer->getSaleStartsOn();
        $registry->sale_ends_on = $offer->getSaleEndsOn();
        $registry->stock = $offer->getStock();

        $registry->save();
    }
}
