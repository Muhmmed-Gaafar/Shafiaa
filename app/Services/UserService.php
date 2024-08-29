<?php

namespace App\Services;

use App\Helpers\Response\DataFailed;
use App\Helpers\Response\DataStatus;
use App\Helpers\Response\DataSuccess;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\Organization;
use App\Models\User;
use App\Trait\OrganizationTrait;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
    use OrganizationTrait;
    public function createUser(array $data): DataStatus
    {
        try {
            if (isset($data['image'])){
                $data['image'] = upload_image('users', $data['image']);
            } else {
                $imagePath = 'uploads/default.jpg';
            }
            $user = User::create($data);
            return new DataSuccess(
                data: new UserResource($user),
                statusCode: 200,
                message: 'User created successfully'
            );
        } catch (Exception $e) {
            return new DataFailed(
                statusCode: 500,
                message: 'User creation failed: ' . $e->getMessage()
            );
        }
    }

    public function updateUser($id, array $data): DataStatus
    {
        try {
            $user = User::find($id);
            if (isset($data['image'])) {
                if ($user->image !== 'uploads/default.jpg') {
                    Storage::delete($user->image);
                }
                $data['image'] = upload_image('users', $data['image']);
            }

            $user->update($data);

            return new DataSuccess(
                data: new UserResource($user),
                statusCode: 200,
                message: 'User updated successfully'
            );
        } catch (Exception $e) {
            return new DataFailed(
                statusCode: 500,
                message: 'User update failed: ' . $e->getMessage()
            );
        }
    }

    public function deleteUser($id): DataStatus
    {
        try {
            $user = User::findOrFail($id);
            if ($user->image !== 'uploads/default.jpg') {
                Storage::delete($user->image);
            }
            $user->delete();

            return new DataSuccess(
                statusCode: 200,
                message: 'User deleted successfully'
            );
        } catch (Exception $e) {
            return new DataFailed(
                statusCode: 500,
                message: 'User deletion failed: ' . $e->getMessage()
            );
        }
    }
    public function getAllUsers($request)
    {
        try {
            $webKey = $request->header('web_key');
            $organization = Organization::where('web_key', $webKey)->first();
            if (!$organization) {
                return new DataFailed(
                    statusCode: 404,
                    message: 'Organization not found'
                );
            }
            $organization_id = $organization->id;
            $user = User::where('organization_id', $organization_id)->get();

            return new DataSuccess(
                data: UserResource::collection($user),
                statusCode: 200,
                message: 'Teachers retrieved successfully'
            );
        } catch (\Exception $e) {
            return new DataFailed(
                statusCode: 500,
                message: 'Failed to retrieve teachers: ' . $e->getMessage()
            );
        }
    }

    public function getUserById($id)
    {
        $user_by_id = User::find($id);
        return new DataSuccess(
            data: new UserResource($user_by_id),
            statusCode: 200,
            message: 'User updated successfully'
        );
    }
}

