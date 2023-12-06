<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\User;

class CustomerController extends Controller
{
    public function index(){
        $users = User::all()->where('user_type_id', '=', '1');
        return response()->json($users);
    }
}
