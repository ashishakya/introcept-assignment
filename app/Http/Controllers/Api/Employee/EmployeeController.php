<?php


namespace App\Http\Controllers\Api\Employee;


use App\Http\Controllers\Api\BaseAPIController;
use App\Http\Requests\Employee\EmployeeCreateRequest;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class EmployeeController
 * @package App\Http\Controllers\Api\Employee
 */
class EmployeeController extends BaseAPIController
{
    /**
     * @param \App\Http\Requests\Employee\EmployeeCreateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EmployeeCreateRequest $request): JsonResponse
    {
        try {
            $request->prepare()->persist();

            return $this->sendJsonRedirectResponse(route("home"));
        } catch ( Exception $e ) {
            logger()->error($e->getMessage());

            return $this->sendError("Error while registering.");
        }
    }
}

