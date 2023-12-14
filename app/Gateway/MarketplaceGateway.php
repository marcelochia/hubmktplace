<?php

namespace App\Gateway;

use App\Exceptions\GatewayException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MarketplaceGateway
{
    private string $baseUrl = 'https://demo8880419.mockable.io/webhook';

    /**
     * @throws GatewayException quando ocorre um erro na requisição
     */
    public function sendOfferNotification(string $offerReference): bool
    {
        try {
            $response = Http::post($this->baseUrl, [
                'offer_ref' => $offerReference
            ]);

            return $response->status() === 200;
        } catch (\Exception $e) {
            Log::error('Ocorreu um erro ao fazer a requisição.', [
                'file' => $this,
                'url' => $this->baseUrl,
                'error' => $e->getMessage()
            ]);

            throw new GatewayException("Ocorreu um erro ao fazer a requisição para a URL $this->baseUrl");
        }
    }
}
