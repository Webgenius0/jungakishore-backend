<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Logs in the user.
     *
     * @bodyParam email string required The email of the user.
     * @bodyParam password string required The password of the user.
     * @bodyParam role string required The role of the user. Can be either customer or contractor.
     */
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'nullable|string|email|required_without:phone',
            'phone' => 'nullable|string|required_without:email',
            'password' => 'required|string',
        ]);

        try {
            // Attempt to find user by email or phone
            if (!empty($request->email)) {
                $user = User::where('email', $request->email)->first();
                if (!$user) {
                    return Helper::jsonErrorResponse('No account found with this email.', 422, [
                        'email' => 'No account found with this email.'
                    ]);
                }

                // Check if email is verified
                if (empty($user->email_verified_at)) {
                    return Helper::jsonErrorResponse(
                        'Your email address has not been verified yet. Please check your inbox for the verification email and verify your account.',
                        403
                    );
                }
            } else {
                $user = User::where('phone', $request->phone)->first();
                if (!$user) {
                    return Helper::jsonErrorResponse('No account found with this phone number.', 422, [
                        'phone' => 'No account found with this phone number.'
                    ]);
                }
            }

            // Check password
            if (!Hash::check($request->password, $user->password)) {
                return Helper::jsonErrorResponse('Invalid password', 401);
            }

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

        } catch (\Exception $e) {
            \Log::error('LoginController::Login ' . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong. Please try again later.', 500);
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
}
