<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Services\Messages;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UserFormRequest $request)
    {
        $credential=['phone'=>request('phone'),'password'=>request('password')];

        if(auth()->attempt($credential)){
            $data=auth()->user();

            $data['token']=auth()->user()->createToken('phone')->plainTextToken;

            return Messages::success(UserResource::make($data),'Login Successful');
        }
        else{
            return Messages::error('Login Failed');
        }
    }
}
