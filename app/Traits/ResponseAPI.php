<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
trait ResponseAPI
{
    public function buildResponse($message = '', $data = null, $statusCode, $isSuccess = false): JsonResponse
    {
        if (!$isSuccess) {
            return response()->json([
                'message' => $message,
            ], $statusCode);
        }

        return response()->json([
            'message' => $message,
            'results' => $data
        ], $statusCode);
    }

    public function buildSuccessResponse($message, $data, $statusCode): JsonResponse
    {
        return $this->buildResponse($message, $data, $statusCode, true);
    }

    public function buildErrorResponse($message, $statusCode): JsonResponse
    {
        return $this->buildResponse($message, null, $statusCode);
    }
}
