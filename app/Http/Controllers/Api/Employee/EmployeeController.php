<?php


namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Api\BaseAPIController;
use App\Http\Requests\Employee\EmployeeCreateRequest;
use App\Services\Employee\EmployeeService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * Class EmployeeController
 * @package App\Http\Controllers\Api\Employee
 */
class EmployeeController extends BaseAPIController
{
    /**
     * @var \App\Services\Employee\EmployeeService
     */
    private EmployeeService $employeeService;

    /**
     * EmployeeController constructor.
     *
     * @param \App\Services\Employee\EmployeeService $employeeService
     */
    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    /**
     * @param \App\Http\Requests\Employee\EmployeeCreateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(EmployeeCreateRequest $request   ): JsonResponse{
        try {
            $request->prepare()->persist();

            return $this->sendJsonRedirectResponse(route("employees.index"));
        } catch ( Exception $e ) {
            logger()->error($e->getMessage());

            return $this->sendError("Error while registering.");
        }


    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $employees = $this->employeeService->getAll();

        return $this->sendResponse($employees);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        $employeeDetail = $this->employeeService->findById((int) $id);

        return $this->sendResponse($employeeDetail);
    }

    public function slack()
    {
        $data             = \request()->all();
        $companyShortCode = Str::upper(explode("hello ", Arr::get($data, "text"))[1]);

        $lookup = [
            "SANIMA" => "SANIMA BANK",
            "NIFRA"  => "NIFRA",
            "NLIC"   => "NEPAL LIFE INSURANCE",
            "GBIME"  => "GLOBAL BANK",
            "AIL"    => "AJOD INSURANCE",
            "PLI"    => "PRABHU LIFE INSURANCE",
            "MNBBL"  => "MUKTINATH BIKAS BANK",
            "SGI"    => "SANIMA GENERAL INSURANCE",
            "NICA"   => "NIC ASIA BANK",
            "NABIL"  => "NABIL BANK",
            "MBL"    => "MACHAPUCHREY BANK",
        ];

        return response()->json(
            [
                "text"     => Arr::get($lookup, $companyShortCode, "Invalid code. Please register the company."),
                "username" => "Tung Tung Bot",
            ]
        );
    }
}
