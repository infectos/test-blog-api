<?php
namespace App\Traits;

use function response;

trait ApiResponser
{
    /**
     * Return a success JSON response
     *
     * @param array|string $data 
     * @param string $message (optional) 
     * @param int $code (optional) 
     *
     * @return \Illuminate\Http\JsonResponse 
     */
    protected function success($data, string $message = null, int $code = 200)
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Return an error JSON response
     *
     * @param array|string|null $data (optional) 
     * @param string $message (optional) 
     * @param int $code (optional) 
     *
     * @return \Illuminate\Http\JsonResponse 
     */
    protected function error($data = null, string $message = null, int $code = 400)
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data,
        ], $code);
    }
}

