<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\LogoutRequest;
use App\Http\Helpers\Helper;
use App\Http\Resources\UserResource;
use Spatie\Permission\Models\Role;
use  App\Models\User;

class LogoutController extends Controller
{
   public function logout(LogoutRequest $request){

       
        // $token = $request->user()->token();
        // $token->revoke();
        $request = ['message' => 'You have been successfully logged out!'];
        return response($request, 200);
    
   } 
}
