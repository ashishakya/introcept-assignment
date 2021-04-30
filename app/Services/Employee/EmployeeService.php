<?php

namespace App\Services\Employee;

use App\Repositories\EmployeeRepository\EmployeeRepositoryInterface;
use Illuminate\Support\Collection;

/**
 * Class EmployeeService
 * @package App\Services\Employee
 */
class EmployeeService
{
    /**
     * @var \App\Repositories\EmployeeRepository\EmployeeRepositoryInterface
     */
    private $employeeRepository;

    /**
     * EmployeeService constructor.
     *
     * @param \App\Repositories\EmployeeRepository\EmployeeRepositoryInterface $employeeRepository
     */
    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAll(): Collection
    {
        return $this->employeeRepository->all();
    }
}
