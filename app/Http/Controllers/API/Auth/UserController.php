<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Contractor;
use App\Models\License;
use App\Models\NotificationSetting;
use App\Models\User;
use App\Models\UserAddress;
use App\Notifications\UserRegistrationNotification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Fetch the authenticated user's details.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth('api')->user()->load(['userAddresses:id,user_id,address', 'areaFarmingTypes:id,title,slug']);
        $user->makeHidden(['gender', 'parent_id', 'last_seen', 'deleted_at', 'user_time_zone']);
        return Helper::jsonResponse(true, 'User details fetched successfully', 200, $user);
    }

    /**
     * Update the authenticated user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'tag_line' => 'nullable|string|max:1000',
            'bio' => 'nullable|string|max:1000',
            'working_location' => 'nullable|string|max:1000',
            'language' => 'nullable|string|max:100',
            'area_farming_type_ids' => 'nullable|array',
            'area_farming_type_ids.*' => 'nullable|exists:area_farming_types,id',
        ]);

        try {
            $user = auth('api')->user();

            // Upload avatar photo
            if ($request->hasFile('avatar')) {
                if (!empty($user->avatar)) {
                    Helper::fileDelete(public_path($user->getRawOriginal('avatar')));
                }
                $validatedData['avatar'] = Helper::fileUpload(
                    $request->file('avatar'),
                    'user/avatar',
                    getFileName($request->file('avatar'))
                );
            } else {
                $validatedData['avatar'] = $user->avatar;
            }

            // Update working location
            if (!empty($validatedData['working_location'])) {
                UserAddress::updateOrCreate(
                    ['user_id' => $user->id],
                    ['address' => $validatedData['working_location']]
                );
            }

            // Sync area farming types
            $user->areaFarmingTypes()->sync($validatedData['area_farming_type_ids'] ?? []);

            // Remove non-user table fields before update
            $validatedData = Arr::except($validatedData, ['area_farming_type_ids', 'working_location']);

            // Update user profile
            $user->update($validatedData);

            return Helper::jsonResponse(true, 'Profile updated successfully', 200, $user);

        } catch (Exception $e) {
            Log::error('UserController::updateProfile - ' . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong' . $e->getMessage(), 403);
        }
    }


    public function updateAreaMeasurement(Request $request)
    {
        $validatedData = $request->validate([
            'area_measurement_id' => 'required|exists:area_measurements,id',
        ]);

        try {
            $user = auth('api')->user();
            $user->area_measurement_id = $validatedData['area_measurement_id'];
            $user->save();

            return Helper::jsonResponse(true, 'User area measurement set successfully', 200, $user->load('areaMeasurement'));
        } catch (Exception $e) {
            \Log::error('UserController::updateAreaMeasurement => ' . $e->getMessage());
            return Helper::jsonErrorResponse('Something went wrong'. $e->getMessage(), 403);
        }
    }

    public function deleteProfile()
    {
        try {
            // Get the authenticated user
            $user = User::findOrFail(auth('api')->id());

            // If the user has an avatar, attempt to delete it
            if (!empty($user->avatar)) {
                // Ensure that the file exists before attempting to delete
                $avatarPath = public_path($user->avatar);
                if (file_exists($avatarPath)) {
                    Helper::fileDelete($avatarPath);
                }
            }

            // Soft delete the user (if using SoftDeletes)
            $user->delete();

            // Return success response
            return Helper::jsonResponse(true, 'Profile deleted successfully', 200);
        } catch (Exception $e) {
            Log::error('UserController::deleteProfile' . $e->getMessage());
            // Return error response
            return Helper::jsonErrorResponse('Something went wrong. Please try again later.', 403);
        }
    }

}
