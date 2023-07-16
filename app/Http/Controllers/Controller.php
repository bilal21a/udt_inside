<?php

namespace App\Http\Controllers;

use App\Traits\ButtonsTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ButtonsTrait;

    /**
     * return success response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($message, $data)
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($message, $data = null, $code = 500)
    {
        $response = [
            'success' => false,
            'data' => $data,
            'message' => $message,
        ];
        return response()->json($response, $code);
    }
}
