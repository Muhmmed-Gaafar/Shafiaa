<?php

namespace App\Services;

use App\Helpers\Response\DataFailed;
use App\Helpers\Response\DataStatus;
use App\Helpers\Response\DataSuccess;
use App\Http\Resources\OrganizationResource;
use App\Models\Organization;
use Exception;

class OrganizationService
{
    public function getAllOrganizations($request): DataStatus
    {
        try {
            $webKey = $request->header('web_key');
            $organization = Organization::where('web_key', $webKey)->first();
//            if (!$organization) {
//                return new DataFailed(
//                    statusCode: 404,
//                    message: 'Organization not found'
//                );
//            }
//            $organization_id = $organization->id;
            $organization = Organization::all();

            return new DataSuccess(
                data: OrganizationResource::collection($organization),
                statusCode: 200,
                message: 'Organization retrieved successfully'
            );
        } catch (\Exception $e) {
            return new DataFailed(
                statusCode: 500,
                message: 'Failed to retrieve Organization: ' . $e->getMessage()
            );
        }
    }

    public function getOrganizationById($id): DataStatus
    {
        try {
            $organization = Organization::find($id);
            return new DataSuccess(
                data: new OrganizationResource($organization),
                statusCode: 200,
                message: 'Organization retrieved successfully'
            );
        } catch (Exception $e) {
            return new DataFailed(
                statusCode: 404,
                message: 'Organization not found: ' . $e->getMessage()
            );
        }
    }

    public function createOrganization(array $data): DataStatus
    {
        try {
            $organization = Organization::create($data);
            return new DataSuccess(
                data: new OrganizationResource($organization),
                statusCode: 200,
                message: 'Organization created successfully'
            );
        } catch (Exception $e) {
            return new DataFailed(
                statusCode: 500,
                message: 'Organization creation failed: ' . $e->getMessage()
            );
        }
    }

    public function updateOrganization($id, array $data): DataStatus
    {
        try {
            $organization = Organization::find($id);
            $organization->update($data);
            return new DataSuccess(
                data: new OrganizationResource($organization),
                statusCode: 200,
                message: 'Organization updated successfully'
            );
        } catch (Exception $e) {
            return new DataFailed(
                statusCode: 500,
                message: 'Organization update failed: ' . $e->getMessage()
            );
        }
    }

    public function deleteOrganization($id): DataStatus
    {
        try {
            $organization = Organization::find($id);
            $organization->delete();
            return new DataSuccess(
                statusCode: 200,
                message: 'Organization deleted successfully'
            );
        } catch (Exception $e) {
            return new DataFailed(
                statusCode: 500,
                message: 'Organization deletion failed: ' . $e->getMessage()
            );
        }
    }
}

