<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Mail\ForgetPasswordMail;
use App\Otp;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends BaseController
{

    public function forgetPassword(Request $request)
    {
        try {
            //code...
            $validation = Validator::make($request->all(), [
                'email' => 'required|email|exists:users',
            ]);
            if ($validation->fails()) {
                return $this->sendError('Validation Error.',$validation->errors()->first());

            }

            $otp = random_int(100000, 999999);

            $block = new Otp();
            $block->email = $request->email;
            $block->otp = $otp;
            $block->save();
            // dd('User exist');
            Mail::to($request->email)->send(new ForgetPasswordMail($otp));
            // return $this->success(null,  'We have send you Password reset code');
            return $this->sendResponse('We have send you Password reset code',null);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage(),null);
        }

    }

    // public function verifyOtp(Request $request)
    // {
    //     try {
    //         $validation = Validator::make($request->all(), [
    //             'otp' => 'required',
    //         ]);
    //         if ($validation->fails()) {
    //             return $this->sendError('Validation Error.',$validation->errors()->first());
    //         }

    //         $otp=Otp::where('otp',$request->otp)->first();

    //     if (isset($otp->otp)) {
    //         return $this->sendResponse('Otp Verfied',null);
    //     }else {
    //         return $this->sendError('Invalid Otp',null);

    //     }
    //     } catch (\Throwable $th) {
    //         return $this->sendError($th->getMessage(),null);
    //     }
    // }


    public function changePassword(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email|exists:users',
            'password' => 'required',

        ]);
        if ($validation->fails()) {
            return $this->sendError('Validation Error.',$validation->errors()->first());

        }
        $otp = Otp::where([
            'email' => $request->email,
            'otp' => $request->otp
            ])->first();

        if (isset($otp->otp)) {
            $user =  User::where('email', $otp->email)->update(['password' => Hash::make($request->password)]);
            DB::table('otps')->where(['email' => $request->email])->delete();
            return $this->sendResponse('Your password has been changed!',null);
        } else {
            return $this->sendError('Invalid Otp',null);

        }
    }
}
