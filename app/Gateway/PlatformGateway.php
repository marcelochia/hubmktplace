<?php

namespace App\Gateway;

use App\Entities\Product;
use App\Exceptions\GatewayException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PlatformGateway
{
    private string $baseUrl = 'https://demo8880419.mockable.io/products';

    /**
     * @throws GatewayException quando ocorre um erro na requisição
     */
    public function getProductInformation(string $productReference): ?Product
    {
        $endpoint = "$this->baseUrl/$productReference";

        try {
            $response = Http::get($endpoint);

            if ($response->notFound()) {
                return null;
            }

            $data = $response->json()['data'];

            return new Product(
                reference: $data['reference'],
                title: $data['title'],
                status: $data['status'],
                price: (float) $data['price'],
                promotionalPrice: $data['promotional_price'],
                promotionStartsOn: \DateTime::createFromFormat('Y-m-d H:i:s', $data['promotion_starts_on']),
                promotionEndsOn: \DateTime::createFromFormat('Y-m-d H:i:s', $data['promotion_ends_on']),
                quantity: (int) $data['quantity'],
            );
        } catch (\Exception $e) {
            Log::error('Ocorreu um erro ao fazer a requisição.', [
                'file' => $this,
                'url' => $endpoint,
                'error' => $e->getMessage()
            ]);

            throw new GatewayException("Ocorreu um erro ao fazer a requisição para a URL $endpoint");
        }
    }
}
