<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Traits\CustomerTrait;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    use CustomerTrait;

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email',
                'address' => 'required',
                'role' => 'required|in:customer,driver,service_provider',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
                'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors()->first());
            }

            $user = new User();
            $user = $this->save_customer($user, $request);

            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['user'] =  $user;

            return $this->sendResponse('User register successfully.',$success);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(),null);
        }
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();
    
            return $this->sendResponse("Login Successfully", ['token' => $user->createToken('MyApp')->plainTextToken, 'user' => $user]);
        } else {
            return $this->sendError('Unauthorised', null);
        }
    }
}