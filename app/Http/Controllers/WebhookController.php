<?php

namespace App\Http\Controllers;

use App\Events\PlatformNotificationReceived;
use App\Http\Requests\Webhooks\PlatformRequest;
use Illuminate\Http\JsonResponse;

class WebhookController extends Controller
{
    public function platform(PlatformRequest $request): JsonResponse
    {
        $productReference = $request->product_ref;
        $scope = $request->scope;

        PlatformNotificationReceived::dispatch($productReference, $scope);

        return response()->json([
            'message' => 'Notificação recebida.',
            'product_reference' => $productReference
        ]);
    }
}
