<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\API\V1\Auth\LoginService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;

class LoginController extends Controller
{

    /**
     * Logs in the user.
     *
     * @bodyParam email string required The email of the user.
     * @bodyParam password string required The password of the user.
     */
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'nullable|string|email|required_without:phone',
            'phone' => 'nullable|string|required_without:email|
                regex:/^(\+?\d{1,4}[\s-]?)?(\(?\d{1,3}\)?[\s-]?)?[\d\s-]{7,15}$/',
        ]);

        try {
            // Attempt to find user by email or phone
            if (!empty($request->email)) {
                $user = User::where('email', $request->email)->first();
                // Check if user exists
                if (!$user) {
                    return Helper::jsonErrorResponse('No account found with this email .', 422, [
                        'email' => 'No account found with this email.'
                    ]);
                }
                // Check if the password is correct
                if ($user->user_type == 'admin') {
                    return Helper::jsonErrorResponse('your account cannot login from this app.', 422);
                }
                // Check if email is verified
                if (empty($user->email_verified_at)) {
                    return Helper::jsonErrorResponse(
                        'Your email address has not been verified yet. Please check your inbox for the verification email and verify your account.',
                        403
                    );
                }
                $sendOtp = $this->sendOtpToPhoneOrEmail($user, 'email');
                return Helper::jsonResponse(true, 'OTP sent successfully', 200, ['email' => $user->email]);
            } elseif (!empty($request->phone)) {
                $user = User::where('phone', $request->phone)->first();
                // Check if user exists
                if (!$user) {
                    return Helper::jsonErrorResponse('No account found with this phone number.', 422, [
                        'phone' => 'No account found with this phone number.'
                    ]);
                }
                // Check if the user is an admin
                if ($user->user_type == 'admin') {
                    return Helper::jsonErrorResponse('your account cannot login from this app.', 422);
                }
                // // Check if phone is verified
                // if (empty($user->phone_verified_at)) {
                //     return Helper::jsonErrorResponse(
                //         'Your phone number has not been verified yet. Please check your inbox for the verification phone and verify your account.',
                //         403
                //     );
                // }
                $sendOtp = $this->sendOtpToPhoneOrEmail($user, 'phone');
                // dd($sendOtp);
                return Helper::jsonResponse(true, 'OTP sent successfully', 200, ['phone' => $user->phone]);
            }
            return Helper::jsonErrorResponse('Please provide email or phone number.', 422);
        } catch (Exception $e) {
            Log::error('LoginController::Login ' . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong. Please try again later.', 500, [
                'message' => $e->getMessage()
            ]);
        }
    }


    /**
     * Refreshes the JWT access token for the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     * 
     * @throws \Exception If an error occurs during token refresh.
     */
    public function refreshToken()
    {
        try {
            $refreshToken = auth('api')->refresh();

            return response()->json([
                'status' => true,
                'message' => 'Access token refreshed successfully.',
                'code' => 200,
                'token_type' => 'bearer',
                'token' => $refreshToken,
                'expires_in' => auth('api')->factory()->getTTL() * 60,
                'data' => auth('api')->user()
            ]);
        } catch (Exception $e) {
            Log::error('LoginController::refreshToken' . $e->getMessage());
            return Helper::jsonErrorResponse($e->getMessage(), 500);
        }
    }

    public function verifyLoginOtp(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'nullable|string|email|required_without:phone',
            'phone' => 'nullable|string|required_without:email',
            'otp' => 'required|digits:4',
        ]);
        try {

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                $user = User::where('phone', $request->phone)->first();
            }
            // Verify the OTP (this is just a placeholder, implement your own logic)
            if (!$user || $user->otp !== $request->otp || $user->otp_expires_at < now()) {
                return Helper::jsonErrorResponse('Invalid OTP', 422);
            }
            // Update the user's OTP status
            $user->update([
                'otp' => null,
                'otp_expires_at' => null,
            ]);

            // Login user and generate token
            $token = auth('api')->login($user);

            return response()->json([
                'status' => true,
                'message' => 'User logged in successfully.',
                'code' => 200,
                'token_type' => 'bearer',
                'token' => $token,
                'expires_in' => auth('api')->factory()->getTTL() * 60,
                'data' => auth('api')->user()
            ], 200);
        } catch (Exception $e) {
            Log::error('LoginController::verifyOtp ' . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong. Please try again later. ' . $e->getMessage(), 500);
        }
    }

    private function sendOtpToPhoneOrEmail($user, $type = 'phone')
    {
        $otp = 1234; // For development (use rand in production)
        $otpExpiresAt = Carbon::now()->addMinutes(60); // 1 hour
        // Generate a 4-digit OTP (with leading zeros if needed)
        // $otp = sprintf("%04d", rand(0, 9999));

        if ($type === 'email') {
            try {
                // Mail::to($user->email)->send(new OtpMail($otp, $user, 'Dont share this OTP with anyone.'));
                $user->otp = $otp;
                $user->otp_expires_at = $otpExpiresAt;
                $user->save();
                return true;
            } catch (Exception $e) {
                Log::error("Email OTP send failed: " . $e->getMessage());
                // return Helper::jsonErrorResponse('Failed to send new OTP', 500);
                throw new Exception('Failed to send OTP: ' . $e->getMessage());
            }
        }

        if ($type === 'phone') {
            $sid = env('TWILIO_SID');
            $token = env('TWILIO_AUTH_TOKEN');
            $from = env('TWILIO_PHONE_NUMBER');

            if (!$sid || !$token || !$from) {
                Log::error('Twilio environment variables are missing.');
                throw new Exception('SMS service are missing.');
            }

            try {
                $client = new Client($sid, $token);
                $client->messages->create($user->phone, [
                    'body' => "Your OTP is: $otp",
                    'from' => $from,
                ]);
                $user->otp = $otp;
                $user->otp_expires_at = $otpExpiresAt;
                $user->save();
                return true;
            } catch (Exception $e) {
                Log::error("Twilio OTP send failed: " . $e->getMessage());
                throw new Exception('Failed to send OTP: ' . $e->getMessage());
            }
        }
        throw new Exception('Invalid type for OTP sending.');
    }
}
