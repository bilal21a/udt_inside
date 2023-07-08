<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Mail\OtpMail;
use App\Traits\CustomerTrait;
use App\Traits\userTrait;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    use userTrait;

    /**
     * Register Customer api
     *
     * @return \Illuminate\Http\Response
     */
    public function add_customer(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email',
                'address' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
                'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors()->first());
            }

            $user = new User();
            $user = $this->save_user($user, $request, 'customer');

            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['user'] =  $user;

            return $this->sendResponse('User register successfully.', $success);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), null);
        }
    }
    /**
     * Register service Provider api
     *
     * @return \Illuminate\Http\Response
     */
    public function add_service_provider(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:users,email',
                'address' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
                'cnic' => 'required',
                'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors()->first());
            }

            $user = new User();
            $user = $this->save_user($user, $request, 'service_provider');

            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['user'] =  $user;

            return $this->sendResponse('User register successfully.', $success);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), null);
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
            return $this->sendError('Invalid Credientials', null);
        }
    }

    /**
     * Otp work
     *
     * @return \Illuminate\Http\Response
     */
    public function generate_otp(Request $request)
    {
        $user = User::find(auth('sanctum')->id());
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->otp = $otp;
        $user->save();
        Mail::to($user->email)->send(new OtpMail($user));
        return $this->sendResponse("Otp Sent Successfully", null);
    }
    public function verify_otp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors()->first());
        }
        $user = User::find(auth('sanctum')->id());

        if ($user && $user->otp === $request->otp) {
            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }
            return $this->sendResponse("Email verified successfully.", null);
        }
        return $this->sendError('Invalid OTP.', null);
    }

    /**
     * Update Profiles
     *
     * @return \Illuminate\Http\Response
     */
    public function customer_profile_update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'profile_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors()->first());
            }

            $user =  User::find(auth('sanctum')->id());
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            if ($request->password != null) { //only update in if provided
                $user->password = bcrypt($request->password);
            }
            if ($request->hasFile('profile_image')) {
                $this->delete_image($user->profile_image);
                $file = $request->file('profile_image');
                $filename = 'user_' . rand() . '.' . $file->getClientOriginalExtension();
                $user->profile_image = $filename;
                $file->storeAs('public/user/', $filename);
            }
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->save();

            $success['user'] =  $user;

            return $this->sendResponse('Profile Updated successfully.', $success);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), null);
        }
    }
    public function service_provider_profile_update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'cnic' => 'required',
                'profile_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors()->first());
            }

            $user =  User::find(auth('sanctum')->id());
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->cnic = $request->cnic;
            if ($request->password != null) { //only update in if provided
                $user->password = bcrypt($request->password);
            }
            if ($request->hasFile('profile_image')) {
                $this->delete_image($user->profile_image);
                $file = $request->file('profile_image');
                $filename = 'user_' . rand() . '.' . $file->getClientOriginalExtension();
                $user->profile_image = $filename;
                $file->storeAs('public/user/', $filename);
            }
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->save();
            $success['user'] =  $user;

            return $this->sendResponse('Profile Updated successfully.', $success);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(), null);
        }
    }
}
