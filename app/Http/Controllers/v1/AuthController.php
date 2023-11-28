<?php


namespace App\Http\Controllers\v1;


use Illuminate\Http\Request;

use App\Http\Controllers\v1\BaseController as BaseController;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;
use Validator;



class AuthController extends BaseController

{


    public function register(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',

            'street' => 'required',
            'postalCode' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'licenseNumber' => 'required'
        ]);



        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());

        }



        $input = $request->all();

        $input['password'] = bcrypt($input['password']);
        $input['user_type_id'] = 2;

        Log::debug('inputs :', $input);

        $user = User::factory()->create($input);

        $success['token'] =  $user->createToken('MyApp')->plainTextToken;

        $success['name'] =  $user->name;



        return $this->sendResponse($success, 'User register successfully.');

    }


    public function login(Request $request)

    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $user = Auth::user();

            $success['token'] =  $user->createToken('MyApp')->plainTextToken;

            $success['name'] =  $user->name;


            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'], 401);

        }

    }

}
