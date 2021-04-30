<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class BaseAPIController
 * @package App\Http\Controllers\Api
 */
class BaseAPIController extends Controller
{
    /**
     * success response method.
     *
     * @param string $redirectUrl
     *
     * @return JsonResponse
     */
    public function sendJsonRedirectResponse(string $redirectUrl): JsonResponse
    {
        return response()->json(['redirect' => $redirectUrl], 200);
    }

    /**
     * success response method.
     *
     * @param        $result
     * @param string $message
     *
     * @return JsonResponse
     */
    public function sendResponse($result, $message = 'Success'): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    /**
     * @param       $error
     * @param array $errorMessages
     * @param int   $code
     *
     * @return JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
            'data'    => [],
        ];

        if ( !empty($errorMessages) ) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
