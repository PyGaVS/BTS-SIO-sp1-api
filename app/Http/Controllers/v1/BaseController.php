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
                'message' => $message,git config --global user.name "Océane GUIOCHET"
git config --global user.email "guioch06oc@lycee-ndduroc.com"
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
