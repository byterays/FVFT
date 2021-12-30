<?php
 
namespace App\Traits\API;
use Illuminate\Http\Response;
trait ApiMethods{
    function sendResponse($result, $message=null)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
            'code' => Response::HTTP_OK
        ];
        return response()->json($response, Response::HTTP_OK, $headers = [], JSON_PRETTY_PRINT);
    }

    function sendError($error, $code = 500, $errorMessages = [])
    {
        $response = [
            'success' => false,
            'message' => $error,
            'code' => $code
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code, $headers = [], JSON_PRETTY_PRINT);
    }
}