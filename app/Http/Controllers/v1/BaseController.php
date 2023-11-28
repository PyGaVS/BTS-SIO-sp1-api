<?php


namespace App\Http\Controllers\v1;


use Illuminate\Http\Request;

use App\Http\Controllers\Controller as Controller;


class BaseController extends Controller

{

    public function sendResponse($result, $message)

    {

        $response = [

            'success' => [
                'token' => $result['token'],
                'message' => $message,
            ],

        ];


        return response()->json($response, 200);

    }


    public function sendError($error, $errorMessages = [], $code = 404)

    {

        $response = [

            'success' => false,

            'message' => $error,

        ];


        if(!empty($errorMessages)){

            $response['data'] = $errorMessages;

        }


        return response()->json($response, $code);

    }

}
